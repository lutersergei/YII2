<?php
namespace common\models;

use yii\web\UploadedFile;
use yii\base\Model;

class PictureUpload extends Model
{

    public static $image_dir;

    public static function getImageDir()
    {
        if (self::$image_dir === null){
            self::$image_dir = \Yii::getAlias('@upload');
        }
        return self::$image_dir;
    }
    /**
     * @param $picture UploadedFile
     * @return bool result of upload
     */

    public static function uploadImage($picture)
    {
        $pictureFilename = self::getImageDir() . '/' . $picture->name;

        if ($picture->saveAs($pictureFilename))
        {
            return $picture->name;
        }
        else
        {
            return null;
        }
    }

    public static function readImage($picture)
    {
        if (file_exists(self::getImageDir() . '/' . $picture))
        {
            return file_get_contents(self::getImageDir() . '/' . $picture);
        }
        // todo add default image
        else return null;
    }
}