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
define('CSS_URL',HTTP_DOMAIN.'assets/default/css/');//前台CSS目录地址
define('IMG_URL',HTTP_DOMAIN.'assets/default/img/');//前台图片目录地址
define('JS_URL',HTTP_DOMAIN.'assets/default/js/');//前台JS目录地址
define('FONT_URL',HTTP_DOMAIN.'assets/default/fonts/');//前台FONTS目录地址
define('LESS_URL',HTTP_DOMAIN.'assets/default/less/');//前台FONTS目录地址
