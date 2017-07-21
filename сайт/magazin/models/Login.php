<?php
namespace app\models;
use yii\base\Model;
class Login extends Model
{
    public $email;
    public $password;

    public function rules(){
        return [
            [['email','password'],'required'],
            ['email','email'],
            ['password','validatePassword']]; // функция для валидации пароля

    }
    public function validatePassword($attribute,$params)
    {
      if(!$this->hasErrors()) // если нет ошибок в валидации
      {
          $user= $this->getUser(); //получаем пользователя для дальнейшего сравнения пароля

          if(!$user||!$user->validatePassword($this->password))// если мы не нашли в базе такого пользователя
              // или введеный пароль и пароль пользователя в базе не равны то
          {
              $this->addError($attribute,'Пароль или почта введены неправильно');//добавляем новую ошибку для атрибута
              //password о том что пароль или емаил введены не верно
          }
      }
    }

    public function getUser()
    {
        return User::findOne(['email'=>$this->email]); // получаем его по введенному емейлу
    }
}