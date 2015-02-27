<?php

use application\models\MasterRole;
use yii\helpers\Html;
use yii\web\View;
use kartik\form\ActiveForm;

/* @var $this View */
/* @var $model MasterRole */
/* @var $form ActiveForm */
?>

<style type="text/css">
    .statusfield label{
        visibility: hidden;
    }
    
    .statusfield label > div{
        visibility: visible;
    }
</style>

<div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
            <?php $form = ActiveForm::begin(['options' => ['role' => 'form', 'class' => 'form-horizontal']]); ?>
            <div class="box-body">
                <div class="form-group">
                    <?= Html::activeLabel($model, 'Role_Code', ['class' => 'col-sm-2 control-label']) ?>
                    <div class="col-sm-5">
                        <?= $form->field($model, 'Role_Code', ['showLabels' => false])->textInput(['maxlength' => 45]) ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <?= Html::activeLabel($model, 'Description', ['class' => 'col-sm-2 control-label']) ?>
                    <div class="col-sm-5">
                        <?= $form->field($model, 'Description', ['showLabels' => false])->textInput(['maxlength' => 100]) ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <?= Html::activeLabel($model, 'Active', ['class' => 'col-sm-2 control-label']) ?>
                    <div class="col-sm-5 statusfield">
                        <?= $form->field($model, 'Active', ['showLabels' => false])->checkbox()->label(FALSE); ?>
                    </div>
                </div>

            </div>

            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-0 col-sm-offset-2">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

