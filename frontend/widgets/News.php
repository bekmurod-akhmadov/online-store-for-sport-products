<?php


namespace frontend\widgets;


use yii\base\Widget;

class News extends Widget
{
    public function run(){
        $models = \common\models\News::find()->where(['status' => 1])->limit(4)->all();
        return $this->render('news' , [
            'models' => $models,
        ]);
    }

}