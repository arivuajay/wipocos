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
class FontAwesomeAsset extends AssetBundle {

    public $basePath = '@vendor/fortawesome/font-awesome';
    public $sourcePath = '@vendor/fortawesome/font-awesome';

    public $css = ['css/font-awesome.css'];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
