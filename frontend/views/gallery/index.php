<!-- Featured Title -->
<div id="featured-title" class="clearfix featured-title-left">
    <div id="featured-title-inner" class="container clearfix">
        <div class="featured-title-inner-wrap">
            <div class="featured-title-heading-wrap">
                <h1 class="featured-title-heading">Галерея</h1>
            </div>
            <div id="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="breadcrumb-trail">
                        <a href="<?=\yii\helpers\Url::home()?>" title="Construction" rel="home" class="trail-begin">Главная</a>
                        <span class="sep">/</span>
                        <span class="trail-end">Галерея</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content -->
<div id="main-content" class="site-main clearfix">
    <div id="content-wrap">
        <div id="site-content" class="site-content clearfix">
            <div id="inner-content" class="inner-content-wrap">
                <div class="page-content">
                    <!-- WORKS -->
                    <section class="wprt-section">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="wprt-spacer" data-desktop="70" data-mobi="60" data-smobi="60"></div>

                                    <h2 class="text-center font-size-28 margin-bottom-10">Галереи Проектов</h2>
                                    <div class="wprt-lines style-2 custom-1">
                                        <div class="line-1"></div>
                                    </div>

                                    <div class="wprt-spacer" data-desktop="25" data-mobi="25" data-smobi="25"></div>

                                    <p class="wprt-subtitle">
                                        Lorem Ipsum — это просто текст-пустышка полиграфической и наборной индустрии. Lorem Ipsum был стандартным фиктивным текстом в отрасли с 1500-х годов, когда неизвестный печатник взял гранку шрифта и перемешал ее, чтобы сделать книгу образцов шрифтов.
                                    </p>

                                    <div class="wprt-spacer" data-desktop="43" data-mobi="30" data-smobi="30"></div>
                                </div><!-- /.col-md-12 -->

                                <div class="col-md-12">
                                    <div class="wprt-project" data-layout="grid" data-column="3" data-column2="3" data-column3="2" data-column4="1" data-gaph="30" data-gapv="30">
                                        <div id="project-filter">
                                            <div data-filter="*" class="cbp-filter-item">
                                                <span>Все</span>
                                            </div>
                                            <?php if (!empty($models)): ?>
                                                <?php foreach ($models as $model): ?>
                                                    <div data-filter=".<?=$model->id?>" class="cbp-filter-item">
                                                    <span><?=$model->name?></span>
                                                </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div><!-- /#project-filter -->

                                                <div id="projects" class="cbp">
                                                    <?php if (!empty($images)): ?>
                                                        <?php foreach ($images as $item): ?>
                                                            <?php
                                                                if($item->guid && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'album/' . $item->album . '/l_' . $item->guid)) {

                                                                    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'album/' . $item->album . '/l_' .  $item->guid;

                                                                } else {

                                                                    $image = '/images/default/m_post.jpg';

                                                                }
                                                            ?>
                                                            <div class="cbp-item <?=$item->album?> interior workspace">
                                                                <div class="project-item">
                                                                    <div class="inner">
                                                                        <div class="grid">
                                                                            <figure class="effect-zoe">
                                                                                <img style="width:370px;height: 370px;object-fit: cover;" src="<?=$image?>" alt="image" />

                                                                            </figure>
                                                                        </div>

                                                                        <a class="project-zoom cbp-lightbox" href="<?=$image?>" data-title="LUXURY BUILDINGS">
                                                                            <i style="font-size: 30px;color: #fff" class="fa fa-arrows-alt"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div><!--/.cbp-item -->
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>

                                                </div><!-- /#projects -->

                                    </div><!--/.wprt-project -->
                                </div><!-- /.col-md-12 -->

                                <div class="col-md-12">
                                    <div class="wprt-pagination clearfix">
                                        <ul class="page-numbers">
                                            <li><span class="page-numbers current">1</span></li>
                                            <li><a class="page-numbers" href="#">2</a></li>
                                            <li><a class="next page-numbers" href="#"><span class="fa fa-angle-right"></span></a></li>
                                        </ul>
                                    </div>

                                    <div class="wprt-spacer" data-desktop="80" data-mobi="60" data-smobi="60"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
