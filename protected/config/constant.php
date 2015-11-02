<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 2015/11/1 0001
 * Time: 16:15
 * @use 系统常量设置
 */
$host =$_SERVER['HTTP_HOST'];
define('HTTP_DOMAIN','http://'.$host.'/'.'you-me'.'/');

//前台资源路径设置
define('CSS_URL',HTTP_DOMAIN.'src/default/css/');
define('IMG_URL',HTTP_DOMAIN.'src/default/img/');
define('JS_URL',HTTP_DOMAIN.'src/default/js/');
define('FONT_URL',HTTP_DOMAIN.'src/default/fonts/');
define('LESS_URL',HTTP_DOMAIN.'src/default/less/');

//后台资源路径设置
define('ADMIN_CSS_URL',HTTP_DOMAIN.'src/admin/stylesheets/');
define('ADMIN_IMG_URL',HTTP_DOMAIN.'src/admin/images/');
define('ADMIN_LIB_URL',HTTP_DOMAIN.'src/admin/lib/');