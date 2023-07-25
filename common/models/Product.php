<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $body
 * @property double $price
 * @property double $new_price
 * @property int $product_id
 * @property int $color_id
 * @property int $stock
 * @property int $brand_id
 * @property int $featured
 * @property int $best
 * @property int $new
 * @property int $trend
 * @property int $sale
 * @property int $status
 * @property string $image
 */
class Product extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public $gallery = [];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'body', 'price', 'new_price', 'product_id', 'color_id', 'brand_id', 'trend', 'sale'], 'required'],
            [['body'], 'string'],
            [['price', 'new_price'], 'number'],
            [['product_id', 'color_id', 'stock', 'brand_id', 'featured', 'best', 'new', 'trend', 'sale', 'status'], 'integer'],
            [['name', 'description', 'image'], 'string', 'max' => 255],
            [['gallery'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'body' => 'Body',
            'price' => 'Price',
            'new_price' => 'New Price',
            'product_id' => 'Product Category',
            'color_id' => 'Color',
            'stock' => 'Stock',
            'brand_id' => 'Brand',
            'featured' => 'Featured',
            'best' => 'Best',
            'new' => 'New',
            'trend' => 'Trend',
            'sale' => 'Sale',
            'status' => 'Status',
            'image' => 'Image',
        ];
    }
}
