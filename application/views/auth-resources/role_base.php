<?php

use application\models\MasterModule;
use application\models\MasterRole;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$roles = ArrayHelper::map(MasterRole::find()->orderBy('Master_Role_ID DESC')->asArray()->all(), 'Master_Role_ID', 'Description');
$modules = ArrayHelper::map(MasterModule::find()->orderBy('Description')->asArray()->all(), 'Master_Module_ID', 'Description');
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="master-role-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?= $form->field($model, 'Master_Role_ID')->dropDownList($roles, ['prompt' => '']); ?>
            </div>
            <div class="col-lg-6 col-md-6">
                <?=
                $form->field($model, 'Master_Module_ID')->dropDownList($modules, [
                    'prompt' => 'Choose Module',
                    'onchange' => '$.post("' . Yii::$app->urlManager->createUrl(["auth-resources/get-screens-by-module", "mid" => 1]) . '",function( data ){
                                        $("#resources-block").html( data );
                                   })'
                ]);
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12" id="resources-block">
                <table class="table table-striped table-bordered">
                    <thead class="bg-green">
                    <td align="center">Screen Name</td>
                    <td align="center">Add</td>
                    <td align="center">View</td>
                    <td align="center">Update</td>
                    <td align="center">Delete</td>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
