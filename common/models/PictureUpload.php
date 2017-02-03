<?php
namespace common\models;

use yii\web\UploadedFile;
use yii\base\Model;
use yii\imagine\Image;

class PictureUpload extends Model
{
    /**
     * @param $picture UploadedFile
     * @return null|string name
     */
    public static function saveImage($picture)
    {
        $front= \Yii::getAlias('@webroot');

        $pictureFilename = $front . \Yii::$app->params['image_dir'] . $picture->name;

        $thumbFilename = $front . \Yii::$app->params['thumbnail_dir'] . $picture->name;

        if ($picture->saveAs($pictureFilename))
        {
            Image::thumbnail($pictureFilename, 400, null)->save($thumbFilename, ['quality' => 80]);
            return $picture->name;
        }
        else
        {
            return null;
        }
    }
}