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
      <link rel="stylesheet" type="text/css" href="/zqiqi.cn/Public/hdjs/hdjs.css">
      <script type="text/javascript" src="/zqiqi.cn/Public/uploadify/jquery-1.8.2.min.js"></script>
      <script type="text/javascript" src="/zqiqi.cn/Public/hdjs/hdjs.min.js"></script>
            <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
      <!--[if lt IE 9]>
        <script src="dist/js/vendor/html5shiv.js"></script>
        <script src="dist/js/vendor/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
    <div class="alert alert-success">添加分类</div>
    <form method="post" onsubmit="return hd_submit(this,'<?php echo U('Admin/Category/add');?>','<?php echo U('Admin/Category/index');?>')">
      <div class="form-group">
        <label for="exampleInputEmail1">分类名称</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类名称" required="" name="cname">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">所属分类</label>
        <select name="pid" class="form-control">
          <option value="0">顶级分类</option>
          <?php if(is_array($cateData)): foreach($cateData as $key=>$v): ?><option value="<?php echo ($v["cid"]); ?>"><?php echo ($v["_name"]); ?></option><?php endforeach; endif; ?>
        </select>
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">分类排序</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入分类排序" required="" name="csort" value="100">
      </div>
      
      <button class="btn btn-primary btn-block" type="submit"> 确定 </button>
    </form>
  </body>
</html>