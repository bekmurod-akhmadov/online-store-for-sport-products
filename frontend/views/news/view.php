<?php
$this->title = $model->title;
$image = \common\components\StaticFunctions::getImage($model  ,'news' , 'image');
?>
<!-- blog details area start -->
<div class="blog-details-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="location">
                    <ul>
                        <li><a href="<?=\yii\helpers\Url::home()?>" title="go to homepage">Главная<span>/</span></a>  </li>
                        <li><a href="<?=\yii\helpers\Url::to(['news/'])?>" title="go to homepage">Блог<span>/</span></a>  </li>
                        <li><strong> <?=$model->title?></strong></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <?=\frontend\widgets\NewsSidebar::widget()?>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-12">

                        <div class="blog-area">
                            <div class="blog-post-details">
                                <div class="blog-img">
                                    <a href="#">
                                        <img style="width: 848px;height: 404px;object-fit: cover;" src="<?=$image?>" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <a class="blog-title"><?=$model->title?></a>
                                    <p><?=$model->body?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog details area end -->