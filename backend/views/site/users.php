<?php

/* @var $this yii\web\View */
/* @var $users \common\models\User[]*/
/* @var $roles array */
/* @var $message string*/

use yii\helpers\Html;
use common\models\User;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box no-header clearfix">
            <div class="main-box-body clearfix">
                <div class="table-responsive">
                    <table class="table user-list table-hover">
                        <thead>
                        <tr>
                            <th><span>Пользователь</span></th>
                            <th><span>Создан</span></th>
                            <th class="text-center"><span>Статус</span></th>
                            <th><span>Email</span></th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($users as $user)
                        {
                            ?>
                            <tr>
                                <td>
                                    <img src="/img/samples/scarlet-159.png" alt="">
                                    <a href="#" class="user-link"><?= $user->username ?></a>
                                    <span class="user-subhead"><?php
                                        //Не уверен что такой способ оптимальный
                                        foreach ($roles as $k => $v)
                                        {
                                            if ($k === $user->role)
                                            {
                                                echo $v;
                                                break;
                                            }
                                        }
                                        ?></span>
                                </td>
                                <td>
                                    <?php
                                    $date = new DateTime();
                                    $date->setTimestamp($user->created_at);
                                    echo $date->format('Y/m/d');
                                    ?>
                                </td>
                                <td class="text-center">
                                    <?php
                                    if ($user->status === User::STATUS_ACTIVE)
                                    {
                                        echo "<span class=\"label label-success\">Активен</span>";
                                    }
                                    if ($user->status === User::STATUS_DELETED)
                                    {
                                        echo "<span class=\"label label-danger\">Удален</span>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?= Html::mailto($user->email) ?>
                                </td>
                                <td style="width: 20%;">
                                    <a href="#" class="table-link">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                    </span>
                                    </a>
                                    <a href="#" class="table-link">
                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                    </span>
                                    </a>

                                    <a href="<?=  Url::to(['site/user-delete', 'id' => $user->id]); ?>" class="table-link danger">

                                    <span class="fa-stack">
                                        <i class="fa fa-square fa-stack-2x"></i>
                                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                    </span>
                                    </a>

                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
        if ($message !== null)
        {
        ?>
            <div class="alert alert-danger fade in">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-times-circle fa-fw fa-lg"></i>
                <strong>Ошибка!</strong> <?= $message ?>
            </div>
        <?php
        }
        ?>
    </div>
</div>