<?php

/* @var $this yii\web\View */
/* @var $tweet \common\models\Tweets */
/* @var $time string */

?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <div class="main-box">
            <header class="main-box-header clearfix">
                <h2>Добавление Твита с меткой времени</h2>
            </header>
            <div class="main-box-body clearfix">
                <div class="social-box col-xs-12 twitter">
                    <i class="fa fa-twitter"></i>
                    <div class="clearfix">
                        <span class="social-action">Новый Твит!</span>
                    </div>
                    <div class="clearfix">
                        <span class="social-count"><?=$time?> Мск</span>
                    </div>
                    <span class="social-name">Твиттограмм</span>
                </div>
            </div>
        </div>
    </div>
</div>

