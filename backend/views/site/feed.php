<?php
/* @var $this yii\web\View */
/* @var $tweets \common\models\Tweets[]*/

use yii\helpers\Html;
use common\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="main-box feed">
        <header class="main-box-header clearfix">
            <h2 class="pull-left">Список твитов</h2>
        </header>

        <div class="main-box-body clearfix">
            <ul class="widget-todo">
                <?php
                foreach ($tweets as $tweet)
                {
                ?>
                    <li class="clearfix">
                        <div>
                            <p>
                                <?= $tweet->user->username ?>
                            </p>
                        </div>
                        <div class="time-ago">
                            <i class="fa fa-clock-o"></i> <?= $tweet->create_at ?>
                        </div>
                        <div class="name">
                            <p>
                                <?= $tweet->text ?>
                            </p>
                        </div>
                        <div class="actions">
                            <a href="<?= Url::to(['site/tweet-delete', 'id'=> $tweet->id]) ?>" class="table-link danger">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
