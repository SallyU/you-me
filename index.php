<?php
// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
date_default_timezone_set ('Asia/Shanghai');
defined('ROOT_PATH') or define('ROOT_PATH', dirname(__FILE__) . '/');
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
//引入常量设置
require_once(dirname(__FILE__).'/protected/config/constant.php');


require_once($yii);
Yii::createWebApplication($config)->run();
