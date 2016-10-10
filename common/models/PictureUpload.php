<?php
namespace common\models;

use yii\web\UploadedFile;
use yii\base\Model;

class PictureUpload extends Model
{
    const IMAGE_DIR = "@app/upload";
    /**
     * @param $picture UploadedFile
     * @return bool result of upload
     */

    public static function uploadImage($picture)
    {
        $pictureFilename = self::IMAGE_DIR . $picture->name;

        if ($picture->saveAs($pictureFilename))
        {
            return Tweets::IMAGE_PATH . $picture->name;
        }
        else
        {
            return null;
        }
    }
}