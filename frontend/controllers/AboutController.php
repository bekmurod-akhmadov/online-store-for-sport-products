<?php


namespace frontend\controllers;


use common\components\Controller;
use common\models\Course;
use common\models\Product;
use common\models\Sertificat;
use common\models\Specialist;
use common\models\Teacher;
use common\models\Testimonial;
use common\models\WhatEnd;

class AboutController extends Controller
{

    public function actionIndex(){

        return $this->render('index',[

        ]);
    }
}