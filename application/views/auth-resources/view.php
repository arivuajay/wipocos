<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model application\models\AuthResources */

$this->title = $model->Master_Resource_ID;
$this->params['breadcrumbs'][] = ['label' => 'Auth Resources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-resources-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Master_Resource_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Master_Resource_ID], [
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
            'Master_Resource_ID',
            'Master_User_ID',
            'Master_Role_ID',
            'Master_Module_ID',
            'Master_Screen_ID',
            'Master_Task_ADD',
            'Master_Task_SEE',
            'Master_Task_UPT',
            'Master_Task_DEL',
            'Active:boolean',
            'Created_Date',
            'Rowversion',
        ],
    ]) ?>

</div>
