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
                                    echo $form->field($publishForm, 'image', ['template' =>
                                        "{label}\n{beginWrapper}\n<input type=\"text\" readonly=\"\" class=\"form-control\" placeholder=\"Обзор...\">\n{input}\n{hint}\n{error}\n{endWrapper}"
                                    ])->fileInput();
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
                $text_encode = Html::encode($tweet_content->text);
                $text_html = <<<HTML
<p>{$text_encode}</p>
HTML;
            }

            ?>
            <div class="col-sm-6">
                <section class="blog-post">
                    <div class="panel panel-default">
                        <?= $image_html ?>
                        <div class="panel-body">
                            <div class="blog-post-meta">
                                <strong><a class="text-info" href="<?= Url::to(['user/profile','id' => $tweet->user->id]) ?>"><?= Html::encode($tweet->user->lastname) . ' ' . Html::encode($tweet->user->firstname) ?></a></strong>
                                <p class="pull-right"> <?= $tweet->create_at ?></p>
                            </div>
                            <div class="blog-post-content">
                                <?= $text_html ?>
                                <a class="btn btn-info" href="<?= Url::to(['blog/view', 'id' => $tweet->id])?>">Читать...</a>
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
