<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $street
 * @property string $city
 * @property string $created_date
 * @property string $updated_date
 * @property int $qty
 * @property double $sum
 * @property int $status
 * @property int $user_id
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'phone', 'street', 'city', 'qty', 'sum'], 'required'],
            [['created_date', 'updated_date'], 'safe'],
            [['qty', 'status', 'user_id'], 'integer'],
            [['sum'], 'number'],
            [['first_name', 'last_name', 'email', 'phone', 'street', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'email' => 'Электронная почта',
            'phone' => 'Телефон',
            'street' => 'Квартира, улица, дом и т. д. (по желанию)',
            'city' => 'Город',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'qty' => 'Qty',
            'sum' => 'Sum',
            'status' => 'Status',
            'user_id' => 'User ID',
        ];
    }

    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_date', 'updated_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_date'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getOrderItem(){
        return $this->hasMany(OrderItem::className() , ['order_id' =>'id']);
    }
}
