<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegisterForm extends Model
{
    public $name;
    public $patronymic;
    public $surname;
    public $login;
    public $email;
    public $password;
    public $password_repeat;
    public $rules;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'login', 'email', 'password', 'password_repeat', 'rules'], 'required'],
            [['rules'], 'required', 'requiredValue' => 1, 'message' => 'Поле необходимо заполнить.'],
            [['name', 'surname', 'patronymic', 'login', 'email', 'password', 'password_repeat', 'rules'], 'string', 'max' => 255],
            [['password', 'password_repeat'], 'string', 'min' => 6],
            [['name', 'surname', 'patronymic'], 'match', 'pattern' => '/^[а-яА-ЯёЁ\s\-]+$/u', 'message' => 'Разрешенные символы (латиница, цифры и тире).'],
            ['login', 'match', 'pattern' => '/^[a-zA-Z0-9\-]+$/', 'message' => 'Разрешенные символы (латиница, цифры и тире).'],
            [['login', 'email'], 'unique', 'targetClass' => User::class],
            ['email', 'email'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function registerUser()
    {
        if ($this->validate()) {

            $user = new User;
            $user->load($this->attributes, '');

            if ($user->save(false)){
                return $user;
            }
        }
        return false;
    }
}
