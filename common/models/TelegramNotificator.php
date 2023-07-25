<?php


namespace common\models;


use yii\base\Model;
use yii\httpclient\Client;

class TelegramNotificator extends Model
{
    public function sendGuestNotification(){
        $message = "Saytga kimdir kirdi";
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('https://api.telegram.org/bot5652372645:AAGBEVpw2xnp0O4Hyb-AT0X_U_M7iSMVpAM/sendMessage')
            ->setData(['text'=>"Nima gap",'chat_id'=>'1990948908'])
            ->send();

    }

    public function sendOrderNotification($orderModel){
        $message = "
<b>Новый заказ!</b>\n
<b>Имя : </b>$orderModel->first_name  $orderModel->last_name\n
<b>Номер телефона : </b> $orderModel->phone\n
<b>Город: </b>$orderModel->city\n
<b>Улица: </b>$orderModel->street\n
<b>Общее количество товаров : </b>$orderModel->qty\n
<b>Итого : </b>$ $orderModel->sum\n 
_________________________________________ 
<b><i>Товары</i></b>  
       ";

        $orderProducts = OrderItem::find()->where(['order_id' => $orderModel->id])->all();
        foreach ($orderProducts as $orderProduct){
            $productData = Product::findOne($orderProduct->product_id);
            $productText = "
<b>Название товара : </b> $productData->name
<b>Цена : </b> $orderProduct->price 
<b>Количество : </b> $orderProduct->qty_item  
_________________________________________ 
            ";

            $message .=$productText;

        }

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl('https://api.telegram.org/bot5652372645:AAGBEVpw2xnp0O4Hyb-AT0X_U_M7iSMVpAM/sendMessage')
            ->setData(['text'=>$message,'chat_id'=>'1990948908','parse_mode'=>'HTML'])
            ->send();
    }
}