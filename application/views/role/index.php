<?php

use application\models\MasterRoleSearch;
use kartik\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $searchModel MasterRoleSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Security Roles';
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
            <?php $form = ActiveForm::begin([
                'id' => 'search-form',
                'method' => 'get',
                'action' => ['index'],
                'options' => ['role' => 'form']]); ?>

            <div class="col-lg-3 col-md-3">
                <?= $form->field($searchModel, 'Role_Code')->textInput(); ?>
            </div>
            <div class="col-lg-3 col-md-3">
                <?= $form->field($searchModel, 'Description')->textInput(); ?>
            </div>
            <div class="col-lg-3 col-md-3">
                <?= $form->field($searchModel, 'Active')->dropDownList(array('0' => 'In-active', '1' => 'Active'), ['prompt'=>'']) ?>
            </div>
            <div class="col-lg-3 col-md-3">
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


<?php if($search == TRUE){?>
<div class="col-lg-12 col-md-12">
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
                        return Html::a('<i class="fa fa-cogs"></i>', Url::to(['/auth-resources/role', 'rid' => $model->Master_Role_ID]), [
                                    'title' => Yii::t('yii', 'Privilages'),
                                    'data-pjax'=>'0',
                        ]);
                    }
                ]
            ]
        ];

        echo GridView::widget([
            'dataProvider' => $dataProvider,
//            'filterModel' => $searchModel,
            'columns' => $gridColumns,
            'pjax' => true,
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<i class="glyphicon glyphicon-search"></i>  Search Results',
                'footer' => false
            ],
            'toolbar' => []
        ]);
        ?>
    </div>
</div>
<?php }?>


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
                        return Html::a('<i class="fa fa-cogs"></i>', Url::to(['/auth-resources/role', 'rid' => $model->Master_Role_ID]), [
                                    'title' => Yii::t('yii', 'Privilages'),
                                    'data-pjax'=>'0',
                        ]);
                    }
                ]
            ]
        ];

        echo GridView::widget([
            'dataProvider' => $dataProviderAll,
//            'filterModel' => $searchModel,
            'columns' => $gridColumns,
            'pjax' => true,
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => '<i class="glyphicon glyphicon-book"></i>  Security Roles',
                'footer' => false
            ],
            'toolbar' => []
        ]);
        ?>
    </div>
</div>