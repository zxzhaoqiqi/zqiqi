<?php 
	
	function sp($var){
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}


	/**
	 * [图片缩略]
	 * @param  [type] $logo   [原图片地址]
	 * @param  [type] $width  [缩略图的宽]
	 * @param  [type] $height [缩略图的高]
	 * @param  [type] $name   [图片]
	 * @return [type]         [description]
	 */
	function getLogo($logo, $width, $height, $name) { 
	    $fileArr = pathinfo($logo); 
	    $dirname = $fileArr['dirname']; 
	    $filename = $fileArr['filename']; 
	    $extension = $fileArr['extension']; 
	    $logo_rs = ""; 
	    if ($width > 0 && $height > 0) { 
	        $name_thumb = $dirname . "/" . $filename . "_" . $width . "_" . $height . "." . $extension; 
	        if (!file_exists($name_thumb)) { 
	            if (file_exists($logo)) { 
	                $image = new \Think\Image(); 
	                $image->open($logo); 
	                $image->thumb($width, $height)->save($name_thumb); 
	            } else { 
	                $name_thumb = ""; 
	            } 
	        } 
	        if ($name_thumb) { 
	            $logo_rs = $name_thumb; 
	        } 
	    } else { 
	        $logo_rs = $logo; 
	    } 
	    if ($logo_rs) { 
	        if ($name) { 
	            return "<img src='" . __ROOT__ . "/" . $logo_rs . "' alt='" . $name . "'/>"; 
	        } else { 
	            return __ROOT__ . "/" . $logo_rs; 
	        } 
	    } 
	}

	/**
	 * 给文章压入标签
	 */
	function add_tag($artData, $aid = 0){

        $pre_table = C('DB_PREFIX');

    	$data = array();

		foreach ($artData as $k => $v) {
			if(is_array($v)){
				$tag = M('ArticleTag')->join($pre_table . 'tag ON tag_tid = tid')->where("article_aid={$v['aid']}")->select();
				foreach ($tag as $key => $val) {
		            $artData[$k]['tag']['tname'][] = $val['tname'];
		            $artData[$k]['tag']['tid'][] = $val['tid'];
		        }
			}
		}
        return $artData;
	}

	/**
	 * sort 排序
	 */
	function sortOrder(){
		echo 2;
	}

 ?>
