<?php

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */

$this->title = 'My Profile';
$this->params['breadcrumbs'] = ['My Profile'];
?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-12 col-xs-12">
        <!-- small box -->
        <div class="box box-primary">
            <!-- form start -->
            <?php $form = ActiveForm::begin(['id' => 'profile-form', 'options'=>['role' => 'form']]); ?>
            <div class="box-body">
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'new_password')->passwordInput() ?>
                <?= $form->field($model, 'confirm_password')->passwordInput() ?>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div><!-- ./col -->
</div><!-- /.row -->

<?php 
$script = <<< JS
    $(document).ready(function(){
        $(':password').val('');
    });
JS;
$this->registerJs($script, View::POS_END);
?>
