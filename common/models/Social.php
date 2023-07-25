<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "social".
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $icon
 * @property int $status
 * @property string $image
 */
class Social extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'link', 'icon'], 'required'],
            [['status'], 'integer'],
            [['name', 'link', 'icon', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Menyu nomi',
            'link' => 'URL',
            'icon' => 'Icon',
            'status' => 'Status',
            'image' => 'Rasm',
        ];
    }
}
