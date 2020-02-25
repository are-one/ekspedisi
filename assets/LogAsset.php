<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LogAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/fontawesome-free/css/all.min.css',
        // <!-- Ionicons -->
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        // <!-- icheck bootstrap -->
        'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        // <!-- Theme style -->
        'dist/css/adminlte.min.css',
        // <!-- Google Font: Source Sans Pro -->
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700',
    ];
    public $js = [
        // 'plugins/jquery/jquery.min.js',

        'plugins/bootstrap/js/bootstrap.bundle.min.js',

        'dist/js/adminlte.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}