<?php


namespace frontend\widgets;


use common\models\Product;
use yii\base\Widget;

class Featured extends Widget
{
    public function run(){
        $models = Product::find()->where(['status' => 1 , 'featured' => 1])->limit(10)->all();
        return $this->render('featured' , [
            'models' => $models,
        ]);
    }

}