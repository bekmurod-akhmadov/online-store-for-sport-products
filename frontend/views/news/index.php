<?php
$this->title = 'Блог';
?>
<!-- blog area start -->
<div class="blog-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="location">
                    <ul>
                        <li><a href="<?=\yii\helpers\Url::home()?>" title="go to homepage">Главная<span>/</span></a>  </li>
                        <li><strong>Блог</strong></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <?=\frontend\widgets\NewsSidebar::widget()?>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sidebar-title">
                            <h2>Наш Блог</h2>
                        </div>
                        <?php if (!empty($models)): ?>
                        <div class="blog-area">
                            <?php foreach ($models as $model): ?>
                            <?php
                                $image = \common\components\StaticFunctions::getImage($model , 'news' , 'image');
                                ?>
                            <div class="single-blog-post-page">
                                <div class="blog-img">
                                    <a href="<?=\yii\helpers\Url::to(['news/view' , 'id' => $model->id])?>">
                                        <img style="width: 339px;height: 163px" src="<?=$image?>" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <a href="<?=\yii\helpers\Url::to(['news/view' , 'id' => $model->id])?>" class="blog-title"><?=\common\components\StaticFunctions::getPartOfText($model->title , 50)?></a>
                                    <span><a>Admin - </a><?=date('d.m.Y H:i' , strtotime($model->create_date))?></span>
                                    <p><?=\common\components\StaticFunctions::getPartOfText($model->body , 200)?></p>
                                    <a href="<?=\yii\helpers\Url::to(['news/view' , 'id' => $model->id])?>" class="readmore">read more ></a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif ?>
                    </div>
                    <div class="col-md-12">
                        <div class="toolbar-bottom">
                            <ul>
                                <?=\yii\widgets\LinkPager::widget([
                                    'pagination'=>$pagination,
                                ])?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog area end -->