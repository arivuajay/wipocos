<?php

use application\models\MasterRole;
use common\models\User;
use common\models\UserSearch;
use kartik\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $searchModel UserSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12 col-md-12">
    <div class="row mb10">
            <?php echo Html::a('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create User', ['create'], ['class' => 'btn btn-success pull-right']); ?>
    </div>
    <div class="row">
        <?php
        $gridColumns = [
            [
                'class' => 'kartik\grid\SerialColumn',
                'width' => '36px',
                'header' => '',
            ],
            'username',
            [
                'attribute' => 'name',
                'vAlign' => 'middle',
                'width' => '180px',
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(User::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Type name'],
                'format' => 'raw'
            ],
            [
                'attribute' => 'email',
                'vAlign' => 'middle',
                'value' => function ($model, $key, $index, $widget) {
                    return Html::a($model->email, "mailto:{$model->email}");
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'role',
                'vAlign' => 'middle',
                'width' => '180px',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->roleMdl->Description;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(MasterRole::find()->orderBy('Description')->asArray()->all(), 'Master_Role_ID', 'Description'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Type name'],
                'format' => 'raw'
            ],
            [
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'status',
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
                        return Html::a('<i class="fa fa-cogs"></i>', \yii\helpers\Url::to(['/auth-resources/user', 'uid' => $model->id]), [
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
            'toolbar' => [
                '{export}',
            ],
            // set export properties
            'export' => [
                'fontAwesome' => true
            ],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<i class="glyphicon glyphicon-book"></i>  User',
                'footer' => false
            ],
            'persistResize' => false,
            'exportConfig' => [
                GridView::CSV => ['label' => 'Save as CSV'],
                GridView::EXCEL => ['label' => 'Save as excel'],
                GridView::PDF => ['label' => 'Save as pdf'],
            ],
        ]);
        ?>
    </div>
</div>
