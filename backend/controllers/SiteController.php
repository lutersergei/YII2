<?php
namespace backend\controllers;

use common\models\Tweets;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'blog.php';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'tweet-timestamp', 'new-tweet'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
//                    [
//                        'actions' => ['tweet-timestamp'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'actions' => ['new-tweet'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Add tweet with timestamp.
     *
     * @return string
     */
    public function actionTweetTimestamp()
    {
        $tweet = new Tweets();

        date_default_timezone_set('Europe/Moscow');
        $time = date("Y-m-d H:i:s");
        $tweet->text = $time;
        $tweet->save();
        return $this->render('timestamp',[
            'tweet' => $tweet,
            'time' => $time
        ]);
    }

    /**
     * Add new tweet.
     *
     * @return string
     */
    public function actionNewTweet()
    {
        $tweet = new Tweets();
        $post = Yii::$app->request->post('Tweets');
        if (count($post))
        {
            $tweet->text = $post['text'];
            $tweet->user_id = 2;
            var_dump($tweet);

            if ($tweet->save())
            {
                $tweet = new Tweets();
            }
        }

        return $this->render('new',[
            'tweet' => $tweet
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();

    }
}
