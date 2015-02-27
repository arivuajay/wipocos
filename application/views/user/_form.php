<?php

use application\models\MasterRole;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;


/* @var $this View */

//$this->title = $model->isNewRecord ? 'Create' : 'Update'. ' User';
?>
<style type="text/css">
    .statusfield label{
        visibility: hidden;
    }
    
    .statusfield label > div{
        visibility: visible;
    }
</style>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-12 col-xs-12">
        <!-- small box -->
        <div class="box box-primary">
            <!-- form start -->
            <?php $form = ActiveForm::begin(['id' => 'profile-form', 'options' => ['role' => 'form', 'class' => 'form-horizontal']]); ?>
            <div class="box-body">
                <div class="form-group">
                    <?= Html::activeLabel($model, 'username', ['class' => 'col-sm-2 control-label']) ?>
                    <div class="col-sm-5">
                        <?= $form->field($model, 'username', ['showLabels' => false])->textInput(['maxlength' => 255]); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <?= Html::activeLabel($model, 'name', ['class' => 'col-sm-2 control-label']) ?>
                    <div class="col-sm-5">
                        <?= $form->field($model, 'name', ['showLabels' => false])->textInput(['maxlength' => 255]); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <?= Html::activeLabel($model, 'email', ['class' => 'col-sm-2 control-label']) ?>
                    <div class="col-sm-5">
                        <?= $form->field($model, 'email', ['showLabels' => false])->textInput(['maxlength' => 255]); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <?= Html::activeLabel($model, 'role', ['class' => 'col-sm-2 control-label']) ?>
                    <div class="col-sm-5">
                        <?php $roles = ArrayHelper::map(MasterRole::find()->all(), 'Master_Role_ID', 'Description'); ?>
                        <?= $form->field($model, 'role', ['showLabels' => false])->dropDownList($roles) ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <?= Html::activeLabel($model, 'status', ['class' => 'col-sm-2 control-label']) ?>
                    <div class="col-sm-5 statusfield">
                        <?= $form->field($model, 'status', ['showLabels' => false])->checkbox()->label(FALSE); ?>
                    </div>
                </div>

            </div><!-- /.box-body -->

            <div class="box-footer">
                <div class="form-group">
                    <div class="col-sm-0 col-sm-offset-2">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->