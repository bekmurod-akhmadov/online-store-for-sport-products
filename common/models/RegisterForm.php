<?php


namespace common\models;


use common\models\FrontUser;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;
use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $password;
    public $phone;
    public $email;

    public function rules()
    {
        return [
            [['username','password','phone','email'],'required'],
            ['username','string','min' => 3,'max' => 255],
            ['username','unique','targetClass'=> '\common\models\FrontUser'],
            ['password','string','min' => 8,'max' => 16],
            ['phone','string','min'=> 7 ,'max'=>16]
        ];
    }

    public function attributeLabels(){

        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'email' => 'Эл. адрес',
            'phone' => 'Номер телефона'
        ];

    }

    public function register(){

        $model = new FrontUser();
        $model->username = $this->username;
        $model->phone = $this->phone;
        $model->password = Yii::$app->security->generatePasswordHash($this->password);
        $model->email = $this->email;
        $model->status = 0;

        if($model->save()){
            return true;
        }else{
            echo "<pre>";
            print_r($model->errors);
        }
    }

}