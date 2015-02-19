<?php

use application\assets\AdminLteAsset;
use application\assets\AppAsset;
use application\assets\FontAwesomeAsset;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $content string */

AdminLteAsset::register($this);
FontAwesomeAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@webroot') . '/adminlte';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="skin-green">
        <?php $this->beginBody() ?>

            <?= $this->render('header.php', ['directoryAsset' => $directoryAsset]) ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <?= $this->render('left.php', ['directoryAsset' => $directoryAsset]) ?>
            <?= $this->render('content.php', ['content' => $content, 'directoryAsset' => $directoryAsset]) ?>
        </div>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

