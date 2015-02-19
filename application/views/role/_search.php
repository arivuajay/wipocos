<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model application\models\MasterRoleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="master-role-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Master_Role_ID') ?>

    <?= $form->field($model, 'Role_Code') ?>

    <?= $form->field($model, 'Description') ?>

    <?= $form->field($model, 'Active')->checkbox() ?>

    <?= $form->field($model, 'Created_Date') ?>

    <?php // echo $form->field($model, 'Rowversion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
