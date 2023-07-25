<?php


namespace frontend\widgets;


use common\models\Product;
use yii\base\Widget;

class Bestseller extends Widget
{
    public function run(){
        $models = Product::find()->where(['status'=> 1 , 'best' => 1])->all();
        return $this->render('bestseller' , [
            'models' => $models,
        ]);
    }

}