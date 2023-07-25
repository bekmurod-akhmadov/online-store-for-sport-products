<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\ActiveForm;
use yii\web\View;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">
<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$this->title?></title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">    <meta name="description" content="">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title><?= Html::encode($this->title) ?></title>

    <?= Html::csrfMetaTags() ?>

    <?php $this->head() ?>

</head>

<body>

    <?php $this->beginBody() ?>

    <?= \frontend\widgets\Header::widget();?>

            <!-- Main -->
            <?=$content?>

    <?= \frontend\widgets\Footer::widget();?>

    <div class="modal fade" id="cart"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content" style="width: 1260px;left: -200px;padding: 30px">
                <div class="modal-header" style="border: none">
                    <h5 style="font-size: 24px;" class="modal-title" id="exampleModalLabel">Ваша Корзина</h5>

                    <button style="background: none;border: none" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span style="font-size: 40px;" id="close_btn" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    ...
                </div>
                <div class="modal-footer">
                    <a style="border-radius: 0px" href="<?=\yii\helpers\Url::to(['cart/checkout'])?>" class="btn btn-success">Оформить Заказ</a>
                    <button style="border-radius: 0px" id="clear-cart" type="button" class="btn btn-danger">Очистить Корзину</button>
                    <button style="border-radius: 0px" id="close-button" type="button" class="btn btn-secondary" data-dismiss="modal">Продолжить Покупки</button>

                </div>
            </div>
        </div>
    </div>    

    <?php $this->endBody() ?>


</body>

</html>

<?php $this->endPage() ?>
