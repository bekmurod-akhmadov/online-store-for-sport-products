<?php


namespace frontend\controllers;


use common\components\Controller;

class ContactController extends Controller
{
    public  function actionIndex(){
        return $this->render('index');
    }

}