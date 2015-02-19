<?php

use application\models\MasterRole;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model MasterRole */
/* @var $form ActiveForm */
?>

<div class="master-role-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Role_Code')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'Description')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'Active')->checkbox() ?>

    <?= $form->field($model, 'Created_Date')->textInput() ?>

    <?= $form->field($model, 'Rowversion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
