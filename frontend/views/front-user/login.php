<?php
$this->title = "Войти";
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
$js = <<< JS

setTimeout(function() { 
        $('#alert-success-register').css('display', 'none');
    }, 2000);
  
JS;
$css = <<< CSS

input[type="checkbox"]{
width: auto !important;
margin: 0;
margin-right: 10px;
}
.col-form-label{
padding: 0;
color: #000;
}
.custom-control {
display: flex;
align-items: center;
}

.custom-control-label{
margin-bottom: 0;
}
CSS;

$this->registerJs($js);
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

<div class="login-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 text-center">
                <div class="login">
                    <div class="login-form-container">
                        <div class="login-text">
                            <h2>Войти</h2>
                            <span>Пожалуйста, войдите, используя данные учетной записи ниже.</span>
                        </div>
                        <div class="login-form">
                               <?php $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'layout' => 'horizontal',
                                'fieldConfig' => [
                                    'template' => "{label}\n{input}\n{error}",
                                    'labelOptions' => ['class' => 'col-lg-12 col-form-label mr-lg-12 w-100'],
                                    'errorOptions' => ['class' => 'col-lg-12 invalid-feedback'],
                                ],
                            ]); ?>
                            <?= $form->field($model, 'username')->textInput() ?>
                            <?= $form->field($model, 'password')->passwordInput() ?>


                            <span></span>
                                <div class="button-box">
                                    <?= $form->field($model, 'rememberMe')->checkbox([
                                        'template' => "<div class=\"col-lg-12 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                    ]) ?>
                                    <button type="submit" class="default-btn">Login</button>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
