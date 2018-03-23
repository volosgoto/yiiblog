<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
//    public $css = [
//        'css/site.css',
//    ];
//    public $js = [
//    ];


    public $css = [
        "css/bootstrap.min.css",
        "css/font-awesome.min.css",
        "css/animate.min.css",
        "css/owl.carousel.css",
        "css/owl.theme.css",
        "css/owl.transitions.css",
        "css/style.css",
        "css/site.css",
        "css/responsive.css",
    ];
    public $js = [
//        "js/jquery-1.11.3.min.js",
        "js/bootstrap.min.js",
        "js/owl.carousel.min.js",
        "js/jquery.stickit.min.js",
        "js/menu.js",
        "js/scripts.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
