<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_char".
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property int $product_id
 */
class ProductChar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_char';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'required'],
            [['product_id'], 'integer'],
            [['name', 'value'], 'string', 'max' => 255],
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
            'value' => 'Value',
            'product_id' => 'Product ID',
        ];
    }
}
