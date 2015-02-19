<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model application\models\AuthResources */

$this->title = 'Create Auth Resources';
$this->params['breadcrumbs'][] = ['label' => 'Auth Resources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-resources-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
