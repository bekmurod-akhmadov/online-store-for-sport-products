<!--============================
    Gallery Page Header
=============================-->
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Галерея</h1>
                <ul class="list-unstyled">
                    <li><a href="<?=\yii\helpers\Url::home()?>">Главная</a></li>
                    <li class="active">Галерея</li>
                </ul>
            </div>
        </div>
    </div>
</section><!-- Ends: .page-header -->

<!--============================
    Gallery Page Content
=============================-->
<section class="portfolio-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="portfolio-content">
                    <div class="row">
                        <?php if (!empty($models)): ?>
                            <?php foreach ($models as $model): ?>

                                <?php
                                if($model->guid && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'album/' . $model->album . '/l_' . $model->guid)) {

                                    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'album/' . $model->album . '/l_' .  $model->guid;

                                } else {

                                    $image = '/images/default/m_post.jpg';

                                }
                                ?>

                                <div class="col-sm-4">
                                <figure>
                                    <img src="<?=$image?>" alt="" class="img-responsive">
                                </figure>
                            </div><!-- Ends: .col-sm-3 -->
                            <?php endforeach;?>
                        <?php else: ?>
                            <div class="container">
                                <div style="font-size: 30px;" class="alert alert-warning">По категории <strong><?=$category->name?></strong> нет картинок :(</div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div><!-- Ends: .portfolio-content -->

            </div><!-- Ends: .col-md-12 -->

        </div>
    </div>
</section><!-- Ends: .portfolio-wrapper -->