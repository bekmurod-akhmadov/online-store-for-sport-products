<?php if(!empty($model)):?>
<?php $this->title = $model->name ?>
<!-- single product area start -->
<div class="Single-product-location home2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="location">
                    <ul>
                        <li><a href="<?=\yii\helpers\Url::home()?>" title="go to homepage">Главная<span>/</span></a>  </li>
                        <li><a href="<?=\yii\helpers\Url::to(['product/category' , 'id' => $category->id])?>" title="go to homepage"><?=$category->name?><span>/</span></a>  </li>
                        <li><strong><?=$model->name?></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- single product area end -->
<!-- single product details start   -->
<div class="single-product-details">
    <div class="container">
        <div class="row">

            <div class="col-lg-6">
                <div class="single-product-img tab-content">
                    <?php if (!empty($productImages)): ?>
                        <?php foreach ($productImages as $galleryImage): ?>
                            <div class="single-pro-main-image tab-pane" id="pro-large-img-<?=$galleryImage->id?>">
                                <a href="#"><img class="optima_zoom" src="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$galleryImage->product_id?>/m_<?=$galleryImage->image?>" data-zoom-image="img/product/7.png" alt="optima"/></a>
                            </div>
                        <?php  endforeach;?>
                    <?php endif; ?>

                </div>
                <div class="nav product-page-slider">
                    <?php if (!empty($productImages)): ?>
                        <?php foreach ($productImages as $galleryImage): ?>
                            <div class="single-product-slider">
                                <a class="" href="#pro-large-img-<?=$galleryImage->id?>" data-bs-toggle="tab">
                                    <img style="width: 100px;height: 100px;object-fit: cover;" src="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$galleryImage->product_id?>/m_<?=$galleryImage->image?>" alt="">
                                </a>
                            </div>
                        <?php  endforeach;?>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="single-product-details">
                    <a class="product-name"><?=$model->name?></a>
                    <div class="list-product-info">
                        <div class="price-rating">
                            <div class="ratings">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>
                                <a href="#" class="review"> <?=$productCommentsCount?> ОТЗЫВ(Ы)</a>

                            </div>
                        </div>
                    </div>
                    <div class="avalable">
                        <p>Доступность:<span> Есть в наличии</span></p>
                    </div>
                    <div class="item-price">
                        <span>$800.00</span>
                    </div>
                    <div class="single-product-info">
                        <p><?=\common\components\StaticFunctions::getPartOfText($model->body , 600)?></p>

                    </div>
                    <div class="cart-item">
                        <div class="price-box">
                            <?php if ($model->sale == 1): ?>
                                <span>$<?=$model->new_price?></span>
                            <?php else: ?>
                                <span>$<?=$model->price?></span>
                            <?php endif; ?>
                        </div>
                        <div class="single-cart">
                            <div class="cart-plus-minus">
                                <label>Кол: </label>
                                <input id="qty" class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                            </div>
                            <a href="<?=\yii\helpers\Url::to(['cart/add' , 'id' => $model->id])?>" class="cart-btn add-to-cart-btn add-to-cart btn-default" id="<?=$model->id?>" data-id="<?=$model->id?>">В Корзину</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- single product details end -->
<!-- single product tab start -->
<div class="single-product-tab-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="single-product-tab">
                    <ul class="nav single-product-tab-navigation" role="tablist">
                        <li role="presentation">
                            <a class="active" href="#tab1" aria-controls="tab1" role="tab" data-bs-toggle="tab">Описание</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab2" aria-controls="tab2" role="tab" data-bs-toggle="tab">Отзывы</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab3" aria-controls="tab3" role="tab" data-bs-toggle="tab">ХАРАКТЕРИСТИКИ </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content single-product-page">
                        <div role="tabpanel" class="tab-pane fade show active" id="tab1">
                            <div class="single-p-tab-content">
                                <p><?=$model->body?></p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab2">
                            <div class="single-p-tab-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2>Отзывы</h2>
                                        <?php if (!empty($productComments)): ?>
                                        <div class="comments mb-5">
                                            <?php foreach ($productComments as $productComment): ?>
                                                <div class="comment_item">
                                                    <div class="user_item" style="font-weight: 500;font-size: 15px;color: black"><?=$productComment->name?> | <span><?=date('d.m.Y | H:i |')?></span></div>
                                                    <p class="user_comment"><?=$productComment->message?></p>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php else: ?>
                                            <h5 class=" alert alert-warning">У этого товара пока нет отзывы</h5>
                                        <?php endif; ?>
                                        <?php $form = \yii\bootstrap4\ActiveForm::begin() ?>
                                            <ul class="form-list">
                                                <li>
                                                    <label> Имя <em>*</em> </label>
                                                    <?=$form->field($comment , 'name')->textInput()->label(false)?>
                                                </li>
                                                <li>
                                                    <label>Email <em>*</em> </label>
                                                    <?=$form->field($comment , 'email')->textInput([
                                                        'type' => 'email'
                                                    ])->label(false)?>
                                                </li>
                                                <li>
                                                    <label> Отзыв <em>*</em> </label>
                                                    <?=$form->field($comment , 'message')->textarea([

                                                    ])->label(false)?>
                                                </li>
                                            </ul>
                                            <?=\yii\helpers\Html::submitButton('Оставить отзыв' ,['class' =>'message_send'])?>
                                        <?php \yii\bootstrap4\ActiveForm::end() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab3">
                            <div class="single-p-tab-content">
                                <div class="add-tab-title">
                                    <p style="color: black;">ХАРАКТЕРИСТИКИ</p>
                                </div>
                                <div class="add-tag">
                                    <div class="chars">
                                        <?php if (!empty($chars)): ?>

                                        <div class="chars_item d-flex align-items-center">

                                            <?php foreach ($chars as $char): ?>

                                                <p><?=$char->name?></p>
                                                <span>.............................................................</span>
                                                <p><?=$char->value?></p>

                                            <?php endforeach;?>

                                        </div>

                                        <?php endif; ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- single product tab end -->
<!-- upsell product area start-->
<div class="upsell-product home2">
    <div class="container">
        <?php if (!empty($saleProducts)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="product-title">
                    <h2>Товары в скидке</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="upsell-slider">

                <?php foreach ($saleProducts as $saleProduct): ?>
                    <?php
                        $saleImage = \common\components\StaticFunctions::getImage($saleProduct , 'product' , 'image');
                        $saleCommentCount = \common\models\ProductComment::find()->where(['product_id' => $saleProduct->id])->count();
                    ?>
                <div class="col-md-12">
                    <div class="single-product">
                        <div class="product-img">
                            <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $saleProduct->id])?>">
                                <img style="width: 256px;height: 256px;object-fit: cover;" src="<?=$saleImage?>" alt="" class="primary-img">
                                <img style="width: 256px;height: 256px;object-fit: cover;" src="<?=$saleImage?>" alt="" class="secondary-img">
                            </a>
                        </div>
                        <div class="list-product-info">
                            <div class="price-rating">
                                <div class="ratings">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <a class="review"><?=$saleCommentCount?> Отзыв(ы)</a>
                                    <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $saleProduct->id])?>" class="add-review">Добавить отзыв</a>
                                </div>
                            </div>
                        </div>
                        <div class="product-price">
                            <div class="product-name">
                                <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $saleProduct->id])?>" title="<?=\common\components\StaticFunctions::getPartOfText($saleProduct->name , 70)?>"><?=\common\components\StaticFunctions::getPartOfText($saleProduct->name , 70)?></a>
                            </div>
                            <div class="price-rating">
                                <span>$ <?=$saleProduct->new_price?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- upsell product area end-->
<!-- related product area start-->
<div class="related-product home2">
    <div class="container">
        <?php if (!empty($recomentProducts)): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="product-title">
                    <h2>Рекомендуемые Товары</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="upsell-slider">

                    <?php foreach ($recomentProducts as $saleProduct): ?>
                        <?php
                        $saleImage = \common\components\StaticFunctions::getImage($saleProduct , 'product' , 'image');
                        $saleCommentCount = \common\models\ProductComment::find()->where(['product_id' => $saleProduct->id])->count();
                        ?>
                        <div class="col-md-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $saleProduct->id])?>">
                                        <img style="width: 256px;height: 256px;object-fit: cover;" src="<?=$saleImage?>" alt="" class="primary-img">
                                        <img style="width: 256px;height: 256px;object-fit: cover;" src="<?=$saleImage?>" alt="" class="secondary-img">
                                    </a>
                                </div>
                                <div class="list-product-info">
                                    <div class="price-rating">
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                            <a class="review"><?=$saleCommentCount?> Отзыв(ы)</a>
                                            <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $saleProduct->id])?>" class="add-review">Добавить отзыв</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-price">
                                    <div class="product-name">
                                        <a href="<?=\yii\helpers\Url::to(['product/view' , 'id' => $saleProduct->id])?>" title="<?=\common\components\StaticFunctions::getPartOfText($saleProduct->name , 70)?>"><?=\common\components\StaticFunctions::getPartOfText($saleProduct->name , 70)?></a>
                                    </div>
                                    <div class="price-rating">
                                        <span>$ <?=$saleProduct->new_price?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- related product area end-->
<?php endif; ?>
<style>
    .message_send{
        background-color: transparent;
        border: 1px solid #f2f2f2;
        color: #a6a6a6;
        float: right;
        font-weight: 500;
        margin-right: 5px;
        margin-top: 5px;
        padding: 4px 15px;
        text-transform: uppercase;
        transition: all 0.3s ease 0s;
        font-family: "Montserrat",sans-serif;
    }
    .message_send:hover{
        background-color: #E03550;
        color: #fff;
    }
</style>
<script>
    document.querySelector('.single-product-img :first-child').classList.add('active');
</script>
