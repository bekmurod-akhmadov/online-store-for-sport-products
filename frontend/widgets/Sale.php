<?php


namespace frontend\widgets;


use common\models\Product;
use yii\base\Widget;

class Sale extends Widget
{
    public function run(){
        $models = Product::find()->where(['status' => 1 , 'sale' => 1])->all();
        return $this->render('sale' , [
            'models' => $models,
        ]);
    }

}