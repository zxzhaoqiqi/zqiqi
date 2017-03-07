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
      <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
      <!--[if lt IE 9]>
        <script src="dist/js/vendor/html5shiv.js"></script>
        <script src="dist/js/vendor/respond.min.js"></script>
      <![endif]-->
  </head>
  <body>
    <table class="table table-hover">
      <tr class="active">
        <th width="30">cid</th>
        <th>分类名称</th>
        <th width="220">排序</th>
        <th width="210">操作</th>
      </tr>
      <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
        <td><?php echo ($v["cid"]); ?></td>
        <td><?php echo ($v["_name"]); ?></td>
        <td><?php echo ($v["csort"]); ?></td>
        
        <td>
          <a href="<?php echo U('addSon', array('cid' => $v['cid']));?>" class="btn btn-sm btn-primary">添加子类</a>
          <a href="<?php echo U('edit', array('cid' => $v['cid']));?>" class="btn btn-sm btn-warning">编辑</a>
          <a href="javascript:;" class="btn btn-sm btn-danger" onclick="if(confirm('确定删除吗？')) location.href='<?php echo U('del', array('cid' => $v['cid']));?>'">删除</a>
        </td>
      </tr><?php endforeach; endif; ?>
    </table>
  </body>
</html>