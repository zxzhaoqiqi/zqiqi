<?php namespace Common\Tag;
use Think\Template\TagLib;
Class Tags extends TagLib{

	protected $tags   =  array(  // 定义标签 
		'category'    =>    array('attr'=>'limit,order,pid'), // input标签 
		'art'     =>	array('attr'=>'limit,order'),
		'tags'     =>	array('attr'=>''),
		'link'     =>	array('attr'=>''),
	 );

	/**
	 * 友情链接
	 */
	public function _link($tag,$content){
		$str = <<<str
<?php
	\$linkData = M('Link')->select();
	foreach (\$linkData as \$k => \$field) :
?>
$content
<?php endforeach ?>
str;
		return $str;
	}

	/**
	 * 标签
	 */
	public function _tags($tag,$content){

		$str = <<<str
<?php 
		\$tagData = M('Tag')->select();
		foreach (\$tagData as \$k => \$v) {
			\$tagData[\$k]['count'] = M('ArticleTag')->where(array('tag_tid'=>\$v['tid']))->count();
		}
		foreach (\$tagData as \$k => \$field):
?>
$content
<?php endforeach ?>
str;
		return $str;
	}

	/**
	 * 文章
	 */
	public function _art($tag,$content){

		$limit = $tag['limit'];
		$order = $tag['order'];
		$where = "->order('".$order." desc')->limit(".$limit.")";

		$str = <<<str
<?php
	\$artData = M('Article'){$where}->select();
	foreach (\$artData as \$k => \$field) :
		
?>
$content
<?php endforeach ?>
str;
		return $str;
	}
	
	/**
	 * 分类导航
	 */
	public function _category($tag,$content){
		$limit = $tag['limit'];
		$order = $tag['order'];
		$pid = isset($tag['pid'])? $tag['pid'] : '';
		if($pid != ''){
			$where = "->where('pid={$pid}')";
		}else{
			$where = '';
		}

		$str = <<<str
<?php

		\$cateData = M('Category'){$where}->select();
		foreach (\$cateData as \$k => \$v) {
			\$cateData[\$k]['total'] = M('Article')->where(array('category_cid'=>\$v['cid']))->count();
			\$cateData[\$k]['son'] = M('Category')->where(array('pid'=>\$v['cid']))->select();
		}

		foreach (\$cateData as \$field) :
?>
$content
<?php endforeach ?>
str;

		return $str;

	}

} 



 ?>
