<?php
$this->title = $result;
?>
<!-- product items banner start -->
<div class="product-banner">
    <img src="/img/product/banner.jpg" alt="">
</div>
<!-- product items banner end -->
<!-- product main items area start -->
<div class="product-main-items">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="location">
                    <ul>
                        <li><a href="<?=\yii\helpers\Url::home()?>" title="go to homepage">Главная<span>/</span></a>  </li>
                        <li> <strong>Поиск по - '<?=$result?>'</strong></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <?=\frontend\widgets\NewsSidebar::widget()?>
            <div class="col-lg-9">
                <div class="row">
                    <div class="product-content">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active fade show home2" id="gird">
                                <div class="row">
                                    <?php if (!empty($models)): ?>
                                        <?php foreach ($models as $model): ?>
                                            <?php
                                            $image = \common\components\StaticFunctions::getImage($model , 'product' , 'image');
                                            ?>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="single-product">
                                                    <div class="level-pro-new">
                                                        <span><?=($model->new == 1) ? 'new' : 'sale'?></span>
                                                    </div>
                                                    <div class="product-img">
                                                        <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $model->id])?>">
                                                            <img style="width: 256px;height: 256px;object-fit: cover;" src="<?=$image?>" alt="" class="primary-img">
                                                            <img style="width: 256px;height: 256px;object-fit: cover;" src="<?=$image?>" alt="" class="secondary-img">
                                                        </a>
                                                    </div>
                                                    <div class="actions" style="bottom: 100px">
                                                        <a  id="<?=$model->id?>" data-id="<?=$model->id?>" href="<?=\yii\helpers\Url::to(['cart/add' , 'id' => $model->id])?>" type="submit" class="cart-btn add-to-cart" title="Add to cart">В корзину</a>
                                                        <ul class="add-to-link">
                                                            <li><a href="<?=\yii\helpers\Url::to(['cart/add-like','id'=>$model->id])?>" data-id="<?=$model->id?>" class="wish-btn add-to-like add-to-wishlist"> <i class="fa fa-heart-o"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-price">
                                                        <div class="product-name">
                                                            <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $model->id])?>" title="<?=$model->name?>"><?=\common\components\StaticFunctions::getPartOfText($model->name , 70)?></a>
                                                        </div>
                                                        <div class="price-rating">
                                                            <?php if ($model->sale == 1): ?>
                                                                <span>$<?=$model->new_price?></span>
                                                                <del style="margin-left: 10px;font-size: 14px">$<?=$model->price?></del>
                                                            <?php else: ?>
                                                                <span>$<?=$model->price?></span>
                                                            <?php endif; ?>
                                                            <div class="ratings">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-o"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <div class="not-found text-center">
                                            <img style="width: 550px;" src="/default/nothing-found.jpg" alt="nothing found">
                                            <div style="font-size: 20px;">К сожалению ничего не найдено</div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade home2" id="list">
                                <div class="product-catagory">
                                    <div class="single-list-product row">
                                        <div class="col-md-4">
                                            <div class="list-product-img">
                                                <a href="single-product.html">
                                                    <img src="/img/product/1.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="list-product-info">
                                                <a href="single-product.html" class="list-product-name"> Cras neque metus</a>
                                                <div class="price-rating">
                                                    <span class="old-price">$700.00</span>
                                                    <span>$800.00</span>
                                                    <div class="ratings">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <a href="#" class="review">1 Review(s)</a>
                                                        <a href="#" class="add-review">Add Your Review</a>
                                                    </div>
                                                </div>
                                                <div class="list-product-details">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nul
                                                        <a href="single-product.html">Learn More</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-list-product row">
                                        <div class="col-md-4">
                                            <div class="list-product-img">
                                                <a href="single-product.html">
                                                    <img src="/img/product/6.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="list-product-info">
                                                <a href="single-product.html" class="list-product-name"> Cras neque metus</a>
                                                <div class="price-rating">
                                                    <span class="old-price">$700.00</span>
                                                    <span>$800.00</span>
                                                    <div class="ratings">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <a href="#" class="review">1 Review(s)</a>
                                                        <a href="#" class="add-review">Add Your Review</a>
                                                    </div>
                                                </div>
                                                <div class="list-product-details">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nul
                                                        <a href="single-product.html">Learn More</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-list-product row">
                                        <div class="col-md-4">
                                            <div class="list-product-img">
                                                <a href="single-product.html">
                                                    <img src="/img/product/3.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="list-product-info">
                                                <a href="single-product.html" class="list-product-name"> Cras neque metus</a>
                                                <div class="price-rating">
                                                    <span class="old-price">$700.00</span>
                                                    <span>$800.00</span>
                                                    <div class="ratings">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <a href="#" class="review">1 Review(s)</a>
                                                        <a href="#" class="add-review">Add Your Review</a>
                                                    </div>
                                                </div>
                                                <div class="list-product-details">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nul
                                                        <a href="single-product.html">Learn More</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-list-product row">
                                        <div class="col-md-4">
                                            <div class="list-product-img">
                                                <a href="single-product.html">
                                                    <img src="/img/product/4.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="list-product-info">
                                                <a href="single-product.html" class="list-product-name"> Cras neque metus</a>
                                                <div class="price-rating">
                                                    <span class="old-price">$700.00</span>
                                                    <span>$800.00</span>
                                                    <div class="ratings">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <a href="#" class="review">1 Review(s)</a>
                                                        <a href="#" class="add-review">Add Your Review</a>
                                                    </div>
                                                </div>
                                                <div class="list-product-details">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nul
                                                        <a href="single-product.html">Learn More</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-list-product row">
                                        <div class="col-md-4">
                                            <div class="list-product-img">
                                                <a href="single-product.html">
                                                    <img src="/img/product/5.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="list-product-info">
                                                <a href="single-product.html" class="list-product-name"> Cras neque metus</a>
                                                <div class="price-rating">
                                                    <span class="old-price">$700.00</span>
                                                    <span>$800.00</span>
                                                    <div class="ratings">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                        <a href="#" class="review">1 Review(s)</a>
                                                        <a href="#" class="add-review">Add Your Review</a>
                                                    </div>
                                                </div>
                                                <div class="list-product-details">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nul
                                                        <a href="single-product.html">Learn More</a> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="toolbar-bottom" style="display: flex;align-items: center;justify-content: center">
                            <ul>
                                <?=\yii\widgets\LinkPager::widget([
                                    'pagination'=>$pagination,
                                ])?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product main items area end -->