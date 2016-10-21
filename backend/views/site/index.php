<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'My Yii Application';
?>
<div class="main-box clearfix">
    <header class="main-box-header clearfix">
        <h2>Начальная страница</h2>
    </header>

    <div class="main-box-body clearfix">
        <div class="row">
            <div class="col-lg-12">
<!--                <button type="button" class="btn btn-default">Default</button>-->
<!---->
<!--                <button type="button" class="btn btn-primary">Primary</button>-->
<!---->
<!--                <button type="button" class="btn btn-success">Success</button>-->
<!---->
<!--                <button type="button" class="btn btn-info">Info</button>-->
<!---->
<!--                <button type="button" class="btn btn-warning">Warning</button>-->
<!---->
<!--                <button type="button" class="btn btn-danger">Danger</button>-->
<!---->
<!--                <button type="button" class="btn btn-link">Link</button>-->
<!---->
<!--                <br><br>-->
<!---->
<!--                <div class="btn-group">-->
<!--                    <button type="button" class="btn btn-default">Left</button>-->
<!--                    <button type="button" class="btn btn-default">Middle</button>-->
<!--                    <button type="button" class="btn btn-default">Right</button>-->
<!--                </div>-->
<!---->
<!--                <br><br>-->
<!---->
<!--                <div class="btn-group">-->
<!--                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">-->
<!--                        Action <span class="caret"></span>-->
<!--                    </button>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else here</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!---->
<!--                <div class="btn-group">-->
<!--                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">-->
<!--                        Action <span class="caret"></span>-->
<!--                    </button>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else here</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!---->
<!--                <div class="btn-group">-->
<!--                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">-->
<!--                        Action <span class="caret"></span>-->
<!--                    </button>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else here</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!---->
<!--                <div class="btn-group">-->
<!--                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">-->
<!--                        Action <span class="caret"></span>-->
<!--                    </button>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else here</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!---->
<!--                <br><br>-->
<!---->
<!--                <div class="btn-group">-->
<!--                    <button type="button" class="btn btn-default">Action</button>-->
<!--                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">-->
<!--                        <span class="caret"></span>-->
<!--                    </button>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else here</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!---->
<!--                <div class="btn-group">-->
<!--                    <button type="button" class="btn btn-primary">Action</button>-->
<!--                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">-->
<!--                        <span class="caret"></span>-->
<!--                    </button>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else here</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!---->
<!--                <div class="btn-group">-->
<!--                    <button type="button" class="btn btn-success">Action</button>-->
<!--                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">-->
<!--                        <span class="caret"></span>-->
<!--                    </button>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else here</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!---->
<!--                <div class="btn-group">-->
<!--                    <button type="button" class="btn btn-danger">Action</button>-->
<!--                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">-->
<!--                        <span class="caret"></span>-->
<!--                    </button>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else here</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!---->
<!--                <div class="btn-group">-->
<!--                    <button type="button" class="btn btn-info"><i class="fa fa-cloud-download"></i></button>-->
<!--                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">-->
<!--                        <span class="caret"></span>-->
<!--                    </button>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="#">Action</a></li>-->
<!--                        <li><a href="#">Another action</a></li>-->
<!--                        <li><a href="#">Something else here</a></li>-->
<!--                        <li class="divider"></li>-->
<!--                        <li><a href="#">Separated link</a></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!---->
<!--                <br><br>-->

                <a href="<?= Url::to(['site/users'  ]) ?>" type="button" class="btn btn-primary btn-lg">
                    <span class="fa fa-users"></span> Пользователи
                </a>

                <a href="<?= Url::to(['site/feed']) ?>" type="button" class="btn btn-primary btn-lg">
                    <span class="fa fa-th-list"></span> Твиты
                </a>

                <a href="<?= Url::to(['page/index']) ?>" type="button" class="btn btn-primary btn-lg">
                    <span class="fa fa-th-list"></span> Страницы
                </a>

<!--                <button type="button" class="btn btn-success btn-lg">-->
<!--                    <span class="fa fa-heart"></span> Icon button-->
<!--                </button>-->
<!---->
<!--                <button type="button" data-loading-text="Loading..." class="btn btn-primary btn-lg" id="btn-loading-demo">-->
<!--                    Loading button-->
<!--                </button>-->

            </div>
        </div>
    </div>
</div>