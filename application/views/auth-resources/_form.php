<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model application\models\AuthResources */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-resources-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Master_User_ID')->textInput() ?>

    <?= $form->field($model, 'Master_Role_ID')->textInput() ?>

    <?= $form->field($model, 'Master_Module_ID')->textInput() ?>

    <?= $form->field($model, 'Master_Screen_ID')->textInput() ?>

    <?= $form->field($model, 'Master_Task_ADD')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Master_Task_SEE')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Master_Task_UPT')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Master_Task_DEL')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Active')->checkbox() ?>

    <?= $form->field($model, 'Created_Date')->textInput() ?>

    <?= $form->field($model, 'Rowversion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
