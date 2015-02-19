<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel application\models\AuthResourcesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Auth Resources';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-resources-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Auth Resources', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Master_Resource_ID',
            'Master_User_ID',
            'Master_Role_ID',
            'Master_Module_ID',
            'Master_Screen_ID',
            // 'Master_Task_ADD',
            // 'Master_Task_SEE',
            // 'Master_Task_UPT',
            // 'Master_Task_DEL',
            // 'Active:boolean',
            // 'Created_Date',
            // 'Rowversion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
