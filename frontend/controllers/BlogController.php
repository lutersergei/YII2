<?php
namespace frontend\controllers;

use common\models\PictureUpload;
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
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['login', 'logout', 'signup'],
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'actions' => ['login', 'signup'],
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'allow' => true,
//                        'actions' => ['logout'],
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
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
     * Displays all tweets.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $tweets = Tweets::find()->with('user')->all();

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
}
