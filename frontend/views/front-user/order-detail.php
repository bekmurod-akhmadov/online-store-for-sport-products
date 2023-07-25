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

                <li class="active">Информация о заказах</li>
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
                <div class="row">
                    <h3 class="order-details-title">Информация о заказе</h3>
                    <?php if (!empty($mainOrders)): ?>
                        <?php foreach ($mainOrders as $mainOrder): ?>

                            <div class="col-lg-7 col-md-6">
                                <div class="order-details-area">
                                    <div class="cart-totals">
                                        <h3>Номер заказа: #<?=$mainOrder->id?></h3>
                                        <p>Заказ создан в: <?=date('d.m.Y' , strtotime($mainOrder->created_date))?></p>

                                        <ul>
                                            <li>Итого <span>$<?=$mainOrder->sum?></span></li>
                                            <li>Общее количество <span>$<?=$mainOrder->qty?></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-6">
                                <div class="address-details-area">
                                    <div class="cart-totals">
                                        <h3>Ваш Адрес</h3>
                                        <ul>

                                            <li>
                                                <span>Адрес:</span>
                                                <?=$mainOrder->city . " "  . $mainOrder->street?>
                                            </li>
                                            <li>
                                                <span>Телефон:</span>
                                                <a href="tel:<?=$mainOrder->phone?>"><?=$mainOrder->phone?></a>
                                            </li>
                                            <li>
                                                <span>Электронная почта:</span>
                                                <a href="mailto:<?=$mainOrder->email?>"> <span><?=$mainOrder->email?></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Dashboard Area -->