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
      <style type="text/css">
      li{
        float: left;
        list-style: none;
        padding: 8px;
      }
      .page{
        /*width: */
        width: 500px;
        height: 40px;
        margin: 0 auto;
      }
      .page a.active{
        font-size: 30px;
      }
      </style>
      <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
      <!--[if lt IE 9]>
        <script src="dist/js/vendor/html5shiv.js"></script>
        <script src="dist/js/vendor/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
    <table class="table table-hover">
      <tr class="active">
        <th width="30">pid</th>
        <th>标题</th>
        <th width="200">排序</th>
        <th width="100">列表图</th>
        <th width="200">操作</th>
      </tr>
      <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
          <td><?php echo ($v["pid"]); ?></td>
          <td><?php echo ($v["pname"]); ?></td>
          <td><?php echo ($v["psort"]); ?></td>
          <td><img src="/zqiqi.cn/<?php echo ($v["list"]); ?>" style="width:100px;height:40px;"></td>
          <td>
            <a href="<?php echo U('edit', array('pid'=>$v['pid']));?>" class="btn btn-sm btn-warning">编辑</a>
            
            <a href="javascript:;" class="btn btn-sm btn-danger" onclick="if(confirm('确定要删除吗')) <?php echo U('del',array('pid'=>$v['pid']));?>">删除</a>
          </td>
        </tr><?php endforeach; endif; ?>
    </table>
    
    <div class="page"><?php echo ($page); ?></div>
  
    
  </body>
</html>