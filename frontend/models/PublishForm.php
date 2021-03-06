<?php
namespace frontend\models;

use common\models\Tweets;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class PublishForm extends Model
{
    public $text;
    public $image;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['image'], 'string', 'max' => Tweets::MAX_IMAGE_PATH_LENGTH],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'text' => 'Текст ИнстаТвита',
            'image' => 'Фото',
        ];
    }

    public function createTweet()
    {
        if (!$this->validate()) {
            return null;
        }
        if (($this->text == null) && ($this->image == null))
        {
            $this->addError('text', 'Необходимо заполнить хотя бы одно поле');
            return null;
        }
        $tweet = new Tweets();
        $tweet->text = $this->text;
        $tweet->image = $this->image;
        $tweet->user_id = Yii::$app->user->id;
        return $tweet->save() ? $tweet : null;
    }
}