<?php


use common\models\ProductChar;
use yii\helpers\Html;



$this->title = Yii::t('main', 'Добавить');

$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];

$this->params['breadcrumbs'][] = $this->title;

?>



<div class="container-fluid container-fixed-lg m-t-20">



    <div class="panel panel-transparent">



        <div class="panel-body no-padding">

            <div class="panel panel-default">



                <div class="panel-body page-header-block">



                    <h2><?= Html::encode($this->title) ?></h2>



                </div>



            </div>



        </div>



        <div class="panel-body no-padding row-default">



            <div class="row">



                <div class="tab-content">



                    <?=  $this->render('_form', [
                        'chars' => (empty($chars)) ? [new ProductChar()] : $chars,

                        'model' => $model,

                        'id' => 1,



                    ]) ?>



                </div>



            </div>

        </div>



    </div>



</div>

