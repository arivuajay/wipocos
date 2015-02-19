<?php

use application\models\MasterRoleSearch;
use kartik\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel MasterRoleSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12 col-md-12">
    <div class="row mb10">
        <?= Html::a('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create Role', ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </div>
    <div class="row">
        <?php
        $gridColumns = [
            [
                'class' => 'kartik\grid\SerialColumn',
                'header' => '',
            ],
            'Role_Code',
            'Description',
            [
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'Active',
                'vAlign' => 'middle',
                'trueIcon' => '<i class="fa fa-circle text-green"></i>',
                'falseIcon' => '<i class="fa fa-circle text-red"></i>'
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'width' => '150px',
                'contentOptions'=>['class'=>'action_column'],
                'template' => '{privilages}{view}{update}{delete}',
                'buttons' => [
                    'privilages' => function ($url, $model) {
                        return Html::a('<i class="fa fa-cogs"></i>', \yii\helpers\Url::to(['/auth-resources/role', 'rid' => $model->Master_Role_ID]), [
                                    'title' => Yii::t('yii', 'Privilages'),
                                    'data-pjax'=>'0',
                        ]);
                    }
                ]
            ]
        ];

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $gridColumns,
            'pjax' => true,
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<i class="glyphicon glyphicon-book"></i>  Roles',
                'footer' => false
            ],
            'toolbar' => []
        ]);
        ?>
    </div>
</div>