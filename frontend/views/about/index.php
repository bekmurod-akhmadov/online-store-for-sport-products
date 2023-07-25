<?php
$this->title = "О Нас";
?>
    <!-- cart item area start -->
    <div class="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="location">
                        <ul>
                            <li><a href="<?=\yii\helpers\Url::home()?>" title="go to homepage">Главная<span>/</span></a>  </li>
                            <li><strong>О Нас</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="about-page">
                <div class="row">
                    <div class="col-md-7">
                        <div class="about-page-content">
                            <h3>СТАНДАРТНЫЙ ПРОХОД LOREM IPSUM</h3>
                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>
                            <blockquote>
                                <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</p>
                            </blockquote>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi malesuada vestibulum. Phasellus tempor nunc eleifend cursus molestie. Mauris lectus arcu, pellentesque at sodales sit amet, condimentum id nunc. Donec ornare mattis suscipit. Praesent fermentum accumsan vulputate.</p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="about-img">
                            <img src="/img/about/about.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-member">
                <div class="row">
                    <div class="col-md-12">
                        <div class="team-title">
                            <h3>встретить команду</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="single-member">
                            <div class="member-info">
                                <img src="/img/about/1.jpg" alt="">
                                <div class="member-social-profile">
                                    <a href="#"> <i class="fa fa-facebook"></i> </a>
                                    <a href="#"> <i class="fa fa-twitter"></i> </a>
                                </div>
                            </div>
                            <h3>Хавьер Маскерано</h3>
                            <p>Developer</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-member">
                            <div class="member-info">
                                <img src="/img/about/2.jpg" alt="">
                                <div class="member-social-profile">
                                    <a href="#"> <i class="fa fa-facebook"></i> </a>
                                    <a href="#"> <i class="fa fa-twitter"></i> </a>
                                </div>
                            </div>
                            <h3>Лука Биглия</h3>
                            <p>Programmer</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-member">
                            <div class="member-info">
                                <img src="/img/about/3.jpg" alt="">
                                <div class="member-social-profile">
                                    <a href="#"> <i class="fa fa-facebook"></i> </a>
                                    <a href="#"> <i class="fa fa-twitter"></i> </a>
                                </div>
                            </div>
                            <h3>Анзо Перес</h3>
                            <p>Designer</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-member">
                            <div class="member-info">
                                <img src="/img/about/4.jpg" alt="">
                                <div class="member-social-profile">
                                    <a href="#"> <i class="fa fa-facebook"></i> </a>
                                    <a href="#"> <i class="fa fa-twitter"></i> </a>
                                </div>
                            </div>
                            <h3>Мартин Демичелис</h3>
                            <p>PHP Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart item area end -->
<?=\frontend\widgets\News::widget()?>