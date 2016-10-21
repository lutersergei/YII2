<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%page}}".
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $text
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%page}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'title', 'text'], 'required'],
            [['text'], 'string'],
            [['slug', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'text' => 'Text',
        ];
    }
}
