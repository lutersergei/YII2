<?php

/* @var $page \common\models\Page */
/* @var $this yii\web\View */

$this->title = $page->title;

?>
<div class="page-default-index">
    <h1><?= $page->title ?></h1>
    <p>
        <?= $page->text ?>
    </p>
</div>