<?php if (!empty($models)): ?>
<!-- blog area start -->
<div class="blog-area home2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-heading">
                    <h2>Наш Блог</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($models as $model): ?>
            <?php
                $image = \common\components\StaticFunctions::getImage($model , 'news' , 'image');
            ?>
            <div class="col-md-6 mb-4">
                <div class="single-home2-blog-post">
                    <div class="blog-img">
                        <a href="<?=\yii\helpers\Url::to(['news/view' , 'id' => $model->id])?>">
                            <img style="width: 555px;height: 273px;object-fit: cover;" src="<?=$image?>" alt="">
                            <i class="fa fa-file-photo-o"></i>
                        </a>
                    </div>
                    <div class="blog-content">
                        <a href="<?=\yii\helpers\Url::to(['news/view' , 'id' => $model->id])?>" class="blog-title"><?=\common\components\StaticFunctions::getPartOfText($model->title , '80')?></a>
                        <span><a href="#">Admin - </a><?=date('d.m.Y' , strtotime($model->create_date))?></span>
                        <p><?=\common\components\StaticFunctions::getPartOfText($model->body , 250)?></p>
                        <a href="<?=\yii\helpers\Url::to(['news/view' , 'id' => $model->id])?>" class="readmore">читать далее </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- blog area end -->
<?php endif; ?>