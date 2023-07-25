<?php


namespace frontend\widgets;


use common\models\Brand;
use common\models\Color;
use common\models\ProductCategory;
use yii\base\Widget;

class NewsSidebar extends Widget
{
    public function run(){
        $categories = ProductCategory::find()->where(['status' => 1])->all();
        $colors = Color::find()->where(['status' => 1])->all();
        $brands = Brand::find()->where(['status' => 1])->all();

        return $this->render('news-sidebar' , [
            'categories' => $categories,
            'colors' => $colors,
            'brands' => $brands,
        ]);
    }

}