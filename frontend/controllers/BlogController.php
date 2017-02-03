<?php
namespace frontend\controllers;

use common\models\PictureUpload;
use frontend\models\PublishForm;
use Yii;
use yii\web\Controller;
use common\models\Tweets;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use dosamigos\transliterator\TransliteratorHelper;

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
     * Display all tweets.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $tweets = Tweets::find()->orderBy(['create_at' => SORT_DESC])->with('user')->all();

        $publishForm = new PublishForm();
        $post = Yii::$app->request->post('PublishForm');
        if (count($post)){
            $picture = UploadedFile::getInstance($publishForm, 'image');

            if($picture){
                $picture->name = TransliteratorHelper::process($picture->name);
                $imageName = PictureUpload::saveImage($picture);
            }
            else $imageName = null;
            $publishForm->image = $imageName;
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
     * Display one tweet.
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        $tweet = Tweets::find()->where(['id' => $id])->one();
        if ($tweet)
        {
            return $this->render('view', [
                'tweet' => $tweet
            ]);
        }
        else
        {
            throw new NotFoundHttpException('Запись не нейдена');
        }
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
