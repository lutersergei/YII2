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

    /**
     * @param $id
     * @return Subscription|null
     */
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

    /**
     * @param $id User->id
     * @return array|User[]
     */
    public static function getFriends($id)
    {
        $subs_array = self::getArraySubscription($id);
        $friends = User::find()->where(['id' => $subs_array])->all();
        return $friends;
    }

    /**
     * @param $id
     * @return array subscription[]
     */
    public static function getArraySubscription($id)
    {
        $subscription = Subscription::find()->select('subscription')->where(['user_id' => $id])->all();
        $subs_array = [];
        foreach ($subscription as $s)
        {
            array_push($subs_array, $s->subscription);
        }
        return $subs_array;
    }

    /**
     * @param $id User->id
     * @return bool
     */
    public static function isSubscribed($id)
    {
        if (Subscription::find()->where(['user_id' => Yii::$app->user->id])->andWhere(['subscription' => $id])->one())
        {
            return true;
        }
        else return false;
    }

    /**
     * @param $id
     * @return bool|null
     */
    public static function unsubscribe($id)
    {
        if (Subscription::find()->where(['user_id' => Yii::$app->user->id])->andWhere(['subscription' => $id])->one()->delete())
        {
            return true;
        }
        else return null;
    }
}
