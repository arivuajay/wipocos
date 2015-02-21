<?php

use application\models\MasterModule;
use application\models\MasterRole;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Users';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

//echo Yii::$app->authManager->getRolesByUser($user_id);

$users = ArrayHelper::map(User::find()->orderBy('username ASC')->asArray()->all(), 'id', 'username');
$modules = ArrayHelper::map(MasterModule::find()->orderBy('Description')->asArray()->all(), 'Master_Module_ID', 'Description');
?>
<div class="user-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <div class="master-role-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?= $form->field($model, 'Master_User_ID')->dropDownList($users, [
                    'prompt' => 'Choose User',
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
                    . 'if($("#authresources-master_user_id").val() != "" && this.value != ""){'
                        . '$("#ajax-loader").show();'
                        . '$.get("' . Yii::$app->urlManager->createUrl(["auth-resources/get-screens-by-module"]) . '", { 
                            type: "user", 
                            mid: this.value, 
                            id: $("#authresources-master_user_id").val() }
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
