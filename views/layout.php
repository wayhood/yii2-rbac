<?php

use yii\helpers\Html;

/**
 * @var $this  yii\web\View
 */

?>

<?= $this->render('/_alert', [
    'module' => Yii::$app->getModule('rbac'),
]) ?>

<?= $this->render('_menu') ?>

<div style="padding: 10px 0">
    <?= $content ?>
</div>