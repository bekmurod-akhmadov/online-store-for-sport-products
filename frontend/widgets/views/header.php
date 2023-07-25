<?php

use common\models\Menu;

function renderMenu($id){

    $out = '';
    $menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $_query = Menu::find()->where('status=1')->andWhere(['parent' => $id, 'type' => 0]);

    if( $_query->exists() )
    {
        $out .= '<li class="expand"><a href="#">';
        $out .= $menu->name . ' </a>';

        $out .= '<div class="">';
        $items = $_query->orderBy(['order_by' => SORT_ASC])->all();
        foreach ($items as $item){

            $out .= renderMenu($item->id);
        }

        $out .= '</div></li>';

    } else {

        $out .= '<li class=""><a href="' .$menu->url. '">';
        $out .= $menu->name.'</a></li>';

    }


    return $out;
}
?>

<header>
    <div class="top-link">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-3 col-md-9 d-none d-md-block">
                    <div class="site-option">
                        <ul>
                            <li class="language"><a href="">Категории товаров <i class="fa fa-angle-down"></i> </a>
                                <ul class="sub-site-option">
                                    <?php if (!empty($categories)): ?>
                                    <?php foreach ($categories as $category): ?>
                                    <li><a style="text-transform: lowercase;" href="<?=\yii\helpers\Url::to(['product/category' , 'id' => $category->id])?>"><?=$category->name?></a></li>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="call-support">
                        <p>Бесплатный звонок в службу поддержки: <span><?=\common\components\StaticFunctions::getSettings('phone-number')?></span></p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 position-relative">
                    <div class="dashboard">
                        <div class="account-menu">
                            <ul>
                                <li class="search">
                                    <a href="#">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <ul class="search">
                                        <li>
                                            <form action="<?=\yii\helpers\Url::to(['product/search'])?>">
                                                <input type="text" name="main-search">
                                                <button type="submit"> <i class="fa fa-search"></i> </button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user"></i>
                                    </a>
                                    <ul>
                                        <li><a href="<?=\yii\helpers\Url::to(['front-user/profile'])?>">Мой Профиль</a></li>
                                        <li><a href="<?=\yii\helpers\Url::to(['cart/like'])?>">Избранное</a></li>
                                        <li><a href="<?=\yii\helpers\Url::to(['front-user/registration'])?>">Регистрация</a></li>
                                        <?php $userId = Yii::$app->user->getId(); if (!empty($userId)): ?>
                                        <li><a href="<?=\yii\helpers\Url::to(['front-user/logout'])?>">Выйти</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="cart-menu">
                            <ul>
                                <li>
                                    <a class="cart" style="cursor: pointer"><img src="/img/icon-cart.png" alt=""><span><?=!empty($session['cart.qty']) ? $session['cart.qty'] : '0'?></span> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mainmenu-area home2 product-items" style="background-color: rgba(53, 53, 53, 0.9);">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="<?=\yii\helpers\Url::home()?>">
                            <img src="/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="mainmenu">
                        <nav>
                            <ul>
                                <?php

                                foreach ($models as $model){

                                    echo renderMenu($model->id);
                                }

                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mobile-menu">
                        <nav>
                            <ul>
                                <?php

                                foreach ($models as $model){

                                    echo renderMenu($model->id);
                                }

                                ?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>