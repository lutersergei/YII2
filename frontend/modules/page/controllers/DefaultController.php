<?php

namespace app\modules\page\controllers;

use yii\web\Controller;
use common\models\Page;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * Default controller for the `page` module
 */
class DefaultController extends Controller
{
    public $layout = '@app/views/layouts/blog.php';
    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex()
    {
        $slug = Yii::$app->request->get('slug');
//        var_dump($slug);
//        die();

        $page = Page::find()->where(['slug' => $slug])->one();

        if ($page)
        {
            return $this->render('index',[
                'page' => $page
            ]);
        }
        else
        {
            throw new NotFoundHttpException();
        }

    }
}
