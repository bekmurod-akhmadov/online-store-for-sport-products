<!-- sell area start -->
<div class="sell-area home2">
    <div class="sell-heading">
        <h2>Товары в скидке</h2>
        <p>Подпишитесь на Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat</p>
    </div>
    <div class="sell-slider">
        <?php if (!empty($models)): ?>
            <?php foreach ($models as $model): ?>
            <?php $image = \common\components\StaticFunctions::getImage($model , 'product' , 'image') ?>
                <div class="single-product">
                    <div class="level-pro-new">
                        <span>sale</span>
                    </div>
                    <div class="product-img" style="border: 1px solid #ccc">
                        <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $model->id])?>">
                            <img style="width: 242px;height: 242px;object-fit: cover;"  src="<?=$image?>" alt="" class="primary-img">
                            <img style="width: 242px;height: 242px;object-fit: cover;"  src="<?=$image?>" alt="" class="secondary-img">
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
                            <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $model->id])?>" title="Fusce aliquam"><?=\common\components\StaticFunctions::getPartOfText($model->name , 50)?></a>
                        </div>
                        <div class="price-rating">
                            <span>$<?=$model->new_price?></span>
                            <del style="margin-left: 10px;font-size: 14px">$<?=$model->price?></del>
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
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<!-- sell area end -->