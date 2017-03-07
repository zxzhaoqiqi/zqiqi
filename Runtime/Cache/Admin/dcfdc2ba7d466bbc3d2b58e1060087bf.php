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
    <form method="post" enctype="multipart/form-data" onsubmit="return hd_submit(this,'<?php echo U('Admin/Project/add');?>','<?php echo U('Admin/Project/index');?>')">
      <div class="alert alert-success">添加文章</div>
      <div class="form-group">
        <label for="exampleInputEmail1">文章标题</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入文章标题"  name="pname">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">排序</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入作者"  name="psort">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">项目地址</label>
        <input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入项目地址"  name="url">
      </div>
      <!-- <div class="form-group">
        <label for="exampleInputEmail1">缩略图</label>
        <input id="exampleInputEmail1" type="file"  name="list">
      </div> -->
      <div lab="uploadFile" class="form-group">
        <label>列表图</label><br/>
          <input id="file" type="file" multiple="true">
          <span>类型: *.jpg,*.png 大小: 2000KB 数量: 10</span>
          <script type="text/javascript">
              $(function() {

                  $('#file').uploadify({
                      'formData' : {
                        '<?php echo session_name(); ?>' : '<?php echo session_id(); ?>',
                      },
                      'fileTypeDesc' : '上传文件',//上传描述
                      'fileTypeExts' : '*.jpg;*.png',
                      'swf'      : '/zqiqi.cn/Public/uploadify/uploadify.swf',
                      'uploader' : "<?php echo U('Project/upload');?>",
                      'buttonText':'选择文件',
                      'fileSizeLimit' : '2000KB',
                      'uploadLimit' : 10,//上传文件数
                      'width':65,
                      'height':25,
                      'successTimeout':10,//等待服务器响应时间
                      'removeTimeout' : 0.2,//成功显示时间
                      'onUploadSuccess' : function(file, data, response) {
                //转为json
                          // data=$.parseJSON(data);
                          // //获得图片地址
                          // var imageUrl = data.url;
                          var li="<li path='"+data+"' url='"+data+"'><img src='/zqiqi.cn/"+data+"' style='width:150px;height:200px;border:3px solid #888'/><input type='hidden' name='list' value='"+data+"'/><span class='cc'>X</span></li>";
                          $("#uploadList ul").prepend(li);
                      }
                  });
            $('#uploadList ul').on('click', '.cc', function() {
              
              $(this).parent('li').remove();
            });
            
              });
          </script>
          <div id="uploadList">
              <ul>

              </ul>
             
          </div>
      </div>
      
      
      <div class="form-group">
        <label for="exampleInputEmail1">文章摘要</label>
        <textarea name="digest" rows="5" cols=""  class="form-control" placeholder="请输入文章关键字"></textarea>
      </div>
      
      <button class="btn btn-primary btn-block" type="submit"> 确定 </button>
    </form>
  </body>
</html>