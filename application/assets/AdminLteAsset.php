<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace application\assets;

use yii\web\AssetBundle;

/**
 * Configuration for `application` client script files
 * @since 4.0
 */
class AdminLteAsset extends AssetBundle {

    public $basePath = '@webroot/adminlte';
    public $baseUrl = '@web/adminlte';
    public $css = ['css/AdminLTE.css','http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css','css/bootstrap-theme.css','css/custom.css'];
    public $js = ['js/app.js','js/iCheck/iCheck.js'];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];

}
