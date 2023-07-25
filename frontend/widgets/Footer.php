<?php

namespace frontend\widgets;


use common\models\Menu;
use common\models\Social;
use yii\bootstrap\Widget;

class Footer extends Widget {

    public function run()
    {
        $models = Menu::find()->where(['status'=>1,'type'=>1])->all();
        $socials = Social::find()->where(['status'=>1])->all();
        $news = \common\models\News::find()->where(['status' => 1])->orderBy(['create_date' => SORT_DESC])->limit(3)->all();
       return $this->render('footer',[
           'models'=>$models,
           'news' => $news,
           'socials'=>$socials,
       ]);
    }

}
