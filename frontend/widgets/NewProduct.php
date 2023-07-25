<?php


namespace frontend\widgets;


use common\models\Product;
use yii\base\Widget;

class NewProduct extends Widget
{
    public function run(){
        $models = Product::find()->where(['status' => 1 , 'new' => 1])->andWhere(['stock' => 0])->all();
        return $this->render('new' , [
            'models' => $models,
        ]);
    }

}