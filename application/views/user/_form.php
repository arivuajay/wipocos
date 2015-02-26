<?php

use kartik\form\ActiveForm;
use yii\helpers\Html;
use yii\web\View;


/* @var $this View */

$this->title = 'Create User';
$this->params['breadcrumbs'] = [$this->title];
?>
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

                <?= $form->field($model, 'username')->textInput(['maxlength' => 255])->label(null, ['class' => 'col-sm-2 control-label']) ?>
                <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
                <?= $form->field($model, 'auth_key')->textInput(['maxlength' => 32]) ?>
                <?= $form->field($model, 'password_hash')->textInput(['maxlength' => 255]) ?>
                <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => 255]) ?>
                <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
                <?= $form->field($model, 'role')->textInput() ?>
                <?= $form->field($model, 'status')->textInput() ?>
                <?= $form->field($model, 'created_at')->textInput() ?>
                <?= $form->field($model, 'updated_at')->textInput() ?>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->