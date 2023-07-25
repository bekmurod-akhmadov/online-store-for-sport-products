<?php
$this->title = "Контакты";
?>
    <!-- contact area start -->
    <div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="<?=\yii\helpers\Url::home()?>" title="go to homepage">Главная<span>/</span></a>  </li>
                            <li><strong>Контакты</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <?=\frontend\widgets\NewsSidebar::widget()?>
                <div class="col-lg-9">
                    <div class="contact-info">
                        <div id="googleMap"></div>
                        <div class="contact-details">
                            <div class="contact-title">
                                <h3>Связаться с нами</h3>
                            </div>
                            <div class="contact-form">
                                <div class="form-title">
                                    <h4>Контактная информация</h4>
                                </div>
                                <div class="form-content">
                                    <ul>
                                        <li>
                                            <div class="form-box">
                                                <div class="form-name">
                                                    <label>Имя <em>*</em> </label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="form-box">
                                                <div class="form-name">
                                                    <label>Электронная почта <em>*</em> </label>
                                                    <input type="email">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-box">
                                                <div class="form-name">
                                                    <label>телефон </label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-box">
                                                <div class="form-name">
                                                    <label>Комментарий <em>*</em> </label>
                                                    <textarea cols="5" rows="3"></textarea>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="buttons-set">
                                <p> <em>*</em> Обязательные поля</p>
                                <button type="submit">Отправить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->
    <!-- footer top area start -->
<?=\frontend\widgets\News::widget()?>