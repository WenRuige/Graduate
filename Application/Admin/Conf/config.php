<?php
return array(
	//'配置项'=>'配置值'
	'DB_HOST'           =>  SAE_MYSQL_HOST_M.','.SAE_MYSQL_HOST_S, // 服务器地址
    'DB_NAME'           =>  SAE_MYSQL_DB,        // 数据库名
    'DB_USER'           =>  SAE_MYSQL_USER,    // 用户名
    'DB_PWD'            =>  SAE_MYSQL_PASS,         // 密码
    'DB_PORT'           =>  SAE_MYSQL_PORT,        // 端口
	'FILE_UPLOAD_TYPE' => 'sae',
	'MODULE_ALLOW_LIST'    =>    array('Home','Admin','User'),
	'DEFAULT_MODULE'       =>    'Home',  // 默认模块
	//'DB_DEBUG'  =>  TRUE, // 数
	'TMPL_PARSE_STRING' =>  array( // 添加输出替换
	'__PUBLIC__' => __ROOT__.'/Application/Public',
    ),
);