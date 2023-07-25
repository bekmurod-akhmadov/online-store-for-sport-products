<?php
$this->title = "Регистрация";
$css = <<< CSS
label{
padding: 0;
color: #000;
}
CSS;

$this->registerCss($css);

?>

<!-- cart item area start -->
<div class="shopping-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="location">
                    <ul>
                        <li><a href="<?=\yii\helpers\Url::home()?>" title="go to homepage">Главная<span>/</span></a>  </li>
                        <li><strong>Регистрация</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="login-area ptb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-md-3 text-center">
                <div class="login">
                    <div class="login-form-container">
                        <div class="login-text">
                            <h2>Регистрация</h2>
                            <span>Пожалуйста, зарегистрируйтесь, используя данные учетной записи ниже.</span>
                        </div>
                        <div class="login-form">
                            <?php $form = \yii\bootstrap4\ActiveForm::begin([
                                'options'=>[
                                    'class'=>'user-form'
                                ]
                            ]) ?>
                            <?=$form->field($model , 'username')->textInput()?>
                            <?=$form->field($model , 'password')->textInput([
                                'type'=>'password', 'class'=>'form-control'
                            ])?>
                            <?=$form->field($model , 'email')->textInput([
                                    'type' => 'email'
                            ])?>
                                <?=$form->field($model , 'phone')->textInput()?>
                                <div class="button-box">
                                    <?=\yii\helpers\Html::submitButton('Зарегистрироваться' , ['class' => 'default-btn w-100 mb-3'])?>
                                    <span class="forgot-login" style="margin-left: 15px;">
                                        У вас уже есть акаунт? Тогда
                                        <a style="text-decoration: underline;color: #0e62a0;" href="<?=\yii\helpers\Url::to(['front-user/login'])?>">зайдите</a> с вашем акаунтом
                                    </span>
                                </div>
                            <?php \yii\bootstrap4\ActiveForm::end() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
