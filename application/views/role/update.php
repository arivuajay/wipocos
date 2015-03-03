<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model application\models\MasterRole */

$this->title = 'Update Master Role: ' . ' ' . $model->Master_Role_ID;
$this->params['breadcrumbs'][] = ['label' => 'Security Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
$this->params['breadcrumbs'][] = $model->Master_Role_ID;
?>
<div class="master-role-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
