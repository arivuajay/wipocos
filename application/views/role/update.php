<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model application\models\MasterRole */

$this->title = 'Update Master Role: ' . ' ' . $model->Master_Role_ID;
$this->params['breadcrumbs'][] = ['label' => 'Master Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Master_Role_ID, 'url' => ['view', 'id' => $model->Master_Role_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="master-role-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
