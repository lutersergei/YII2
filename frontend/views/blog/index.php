<?php

/* @var $this yii\web\View */
/* @var $tweets \common\models\Tweets[]  */

$this->title = 'Твиттограмм';
?>

<div class="row">
    <div class="col-sm-6">
        <?php
        foreach ($tweets as $tweet)
        {
            ?>
            <section class="blog-post">
                <div class="panel panel-default">
                    <img src="img/technology/unsplash-2.jpg" class="img-responsive">
                    <div class="panel-body">
                        <div class="blog-post-meta">
                            <span class="label label-light label-primary">Тег</span>
                            <p class="blog-post-date pull-right">Дата</p>
                        </div>
                        <div class="blog-post-content">
                            <a href="post-image.html">
                                <h2 class="blog-post-title">Заголовок</h2>
                            </a>
                            <p><?= $tweet->text ?></p>
                            <a class="btn btn-info" href="/index.php?r=blog/view&id=<?=$tweet->id?>">Читать...</a>
                        </div>
                    </div>
                </div>
            </section><!-- /.blog-post -->
            <?php
        }
        ?>
    </div>
    <div class="col-sm-6">
        <section class="blog-post">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="blog-post-meta">
                        <span class="label label-light label-info">Branding</span>
                        <p class="blog-post-date pull-right">Februari 11, 2016</p>
                    </div>
                    <div class="blog-post-content">
                        <a href="post-image.html">
                            <h2 class="blog-post-title">In a glass of water</h2>
                        </a>
                        <p>Donec ut libero sed arcu vehicula ultricies a non tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem.</p>
                        <p>Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna consequat sagittis. Curabitur dapibus enim sit amet elit pharetra.</p>
                        <a class="btn btn-info" href="post-image.html">Read more</a>
                        <a class="blog-post-share pull-right" href="#">
                            <i class="material-icons"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section><!-- /.blog-post -->
        <section class="blog-post">
            <div class="panel panel-default">
                <img src="img/technology/unsplash-4.jpg" class="img-responsive">
                <div class="panel-body">
                    <div class="blog-post-meta">
                        <span class="label label-light label-primary">News</span>
                        <p class="blog-post-date pull-right">January 24, 2016</p>
                    </div>
                    <div class="blog-post-content">
                        <a href="post-image.html">
                            <h2 class="blog-post-title">I glide and swan</h2>
                        </a>
                        <p>Donec ut libero sed arcu vehicula ultricies a non tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem.</p>
                        <a class="btn btn-info" href="post-image.html">Read more</a>
                        <a class="blog-post-share pull-right" href="#">
                            <i class="material-icons"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section><!-- /.blog-post -->
        <section class="blog-post">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="blog-post-meta">
                        <span class="label label-light label-warning">Apps</span>
                        <p class="blog-post-date pull-right">January 3, 2016</p>
                    </div>
                    <div class="blog-post-content">
                        <a href="post-image.html">
                            <h2 class="blog-post-title">In the universe</h2>
                        </a>
                        <p>Donec ut libero sed arcu vehicula ultricies a non tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ut gravida lorem.</p>
                        <p>Ut turpis felis, pulvinar a semper sed, adipiscing id dolor. Pellentesque auctor nisi id magna consequat sagittis. Curabitur dapibus enim sit amet elit pharetra.</p>
                        <a class="btn btn-info" href="post-image.html">Read more</a>
                        <a class="blog-post-share pull-right" href="#">
                            <i class="material-icons"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section><!-- /.blog-post -->
    </div>
</div>
<!--        <nav>-->
<!--            <ul class="pager">-->
<!--                <li><a class="withripple" href="#">Previous</a></li>-->
<!--                <li><a class="withripple" href="#">Next</a></li>-->
<!--            </ul>-->
<!--        </nav>-->