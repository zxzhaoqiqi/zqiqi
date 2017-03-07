<?php 
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi.cn@gmail.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
// config.php 2013-02-25

//定义回调URL通用的URL
define('URL_CALLBACK', 'http://zqiqi.cn/index.php/Api/Index/oauth/type/');

return array(
    //腾讯QQ登录配置
    'THINK_SDK_QQ'      => array(
        'APP_KEY'       => '101288554', //应用注册成功后分配的 APP ID
        'APP_SECRET'    => '6ebd54b7f405df0f677bdaf5eddf5565', //应用注册成功后分配的KEY
        'CALLBACK'      => URL_CALLBACK . 'qq',
    ),
    //新浪微博配置
    'THINK_SDK_SINA'    => array(
        'APP_KEY'       => '101288554', //应用注册成功后分配的 APP ID
        'APP_SECRET'    => '6ebd54b7f405df0f677bdaf5eddf5565',//应用注册成功后分配的KEY
        'CALLBACK'      => URL_CALLBACK . 'sina',
    ),
);

 ?>