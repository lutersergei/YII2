<?php
/* @var $this yii\web\View */
/* @var $user User  */
/* @var $countTweets string*/
/* @var $friends User[]*/
/* @var $isSubscribed bool*/

$this->title = 'Профиль пользователя';
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\User;
use common\models\Tweets;
use yii\helpers\Url;
?>
<div class="row" id="user-profile">
    <div class="col-lg-3 col-md-4 col-sm-4">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2><?= $user->lastname . ' ' . $user->firstname ?></h2>
            </header>

            <div class="main-box-body clearfix">

                <img src="/img/avatar.png" alt="" class="profile-img img-responsive center-block">

                <div class="profile-label">
                    <span class="label label-danger"><?= User::$roles[$user->role] ?></span>
                </div>

                <div class="profile-since">
                    Зарегистрирован:
                    <?php
                    $date = new DateTime();
                    $date->setTimestamp($user->created_at);
                    echo $date->format('Y/m/d');
                    ?>
                </div>

                <div class="profile-details">
                    <ul class="fa-ul">
                        <li><i class="fa-li fa fa-comment"></i>ИнстаТвиттов: <span><?= $countTweets ?></span></li>
                        <li><i class="fa-li fa fa-rss"></i>Подписок: <span><?= count($friends) ?></span></li>
                    </ul>
                </div>

                <?php
                if ((Yii::$app->user->id !== $user->id) && (!Yii::$app->user->isGuest))
                {
                    if (($isSubscribed))
                    {
                    ?>
                        <div class="profile-message-btn center-block text-center">
                            <a href="<?= Url::to(['user/unsubscribe', 'id' => $user->id]) ?>" class="btn btn-danger ">
                                <i class="fa fa-minus-circle"></i>
                                Отписаться
                            </a>
                        </div>
                    <?php
                    }
                    else
                    {
                    ?>
                        <div class="profile-message-btn center-block text-center">
                            <a href="<?= Url::to(['user/subscribe', 'id' => $user->id]) ?>" class="btn btn-success ">
                                <i class="fa fa-plus-circle"></i>
                                Подписаться
                            </a>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>

        </div>
    </div>

    <div class="col-lg-9 col-md-8 col-sm-8">
        <div class="main-box clearfix">
            <div class="tabs-wrapper profile-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-newsfeed" data-toggle="tab">Мои Твитты</a></li>
                    <li><a href="#tab-friends" data-toggle="tab">Подписки</a></li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane fade in active" id="tab-newsfeed">
                        <div id="newsfeed">
                            <div class="row">
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
                                                            <strong><a class="text-info" href="<?= Url::to(['user/profile','id' => $tweet->user->id]) ?>"><?= $tweet->user->lastname . ' ' . $tweet->user->firstname ?></a></strong>
                                                            <p class="pull-right"> <?= $tweet->create_at ?></p>
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
                        </div>
                    </div>

                    <div class="tab-pane clearfix fade" id="tab-friends">
                        <ul class="widget-users row">
                            <?php
                            foreach ($friends as $friend)
                            {
                            ?>
                                <li class="col-md-6">
                                    <div class="img">
                                        <img src="/img/samples/scarlet.png" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="name">
                                            <a href="<?= Url::to(['user/profile','id' => $friend->id]) ?>"><?= $friend->lastname . ' ' . $friend->firstname ?></a>
                                        </div>
<!--                                        <div class="time">-->
<!--                                            <i class="fa fa-clock-o"></i> Last online: 5 minutes ago-->
<!--                                        </div>-->
                                        <div class="type">
                                            <span class="label label-danger"><?= User::$roles[$friend->role] ?></span>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
