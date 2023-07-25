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

                <li class="active">История заказов</li>
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
                <div class="cart-area recent-order">
                    <h3>Order History</h3>
                    <?php if (!empty($orders)): ?>

                        <form class="cart-controller mb-0">
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col"></th>
                                        <th scope="col">Order</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Trash</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php foreach ($orders as $order): ?>
                                        <?php
                                        $product = \common\models\Product::findOne(['id'=>$order->product_id]);
                                        $productImage = \common\components\StaticFunctions::getImage($product , 'product','image');

                                        ?>

                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="<?=\yii\helpers\Url::to(['product/view','id'=>$product->id])?>">
                                                    <img src="<?=$productImage?>" alt="Image">
                                                </a>
                                            </td>

                                            <td class="product-name">
                                                <a href="<?=\yii\helpers\Url::to(['product/view','id'=>$product->id])?>"><?=$product->name?></a>
                                            </td>

                                            <td class="product-price">
                                                <span class="unit-amount">#<?=$order->order_id?></span>
                                            </td>

                                            <td class="product-price">
                                                <span class="unit-amount"><?=$order->qty_item?></span>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="subtotal-amount">$ <?=$order->sum_item?></span>
                                            </td>

                                            <td class="trash">
                                                <a href="<?=\yii\helpers\Url::to(['front-user/delete-order','id'=>$order->id])?>" class="remove">
                                                    <i class="ri-close-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="empty-image text-center">
                            <img  style="width: 300px;" src="/default/nothing-found.jpg" alt="">
                            <h3>У вас нет заказов</h3>
                            <a style="display: inline-block" class="default-btn" href="<?=\yii\helpers\Url::to(['product/index'])?>">Перейти к товарам</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Dashboard Area -->