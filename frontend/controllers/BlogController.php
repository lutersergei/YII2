<?php
namespace frontend\controllers;

use frontend\models\PublishForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Tweets;
use frontend\models\SignupForm;
use common\models\LoginForm;
use yii\web\UploadedFile;

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
        $tweets = Tweets::find()->all();

        $publishForm = new PublishForm();
        $post = Yii::$app->request->post('PublishForm');
        if (count($post)){
            $picture = UploadedFile::getInstance($publishForm, 'image');
            $image = null;

            if ($picture) {
                $image = PublishForm::uploadImage($picture);
            }
            $publishForm->image = $image;
            $publishForm->text = $post['text'];
            if ($publishForm->createTweet()){
                $this->refresh();
            }
        }
        return $this->render('index', [
            'tweets' => $tweets,
            'publishForm' => $publishForm,
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

    public function actionAbout()
    {
        return $this->render('page-about.html');
    }

    public function actionContact()
    {
        return $this->render('page-contact.html');
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
}
