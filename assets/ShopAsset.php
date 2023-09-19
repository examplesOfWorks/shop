<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ShopAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        '/shop/css/my.css',
        '/shop/css/bootstrap.min.css',
        '/shop/css/preloader.css',
        '/shop/css/owl.carousel.min.css',
        '/shop/css/animate.min.css',
        '/shop/css/magnific-popup.css',
        '/shop/css/meanmenu.css',
        '/shop/css/animate.min.css',
        '/shop/css/slick.css',
        '/shop/css/bootstrap.min.css',
        '/shop/css/fontawesome-all.min.css',
        '/shop/css/fonts.css',
        '/shop/css/themify-icons.css',
        '/shop/css/nice-select.css',
        '/shop/css/ui-range-slider.css',
        '/shop/css/main.css',
        '/shop/css/responsive.css'
    ];
    public $js = [
        '/shop/js/ajax-form.js',
        '/shop/js/counterup.min.js',
        '/shop/js/one-page-nav-min.js',
        '/shop/js/plugins.js',
        '/shop/js/timelinemax.js',
        // '/shop/js/jquery.min.js',
        '/shop/js/waypoints.min.js',
        '/shop/js/bootstrap.bundle.min.js',
        '/shop/js/tweenmax.js',
        '/shop/js/owl.carousel.min.js',
        '/shop/js/slick.min.js',
        '/shop/js/jquery-ui-slider-range.js',
        '/shop/js/jquery.meanmenu.min.js',
        '/shop/js/isotope.pkgd.min.js',
        '/shop/js/wow.min.js',
        '/shop/js/jquery.scrollUp.min.js',
        '/shop/js/countdown.min.js',
        '/shop/js/jquery.magnific-popup.min.js',
        '/shop/js/parallex.js',
        '/shop/js/imagesloaded.pkgd.min.js',
        '/shop/js/jquery.nice-select.min.js',
        '/shop/js/main.js',
        '/shop/js/cart.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}