<?php

/* @var $this yii\web\View */
/* @var $tweet \common\models\Tweets */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <div class="main-box">
            <header class="main-box-header clearfix">
                <h2>Добавление ИнстаТвита</h2>
            </header>
            <div class="main-box-body clearfix">
                <?php
                $form = ActiveForm::begin([
                    'id' => 'new-tweet',
                    'options' => ['class' => 'form-horizontal'],
                ]) ?>
                    <?= $form->field($tweet, 'text')->textarea()->label('Текст Твита:') ?>
                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>
