<?php


namespace frontend\widgets;


use yii\base\Widget;

class HeaderSecondary extends Widget
{
    public function run(){
        return $this->render('header-secondary');
    }

}