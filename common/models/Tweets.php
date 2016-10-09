<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tweets}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $text
 * @property string $image
 *
 * @property User $user
 */
class Tweets extends \yii\db\ActiveRecord
{
    const IMAGE_DIR = '../../frontend/web/images/';
    const IMAGE_PATH = '/images/';
    const MAX_IMAGE_PATH_LENGTH = 255;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tweets}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['text'], 'string'],
            [['image'], 'string', 'max' => self::MAX_IMAGE_PATH_LENGTH],
//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'text' => 'Text',
            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function getImageDir()
    {
        if (!is_dir(self::IMAGE_DIR))
        {
            mkdir(self::IMAGE_DIR);
        }
        return self::IMAGE_DIR;
    }
}
