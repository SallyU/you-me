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
define('CSS_URL',HTTP_DOMAIN.'src/default/css/');
define('IMG_URL',HTTP_DOMAIN.'src/default/img/');
define('JS_URL',HTTP_DOMAIN.'src/default/js/');
define('FONT_URL',HTTP_DOMAIN.'src/default/fonts/');
define('LESS_URL',HTTP_DOMAIN.'src/default/less/');
