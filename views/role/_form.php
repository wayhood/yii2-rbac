<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation'   => true,
]) ?>

<?= $form->field($model, 'name')->hint(Yii::t('rbac', 'The name of the role.')) ?>

<?= $form->field($model, 'description')->hint(Yii::t('rbac', 'The role description (Optional).')) ?>

<?= $form->field($model, 'rule')->hint(Yii::t('rbac', 'Classname of the rule associated with this role')) ?>

<?= $form->field($model, 'children')->listBox($model->getUnassignedItems(), ['id' => 'children', 'multiple' => true]) ?>

<?= Html::submitButton(Yii::t('rbac', 'Save'), ['class' => 'btn btn-success btn-block']) ?>

<?php ActiveForm::end() ?>