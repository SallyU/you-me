<?php
/**
 * Created by PhpStorm.
 * User: Yuan
 * Date: 2015/11/1 0001
 * Time: 16:15
 * @use ϵͳ��������
 */
$host =$_SERVER['HTTP_HOST'];
define('HTTP_DOMAIN','http://'.$host.'/'.'you-me'.'/');
define('CSS_URL',HTTP_DOMAIN.'assets/default/css/');//ǰ̨CSSĿ¼��ַ
define('IMG_URL',HTTP_DOMAIN.'assets/default/img/');//ǰ̨ͼƬĿ¼��ַ
define('JS_URL',HTTP_DOMAIN.'assets/default/js/');//ǰ̨JSĿ¼��ַ
define('FONT_URL',HTTP_DOMAIN.'assets/default/fonts/');//ǰ̨FONTSĿ¼��ַ
define('LESS_URL',HTTP_DOMAIN.'assets/default/less/');//ǰ̨FONTSĿ¼��ַ
