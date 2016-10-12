<?php
namespace backend\controllers;

use common\models\Tweets;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use common\models\User;
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
                        'actions' => ['logout', 'index', 'tweet-timestamp', 'new-tweet', 'users', 'user-delete', 'feed', 'tweet-delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
        $tweet->user_id = Yii::$app->user->id;
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
            $tweet->user_id = Yii::$app->user->id;

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
        $this->layout = 'login.php';
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

    public function actionFeed()
    {
        $tweets = Tweets::find()->all();
        return $this->render('feed', [
            'tweets' => $tweets,
        ]);
    }

    public function actionTweetDelete()
    {
        $id = (int)Yii::$app->request->get('id');
        $tweet = Tweets::find()->where(['id' => $id])->one();
        if ($tweet)
        {
            $tweet->delete();
        }
        header('Location:/site/feed');
        die();
    }

    public function actionUsers()
    {
        $users = User::find()->all();
        $roles = User::$roles;
        $message = null;

        return $this->render('users', [
            'users' => $users,
            'roles' => $roles,
            'message' => $message,
        ]);
    }

    public function actionUserDelete()
    {
        $users = User::find()->all();
        $roles = User::$roles;
        $message = null;
        $id = (int)Yii::$app->request->get('id');

        if ($id && User::findIdentity($id))
        {
            $user = User::find()->where(['id' => $id])->one();
            $user_role = $user->role;
            $current_user_id = Yii::$app->user->id;
            if ($user_role === User::ROLE_USER)
            {
                if ($id !== $current_user_id)
                {
                    $user->delete();
                    $this->refresh();
                }
                else
                {
                    $message = 'Невозможно удалить текущего пользователя';
                }
            }
            else $message = 'Невозможно удалить админстратора';
        }
        return $this->render('users', [
            'users' => $users,
            'roles' => $roles,
            'message' => $message,
        ]);
    }
}
