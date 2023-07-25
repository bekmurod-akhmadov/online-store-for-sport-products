<?php
$this->title = 'Избранное';
?>
<div class="wishlist-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="location">
                    <ul>
                        <li><a href="<?=\yii\helpers\Url::home()?>" title="go to homepage">Главная<span>/</span></a>  </li>
                        <li><strong> Избранное </strong></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
           <?=\frontend\widgets\NewsSidebar::widget()?>
            <div class="col-lg-9">
                <div class="wishlist-banner">
                    <a href="#">
                        <img src="/img/checkout/checkout_banner.jpg" alt="">
                    </a>
                </div>
                <div class="wishlist-heading">
                    <h2>Избранное</h2>
                </div>
                <?php if (!empty($session['like'])): ?>

                <div class="wishlist-content">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Изображение</th>
                                <th >наименование</th>
                                <th>В наличии</th>
                                <th>Цена</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($session['like'] as $id => $item): ?>
                            <?php
                                $product = \common\models\Product::findOne(['id' => $id])
                                ?>

                                <tr>
                                    <td>
                                        <a href="" class="text-center">
                                            <img style="width: 100px;height: 80px;object-fit: cover;" src="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$id?>/m_<?=$item['image']?>" alt="Image">
                                        </a>
                                    </td>
                                    <td><a href="<?=\yii\helpers\Url::to(['product/view' , 'id'=>$product->id])?>"><?=$product->name?></a></td>

                                    <td><?=(!empty($product->stock) ? 'Есть в наличии' : ' - ')?></td>
                                    <td class="unit-price"><?=$product->sale == 1 ? $product->new_price : $product->price?> $</td>
                                    <td>
                                        <div class="wishlist-actions">
                                            <a style="display: flex;justify-content: center;align-items: center" href="<?=\yii\helpers\Url::to(['cart/add' , 'id' => $product->id])?>" id="<?=$product->id?>" data-id="<?=$product->id?>" class="add-to-cart" title="Add to Cart"> <i class="fa fa-shopping-cart"></i> </a>
                                            <a style="display: flex;justify-content: center;align-items: center" href="<?=\yii\helpers\Url::to(['cart/delete-like' , 'id' => $product->id])?>" title="Remove"> <i class="fa fa-times"></i> </a>
                                        </div>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

                </div>
                <?php else: ?>
                    <div class="empty-image text-center alert alert-danger">
                        <div class="order-history">
                            <h4>Избранное пусто</h4>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- wishlist area end -->