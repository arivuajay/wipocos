<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model application\models\MasterRole */

$this->title = 'Create Role';
$this->params['breadcrumbs'][] = ['label' => 'Master Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-role-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
