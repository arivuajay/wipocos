<?php

use application\models\MasterRole;
use common\models\User;
use common\models\UserSearch;
use kartik\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $searchModel UserSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-12 col-md-12">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">    
                <h3 class="panel-title">
                    <i class="glyphicon glyphicon-search"></i>  Search
                </h3>
                <div class="clearfix"></div>
            </div>
            <section class="content">
                <div class="row">
                    <?php
                    $form = ActiveForm::begin([
                                'id' => 'search-form',
                                'method' => 'get',
                                'action' => ['index'],
                                'options' => ['role' => 'form']]);
                    ?>

                    <div class="col-lg-4 col-md-4">
                        <?= $form->field($searchModel, 'username')->textInput(['maxlength' => 255]); ?>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <?php $names = ArrayHelper::map(User::find()->orderBy('name')->asArray()->all(), 'name', 'name') ?>
                        <?= $form->field($searchModel, 'name')->dropDownList($names, ['prompt' => '']) ?>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <?= $form->field($searchModel, 'email')->textInput(['maxlength' => 255]); ?>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <?php $roles = ArrayHelper::map(MasterRole::find()->all(), 'Master_Role_ID', 'Description'); ?>
                        <?= $form->field($searchModel, 'role')->dropDownList($roles, ['prompt' => '']) ?>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <?= $form->field($searchModel, 'status')->dropDownList(array('0' => 'In-active', '1' => 'Active'), ['prompt' => '']) ?>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <?= Html::submitButton('Search', ['class' => 'btn btn-primary form-control']) ?>
                        </div>
                    </div>
                    <!--            <div class="col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                    <?= Html::resetButton('Reset', ['class' => 'btn btn-default form-control']) ?>
                                    </div>
                                </div>-->
                    <?php ActiveForm::end(); ?>

                </div>
            </section>


        </div>
    </div>
</div>

<?php if ($search == TRUE) { ?>
    <div class="col-lg-12 col-md-12">
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
                    'contentOptions' => ['class' => 'action_column'],
                    'template' => '{privilages}{view}{update}{delete}',
                    'buttons' => [
                        'privilages' => function ($url, $model) {
                            return Html::a('<i class="fa fa-cogs"></i>', Url::to(['/auth-resources/user', 'uid' => $model->id]), [
                                        'title' => Yii::t('yii', 'Privilages'),
                                        'data-pjax' => '0',
                            ]);
                        }
                            ]
                        ]
                    ];

                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
//                    'filterModel' => $searchModel,
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
                            'heading' => '<i class="glyphicon glyphicon-search"></i>  Search Results',
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
        <?php } ?>

        <div class="col-lg-12 col-md-12">
            <div class="row mb10">
                <?php echo Html::a('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create User', ['create'], ['class' => 'btn btn-success pull-right']); ?>
            </div>
        </div>


        <div class="col-lg-12 col-md-12">
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
                        'contentOptions' => ['class' => 'action_column'],
                        'template' => '{privilages}{view}{update}{delete}',
                        'buttons' => [
                            'privilages' => function ($url, $model) {
                                return Html::a('<i class="fa fa-cogs"></i>', Url::to(['/auth-resources/user', 'uid' => $model->id]), [
                                            'title' => Yii::t('yii', 'Privilages'),
                                            'data-pjax' => '0',
                                ]);
                            }
                                ]
                            ]
                        ];

                        echo GridView::widget([
                            'dataProvider' => $dataProviderAll,
//                    'filterModel' => $searchModel,
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

                <?php
                $url = Yii::$app->urlManager->createUrl(["auth-resources/get-screens-by-module"]);
                $script = <<< JS
    $(document).ready(function(){
        $('.form-control').on('change', function(){
            $.ajax({
                type: 'GET',
                url: '/path/to/action',
                data: {id: '<id>', 'other': '<other>'},
                success: function(data) {
                    // process data
                }
             });
        });
    });
JS;
//$this->registerJs($script, $this::POS_END);
                ?>
