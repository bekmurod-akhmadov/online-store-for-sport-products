<?php


namespace frontend\widgets;


use common\models\Banner;
use yii\base\Widget;

class HeaderSlider extends Widget
{
    public function run(){
        $models = Banner::find()->where(['status' => 1])->all();
        return $this->render('header-slider' , [
            'models' => $models,
        ]);
    }

}