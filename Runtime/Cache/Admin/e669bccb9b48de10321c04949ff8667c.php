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
		<form method="post" enctype="multipart/form-data" onsubmit="return hd_submit(this,'<?php echo U('Admin/Article/add');?>','<?php echo U('Admin/Article/index');?>')">
			<div class="alert alert-success">添加文章</div>
			<div class="form-group">
				<label for="exampleInputEmail1">文章标题</label>
				<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入文章标题"  name="title">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">作者</label>
				<input id="exampleInputEmail1" class="form-control" type="text" placeholder="请输入作者"  name="author">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">所属分类</label>
				<select name="category_cid" class="form-control">
					<option value="0">请选择</option>
					<?php if(is_array($cateData)): foreach($cateData as $key=>$v): ?><option value="<?php echo ($v["cid"]); ?>"><?php echo ($v["_name"]); ?></option><?php endforeach; endif; ?>
				</select>
			</div>
			<!-- <div class="form-group">
				<label for="exampleInputEmail1">缩略图</label>
				<input id="exampleInputEmail1" type="file"  name="thumb">
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
			                'uploader' : "<?php echo U('Article/upload');?>",
			                'buttonText':'选择文件',
			                'fileSizeLimit' : '2000KB',
			                'uploadLimit' : 10,//上传文件数
			                'width':65,
			                'height':25,
			                'successTimeout':10,//等待服务器响应时间
			                'removeTimeout' : 0.2,//成功显示时间
			                'onUploadSuccess' : function(file, data, response) {
								//转为json
			                    data=$.parseJSON(data);
			                    // //获得图片地址
			                    var imageUrl = data.url;
			                    var li="<li path='"+data.path+"' url='"+imageUrl+"'><img src='"+imageUrl+"' style='width:150px;height:200px;border:3px solid #888'/><input type='hidden' name='thumb' value='"+data.path+"'/><span class='cc'>X</span></li>";
			                    $("#uploadLists ul").prepend(li);
			                }
			            });
						$('#uploadLists ul').on('click', '.cc', function() {
							
							$(this).parent('li').remove();
						});
						
						
			        });
			    </script>
			    <div id="uploadLists">
			        <ul>

			        </ul>
			       
			    </div>
			</div>
			
			
			<div id="">
				<label for="">文章标签</label>
				<br />
				 <?php if(is_array($tagData)): foreach($tagData as $k=>$v): ?><label class="checkbox checkbox-inline" for="checkbox{<?php echo ($k); ?>}">
						<input id="checkbox{<?php echo ($k); ?>}" class="custom-checkbox" type="checkbox" data-toggle="checkbox" value="<?php echo ($v["tid"]); ?>" name="tag_tid[]">
						<span class="icons">
						<span class="icon-unchecked"></span>
						<span class="icon-checked"></span>
						</span>
						<?php echo ($v["tname"]); ?>
					</label><?php endforeach; endif; ?>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">文章摘要</label>
				<textarea name="digest" rows="5" cols=""  class="form-control" placeholder="请输入文章关键字"></textarea>
			</div>
			
			<script type="text/javascript" charset="utf-8" src="/zqiqi.cn/Public/ueditor1_4_3/ueditor.config.js"></script>
			<script type="text/javascript" charset="utf-8" src="/zqiqi.cn/Public/ueditor1_4_3/ueditor.all.min.js"> </script>
			<script type="text/javascript" charset="utf-8" src="/zqiqi.cn/Public/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
			<script id="editor" type="text/plain" style="width:100%;height:500px;" name="content"></script>
			<script>
	    		var ue = UE.getEditor('editor');
			</script>
			<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>