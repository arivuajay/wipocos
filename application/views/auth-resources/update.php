<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model application\models\AuthResources */

$this->title = 'Update Auth Resources: ' . ' ' . $model->Master_Resource_ID;
$this->params['breadcrumbs'][] = ['label' => 'Auth Resources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Master_Resource_ID, 'url' => ['view', 'id' => $model->Master_Resource_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="auth-resources-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
