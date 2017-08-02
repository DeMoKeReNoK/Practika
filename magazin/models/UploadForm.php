<?php
/**
 * Created by PhpStorm.
 * User: KOSTIKTURBO
 * Date: 24.07.2017
 * Time: 14:27
 */

namespace app\models;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
     public function uploadBD()
    {
        $list = new UploadForm();
        $list->imageFile = $this->imageFile;
        return $list->save();
        
    }

}