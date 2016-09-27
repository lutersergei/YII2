<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class BlogAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/libs/font-awesome.css',
        'css/libs/nanoscroller.css',
        'css/compiled/theme_styles.css',
        'css/libs/datepicker.css',
        'css/libs/daterangepicker.css',
        'css/libs/bootstrap-timepicker.css',
        'css/libs/select2.css',
        '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400'
    ];
    public $js = [
        'js/jquery.nanoscroller.min.js',
        'js/jquery.maskedinput.min.js',
        'js/bootstrap-datepicker.js',
        'js/moment.min.js',
        'js/daterangepicker.js',
        'js/bootstrap-timepicker.min.js',
        'js/select2.min.js',
        'js/hogan.js',
        'js/typeahead.min.js',
        'js/jquery.pwstrength.js',
        'js/scripts.js',
        'js/pace.min.js',
        'js/init.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
