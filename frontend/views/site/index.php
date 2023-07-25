<?php

$this->title = '';

$this->registerMetatag([
    'property' => 'og:name',
    'content' => ''
])
?>

<?=\frontend\widgets\HeaderSlider::widget()?>
<?=\frontend\widgets\Services::widget()?>
<?=\frontend\widgets\Sale::widget()?>
<?=\frontend\widgets\Featured::widget()?>
<?=\frontend\widgets\Bestseller::widget()?>
<?=\frontend\widgets\NewProduct::widget()?>
<?=\frontend\widgets\News::widget()?>
<?=\frontend\widgets\NewsLater::widget()?>







