<!-- feature products area start -->
<div class="features-product home2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-title">
                    <h2>Рекомендуемые Товары</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($models)): ?>

                <div class="features-home2-slider">
                    <?php foreach ($models as $model): ?>
                    <?php
                        $image = \common\components\StaticFunctions::getImage($model , 'product' , 'image');
                    ?>
                        <div class="col">
                            <div class="single-product">
                                <div class="level-pro-new">
                                    <span><?=($model->new == 1 ? 'new' : 'sale')?></span>
                                </div>
                                <div class="product-img" style="border: 1px solid #ccc;">
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
                                        <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $model->id])?>" title="<?=\common\components\StaticFunctions::getPartOfText($model->name , 50)?>"><?=\common\components\StaticFunctions::getPartOfText($model->name , 37)?></a>
                                    </div>
                                    <div class="price-rating">
                                        <?php if ($model->new == 1): ?>
                                            <span>$<?=$model->price?></span>
                                        <?php else: ?>
                                            <span>$<?=$model->new_price?></span>
                                            <del style="margin-left: 10px;font-size: 14px">$<?=$model->price?></del>
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
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>
<!-- feature products area end -->
