<?php

/* @var $this yii\web\View */
/* @var $tweets \common\models\Tweets[]  */
/* @var $publishForm \frontend\models\PublishForm*/
$this->title = 'ТвиттоГрамм';
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
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
                                    echo $form->field($publishForm, 'text')->textarea(['autofocus' => true, 'rows' => 5])->label('Текст');
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
        if ($tweet_content->mode !== Tweets::MODE_NOTHING) {
            if (($tweet_content->mode === Tweets::MODE_BOTH) || ($tweet_content->mode === Tweets::MODE_IMAGE)) {
                if ($tweet->getImage()) {
                    $image_src = $tweet->getImage();
                } else $image_src = '/img/technology/no_photo.jpg';
                $image_html = <<<HTML
<img src="{$image_src}" class="img-responsive"/>
HTML;
            }
            if (($tweet_content->mode === Tweets::MODE_BOTH) || ($tweet_content->mode === Tweets::MODE_TEXT)) {
                $text_html = <<<HTML
<p>{$tweet_content->text}</p>
HTML;
            }

            ?>
            <div class="col-sm-6">
                <section class="blog-post">
                    <div class="panel panel-default">
                        <?= $image_html ?>
                        <div class="panel-body">
                            <div class="blog-post-meta">
                                <span class="label label-light label-primary">Теги</span>
                                <p class="blog-post-date pull-right">Автор:
                                    <a href="<?= Url::to(['user/profile','id' => $tweet->user->id]) ?>"><?= $tweet->user->username ?></a>
                                    </p>
                            </div>
                            <div class="blog-post-content">
                                <?= $text_html ?>
                                <a class="btn btn-info" href="/blog/view/<?= $tweet->id ?>">Читать...</a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php
        }
    }
    ?>
</div>
