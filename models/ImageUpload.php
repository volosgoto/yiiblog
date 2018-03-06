<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 06.03.18
 * Time: 11:02
 */

namespace app\models;


use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model {

    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png']
        ];
    }

    public function uploadFile(UploadedFile $file, $currentImage){
        if ($this->validate()) {
            if (file_exists($this->getFolder() . $currentImage)) {
                unlink($this->getFolder() . $currentImage);
            }

            $fileName = $this->generateFilename();
            $file->saveAs($this->getFolder() . $fileName);
            return $fileName;
        }
    }

    private function getFolder() {
        return Yii::getAlias('@web') . 'uploads/';
    }

    private function generateFilename() {
        return strtolower(md5(uniqid($this->image->baseName))) . '.' . $this->image->extension;
    }
}