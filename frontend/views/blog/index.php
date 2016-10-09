<?php

/* @var $this yii\web\View */
/* @var $tweets \common\models\Tweets[]  */
/* @var $publishForm \frontend\models\PublishForm*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Твиттограмм';
?>

<div class="row">
    <div class="col-lg-12">
        <?php
        if (!Yii::$app->user->isGuest) {
            $form = ActiveForm::begin([
                'id' => 'publishForm',
                'options' => ['class' => 'form-horizontal'],
            ]);
            echo $form->field($publishForm, 'text')->textarea();
            echo $form->field($publishForm, 'image')->fileInput();
            ?>
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end();
        }?>
    </div>
    <?php
    foreach ($tweets as $tweet)
    {
        ?>
        <div class="col-sm-6">
            <section class="blog-post">
                <div class="panel panel-default">
                    <img src="<?= $tweet->image ?>" class="img-responsive">
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
        </div>

        <?php
    }
    ?>
</div>

<!--        <nav>-->
<!--            <ul class="pager">-->
<!--                <li><a class="withripple" href="#">Previous</a></li>-->
<!--                <li><a class="withripple" href="#">Next</a></li>-->
<!--            </ul>-->
<!--        </nav>-->