<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING'		=> 	array(			      			 //定义常用路径
	    '__PUBLIC__'		=> 	__ROOT__.'/Public',
	    '__PROPATH__'		=> $_SERVER['SERVER_NAME'].'/ThinkBlog/Project',
	),
	//引入扩展配置项
    'LOAD_EXT_CONFIG'       =>  'oauth,webconfig,db', 
    //缓存时间
    "CACHE_TIME"            =>  30,

	// 数据库配置
	
	'TAGLIB_BUILD_IN'       =>  'Cx,Common\Tag\Tags', // 内置标签库名称(标签使用不必指定标签库名称),以逗号分隔 注意解析顺序
);
