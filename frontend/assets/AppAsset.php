<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/design';
    public $css = [
        'assets/libs/sweetalert2/sweetalert2.min.css',
        'assets/css/bootstrap.min.css',
        'assets/css/icons.min.css',
        'assets/css/app.min.css',
        'assets/css/style.css',
    ];
    public $js = [
//        'assets/libs/jquery/jquery.min.js',
        'assets/libs/bootstrap/js/bootstrap.bundle.min.js',
        'assets/libs/metismenu/metisMenu.min.js',
        'assets/libs/simplebar/simplebar.min.js',
        'assets/libs/node-waves/waves.min.js',
        'assets/libs/sweetalert2/sweetalert2.min.js',
        'assets/js/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
