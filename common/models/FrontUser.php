<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "front_user".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $street
 * @property string $city
 * @property int $status
 * @property string $username
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 */
class FrontUser extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'front_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['username', 'password'], 'required'],
            [['first_name', 'last_name', 'email', 'phone', 'street', 'city', 'username', 'password', 'auth_key', 'access_token'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }

    public static function findByUsername($username){
        foreach (self::find()->all() as $user){
            if(strcasecmp($user->username,$username) === 0){
                return new static($user);
            }
        }

        return null;
    }

    public static function findIdentity($id){
        return self::findOne($id);
    }

    public function getId(){
        return $this->id;
    }

    public function getAuthKey(){
        return $this->auth_key;
    }

    public function validateAuthKey($authKey){
        return $this->auth_key == $authKey;
    }

    public function validatePassword($password){

        return Yii::$app->security->validatePassword($password,$this->password);
    }

    public static function findIdentityByAccessToken($token,$type=null){

    }
}
