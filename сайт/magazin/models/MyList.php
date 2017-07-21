<?php

namespace app\models;

use \yii\db\ActiveRecord;
class MyList extends ActiveRecord
{
    public static function tableName()
    {
        return 'list';
    }

    public static function getAll()
    {
        $data = self::find()->all();
        return $data;
    }

    public static function getOne($id)
    {
        $data = self::find()
            ->where(['id' => $id])
            ->one();
        return $data;

    }
}