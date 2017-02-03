<?php
namespace frontend\controllers;

use common\models\PictureUpload;
use common\models\User;
use frontend\models\PublishForm;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\Tweets;
use frontend\models\SignupForm;
use common\models\LoginForm;
use yii\web\NotFoundHttpException;
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
        $tweets = Tweets::getFeedQueryWithSubs()->all();

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

    /**
     * View User profile
     *
     * @param null $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionProfile($id = null)
    {
        $this->layout = 'profile.php';
        $isSubscribed = false;
        if ($id)
        {
            $user = User::find()->where(['id' => $id])->one();
            if (!$user)
            {
                throw new NotFoundHttpException('Пользователь не найден');
            }
            $tweetsQuery = Tweets::getFeedQuery($id);
            $isSubscribed = Subscription::isSubscribed($id);
        }
        else
        {
            $id = Yii::$app->user->id;
            $user = Yii::$app->user->identity;
            $tweetsQuery = Tweets::getFeedQuery();
        }

        $friends = Subscription::getFriends($id);
        $tweets = $tweetsQuery->all();
        $countTweets = $tweetsQuery->count();

        return $this->render('profile', [
            'user' => $user,
            'tweets' => $tweets,
            'countTweets' => $countTweets,
            'friends' => $friends,
            'isSubscribed' => $isSubscribed
        ]);
    }

    /**
     * Subscribe to User
     *
     * @param null $id
     * @throws NotFoundHttpException
     */

    public function actionSubscribe($id = null)
    {
        if ($id)
        {
            if (Subscription::newSubscribe($id))
            {
                $this->redirect(Url::to(['user/profile', 'id' => $id]));
            }
            else
            {
                throw new NotFoundHttpException('Пользователь не найден');
            }
        }
    }


    /**
     * Unsubscribe User
     *
     * @param null $id
     * @throws NotFoundHttpException
     */
    public function actionUnsubscribe($id = null)
    {
        if ($id)
        {
            if (Subscription::unsubscribe($id))
            {
                $this->redirect(Url::to(['user/profile', 'id' => $id]));
            }
            else
            {
                throw new NotFoundHttpException('Пользователь не найден');
            }
        }
    }
}