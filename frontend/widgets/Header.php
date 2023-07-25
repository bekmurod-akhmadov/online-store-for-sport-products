<?php

namespace frontend\widgets;


use common\models\FrontUser;
use common\models\Menu;
use common\models\Product;
use common\models\ProductCategory;
use common\models\Result;
use common\models\Social;
use yii\bootstrap\Widget;

class Header extends Widget {

    public function run(){
        $session = \Yii::$app->session;
        $userId = \Yii::$app->user->getId();
        $user = FrontUser::findOne($userId);
        $categories = ProductCategory::find()->where(['status' => 1])->all();
        $socials = Social::find()->where(['status'=>1])->all();
        $models = Menu::find()->where(['status'=>1,'parent'=>null])->andWhere(['type' => 0])->orderBy(['order_by'=>SORT_ASC])->all();

        return $this->render('header',[
            'session' => $session,
            'user' => $user,
            'categories' => $categories,
            'models' => $models,
            'socials' => $socials
        ]);
    }

}