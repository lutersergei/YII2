<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\BlogAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\ActiveForm;


BlogAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <?php $this->head() ?>
</head>
<body class="theme-whbl">
<?php $this->beginBody() ?>

<div id="theme-wrapper">
    <header class="navbar" id="header-navbar">
        <div class="container">
            <a href="index.html" id="logo" class="navbar-brand">
                <img src="img/logo.png" alt="" class="normal-logo logo-white"/>
                <img src="img/logo-black.png" alt="" class="normal-logo logo-black"/>
                <img src="img/logo-small.png" alt="" class="small-logo hidden-xs hidden-sm hidden"/>
            </a>

            <div class="clearfix">
                <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bars"></span>
                </button>

                <div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
                    <ul class="nav navbar-nav pull-left">
                        <li>
                            <a class="btn" id="make-small-nav">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a class="btn dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>
                                <span class="count">8</span>
                            </a>
                            <ul class="dropdown-menu notifications-list">
                                <li class="pointer">
                                    <div class="pointer-inner">
                                        <div class="arrow"></div>
                                    </div>
                                </li>
                                <li class="item-header">You have 6 new notifications</li>
                                <li class="item">
                                    <a href="#">
                                        <i class="fa fa-comment"></i>
                                        <span class="content">New comment on ‘Awesome P...</span>
                                        <span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="#">
                                        <i class="fa fa-plus"></i>
                                        <span class="content">New user registration</span>
                                        <span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="#">
                                        <i class="fa fa-envelope"></i>
                                        <span class="content">New Message from George</span>
                                        <span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="#">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="content">New purchase</span>
                                        <span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="#">
                                        <i class="fa fa-eye"></i>
                                        <span class="content">New order</span>
                                        <span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
                                    </a>
                                </li>
                                <li class="item-footer">
                                    <a href="#">
                                        View all notifications
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a class="btn dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="count">16</span>
                            </a>
                            <ul class="dropdown-menu notifications-list messages-list">
                                <li class="pointer">
                                    <div class="pointer-inner">
                                        <div class="arrow"></div>
                                    </div>
                                </li>
                                <li class="item first-item">
                                    <a href="#">
                                        <img src="img/samples/messages-photo-1.png" alt=""/>
                                        <span class="content">
											<span class="content-headline">
												George Clooney
											</span>
											<span class="content-text">
												Look, just because I don't be givin' no man a foot massage don't make it
												right for Marsellus to throw...
											</span>
										</span>
                                        <span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="#">
                                        <img src="img/samples/messages-photo-2.png" alt=""/>
                                        <span class="content">
											<span class="content-headline">
												Emma Watson
											</span>
											<span class="content-text">
												Look, just because I don't be givin' no man a foot massage don't make it
												right for Marsellus to throw...
											</span>
										</span>
                                        <span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="#">
                                        <img src="img/samples/messages-photo-3.png" alt=""/>
                                        <span class="content">
											<span class="content-headline">
												Robert Downey Jr.
											</span>
											<span class="content-text">
												Look, just because I don't be givin' no man a foot massage don't make it
												right for Marsellus to throw...
											</span>
										</span>
                                        <span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
                                    </a>
                                </li>
                                <li class="item-footer">
                                    <a href="#">
                                        View all messages
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a class="btn dropdown-toggle" data-toggle="dropdown">
                                New Item
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="item">
                                    <a href="#">
                                        <i class="fa fa-archive"></i>
                                        New Product
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="#">
                                        <i class="fa fa-shopping-cart"></i>
                                        New Order
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="#">
                                        <i class="fa fa-sitemap"></i>
                                        New Category
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="#">
                                        <i class="fa fa-file-text"></i>
                                        New Page
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a class="btn dropdown-toggle" data-toggle="dropdown">
                                English
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="item">
                                    <a href="#">
                                        Spanish
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="#">
                                        German
                                    </a>
                                </li>
                                <li class="item">
                                    <a href="#">
                                        Italian
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="nav-no-collapse pull-right" id="header-nav">
                    <ul class="nav navbar-nav pull-right">
                        <li class="mobile-search">
                            <a class="btn">
                                <i class="fa fa-search"></i>
                            </a>

                            <div class="drowdown-search">
                                <form role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="fa fa-search nav-search-icon"></i>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="dropdown profile-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="img/samples/scarlet-159.png" alt=""/>
                                <span class="hidden-xs">Scarlett Johansson</span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="user-profile.html"><i class="fa fa-user"></i>Profile</a></li>
                                <li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>Messages</a></li>
                                <li><a href="#"><i class="fa fa-power-off"></i>Logout</a></li>
                            </ul>
                        </li>

                            <?php
                            if (!Yii::$app->user->isGuest)
                            {
                                echo '<li>' . Html::beginForm(['/site/logout'], 'post')
                                . Html::submitInput(
                                    'Выйти (' . Yii::$app->user->identity->username . ')',
                                    ['class' => 'btn btn-danger']
                                )
                                . Html::endForm()
                                . '</li>';
                            }
                            ?>

                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div id="page-wrapper" class="container">
        <div class="row">
            <div id="nav-col">
                <section id="col-left" class="col-left-nano">
                    <div id="col-left-inner" class="col-left-nano-content">
                        <div id="user-left-box" class="clearfix hidden-sm hidden-xs dropdown profile2-dropdown">
                            <img alt="" src="img/samples/scarlet-159.png" />
                            <div class="user-box">
									<span class="name">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											Scarlett J.
											<i class="fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu">
											<li><a href="user-profile.html"><i class="fa fa-user"></i>Profile</a></li>
											<li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
											<li><a href="#"><i class="fa fa-envelope-o"></i>Messages</a></li>
											<li><a href="#"><i class="fa fa-power-off"></i>Logout</a></li>
										</ul>
									</span>
                                <span class="status">
										<i class="fa fa-circle"></i> Online
									</span>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
                            <ul class="nav nav-pills nav-stacked">
                                <li class="nav-header nav-header-first hidden-sm hidden-xs">
                                    Navigation
                                </li>
                                <li class="active">
                                    <a href="#" class="dropdown-toggle">
                                        <i class="fa fa-plus-square"></i>
                                        <span>Add tweet</span>
                                        <i class="fa fa-angle-right drop-icon"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="/index.php?r=site/new-tweet">
                                                <i class="fa  fa-comment-o"></i>
                                                <span>Text</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/index.php?r=site/tweet-timestamp">
                                                <i class="fa fa-clock-o"></i>
                                                <span>Timestamp</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="fa fa-table"></i>
                                        <span>Tables</span>
                                        <i class="fa fa-angle-right drop-icon"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="tables.html">
                                                Simple
                                            </a>
                                        </li>
                                        <li>
                                            <a href="tables-advanced.html">
                                                Advanced
                                            </a>
                                        </li>
                                        <li>
                                            <a href="users.html">
                                                Users
                                            </a>
                                        </li>
                                        <li>
                                            <a href="tables-footables.html">
                                                FooTables
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="fa fa-envelope"></i>
                                        <span>Email</span>
                                        <i class="fa fa-angle-right drop-icon"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="email-inbox.html">
                                                Inbox
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-detail.html">
                                                Detail
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-compose.html">
                                                Compose
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="fa fa-bar-chart-o"></i>
                                        <span>Graphs</span>
                                        <i class="fa fa-angle-right drop-icon"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="graphs-morris.html">
                                                Morris &amp; Mixed
                                            </a>
                                        </li>
                                        <li>
                                            <a href="graphs-flot.html">
                                                Flot
                                            </a>
                                        </li>
                                        <li>
                                            <a href="graphs-dygraphs.html">
                                                Dygraphs
                                            </a>
                                        </li>
                                        <li>
                                            <a href="graphs-xcharts.html">
                                                xCharts
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="widgets.html">
                                        <i class="fa fa-th-large"></i>
                                        <span>Widgets</span>
                                        <span class="label label-success pull-right">New</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="fa fa-copy"></i>
                                        <span>Pages</span>
                                        <i class="fa fa-angle-right drop-icon"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="calendar.html">
                                                Calendar
                                            </a>
                                        </li>
                                        <li>
                                            <a href="gallery.html">
                                                Gallery
                                            </a>
                                        </li>
                                        <li>
                                            <a href="gallery-v2.html">
                                                Gallery v2
                                            </a>
                                        </li>
                                        <li>
                                            <a href="pricing.html">
                                                Pricing
                                            </a>
                                        </li>
                                        <li>
                                            <a href="projects.html">
                                                Projects
                                            </a>
                                        </li>
                                        <li>
                                            <a href="team-members.html">
                                                Team Members
                                            </a>
                                        </li>
                                        <li>
                                            <a href="timeline.html">
                                                Timeline
                                            </a>
                                        </li>
                                        <li>
                                            <a href="timeline-grid.html">
                                                Timeline Grid
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html">
                                                User Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="search.html">
                                                Search Results
                                            </a>
                                        </li>
                                        <li>
                                            <a href="invoice.html">
                                                Invoice
                                            </a>
                                        </li>
                                        <li>
                                            <a href="intro.html">
                                                Tour Layout
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-header hidden-sm hidden-xs">
                                    Components
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="fa fa-edit"></i>
                                        <span>Forms</span>
                                        <i class="fa fa-angle-right drop-icon"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="form-elements.html">
                                                Elements
                                            </a>
                                        </li>
                                        <li>
                                            <a href="x-editable.html">
                                                X-Editable
                                            </a>
                                        </li>
                                        <li>
                                            <a href="form-wizard.html">
                                                Wizard
                                            </a>
                                        </li>
                                        <li>
                                            <a href="form-wizard-popup.html">
                                                Wizard popup
                                            </a>
                                        </li>
                                        <li>
                                            <a href="form-wysiwyg.html">
                                                WYSIWYG
                                            </a>
                                        </li>
                                        <li>
                                            <a href="form-summernote.html">
                                                WYSIWYG Summernote
                                            </a>
                                        </li>
                                        <li>
                                            <a href="form-ckeditor.html">
                                                WYSIWYG CKEditor
                                            </a>
                                        </li>
                                        <li>
                                            <a href="form-dropzone.html">
                                                Multiple File Upload
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="fa fa-desktop"></i>
                                        <span>UI Kit</span>
                                        <i class="fa fa-angle-right drop-icon"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="ui-elements.html">
                                                Elements
                                            </a>
                                        </li>
                                        <li>
                                            <a href="notifications.html">
                                                Notifications &amp; Alerts
                                            </a>
                                        </li>
                                        <li>
                                            <a href="modals.html">
                                                Modals
                                            </a>
                                        </li>
                                        <li>
                                            <a href="video.html">
                                                Video
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-toggle">
                                                Icons
                                                <i class="fa fa-angle-right drop-icon"></i>
                                            </a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="icons-awesome.html">
                                                        Awesome Icons
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="icons-halflings.html">
                                                        Halflings Icons
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="ui-nestable.html">
                                                Nestable List
                                            </a>
                                        </li>
                                        <li>
                                            <a href="typography.html">
                                                Typography
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown-toggle">
                                                3 Level Menu
                                                <i class="fa fa-angle-right drop-icon"></i>
                                            </a>
                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">
                                                        3rd Level
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        3rd Level
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        3rd Level
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="maps.html">
                                        <i class="fa fa-map-marker"></i>
                                        <span>Google Maps</span>
                                        <span class="label label-danger pull-right">Updated</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="fa fa-file-text-o"></i>
                                        <span>Extra pages</span>
                                        <i class="fa fa-angle-right drop-icon"></i>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="faq.html">
                                                FAQ
                                            </a>
                                        </li>
                                        <li>
                                            <a href="emails.html">
                                                Email Templates
                                            </a>
                                        </li>
                                        <li>
                                            <a href="login.html">
                                                Login
                                            </a>
                                        </li>
                                        <li>
                                            <a href="login-full.html">
                                                Login Full
                                            </a>
                                        </li>
                                        <li>
                                            <a href="registration.html">
                                                Registration
                                            </a>
                                        </li>
                                        <li>
                                            <a href="registration-full.html">
                                                Registration Full
                                            </a>
                                        </li>
                                        <li>
                                            <a href="forgot-password.html">
                                                Forgot Password
                                            </a>
                                        </li>
                                        <li>
                                            <a href="forgot-password-full.html">
                                                Forgot Password Full
                                            </a>
                                        </li>
                                        <li>
                                            <a href="lock-screen.html">
                                                Lock Screen
                                            </a>
                                        </li>
                                        <li>
                                            <a href="lock-screen-full.html">
                                                Lock Screen Full
                                            </a>
                                        </li>
                                        <li>
                                            <a href="error-404.html">
                                                Error 404
                                            </a>
                                        </li>
                                        <li>
                                            <a href="error-404-v2.html">
                                                Error 404 Nested
                                            </a>
                                        </li>
                                        <li>
                                            <a href="error-500.html">
                                                Error 500
                                            </a>
                                        </li>
                                        <li>
                                            <a href="extra-grid.html">
                                                Grid
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/angularjs">
                                        <i class="fa fa-google"></i>
                                        <span>AngularJS Demo</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
                <div id="nav-col-submenu"></div>
            </div>
            <div id="content-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>