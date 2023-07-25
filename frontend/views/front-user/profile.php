<?php
$this->title = "Мой Профиль";
$js = <<< JS

setTimeout(function() { 
        $('#alert-success-user').css('display', 'none');
    }, 2000);
  
JS;
$this->registerJs($js);

?>
<div class="account-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="location">
                    <ul>
                        <li><a href="<?=\yii\helpers\Url::home()?>" title="go to homepage">Главная<span>/</span></a>  </li>
                        <li><strong>Мой Профиль </strong></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <?=\frontend\widgets\NewsSidebar::widget()?>
            <div class="col-lg-9">
                <?php if (!empty(Yii::$app->session->hasFlash('success'))): ?>
                    <div class="alert alert-success " id="alert-success-user" style="font-size: 23px;"><?=Yii::$app->session->getFlash('success')?></div>
                <?php endif; ?>
                <div class="my-account-accordion">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-list-ol"></i>
                                        ИСТОРИЯ ЗАКАЗОВ
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <style>
                                                table td{
                                                    vertical-align: middle;
                                                }
                                            </style>
                                            <?php if (!empty($orders)): ?>
                                                <form action="#">
                                                    <div class="wishlist-table table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th class="product-name-thumb">
                                                                    <span>Изображение</span>
                                                                </th>
                                                                <th class="product-name-thumb">
                                                                    <span>Товар</span>
                                                                </th>
                                                                <th class="product-prices">
                                                                    <span>Цена</span>
                                                                </th>
                                                                <th class="product-stock-stauts">
                                                                    <span>Кол-во</span>
                                                                </th>
                                                                <th class="product-subtotal">
                                                                    <span>Итого</span>
                                                                </th>
                                                                <th class="product-remove"></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($orders as $order): ?>
                                                                <?php
                                                                $product = \common\models\Product::findOne(['id' => $order->product_id]);
                                                                $image = \common\components\StaticFunctions::getImage($product , 'product' , 'image');
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="cart-product-thumbnil">
                                                                            <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $product->id])?>">
                                                                                <img style="width: 80px;height: 60px;object-fit: cover;" src="<?=$image?>" alt="" />
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-name-thumb">
                                                                        <div class="cart-product-thumb-info">
                                                                            <div class="cart-product-title">
                                                                                <p><a style="font-size: 17px" href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $product->id])?>"><?=\common\components\StaticFunctions::getPartOfText($product->name , 50)?></a></p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="product-prices">
                                                                        <?php if ($product->sale == 1): ?>
                                                                            <span>$<?=$product->new_price?></span>
                                                                        <?php else: ?>
                                                                            <span>$<?=$product->price?></span>
                                                                        <?php endif; ?>

                                                                    </td>
                                                                    <td class="product-quantity">
                                                                        <?=$order->qty_item?>
                                                                    </td>
                                                                    <td class="product-prices">
                                                                        <?php if ($product->sale == 1): ?>
                                                                            <span>$<?=$product->new_price * $order->qty_item?> </span>
                                                                        <?php else: ?>
                                                                            <span>$<?=$product->price * $order->qty_item?></span>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td class="product-remove">
                                                                        <a href="<?=\yii\helpers\Url::to(['front-user/delete-order' , 'id' => $order->id])?>">x</a>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <td colspan="5">
                                                                    <div class="cart-button">
                                                                        <a href="<?=\yii\helpers\Url::to(['product/index'])?>" class="button">Перейти к товарам</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </form>
                                            <?php else: ?>
                                                <div class="empty-image text-center">
                                                    <div class="order-history">
                                                        <p>Вы не разместили ни одного заказа.</p>
                                                    </div>
                                                    <a style="display: inline-block" class="button" href="<?=\yii\helpers\Url::to(['product/index'])?>">Перейти к товарам</a>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-bs-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <i class="fa fa-user"></i>
                                        Моя личная информация
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" data-bs-parent="#accordion">
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="delivery-details">
                                            <?php $form = \yii\bootstrap4\ActiveForm::begin() ?>
                                                <div class="list-style">
                                                    <div class="account-title">
                                                        <h4>Пожалуйста, обязательно обновите свою личную информацию, если она изменилась.</h4>
                                                    </div>
                                                    <div class="form-name">
                                                        <?=$form->field($model , 'first_name')?>
                                                    </div>
                                                    <div class="form-name">
                                                        <?=$form->field($model , 'last_name')?>
                                                    </div>
                                                    <div class="form-name">
                                                        <?=$form->field($model , 'email')->textInput([
                                                            'type' => 'email',
                                                        ])?>
                                                    </div>
                                                    <div class="form-name">
                                                        <?=$form->field($model , 'phone')?>
                                                    </div>
                                                    <div class="form-name">
                                                        <?=$form->field($model , 'city')?>
                                                    </div>
                                                    <div class="form-name">
                                                        <?=$form->field($model , 'street')?>
                                                    </div>
                                                    <div class="form-name">
                                                        <?=$form->field($model , 'username')?>
                                                    </div>
                                                    <div class="form-name">
                                                        <?=$form->field($model , 'password')?>
                                                    </div>

                                                    <div class="save-button">
                                                        <?=\yii\helpers\Html::submitButton('Сохранить'  , ['class' => 'button'])?>
                                                    </div>
                                                </div>
                                            <?php \yii\bootstrap4\ActiveForm::end() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFive">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-bs-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <i class="fa fa-heart"></i>
                                        ИЗБРАННОЕ
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive" data-bs-parent="#accordion">
                                <div class="panel-body">
                                    <div class="col-sm-12">
                                        <?php if (!empty($session['like'])): ?>

                                            <div class="wishlist-content">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Изображение</th>
                                                            <th >наименование</th>
                                                            <th>В наличии</th>
                                                            <th>Цена</th>
                                                            <th>Действие</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($session['like'] as $id => $item): ?>
                                                            <?php
                                                            $product = \common\models\Product::findOne(['id' => $id])
                                                            ?>

                                                            <tr>
                                                                <td>
                                                                    <a href="" class="text-center">
                                                                        <img style="width: 80px;height: 60px;object-fit: cover;" src="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$id?>/m_<?=$item['image']?>" alt="Image">
                                                                    </a>
                                                                </td>
                                                                <td><a href="<?=\yii\helpers\Url::to(['product/view' , 'id'=>$product->id])?>"><?=$product->name?></a></td>

                                                                <td class="text-center"><?=(!empty($product->stock) ? 'Есть в наличии' : ' - ')?></td>
                                                                <td class="unit-price"><?=$product->sale == 1 ? $product->new_price : $product->price?> $</td>
                                                                <td>
                                                                    <div class="wishlist-actions">
                                                                        <a style="display: flex;justify-content: center;align-items: center" href="<?=\yii\helpers\Url::to(['cart/add' , 'id' => $product->id])?>" id="<?=$product->id?>" data-id="<?=$product->id?>" class="add-to-cart" title="Add to Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                                                        <a style="display: flex;justify-content: center;align-items: center" href="<?=\yii\helpers\Url::to(['front-user/delete-like' , 'id' => $product->id])?>" title="Remove"> <i class="fa fa-times"></i> </a>
                                                                    </div>
                                                                </td>

                                                            </tr>

                                                        <?php endforeach; ?>

                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        <?php else: ?>
                                            <div class="empty-image text-center">
                                                <div class="order-history">
                                                    <p>Избранное пусто</p>
                                                </div>
                                            </div>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-button">
                        <div class="back-btn"> <a href="<?=\yii\helpers\Url::to(['front-user/logout'])?>">Выйти из аккаунта</a> </div>
                        <div class="home"> <a href="<?=\yii\helpers\Url::home()?>">Главная</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

