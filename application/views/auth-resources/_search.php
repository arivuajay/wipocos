<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model application\models\AuthResourcesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-resources-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Master_Resource_ID') ?>

    <?= $form->field($model, 'Master_User_ID') ?>

    <?= $form->field($model, 'Master_Role_ID') ?>

    <?= $form->field($model, 'Master_Module_ID') ?>

    <?= $form->field($model, 'Master_Screen_ID') ?>

    <?php // echo $form->field($model, 'Master_Task_ADD') ?>

    <?php // echo $form->field($model, 'Master_Task_SEE') ?>

    <?php // echo $form->field($model, 'Master_Task_UPT') ?>

    <?php // echo $form->field($model, 'Master_Task_DEL') ?>

    <?php // echo $form->field($model, 'Active')->checkbox() ?>

    <?php // echo $form->field($model, 'Created_Date') ?>

    <?php // echo $form->field($model, 'Rowversion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
