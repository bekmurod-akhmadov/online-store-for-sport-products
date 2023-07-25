<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\SearchForm;

$this->title =\common\components\StaticFunctions::getSettings('title') . " - " . nl2br(Html::encode($message));
?>

<!-- cart item area start -->
<div class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="location">
                    <ul>
                        <li><a href="<?=\yii\helpers\Url::home()?>" title="go to homepage">Главная<span>/</span></a>  </li>
                        <li><strong> 404-error</strong></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="about-page">
            <div class="row justify-content-center my-5" style="text-align: center">
                <div class="colg-lg-7">
                    <img src="/default/404-error.png" alt="404-error">
                </div>
                <div class="col-lg-12">
                    <a class="btn btn-primary" style="text-transform: uppercase" href="<?=\yii\helpers\Url::to(['product/index'])?>">Вернуться к товарам</a>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- cart item area end -->