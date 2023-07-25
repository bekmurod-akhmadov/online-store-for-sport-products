<?php
$this->title = "История заказов";
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
                    <h1>История заказов</h1>
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
                            <li>История заказов</li>
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
                        <?php if (!empty($orders)): ?>
                        <form action="#">
                            <div class="wishlist-table table-responsive">
                                <table>
                                    <thead>
                                    <tr>
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
                                            <td class="product-name-thumb">
                                                <div class="cart-product-thumb-info">
                                                    <div class="cart-product-thumbnil">
                                                        <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $product->id])?>">
                                                            <img style="width: 80px;height: 60px;object-fit: cover;" src="<?=$image?>" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="cart-product-title">
                                                        <h3><a style="font-size: 17px" href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $product->id])?>"><?=\common\components\StaticFunctions::getPartOfText($product->name , 50)?></a></h3>
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
                                <img  style="width: 300px;" src="/default/nothing-found.jpg" alt="">
                                <h3>У вас нет заказов</h3>
                                <a style="display: inline-block" class="button" href="<?=\yii\helpers\Url::to(['product/index'])?>">Перейти к товарам</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account Area End -->