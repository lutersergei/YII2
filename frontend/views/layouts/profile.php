<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\BlogAsset;
use yii\helpers\Html;
use yii\helpers\Url;

BlogAsset::register($this);
?>
<?php $this->beginPage() ?>


    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>

        <title><?= Html::encode($this->title) ?></title>

        <?php $this->head() ?>

    </head>

    <body>

    <?php $this->beginBody() ?>

    <div class="navbar navbar-material-blog navbar-primary navbar-absolute-top">

        <div class="navbar-image" style="background-image: url('/img/technology/unsplash-6.jpg');background-position: center 40%;"></div>

        <div class="navbar-wrapper container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><i class="material-icons">&#xE871;</i>Главная</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">

                    <li><a href="<?= Url::to(['/blog/about']) ?>">О сайте</a></li>
                    <li><a href="<?= Url::to(['/blog/contact']) ?>">Контакты</a></li>
                    <?php
                    if (Yii::$app->user->isGuest):
                        ?>
                        <li><a href="<?= Url::to(['/user/signup']) ?>">Регистрация</a></li>
                        <li><a href="<?= Url::to(['/user/login']) ?>">Войти</a></li>
                        <?php
                    else:
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="<?= Url::to(['#']) ?>">
                                <?= Html::encode(Yii::$app->user->identity->lastname) . ' ' . Html::encode(Yii::$app->user->identity->firstname)?>
                                <b class="caret"></b>
                                <div class="ripple-container"></div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= Url::to(['/user/feed']) ?>"><i class="fa fa-th-list"></i> Моя лента</a></li>
                                <li><a href="<?= Url::to(['/user/profile']) ?>"><i class="fa fa-user"></i> Профиль</a></li>
                                <li><a href="<?= Url::to(['/user/logout']) ?>"><i class="fa fa-power-off"></i> Выйти</a></li>
                            </ul>
                        </li>
                        <?php
                    endif;
                    ?>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="/"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="/"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container blog-content">
        <div class="row">
            <div class="col-sm-12 blog-main">
                <?= $content ?>
            </div><!-- /.blog-main -->
        </div>

    </div><!-- /.container -->

    <footer class="blog-footer">

        <div id="links">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <i class="material-icons brand">&#xE871;</i>
                    </div>

                    <div class="col-sm-8 text-center offset">
                        <ul class="list-inline">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="page-about.html">About</a></li>
                            <li><a href="doc-buttons.html">Documentation</a></li>
                            <li><a href="page-contact.html">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-md-2 text-right offset">
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <button class="material-scrolltop primary" type="button"></button>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>