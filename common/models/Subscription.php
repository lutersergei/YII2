<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%subscription}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $subscription
 *
 * @property User $user
 */
class Subscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%subscription}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'subscription'], 'required'],
            [['user_id', 'subscription'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'subscription' => 'Subscription',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function newSubscribe($id)
    {
        $subs_user = User::find()->where(['id' => $id])->one();
        if ($subs_user)
        {
            //disable subscription itself
            if ($id !== Yii::$app->user->id)
            {
                //Check for already subscribe
                if (!Subscription::find()->where(['user_id' => Yii::$app->user->id])->andWhere(['subscription' => $id])->one())
                {
                    $subscribe = new Subscription();
                    $subscribe->user_id = Yii::$app->user->id;
                    $subscribe->subscription = $id;
                    return $subscribe->save() ? $subscribe : null;
                }
                else return null;
            }
            else return null;
        }
        else return null;
    }
}
