<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{    
    
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Norican',
        'https://fonts.googleapis.com/css?family=Montserrat:400,700',
        'https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800',
        "/css/bootstrap.min.css",
        "/css/font-awesome.min.css",
        "/css/owl.carousel.css",
        "/css/owl.theme.css",
        "/css/owl.transitions.css",
        "/css/jquery-ui.css",
        "/css/meanmenu.min.css",
        "/lib/css/nivo-slider.css",
        "/lib/css/preview.css",
        "/css/animate.css",
        "/css/magic.css",
        "css/normalize.css",
        "/css/main.css",
        "/style.css",
        "/css/responsive.css",
    ];

    public $js  = [
        "/js/vendor/modernizr-2.8.3.min.js",
        "/js/vendor/jquery-1.12.4.min.js",
        "/js/bootstrap.min.js",
        "/js/wow.min.js",
        "/js/jquery-price-slider.js",
        "/lib/js/jquery.nivo.slider.js",
        "/lib/home.js",
        "/js/jquery.meanmenu.js",
        "/js/owl.carousel.min.js",
        "/js/jquery.elevatezoom.js",
        "/js/jquery.scrollUp.min.js",
        "/js/plugins.js",
        "/js/main.js",
        "/js/cart.js",


    ];

      public $depends = [
//          'yii\web\yiiAsset',
          'yii\web\JqueryAsset'
      ];

}
