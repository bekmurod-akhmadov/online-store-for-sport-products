<?php


namespace frontend\controllers;

use common\models\FrontUser;
use common\models\Order;
use common\models\OrderItem;
use common\models\Product;
use common\models\TelegramNotificator;
use Yii;
use common\models\Cart;
use common\components\Controller;

class CartController extends Controller
{
    public function actionAdd($id){
        $product = Product::findOne($id);
        $qty = (int)Yii::$app->request->get('qty');
        $qty = !$qty ? 1 : $qty;
        if (empty($product)){
            return false;
        }else{
            $session = Yii::$app->session;
            $session->open();
            $cart = new Cart();
            $cart->addToCart($product,$qty);
            $this->layout = false;

            return $this->render('cart-modal',compact('session'));
        }
    }

    public function actionClear(){
            $session = Yii::$app->session;
            $session->open();
            $session->remove('cart');
            $session->remove('cart.qty');
            $session->remove('cart.sum');
            $this->layout = false;
            return $this->render('cart-modal',compact('session'));

    }

    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal',compact('session'));
    }

    public function actionShow(){
        $id = Yii::$app->request->get('id');
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        $this->layout = false;
        return $this->render('cart-modal',compact('session'));
    }

    public function actionMinus(){
        $id = Yii::$app->request->get('id');
        $count = Yii::$app->request->get('count');
        $session = Yii::$app->session;
        $session->open();
        $product = Product::findOne($id);
        $cart = new Cart();
        $cart->addToCart($product,$count);
        $this->layout = false;
        return $this->renderAjax('cart-modal',compact('session'));

    }

    public function actionCheckout(){
        $id = Yii::$app->request->get('id');
        $userId = Yii::$app->user->getId();
        $user = FrontUser::findOne(['id'=>$userId]);
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();

        if ($order->load(Yii::$app->request->post())){
            $userId = Yii::$app->user->getId();
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            $order->user_id = $userId;

            $order->save();

            if ($order->save()){
                $this->saveOrderItems($session['cart'],$order->id);
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                $sendOrder = new TelegramNotificator();
                $sendOrder->sendOrderNotification($order);
                return $this->refresh();
            }else{
                Yii::$app->session->setFlash('error','An error occurred while ordering');
            }


        }
        return $this->render('checkout',compact('session','order' , 'user'));
    }

    protected function saveOrderItems($items,$order_id){
            foreach ($items as $id => $item){
                $userId = Yii::$app->user->getId();
                $orderItems = new OrderItem();
                $orderItems->user_id = $userId;
                $orderItems->order_id = $order_id;
                $orderItems->product_id = $id;
                $orderItems->name = $item['name'];
                $orderItems->price = $item['price'];
                $orderItems->qty_item = $item['qty'];
                $orderItems->sum_item = $item['qty'] * $item['price'];
                $orderItems->save();
            }
    }

    public function actionCheckCount($id,$count){
        $cart = new Cart();
        $product = Product::findOne($id);
        $cart->addToCart($product,$count);
        return $this->renderAjax('checkout');
    }


    public function actionAddLike(){
        $id = Yii::$app->request->get('id');
        $qty = Yii::$app->request->get('qty');
        $product = Product::findOne($id);
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToLike($product , $qty);
        return $this->render('like',compact('session'));
    }

    public function actionLike(){
        $session = Yii::$app->session;
        $session->open();
        return $this->render('like',compact('session'));
    }

    public function actionDeleteLike($id){
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalcLike($id);

        return $this->render('like',compact('session'));
    }


}