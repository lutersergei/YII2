<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>

<div id="login-box-holder">
    <div class="row">
        <div class="col-xs-12">
            <header id="login-header">
                <div id="login-logo">
                    <img src="/img/logo.png" alt=""/>
                </div>
            </header>
            <div id="login-box-inner">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?php
                echo $form->field($model, 'username', [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('username'),
                    ],
                    'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>{input}</div>',
                ])->label(false);
                echo $form->field($model, 'password', [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('password'),
                    ],
                    'inputTemplate' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-key"></i></span>{input}</div>',
                ])->label(false);
                ?>
                    <div id="remember-me-wrapper">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="checkbox-nice">
                                    <input type="checkbox" id="remember-me" checked="checked" />
                                    <label for="remember-me"> Запомнить меня</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?= Html::submitButton('Login', ['class' => 'btn btn-success col-xs-12', 'name' => 'login-button']) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<!--<div id="login-box-footer">-->
<!--    <div class="row">-->
<!--        <div class="col-xs-12">-->
<!--            Do not have an account?-->
<!--            <a href="/index.php?r=site/register">-->
<!--                Register now-->
<!--            </a>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->