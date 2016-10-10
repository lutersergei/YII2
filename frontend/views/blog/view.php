<?php

/* @var $this yii\web\View */
/* @var $tweet \common\models\Tweets  */

$this->title = 'Твиттограмм';
?>
<div class="row">
    <div class="col-sm-12">
        <section class="blog-post">
            <div class="panel panel-default">
                <img src="<?= $tweet->image ?>" class="img-responsive">
                <div class="panel-body">
                    <div class="blog-post-meta">
                        <span class="label label-light label-primary">Тег</span>
                        <p class="blog-post-date pull-right">Дата</p>
                    </div>
                    <div class="blog-post-content">
                        <h2 class="blog-post-title"><?= $tweet->text ?></h2>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
