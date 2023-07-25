<?php
$this->title = 'Оформить заказ';
?>
<!-- Breadcrumbs Area Start -->
<div class="breadcrumbs-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="location">
                    <ul>
                        <li><a href="<?=\yii\helpers\Url::home()?>" title="go to homepage">Главная<span>/</span></a>  </li>
                        <li><strong> Оформить заказ</strong></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Area End -->
<!--Checkout Area Start-->
<?php if (!empty($session['cart'])): ?>
<section class="cart-area ptb-54">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="#">
                    <div class="wishlist-table table-responsive">
                        <style>
                            table td{
                                vertical-align: middle;
                            }
                            .fa-minus , .fa-plus{
                                border: 1px solid #ccc;
                                display: inline-block;
                                padding:4px 5px;
                                border-radius: 50%;
                            }
                        </style>
                        <table class="table-bordered table">
                            <thead>
                            <tr>
                                <th></th>
                                <th class="product-name-thumb">
                                    <span>Товар</span>
                                </th>
                                <th class="product-prices">
                                    <span>Цена </span>
                                </th>
                                <th class="product-stock-stauts">
                                    <span>Кол-во</span>
                                </th>
                                <th class="product-subtotal">
                                    <span>Итого</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($session['cart'] as $id => $item): ?>
                                <tr>
                                    <td>
                                        <div class="cart-product-thumbnil">
                                            <a href="<?=\yii\helpers\Url::to(['product/view','id'=> $id])?>">
                                                <img style="width: 100px;height: 80px;object-fit: cover;" src="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$id?>/m_<?=$item['image']?>" alt="Image">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="product-name-thumb">
                                        <div class="cart-product-thumb-info">
                                            <div class="cart-product-title">
                                                <p><a href="<?=\yii\helpers\Url::to(['product/view','id'=> $id])?>"><?=\common\components\StaticFunctions::getPartOfText($item['name'] , 50)?></a></p>

                                            </div>
                                        </div>
                                    </td>
                                    <td class="product-prices">
                                        <span>$<?=$item['price']?></span>
                                    </td>
                                    <td class="product-quantity">
                                       <?=$item['qty']?>
                                    </td>
                                    <td class="product-prices">
                                        <span>$<?=$item['price'] * $item['qty']?></span>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <th colspan="4">Общая сумма</th>
                                <th>$<?=$session['cart.sum']?></th>
                            </tr>
                            <tr>
                                <th colspan="4">Общее количество</th>
                                <th><?=$session['cart.qty']?></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<!--End of Checkout Area-->
<section class="cart-area ptb-54">
    <div class="container">
        <h3 class="text-center">Оформить заказ</h3>

            <?php if (!empty($user)): ?>
                <?php $form = \yii\bootstrap4\ActiveForm::begin() ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input_group">
                            <?=$form->field($order , 'first_name')->textInput([
                                'required' => 'true',
                                'value' => !empty($user->first_name) ? $user->first_name : '',
                            ])?>
                        </div>

                        <div class="input_group">
                            <?=$form->field($order , 'last_name')->textInput([
                                'required' => 'true',
                                'value' => !empty($user->last_name) ? $user->last_name : '',
                            ])?>
                        </div>

                        <div class="input_group">
                            <?=$form->field($order , 'email')->textInput([
                                'required' => 'true',
                                'type' => 'email',
                                'value' => !empty($user->email) ? $user->email : '',
                            ])?>
                        </div>

                        <div class="input_group">
                            <?=$form->field($order , 'phone')->textInput([
                                'required' => 'true',
                                'value' => !empty($user->phone) ? $user->phone : '',
                            ])?>
                        </div>

                        <div class="input_group">
                            <?=$form->field($order , 'city')->textInput([
                                'required' => 'true',
                                'value' => !empty($user->city) ? $user->city : '',
                            ])?>
                        </div>

                        <div class="input_group mb-4">
                            <?=$form->field($order , 'street')->textInput([
                                'required' => 'true',
                                'value' => !empty($user->street) ? $user->street : '',
                            ])?>
                        </div>

                        <?=\yii\helpers\Html::submitButton('Оформить заказ' , ['class' => 'check-button mb-5'])?>
                    </div>

                </div>
                <?php \yii\bootstrap4\ActiveForm::end() ?>

            <?php else: ?>
                <h3>Вам нужно войти в свой профиль, чтобы заказать товары | <a style="color: #0e62a0;text-decoration: underline;" href="<?=\yii\helpers\Url::to(['front-user/login'])?>">Войти</a></h3>
            <?php endif; ?>




    </div>
</section>
<?php else: ?>
    <div class="order-area ptb-54">


        <div class="container">
            <div class="order-content pb-54 text-center">
                <img src="/default/check-mark.png" alt="Image">
                <h3 style="font-size: 30px;margin: 25px 0;font-weight: bold">Спасибо за покупку!</h3>

                <p style="font-size: 18px;">Ваш заказ принят, наши операторы свяжутся с вами в ближайшее время</p>

                <a class="btn btn-success" style="margin: 30px 0px;border-radius: 0px;display:inline-block" href="<?=\yii\helpers\Url::home()?>" class="button">
                    Продолжить покупки
                </a>
            </div>

        </div>
    </div>
<?php endif; ?>

