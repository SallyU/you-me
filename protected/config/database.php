<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database

	'connectionString' => 'mysql:host=localhost;dbname=myweb',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'qukaiyuan1321',
	'charset' => 'utf8',
    'tablePrefix' => 'mw_',   //加入前缀名称mw_
    //在Log中显示SQL语句绑定的参数具体信息
    'enableParamLogging'=>true,
);