<?php


namespace frontend\controllers;
use common\models\Cart;
use common\models\RegisterForm;
use common\components\Controller;
use common\models\FrontUser;
use common\models\Order;
use common\models\OrderItem;
use frontend\models\LoginForm;
use Yii;

class FrontUserController extends Controller
{
    public function actionLogin(){
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()){
            return $this->redirect('profile');
        }
        return $this->render('login',compact('model'));
    }

    public function actionProfile(){
       if(\Yii::$app->user->isGuest){
            return $this->redirect('login');
       }
       $session = Yii::$app->session;
       $session->open();
       $userId = Yii::$app->user->getId();
       $mainOrder = Order::findOne(['user_id'=>$userId]);
       $orders = OrderItem::find()->where(['user_id' => $userId])->all();

        $model = FrontUser::findOne($userId);
        $oldPassword = $model->password;
        $model->password = '';
        if (!empty(Yii::$app->request->isPost) && $model->load(Yii::$app->request->post())){
            if (!empty($model->password)){
                $model->password = Yii::$app->security->generatePasswordHash($model->password);
            }else{
                $model->password = $oldPassword;
            }

            if ($model->save()){
                $orders = Order::find()->where(['user_id'=>$userId])->all();
                foreach ($orders as $order){
                    $order->city = $model->city;
                    $order->street = $model->street;
                    $order->save();
                }
                Yii::$app->session->setFlash('success','Успешно изменен!');
                return $this->redirect('/front-user/profile');
            }
        }
       return $this->render('profile',[
           'orders'=>$orders,
           'model' => $model,
           'mainOrder'=>$mainOrder,
           'session' => $session
       ]);
    }

    //settings-edit
    public function actionSettings(){

        $userId = Yii::$app->user->getId();
        $model = FrontUser::findOne($userId);
        $oldPassword = $model->password;
        $model->password = '';
        if (!empty(Yii::$app->request->isPost) && $model->load(Yii::$app->request->post())){
            if (!empty($model->password)){
                $model->password = Yii::$app->security->generatePasswordHash($model->password);
            }else{
                $model->password = $oldPassword;
            }

            if ($model->save()){
                $orders = Order::find()->where(['user_id'=>$userId])->all();
                foreach ($orders as $order){
                    $order->city = $model->city;
                    $order->street = $model->street;
                    $order->save();
                }
                Yii::$app->session->setFlash('success','Успешно изменен!');
                return $this->redirect('/front-user/profile');
            }    
        }

        return $this->render('settings',[
            'model'=>$model,
        ]);
    }

    //order history
    public function actionOrderHistory(){

        $userId = Yii::$app->user->getId();
        $orders = OrderItem::find()->where(['user_id'=>$userId])->all();
        $mainOrder = Order::findOne(['user_id'=>$userId]);
        return $this->render('order-history',[
            'orders'=>$orders,
            'mainOrder'=>$mainOrder,
        ]);
    }

    public function actionHistoryItem($id){

        $userId = Yii::$app->user->getId();
        $orders = OrderItem::find()->where(['id'=>$id])->all();
        $mainOrder = Order::findOne(['user_id'=>$id]);
        return $this->render('history-item',[
            'orders'=>$orders,
            'mainOrder'=>$mainOrder,
        ]);

    }

    public function actionOrderDetail(){

        $userId = Yii::$app->user->getId();
        $orders = OrderItem::find()->where(['user_id'=>$userId])->all();
        $mainOrders = Order::find()->where(['user_id'=>$userId])->all();
        return $this->render('order-detail',[
            'orders'=>$orders,
            'mainOrders'=>$mainOrders,
        ]);
    }

    public function actionRegistration(){

        $model = new RegisterForm();
        if(Yii::$app->request->isPost && $model->load(Yii::$app->request->post())){
            if($model->validate()  && $model->register()){
                Yii::$app->session->setFlash('register-success','Вы успешно зарегистровались!');
                return $this->redirect('login');
            }

        }
        return $this->render('registration',compact('model'));
    }
    // delete order item
    public function actionDeleteOrder($id){
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalcLike($id);
        return $this->render('profile');
    }


    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionUserLike(){
        $session = Yii::$app->session;
        $session->open();
        return $this->render('user-like' , [
            'session' => $session,
        ]);
    }

    public function actionDeleteLike($id){
        $userId = Yii::$app->user->getId();
        $model = FrontUser::findOne($userId);
        $session = Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalcLike($id);

        return $this->render('profile',compact('session' , 'model'));
    }

}