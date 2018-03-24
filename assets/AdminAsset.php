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
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "css/site.css",
//        "public/css/bootstrap.min.css",
//        "public/css/font-awesome.min.css",
//        "public/css/animate.min.css",
//        "public/css/owl.carousel.css",
//        "public/css/owl.theme.css",
//        "public/css/owl.transitions.css",
//        "css/style.css",
//        "public/css/responsive.css",
    ];
    public $js = [
//        "js/jquery-1.11.3.min.js",
//        "js/bootstrap.min.js",
//        "js/owl.carousel.min.js",
//        "js/jquery.stickit.min.js",
//        "js/menu.js",
//        "js/scripts.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
