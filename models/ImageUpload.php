<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg, png']
        ];
    }

    /**
     * @param UploadedFile $file
     * @param string $currentImage
     * @return string
     */
    public function upload(UploadedFile $file, $currentImage)
    {
        $this->image = $file;

        if ($this->validate()) {
            $this->deleteImage($currentImage);

            return $this->saveImage();
        }
    }

    private function getUploadsPath()
    {
        return Yii::getAlias('@web') . 'uploads/';
    }

    private function generateFileName()
    {
        return strtolower(md5(uniqid($this->image->baseName))) . '.' . $this->image->extension;
    }

    /**
     * @param string $file
     */
    public function deleteImage($file)
    {
        if ($this->isImageExists($file)) {
            unlink($this->getUploadsPath() . $file);
        }
    }

    /**
     * @param string $file
     * @return bool
     */
    private function isImageExists($file)
    {
        if (!empty($file) && $file !== null) {
            return is_file($this->getUploadsPath() . $file);
        }
    }

    private function saveImage()
    {
        $uploads = $this->getUploadsPath();
        $name = $this->generateFileName();

        $this->image->saveAs($uploads . $name);

        return $name;
    }
}
