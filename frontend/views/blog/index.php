<?php

/* @var $this yii\web\View */
/* @var $tweets \common\models\Tweets[]  */
/* @var $publishForm \frontend\models\PublishForm*/

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\User;
use common\models\Tweets;
?>
<div class="row">
    <?php
    if (!Yii::$app->user->isGuest) {
        ?>
        <div class="modal fade" id="tweetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <section class="blog-post">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">Новый ИнстаТвит</h2>
                            </div>
                            <div class="panel-body">
                                <div class="blog-post-content">
                                    <?php
                                    $form = ActiveForm::begin([
                                        'id' => 'publishForm',
                                        'layout' => 'horizontal',
                                        'fieldConfig' => [
                                            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                                            'horizontalCssClasses' => [
                                                'label' => 'col-sm-2',
                                                'wrapper' => 'col-sm-10',
                                            ],
                                        ],
                                    ]);
                                    echo $form->field($publishForm, 'text')->textarea(['rows' => 5])->label('Текст');
                                    echo $form->field($publishForm, 'image')->fileInput();
                                    ?>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                                        </div>
                                    </div>
                                    <?php ActiveForm::end();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <a type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#tweetModal">
            Написать <i class="fa fa-twitter"></i>
        </a>
        <?php
    }?>
    <?php
    foreach ($tweets as $tweet)
    {
        $tweet_content = $tweet->getContent();
        $image_html = '';
        $text_html = '';
        if (($tweet_content->mode === Tweets::MODE_BOTH)||($tweet_content->mode === Tweets::MODE_IMAGE))
        {
            $image_src = $tweet_content->image;
            $image_html = <<<HTML
<img src="{$image_src}" class="img-responsive"/>
HTML;
        }
        if (($tweet_content->mode === Tweets::MODE_BOTH)||($tweet_content->mode === Tweets::MODE_TEXT))
        {
            $text_html = <<<HTML
<p>{$tweet_content->text}</p>
HTML;
        }

        ?>
        <div class="col-sm-6">
            <section class="blog-post">
                <div class="panel panel-default">
                    <?= $image_html?>
                    <div class="panel-body">
                        <div class="blog-post-meta">
                            <span class="label label-light label-primary">Теги</span>
                            <p class="blog-post-date pull-right">Автор: <?php
                                echo User::find()->where(['id' => $tweet->user_id])->one()->username;
                                ?></p>
                        </div>
                        <div class="blog-post-content">
                            <?= $text_html ?>
                            <a class="btn btn-info" href="/index.php?r=blog/view&id=<?=$tweet->id?>">Читать...</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php
    }
    ?>
</div>

<!--        <nav>-->
<!--            <ul class="pager">-->
<!--                <li><a class="withripple" href="#">Previous</a></li>-->
<!--                <li><a class="withripple" href="#">Next</a></li>-->
<!--            </ul>-->
<!--        </nav>-->