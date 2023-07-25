<?php if ($models): ?>
<!-- sell off product area start -->
<div class="sell-off-product home2">
    <div class="product-title">
        <h2>Бестселлер</h2>
    </div>
    <div class="container-fluid">
        <div class="sell-off-slider">
            <?php foreach ($models as $model): ?>
            <?php
                $image = \common\components\StaticFunctions::getImage($model , 'product' , 'image');
            ?>
            <div class="single-product">
                <div class="level-pro-sale">
                    <span><?=($model->new == 1 ? 'new' : 'sale')?></span>
                </div>
                <div class="product-img" style="border: 1px solid #ccc">
                    <a href="<?=\yii\helpers\Url::to(['product/view' , 'id'=>$model->id])?>">
                        <img style="width: 343px;height: 343px;object-fit: cover;" src="<?=$image?>" alt="" class="primary-img">
                        <img style="width: 343px;height: 343px;object-fit: cover;" src="<?=$image?>" alt="" class="secondary-img">
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
                        <a href="<?=\yii\helpers\Url::to(['product/view' , 'id'=>$model->id])?>" title="<?=$model->name?>"><?=\common\components\StaticFunctions::getPartOfText($model->name , 44)?></a>
                    </div>
                    <div class="price-rating">
                        <div class="ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>
                        <?php if ($model->sale == 1): ?>
                        <span>$<?=$model->new_price?></span>
                        <?php else: ?>
                            <span>$<?=$model->price?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- sell off product area end -->
<?php endif; ?>