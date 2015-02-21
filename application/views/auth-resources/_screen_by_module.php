<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
//    'method' => 'post',
//    'action' => ['auth-resources/get-screens-by-module'],
]);
?>

<div class="row">
    <div class="col-lg-12 col-md-12" id="resources-block">
        <table class="table table-striped table-bordered">
            <thead class="bg-green">
            <td align="center" width="40%"><strong>Screen Name</strong></td>
            <td align="center" width="15%"><strong>Add</strong></td>
            <td align="center" width="15%"><strong>View</strong></td>
            <td align="center" width="15%"><strong>Update</strong></td>
            <td align="center" width="15%"><strong>Delete</strong></td>
            </thead>
            <tbody>
                <?php
                if(empty($exist_resources)){
                    foreach ($masters as $master) {
                        echo Html::activeHiddenInput($model,'Master_Module_ID', array('value' => $master->Module_ID, 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Module_ID]'));
                        if($type == 'role'){
                            echo Html::activeHiddenInput($model,'Master_Role_ID', array('value' => $id, 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Role_ID]'));
                        }else if($type == 'user'){
                            echo Html::activeHiddenInput($model,'Master_User_ID', array('value' => $id, 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_User_ID]'));
                        }
                        echo Html::activeHiddenInput($model,'Master_Screen_ID', array('value' => $master->Master_Screen_ID, 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Screen_ID]'));
                        echo '<tr class="text-center">';
                        echo '<td>' . $master->Description . '</td>';
                        echo '<td>' . $form->field($model, 'Master_Task_ADD')->checkBox(array('label' => '', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_ADD]')) . '</td>';
                        echo '<td>' . $form->field($model, 'Master_Task_SEE')->checkBox(array('label' => '', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_SEE]')) . '</td>';
                        echo '<td>' . $form->field($model, 'Master_Task_UPT')->checkBox(array('label' => '', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_UPT]')) . '</td>';
                        echo '<td>' . $form->field($model, 'Master_Task_DEL')->checkBox(array('label' => '', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_DEL]')) . '</td>';
                        echo '</tr>';
                    }
                }else{
                    foreach ($exist_resources as $master) {
                        echo Html::activeHiddenInput($master,'Master_Resource_ID', array('value' => $master->Master_Resource_ID, 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Resource_ID]'));
                        echo '<tr class="text-center">';
                        echo '<td>' . $master->masterScreen->Description. '</td>';
                        echo '<td>' . $form->field($master, 'Master_Task_ADD')->checkBox(array('label' => '', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_ADD]')) . '</td>';
                        echo '<td>' . $form->field($master, 'Master_Task_SEE')->checkBox(array('label' => '', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_SEE]')) . '</td>';
                        echo '<td>' . $form->field($master, 'Master_Task_UPT')->checkBox(array('label' => '', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_UPT]')) . '</td>';
                        echo '<td>' . $form->field($master, 'Master_Task_DEL')->checkBox(array('label' => '', 'name' => 'AuthResources[' . $master->Master_Screen_ID . '][Master_Task_DEL]')) . '</td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div class="form-group">
<?= Html::submitButton(empty($exist_resources) ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>
