<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Tweets;
use frontend\models\SignupForm;

/**
 * Blog controller
 */
class BlogController extends Controller
{
    public $layout = 'blog.php';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [

        ];
    }

    /**
     * Displays all tweets.
     *
     * @return mixed
     */
    public function actionIndex()
    {
//        $username = Yii::$app->user->identity->username;
        $tweets = Tweets::find()->all();
        return $this->render('index', [
                'tweets' => $tweets
            ]);
    }

    /**
     * Displays one tweet.
     *
     * @return mixed
     */
    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        $tweet = Tweets::find()->where(['id' => $id])->one();
        return $this->render('view', [
            'tweet' => $tweet
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }


}
