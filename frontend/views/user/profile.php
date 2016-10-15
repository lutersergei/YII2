<?php
/* @var $this yii\web\View */
/* @var $user User  */
/* @var $countTweets string*/

$this->title = 'Профиль пользователя';
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\User;
use common\models\Tweets;
?>
<div class="row" id="user-profile">
    <div class="col-lg-3 col-md-4 col-sm-4">
        <div class="main-box clearfix">
            <header class="main-box-header clearfix">
                <h2><?= $user['lastname'] . ' ' . $user['firstname'] ?></h2>
            </header>

            <div class="main-box-body clearfix">
<!--                <div class="profile-status">-->
<!--                    <i class="fa fa-circle"></i> Online-->
<!--                </div>-->

                <img src="/img/avatar.png" alt="" class="profile-img img-responsive center-block">

                <div class="profile-label">
                    <span class="label label-danger"><?= User::$roles[$user->role] ?></span>
                </div>

<!--                <div class="profile-stars">-->
<!--                    <i class="fa fa-star"></i>-->
<!--                    <i class="fa fa-star"></i>-->
<!--                    <i class="fa fa-star"></i>-->
<!--                    <i class="fa fa-star"></i>-->
<!--                    <i class="fa fa-star-o"></i>-->
<!--                    <span>Super User</span>-->
<!--                </div>-->

                <div class="profile-since">
                    Зарегистрирован:
                    <?php
                    $date = new DateTime();
                    $date->setTimestamp($user['created_at']);
                    echo $date->format('Y/m/d');
                    ?>
                </div>

                <div class="profile-details">
                    <ul class="fa-ul">
<!--                        <li><i class="fa-li fa fa-truck"></i>Orders: <span>456</span></li>-->
                        <li><i class="fa-li fa fa-comment"></i>ИнстаТвиттов: <span><?= $countTweets ?></span></li>
<!--                        <li><i class="fa-li fa fa-tasks"></i>Tasks done: <span>1024</span></li>-->
                    </ul>
                </div>

                <div class="profile-message-btn center-block text-center">
                    <a href="#" class="btn btn-success">
                        <i class="fa fa-envelope"></i>
                        Отправить
                    </a>
                </div>
            </div>

        </div>
    </div>

    <div class="col-lg-9 col-md-8 col-sm-8">
        <div class="main-box clearfix">
            <div class="tabs-wrapper profile-tabs">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-newsfeed" data-toggle="tab">Последние Твитты</a></li>
<!--                    <li><a href="#tab-activity" data-toggle="tab">Activity</a></li>-->
                    <li><a href="#tab-friends" data-toggle="tab">Друзья</a></li>
<!--                    <li><a href="#tab-chat" data-toggle="tab">Chat</a></li>-->
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
                                                            <p class="blog-post-date pull-right">Автор: <?php
                                                                echo $tweet->user->username;
                                                                ?></p>
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

                    <div class="tab-pane fade" id="tab-activity">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="text-center">
                                        <i class="fa fa-comment"></i>
                                    </td>
                                    <td>
                                        Scarlett Johansson posted a comment in <a href="#">Avengers Initiative</a> project.
                                    </td>
                                    <td>
                                        2014/08/08 12:08
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <i class="fa fa-truck"></i>
                                    </td>
                                    <td>
                                        Scarlett Johansson changed order status from <span class="label label-primary">Pending</span>
                                        to <span class="label label-success">Completed</span>
                                    </td>
                                    <td>
                                        2014/08/08 12:08
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <i class="fa fa-check"></i>
                                    </td>
                                    <td>
                                        Scarlett Johansson posted a comment in <a href="#">Lost in Translation opening scene</a> discussion.
                                    </td>
                                    <td>
                                        2014/08/08 12:08
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <i class="fa fa-users"></i>
                                    </td>
                                    <td>
                                        Scarlett Johansson posted a comment in <a href="#">Avengers Initiative</a> project.
                                    </td>
                                    <td>
                                        2014/08/08 12:08
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <i class="fa fa-heart"></i>
                                    </td>
                                    <td>
                                        Scarlett Johansson changed order status from <span class="label label-warning">On Hold</span>
                                        to <span class="label label-danger">Disabled</span>
                                    </td>
                                    <td>
                                        2014/08/08 12:08
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <i class="fa fa-check"></i>
                                    </td>
                                    <td>
                                        Scarlett Johansson posted a comment in <a href="#">Lost in Translation opening scene</a> discussion.
                                    </td>
                                    <td>
                                        2014/08/08 12:08
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <i class="fa fa-truck"></i>
                                    </td>
                                    <td>
                                        Scarlett Johansson changed order status from <span class="label label-primary">Pending</span>
                                        to <span class="label label-success">Completed</span>
                                    </td>
                                    <td>
                                        2014/08/08 12:08
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <i class="fa fa-users"></i>
                                    </td>
                                    <td>
                                        Scarlett Johansson posted a comment in <a href="#">Avengers Initiative</a> project.
                                    </td>
                                    <td>
                                        2014/08/08 12:08
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="tab-pane clearfix fade" id="tab-friends">
                        <ul class="widget-users row">
                            <li class="col-md-6">
                                <div class="img">
                                    <img src="/img/samples/scarlet.png" alt="">
                                </div>
                                <div class="details">
                                    <div class="name">
                                        <a href="#">Scarlett Johansson</a>
                                    </div>
                                    <div class="time">
                                        <i class="fa fa-clock-o"></i> Last online: 5 minutes ago
                                    </div>
                                    <div class="type">
                                        <span class="label label-danger">Admin</span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-6">
                                <div class="img">
                                    <img src="/img/samples/kunis.png" alt="">
                                </div>
                                <div class="details">
                                    <div class="name">
                                        <a href="#">Mila Kunis</a>
                                    </div>
                                    <div class="time online">
                                        <i class="fa fa-check-circle"></i> Online
                                    </div>
                                    <div class="type">
                                        <span class="label label-warning">Pending</span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-6">
                                <div class="img">
                                    <img src="/img/samples/ryan.png" alt="">
                                </div>
                                <div class="details">
                                    <div class="name">
                                        <a href="#">Ryan Gossling</a>
                                    </div>
                                    <div class="time online">
                                        <i class="fa fa-check-circle"></i> Online
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-6">
                                <div class="img">
                                    <img src="/img/samples/robert.png" alt="">
                                </div>
                                <div class="details">
                                    <div class="name">
                                        <a href="#">Robert Downey Jr.</a>
                                    </div>
                                    <div class="time">
                                        <i class="fa fa-clock-o"></i> Last online: Thursday
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-6">
                                <div class="img">
                                    <img src="/img/samples/emma.png" alt="">
                                </div>
                                <div class="details">
                                    <div class="name">
                                        <a href="#">Emma Watson</a>
                                    </div>
                                    <div class="time">
                                        <i class="fa fa-clock-o"></i> Last online: 1 week ago
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-6">
                                <div class="img">
                                    <img src="/img/samples/george.png" alt="">
                                </div>
                                <div class="details">
                                    <div class="name">
                                        <a href="#">George Clooney</a>
                                    </div>
                                    <div class="time">
                                        <i class="fa fa-clock-o"></i> Last online: 1 month ago
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-6">
                                <div class="img">
                                    <img src="/img/samples/kunis.png" alt="">
                                </div>
                                <div class="details">
                                    <div class="name">
                                        <a href="#">Mila Kunis</a>
                                    </div>
                                    <div class="time online">
                                        <i class="fa fa-check-circle"></i> Online
                                    </div>
                                    <div class="type">
                                        <span class="label label-warning">Pending</span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-6">
                                <div class="img">
                                    <img src="/img/samples/ryan.png" alt="">
                                </div>
                                <div class="details">
                                    <div class="name">
                                        <a href="#">Ryan Gossling</a>
                                    </div>
                                    <div class="time online">
                                        <i class="fa fa-check-circle"></i> Online
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <br>
                        <a href="#" class="btn btn-success pull-right">View all users</a>
                    </div>

                    <div class="tab-pane fade" id="tab-chat">
                        <div class="conversation-wrapper">
                            <div class="conversation-content">
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 340px;"><div class="conversation-inner" style="overflow: hidden; width: auto; height: 340px;">

                                        <div class="conversation-item item-left clearfix">
                                            <div class="conversation-user">
                                                <img src="/img/samples/ryan.png" alt="">
                                            </div>
                                            <div class="conversation-body">
                                                <div class="name">
                                                    Ryan Gossling
                                                </div>
                                                <div class="time hidden-xs">
                                                    September 21, 2013 18:28
                                                </div>
                                                <div class="text">
                                                    I don't think they tried to market it to the billionaire, spelunking,
                                                    base-jumping crowd.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="conversation-item item-right clearfix">
                                            <div class="conversation-user">
                                                <img src="/img/samples/kunis.png" alt="">
                                            </div>
                                            <div class="conversation-body">
                                                <div class="name">
                                                    Mila Kunis
                                                </div>
                                                <div class="time hidden-xs">
                                                    September 21, 2013 12:45
                                                </div>
                                                <div class="text">
                                                    Normally, both your asses would be dead as fucking fried chicken, but you
                                                    happen to pull this shit while I'm in a transitional period so I don't wanna
                                                    kill you, I wanna help you.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="conversation-item item-right clearfix">
                                            <div class="conversation-user">
                                                <img src="/img/samples/kunis.png" alt="">
                                            </div>
                                            <div class="conversation-body">
                                                <div class="name">
                                                    Mila Kunis
                                                </div>
                                                <div class="time hidden-xs">
                                                    September 21, 2013 12:45
                                                </div>
                                                <div class="text">
                                                    Normally, both your asses would be dead as fucking fried chicken, but you
                                                    happen to pull this shit while I'm in a transitional period so I don't wanna
                                                    kill you, I wanna help you.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="conversation-item item-left clearfix">
                                            <div class="conversation-user">
                                                <img src="/img/samples/ryan.png" alt="">
                                            </div>
                                            <div class="conversation-body">
                                                <div class="name">
                                                    Ryan Gossling
                                                </div>
                                                <div class="time hidden-xs">
                                                    September 21, 2013 18:28
                                                </div>
                                                <div class="text">
                                                    I don't think they tried to market it to the billionaire, spelunking,
                                                    base-jumping crowd.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="conversation-item item-right clearfix">
                                            <div class="conversation-user">
                                                <img src="/img/samples/kunis.png" alt="">
                                            </div>
                                            <div class="conversation-body">
                                                <div class="name">
                                                    Mila Kunis
                                                </div>
                                                <div class="time hidden-xs">
                                                    September 21, 2013 12:45
                                                </div>
                                                <div class="text">
                                                    Normally, both your asses would be dead as fucking fried chicken, but you
                                                    happen to pull this shit while I'm in a transitional period so I don't wanna
                                                    kill you, I wanna help you.
                                                </div>
                                            </div>
                                        </div>

                                    </div><div class="slimScrollBar" style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            </div>
                            <div class="conversation-new-message">
                                <form>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="2" placeholder="Enter your message..."></textarea>
                                    </div>

                                    <div class="clearfix">
                                        <button type="submit" class="btn btn-success pull-right">Send message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
