<!-- footer top area start -->
<div class="footer-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer-contact">
                    <img src="img/logo-white.png" alt="">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.</p>
                    <ul class="address">
                        <li>
                            <span class="fa fa-fax"></span>
                            <?=\common\components\StaticFunctions::getSettings('phone-number')?>
                        </li>
                        <li>
                            <span class="fa fa-phone"></span>
                            <?=\common\components\StaticFunctions::getSettings('phone-number')?>
                        </li>
                        <li>
                            <span class="fa fa-envelope-o"></span>
                            <?=\common\components\StaticFunctions::getSettings('email')?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-tweets">
                    <div class="footer-title">
                        <h3>Последние новости</h3>
                    </div>
                    <div class="twitter-feed">
                        <?php if (!empty($news)): ?>
                            <?php foreach ($news as $model): ?>
                                <div class="twitter-article mb-3">
                                    <div class="twitter-img">
                                        <a href="<?=\yii\helpers\Url::to(['news/view' , 'id' => $model->id])?>">
                                            <img src="img/twitter/twitter-1.png" alt="">
                                        </a>
                                    </div>
                                    <div class="twitter-text">
                                        <p><?=$model->title?></p>
                                        <a href="<?=\yii\helpers\Url::to(['news/view' , 'id' => $model->id])?>"><?=\yii\helpers\Url::to(['news/view' , 'id' => $model->id])?></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer-info">
                    <div class="footer-title">
                        <h3>Меню</h3>
                    </div>
                    <div class="footer-menu">
                        <ul>
                            <?php if (!empty($models)): ?>
                            <?php foreach ($models as $model): ?>
                            <li><a href="<?=$model->url?>"><?=$model->name?></a></li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
