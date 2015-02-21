<?php

use application\models\MasterModule;
use application\models\MasterRole;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Roles';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

//echo Yii::$app->authManager->getRolesByUser($user_id);

$roles = ArrayHelper::map(MasterRole::find()->orderBy('Master_Role_ID DESC')->asArray()->all(), 'Master_Role_ID', 'Description');
$modules = ArrayHelper::map(MasterModule::find()->orderBy('Description')->asArray()->all(), 'Master_Module_ID', 'Description');
?>
<div class="user-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <div class="master-role-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?= $form->field($model, 'Master_Role_ID')->dropDownList($roles, [
                    'prompt' => 'Choose Role',
                    'onchange' => '{'
                    . '$("#authresources-master_module_id").val("");'
                    . '$("#resources-block").html("");'
                    . '}'
                    ]); ?>
            </div>
            <div class="col-lg-6 col-md-6">
                <?=
                $form->field($model, 'Master_Module_ID')->dropDownList($modules, [
                    'prompt' => 'Choose Module',
                    'onchange' => '{'
                    . 'if($("#authresources-master_role_id").val() != "" && this.value != ""){'
                        . '$("#ajax-loader").show();'
                        . '$.get("' . Yii::$app->urlManager->createUrl(["auth-resources/get-screens-by-module"]) . '", { 
                            type: "role", 
                            mid: this.value, 
                            id: $("#authresources-master_role_id").val() }
                            ).done(function( data ){
                                $("#ajax-loader").hide();
                                $("#resources-block").html( data );
                           });'
                        .'}else{'
                        . '$("#resources-block").html("");'
                        .'}'
                    .'}'
                    
                ]);
                ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <div id="ajax-loader" class="text-center" style="display: none">
            <?= Html::img(Yii::$app->request->BaseUrl.'/adminlte/img/ajax-loader1.gif'); ?>
        </div>
        
        <div id="resources-block">
        </div>


    </div>

</div>
