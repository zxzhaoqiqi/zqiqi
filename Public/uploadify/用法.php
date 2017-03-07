<!-- html页面 -->
<div lab="uploadFile">
    <input id="file" type="file" multiple="true">
    <span>类型: *.jpg,*.png 大小: 2000KB 数量: 10</span>
    <script type="text/javascript">
        $(function() {
            $('#file').uploadify({
                'formData'     : {//POST数据
                    '<?php echo session_name();?>' : '<?php echo session_id();?>',
                },
                'fileTypeDesc' : '上传文件',//上传描述
                'fileTypeExts' : '*.jpg;*.png',
                'swf'      : '{{__PUBLIC__}}/uploadify/uploadify.swf',
                'uploader' : '{{U('upload')}}',
                'buttonText':'选择文件',
                'fileSizeLimit' : '2000KB',
                'uploadLimit' : 1,//上传文件数
                'width':65,
                'height':25,
                'successTimeout':10,//等待服务器响应时间
                'removeTimeout' : 0.2,//成功显示时间
                'onUploadSuccess' : function(file, data, response) {
					//转为json
                    data=$.parseJSON(data);
                    //获得图片地址
                    var imageUrl = data.url;
                    var li="<li path='"+data.path+"' url='"+data.url+"'><img src='"+imageUrl+"'/><input type='hidden' name='thumb' value='"+data.path+"'/></li>";
                    $("#uploadList ul").prepend(li);
                }
            });
        });
    </script>
    <div id="uploadList">
        <ul>

        </ul>
    </div>
</div>

<?php 
//php用法
//uploadify异步上传
public function upload()
{
    $file = Upload::path('Upload/Content/' . date('y/m'))->make();
    
    if (empty($file)) {
        $this->ajax(Upload::getError());
    } else {
        /** $file内部就是以下这个数组
            $file = array(
                0 => array(
                'path' => 'Upload/Content/15/8/123981239172.jpg'    ,
                'url' => 'http://localhost/cms_edu/Upload/Content/15/8/123981239172.jpg',
                'image' => 1
            ),
        );**/
        //上传成功，把上传好的信息返给js
        $data = $file[0];
        echo json_encode($data);exit;
    }
}

 ?>




