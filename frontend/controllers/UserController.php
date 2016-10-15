<?php
namespace frontend\controllers;

use common\models\PictureUpload;
use common\models\User;
use frontend\models\PublishForm;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Tweets;
use frontend\models\SignupForm;
use common\models\LoginForm;
use yii\web\UploadedFile;
use common\models\Subscription;

/**
 * User controller
 */
class UserController extends Controller
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
                'only' => ['login', 'logout', 'signup', 'feed'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout', 'feed'],
                        'roles' => ['@'],
                    ],
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

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Logs in a user.
     *
     * @return mixed
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
     * @return mixed
     */
    public function actionFeed()
    {
        $tweets = Tweets::getFeedQuery()->orderBy(['create_at' => SORT_DESC])->all();

        $publishForm = new PublishForm();
        $post = Yii::$app->request->post('PublishForm');
        if (count($post)){
            $picture = UploadedFile::getInstance($publishForm, 'image');
            $image = null;

            if ($picture) {
                $image = PictureUpload::uploadImage($picture);
            }
            $publishForm->image = $image;
            $publishForm->text = $post['text'];
            if ($publishForm->createTweet()){
                $this->refresh();
            }
        }
        return $this->render('feed', [
            'tweets' => $tweets,
            'publishForm' => $publishForm,
        ]);
    }

    public function actionProfile()
    {
        $this->layout = 'profile.php';
        $get = Yii::$app->request->get();

        if (isset($get['id']))
        {
            $id = (int)$get['id'];
            $user = User::find()->where(['id' => $id])->one();
            $tweetsQuery = Tweets::getFeedQuery($id);
        }
        else
        {
            $user = Yii::$app->user->identity;
            $tweetsQuery = Tweets::getFeedQuery();
        }
        $tweets = $tweetsQuery->all();
        $countTweets = $tweetsQuery->count();

        return $this->render('profile', [
            'user' => $user,
            'tweets' => $tweets,
            'countTweets' => $countTweets
        ]);
    }

    public function actionSubscribe()
    {
        $get = Yii::$app->request->get();
        if (isset($get['id']))
        {
            $id = (int)$get['id'];
            if (Subscription::newSubscribe($id))
            {
                $this->redirect(Url::to(['user/profile', 'id' => $id]));
            }
            //TODO научиться выдавать ошибку
            else
            {
                $this->redirect(Url::to(['user/profile', 'id' => $id]));
            }
        }
    }
}
