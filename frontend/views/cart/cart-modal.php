<?php if (!empty($session['cart'])): ?>
    <!-- Start Cart Area -->
    <section class="cart-area ptb-54">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="#">
                        <div class="wishlist-table table-responsive">
                            <style>
                                table td{
                                    vertical-align: middle;
                                }
                                .fa-minus , .fa-plus{
                                    border: 1px solid #ccc;
                                    display: inline-block;
                                    padding:4px 5px;
                                    border-radius: 50%;
                                }
                            </style>
                            <table class="table-bordered table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th class="product-name-thumb">
                                        <span>Товар</span>
                                    </th>
                                    <th class="product-prices">
                                        <span>Цена </span>
                                    </th>
                                    <th class="product-stock-stauts">
                                        <span>Кол-во</span>
                                    </th>
                                    <th class="product-subtotal">
                                        <span>Итого</span>
                                    </th>
                                    <th class="product-remove">Удалить</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($session['cart'] as $id => $item): ?>
                                    <tr>
                                        <td>
                                            <div class="cart-product-thumbnil">
                                                <a href="<?=\yii\helpers\Url::to(['product/view','id'=> $id])?>">
                                                    <img style="width: 100px;height: 80px;object-fit: cover;" src="<?=Yii::$app->params['frontend'] . Yii::$app->params['uploads_url']  ?>/product/<?=$id?>/m_<?=$item['image']?>" alt="Image">
                                                </a>
                                            </div>
                                        </td>
                                        <td class="product-name-thumb">
                                            <div class="cart-product-thumb-info">
                                                <div class="cart-product-title">
                                                    <p><a href="<?=\yii\helpers\Url::to(['product/view','id'=> $id])?>"><?=\common\components\StaticFunctions::getPartOfText($item['name'] , 50)?></a></p>

                                                </div>
                                            </div>
                                        </td>
                                    <td class="product-prices">
                                        <span>$<?=$item['price']?></span>
                                    </td>
                                    <td class="product-quantity" style="display: flex;justify-content: center">
                                        <div class="qty_group" style="border: 1px solid #ccc;margin-top: 23px;border-radius: 10px;padding: 6px 12px">
                                            <span style="cursor: pointer" class="minus-btn" data-id="<?=$id?>">
                                                <i class="fa fa-minus"></i>
                                            </span>
                                            <input style="width: 50px;border: none;text-align: center;outline: none;background-color:transparent;" class="cart_input" value="<?=$item['qty']?>" type="text"/>
                                            <span style="cursor: pointer" class="plus-btn" data-id="<?=$id?>">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="product-prices">
                                        <span>$<?=$item['price'] * $item['qty']?></span>
                                    </td>
                                    <td class="product-remove">
                                        <a data-id="<?=$id?>" style="cursor: pointer;color: red;" class="remove-item fa fa-times">
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <th colspan="5">Общая сумма</th>
                                    <th>$<?=$session['cart.sum']?></th>
                                </tr>
                                <tr>
                                    <th colspan="5">Общее количество</th>
                                    <th><?=$session['cart.qty']?></th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- End Cart Area -->
<?php else: ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>
