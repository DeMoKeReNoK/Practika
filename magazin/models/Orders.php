<?php


namespace app\models;

use yii\base\Model;
class orders extends Model
{
    public $name;
    public $phone;

    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            ['phone', 'number','min'=>11]
        ];
    }


}