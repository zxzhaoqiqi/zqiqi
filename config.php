<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING'		=> 	array(			      			 //定义常用路径
	    '__PUBLIC__'		=> 	__ROOT__.'/Public',
	    '__PROPATH__'		=> $_SERVER['SERVER_NAME'].'/ThinkBlog/Project',
	),
	//url配置
	'URL_CASE_INSENSITIVE'  =>  true,
	//开启路由
	'URL_ROUTER_ON'         =>  true,
    //缓存时间
    "CACHE_TIME"            =>  30,

	// 数据库配置
	
	'TAGLIB_BUILD_IN'       =>  'Cx,Common\Tag\Tags', // 内置标签库名称(标签使用不必指定标签库名称),以逗号分隔 注意解析顺序

	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'qdm217211138.my3w.com', // 服务器地址
    'DB_NAME'               =>  'qdm217211138_db',          // 数据库名
    'DB_USER'               =>  'qdm217211138',      // 用户名
    'DB_PWD'                =>  'asd654321',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'zqiqi_',    // 数据库表前缀



	
);
