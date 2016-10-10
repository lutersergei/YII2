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

    /**
     * @param $picture string filename
     * @return array|null mime type and content of picture
     */
    public static function readImage($picture)
    {
        if (file_exists(self::getImageDir() . '/' . $picture))
        {
            $fileInfo[] = file_get_contents(self::getImageDir() . '/' . $picture);
            $fileInfo[] = mime_content_type(self::getImageDir() . '/' . $picture);
            return $fileInfo;
        }
        return null;
    }
}