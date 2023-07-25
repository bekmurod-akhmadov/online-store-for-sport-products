<div class="col-lg-3">
    <div class="product-sidebar">
        <div class="sidebar-title">
            <h2>Варианты покупок</h2>
        </div>
        <div class="single-sidebar">
            <div class="single-sidebar-title">
                <h3>Категории</h3>
            </div>
            <div class="single-sidebar-content">
                <ul>
                    <?php if(!empty($categories)): ?>
                        <?php foreach ($categories as $item): ?>
                            <?php
                            $count = \common\models\Product::find()->where(['status' => 1 , 'product_id' => $item->id])->count();
                            ?>
                            <li><a href="<?=\yii\helpers\Url::to(['product/category' , 'id'=>$item->id])?>"><?=$item->name?> (<?=$count?>)</a></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="single-sidebar">
            <div class="single-sidebar-title">
                <h3>Бренды</h3>
            </div>
            <div class="single-sidebar-content">
                <ul>
                    <?php if(!empty($brands)): ?>
                        <?php foreach ($brands as $item): ?>
                            <?php
                            $count = \common\models\Product::find()->where(['status' => 1 , 'brand_id' => $item->id])->count();
                            ?>
                            <li><a href="<?=\yii\helpers\Url::to(['product/brand' , 'id' => $item->id])?>"><?=$item->name?> (<?=$count?>)</a></li>                                    <?php endforeach; ?>
                    <?php endif; ?>
                </ul>

                </ul>
            </div>
        </div>
        <div class="single-sidebar">
            <div class="single-sidebar-title">
                <h3>Цвет товаров</h3>
            </div>
            <div class="single-sidebar-content">
                <ul>

                    <?php if (!empty($colors)): ?>
                        <?php foreach ($colors as $colorsItem): ?>
                            <style>
                                .color_1{
                                    width: 50px;
                                    height: 50px;
                                    border-radius: 5px;
                                    margin-right: 10px;
                                    border: 1px solid #ccc;
                                }
                            </style>
                            <a href="<?=\yii\helpers\Url::to(['product/color' , 'id' => $colorsItem->id])?>" class="color_1" style="background-color: <?=$colorsItem->name?>"></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="single-sidebar price">
            <div class="single-sidebar-title">
                <h3>Сортировать по цене</h3>
            </div>
            <div class="single-sidebar-content">
                <div class="price_filter">
                    <form action="<?=\yii\helpers\Url::to(['product/select'])?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="min">От</label>
                                <input value="<?=(!empty($min) ? $min : '')?>" type="number" required name="min" id="min" class="form-control">
                            </div>
                            <div class="col-lg-6">
                                <label for="max">До</label>
                                <input  value="<?=(!empty($max) ? $max : '')?>" type="number" required name="max" id="max" class="form-control">
                            </div>
                            <div class="col-lg-12 mt-3">
                                <button style="padding: 5px 33px;width: 100%;" class="btn btn-secondary">Поиск</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="banner-left">
            <a href="#">
                <img style="border-radius: 10px" src="/images/default/advertise.png" alt="advertise image">
            </a>
        </div>
    </div>
</div>