<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model application\models\MasterRole */

$this->title = 'View Role #'.$model->Master_Role_ID;
$this->params['breadcrumbs'][] = ['label' => 'Master Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-role-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Master_Role_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Master_Role_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Master_Role_ID',
            'Role_Code',
            'Description',
            'Active:boolean',
            'Created_Date',
            'Rowversion',
        ],
    ]) ?>

</div>
