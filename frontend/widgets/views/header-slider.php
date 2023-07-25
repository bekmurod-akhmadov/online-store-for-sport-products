<!-- slider area start -->
<div class="slider-area home2">
    <?php if (!empty($models)): ?>
    <div class="bend niceties preview-2">
        <div id="nivoslider" class="slides">
            <?php foreach ($models as $model): ?>
            <?php
//            echo "<pre>";
//                print_r($model);die;
                $image = \common\components\StaticFunctions::getImage($model , 'banner' , 'image');
            ?>
            <img src="<?=$image?>" alt="" title="#slider-direction-<?=$model->id?>"  />
            <?php endforeach; ?>
        </div>
        <?php foreach ($models as $model): ?>
            <!-- direction 1 -->
            <div id="slider-direction-<?=$model->id?>" class="t-cn slider-direction">
                <div class="slider-progress"></div>
                <div class="slider-content t-lfl s-tb slider-<?=$model->id?>">
                    <div class="title-container s-tb-c title-compress">
                        <img src="img/slider/slider-logo.png" alt="">
                        <h1 class="title1"></h1>
                        <h2 class="title2" ><?=$model->title?></h2>
                        <h3 class="title3" ><?=$model->subtitle?></h3>
                        <a href="<?=\yii\helpers\Url::to(['/product/'])?>"><span>Посмотреть все</span></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
<!-- slider area end -->