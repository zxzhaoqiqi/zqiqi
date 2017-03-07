<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
      <!-- Loading Bootstrap -->
      <link href="/zqiqi.cn/Public/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
      <!-- Loading Flat UI -->
      <link href="/zqiqi.cn/Public/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
      <link href="/zqiqi.cn/Public/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
      <link rel="shortcut icon" href="/zqiqi.cn/Public/Admin/Flat/img/favicon.ico">

      <script type="text/javascript" src="/zqiqi.cn/Public/uploadify/jquery-1.8.2.min.js"></script>

    <script type="text/javascript" src="/zqiqi.cn/Public/uploadify/jquery.uploadify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/zqiqi.cn/Public/uploadify/uploadify.css">

    <link rel="stylesheet" type="text/css" href="/zqiqi.cn/Public/hdjs/hdjs.css">
      <script type="text/javascript" src="/zqiqi.cn/Public/hdjs/hdjs.min.js"></script>

      <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
      <!--[if lt IE 9]>
        <script src="dist/js/vendor/html5shiv.js"></script>
        <script src="dist/js/vendor/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
    <form method="post" enctype="multipart/form-data" onsubmit="return hd_submit(this,'<?php echo U('Admin/Link/add');?>','<?php echo U('Admin/Link/index');?>')">
      <div class="alert alert-success">添加友链</div>
      <div class="form-group">
        <label for="exampleInputEmail1">友链标题</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入友链标题"  name="lname">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">项目地址</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入项目地址"  name="url">
      </div>
      <button class="btn btn-primary btn-block" type="submit"> 确定 </button>
    </form>
  </body>
</html>