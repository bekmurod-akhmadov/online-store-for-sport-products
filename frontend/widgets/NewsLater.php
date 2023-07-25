<?php


namespace frontend\widgets;


use common\models\Social;
use yii\base\Widget;

class NewsLater extends Widget
{
    public function run(){
        $models = Social::find()->where(['status' => 1])->all();
        return $this->render('news-later' , [
            'models' => $models,
        ]);
    }

}