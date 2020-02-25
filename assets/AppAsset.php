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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'plugins/fontawesome-free/css/all.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
        'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'plugins/jqvmap/jqvmap.min.css',
        'dist/css/adminlte.min.css',
        'plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
        'plugins/daterangepicker/daterangepicker.css',
        'plugins/summernote/summernote-bs4.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet',
        //'css/site.css',
    ];
    public $js = [
        // 'plugins/jquery/jquery.min.js',
        // 'plugins/jquery/jquery.min.js',
        // <!-- jQuery UI 1.11.4 -->
        'plugins/jquery-ui/jquery-ui.min.js',
        // <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

        // <!-- Bootstrap 4 -->
        'plugins/bootstrap/js/bootstrap.bundle.min.js',
        // <!-- ChartJS -->
        'plugins/chart.js/Chart.min.js',
        // <!-- Sparkline -->
        'plugins/sparklines/sparkline.js',
        // <!-- JQVMap -->
        'plugins/jqvmap/jquery.vmap.min.js',
        'plugins/jqvmap/maps/jquery.vmap.usa.js',
        // <!-- jQuery Knob Chart -->
        'plugins/jquery-knob/jquery.knob.min.js',
        // <!-- daterangepicker -->
        'plugins/moment/moment.min.js',
        'plugins/daterangepicker/daterangepicker.js',
        // <!-- Tempusdominus Bootstrap 4 -->
        'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
        // <!-- Summernote -->
        'plugins/summernote/summernote-bs4.min.js',
        // <!-- overlayScrollbars -->
        'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
        // <!-- AdminLTE App -->
        'dist/js/adminlte.js',
        // <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        'dist/js/pages/dashboard.js',
        // <!-- AdminLTE for demo purposes -->
        'dist/js/demo.js',
        'js/webcam.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
