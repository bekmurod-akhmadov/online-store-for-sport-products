<?php

use common\models\Menu;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'id' => 'create-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

<div class="col-md-8">

    <div class="panel panel-default">

        <div class="panel-body">

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

        </div>

    </div>

</div>


<div class="col-md-4">

    <div class="panel panel-default">

        <div class="panel-body">

            <?= $form->field($model, 'type')->widget(Select2::classname(), [
                'id' => 'menu-type',
                'data' => Yii::$app->params['menu_types'],
                'options' => ['placeholder' => 'Select type ...'],
            ]); ?>

            <?= $form->field($model, 'parent')->dropDownList(\yii\helpers\ArrayHelper::map(Menu::find()->where(['status'=>1,'parent'=>null])->all() ,'id','name'),[
                    'prompt'=>'No Parent',
            ]); ?>

<!--            --><?//= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'order_by')->textInput() ?>

            <?php

            if($model->isNewRecord){

                $model->status = true;

            }

            ?>

            <?= $form->field($model, 'status',
                ['options' =>
                    ['class' => 'form-group form-group-default input-group'],
                    'template' => '<label class="inline" for="menu-status">' . "Статус" . '</label><span class="input-group-addon bg-transparent">{input}</span>',
                    'labelOptions' => ['class' => 'inline']
                ])->checkbox([
                'data-init-plugin' => 'switchery',
                'data-color' => 'primary'
            ], false);
            ?>


        </div>

    </div>

</div>

<div class="col-md-12">

    <?=  Html::submitButton($model->isNewRecord ? 'Создать' :  'Изменить', ['class' => 'btn btn-primary']) ?>

</div>

<?php ActiveForm::end(); ?>
