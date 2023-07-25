<!-- Start Page Title Area -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <ul>
                <li>
                    <a href="<?=\yii\helpers\Url::home()?>">
                        Главная
                    </a>
                </li>
                <li>
                    <a href="<?=\yii\helpers\Url::to(['front-user/profile'])?>">
                        Мой Аккаунт
                    </a>
                </li>

                <li class="active">Изменить</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Dashboard Area -->
<section class="dashboard-area ptb-54">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <ul class="dashboard-navigation">

                    <li>
                        <a href="<?=\yii\helpers\Url::to(['front-user/settings'])?>">Редактировать</a>
                    </li>
                    <li>
                        <a href="<?=\yii\helpers\Url::to(['front-user/settings'])?>">Изменить адрес</a>
                    </li>
                    <li>
                        <a href="<?=\yii\helpers\Url::to(['front-user/order-history'])?>">История заказов</a>
                    </li>
                    <li>
                        <a href="<?=\yii\helpers\Url::to(['front-user/order-detail'])?>">Информация о заказах</a>
                    </li>

                    <li>
                        <a href="<?=\yii\helpers\Url::to(['front-user/logout'])?>">Выйти</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-8">
                <div class="edit-profile">
                    <h3>Edit Address</h3>
                    <?php $form = \yii\widgets\ActiveForm::begin([
                        'options'=>[
                            'class'=>'submit-property-form'
                        ]
                    ]) ?>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?=$form->field($model , 'first_name')->textInput([
                                    'class'=>'form-control'
                                ])?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?=$form->field($model , 'last_name')->textInput([
                                    'class'=>'form-control'
                                ])?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?=$form->field($model , 'email')->textInput([
                                    'class'=>'form-control',
                                    'type'=>'email'
                                ])?>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?=$form->field($model , 'phone')->textInput([
                                    'class'=>'form-control',
                                ])?>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?=$form->field($model , 'city')->textInput([
                                    'class'=>'form-control',
                                ])?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <?=$form->field($model , 'street')->textInput([
                                    'class'=>'form-control',
                                ])?>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <?=\yii\helpers\Html::submitButton('Save',['class'=>'default-btn'])?>
                        </div>
                    </div>

                    <?php \yii\widgets\ActiveForm::end()?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Dashboard Area -->