<?php


namespace frontend\controllers;

use common\components\Controller;
use common\models\LoginForm;
use Yii;

class UserController extends Controller
{

//    public function actionLogin(){
//        $model = new LoginForm();
//        if ($model->load(\Yii::$app->request->post()) && $model->login()){
//            return $this->redirect('profile');
//        }
//        return $this->render('login',compact('model'));
//    }
//    public function actionProfile(){
//       if(\Yii::$app->user->isGuest){
//           echo \Yii::$app->user->getId();die;
//            return $this->redirect('login');
//       }
//
//       return $this->render('profile');
//    }
//
//    public function actionLogout(){
//        \Yii::$app->user->logout();
//        return $this->goBack();
//    }
//
//    //register
//    public function actionRegister(){
//        return $this->render('register');
//    }

}