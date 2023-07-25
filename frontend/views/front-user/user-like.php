<?php
$this->title = "Избранное";
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
                    <h1>Избранное</h1>
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
                            <li>Избранное</li>
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
                        <?php if (!empty($session['like'])): ?>
                                <form action="#">
                                    <div class="wishlist-table table-responsive">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th class="product-thumbnail">Изображение</th>
                                                <th class="product-name">
                                                    <span>Товар</span>
                                                </th>
                                                <th class="product-prices">
                                                    <span>Цена</span>
                                                </th>
                                                <th class="product-stock-stauts">
                                                    <span>Статус</span>
                                                </th>
                                                <th class="product-add-to-cart"></th>
                                                <th class="product-remove"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($session['like'] as $id => $item): ?>
                                                <?php
                                                $product = \common\models\Product::findOne($id);
                                                $image = \common\components\StaticFunctions::getImage($product , 'product' , 'image');
                                                ?>
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $product->id])?>">
                                                            <img src="<?=$image?>" style="width:80px;height:60px;object-fit:cover;" alt="" />
                                                        </a>
                                                    </td>
                                                    <td class="product-name">
                                                        <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $product->id])?>" title="Cashmere Saint Laurent - s4"><?=\common\components\StaticFunctions::getPartOfText($product->name , 60)?></a>
                                                    </td>
                                                    <td class="product-prices">
                                                        <?php if ($product->sale == 1): ?>
                                                            <span>$<?=$product->new_price?></span>
                                                        <?php else: ?>
                                                            <span>$<?=$product->price?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="product-stock-status">
                                                        <span><?=($product->stock == 1) ? 'Есть в наличии' : 'СКОРО В ПРОДАЖЕ'?></span>
                                                    </td>
                                                    <td class="product-add-to-cart">
                                                        <a href="<?=\yii\helpers\Url::to(['cart/add' , 'id' => $product->id])?>" id="<?=$product->id?>" data-id="<?=$product->id?>" class="add-to-cart button" title="В Корзину">В Корзину</a>
                                                    </td>
                                                    <td class="product-remove">
                                                        <a href="<?=\yii\helpers\Url::to(['front-user/delete-like' , 'id' => $id])?>" title="Remove this product">x</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                        <?php else: ?>
                            <div class="col-lg-12">
                                <div class="alert alert-warning text-center">
                                    <h2>У вас нет товаров в Избранном </h2>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account Area End -->