<?php
$this->title = "Настройки";
$js = <<< JS

setTimeout(function() { 
        $('#alert-success-user').css('display', 'none');
    }, 2000);
  
JS;
$this->registerJs($js);

?>
<!-- Breadcrumbs Area Start -->
<div class="breadcrumbs-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumbs-title text-center">
                    <h1>Настройки</h1>
                    <div class="top-page">
                        <ul>
                            <li><a href="<?=\yii\helpers\Url::home()?>">Главная</a></li>
                            <li>
                                <span>&gt;</span>
                            </li>
                            <li><a href="<?=\yii\helpers\Url::to(['front-user/profile'])?>">Мой Профиль</a></li>
                            <li>
                                <span>&gt;</span>
                            </li>
                            <li>Настройки</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Area End -->
<!-- My Account Area Start -->
<div class="my-account-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="faq-title text-center">
                    <h2>Мой Профиль</h2>
                    <p>Добро пожаловать в ваш аккаунт. Здесь вы можете управлять всей вашей личной информацией и заказами.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="addresses-lists">
                <div class="col-xs-12 col-sm-3 col-lg-3">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a  href="<?=\yii\helpers\Url::to(['front-user/user-like'])?>">
                                        <i class="fa fa-heart"></i>
                                        <span>Избранное</span>
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a  href="<?=\yii\helpers\Url::to(['front-user/order-history'])?>">
                                        <i class="fa fa-list-ol"></i>
                                        <span>История заказов</span>
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a  href="<?=\yii\helpers\Url::to(['front-user/settings'])?>">
                                        <i class="fa fa-gear"></i>
                                        <span>Настройки</span>
                                    </a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a  href="<?=\yii\helpers\Url::to(['front-user/logout'])?>">
                                        <i class="fa fa-door-open"></i>
                                        <span>Выйти</span>
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9 col-lg-9">
                    <div class="myaccount-link-list">
                        <?php $form = \yii\bootstrap4\ActiveForm::begin([
                            'options'=>[
                                'class'=>'user-form'
                            ]
                        ]) ?>

                        <div class="row">
                            <div class="col-lg-6">
                                <?=$form->field($model , 'first_name')?>
                            </div>

                            <div class="col-lg-6">
                                <?=$form->field($model , 'last_name')?>
                            </div>

                            <div class="col-lg-6">
                                <?=$form->field($model , 'email')->textInput([
                                        'type' => 'email',
                                ])?>
                            </div>

                            <div class="col-lg-6">
                                <?=$form->field($model , 'phone')?>
                            </div>

                            <div class="col-lg-6">
                                <?=$form->field($model , 'city')?>
                            </div>

                            <div class="col-lg-6">
                                <?=$form->field($model , 'street')?>
                            </div>

                            <div class="col-lg-6">
                                <?=$form->field($model , 'username')?>
                            </div>

                            <div class="col-lg-6">
                                <?=$form->field($model , 'password')?>
                            </div>

                            <div class="col-lg-6">
                                <?=\yii\helpers\Html::submitButton('Сохранить'  , ['class' => 'button'])?>
                            </div>

                        </div>
                        </div>

                        <?php \yii\bootstrap4\ActiveForm::end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account Area End -->