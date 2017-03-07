<?php
namespace Home\Controller;
use Think\Controller;
class ContentController extends Controller {

	/**
	 * 首页
	 */
	public function index(){
		$aid = I('get.aid',0,'intval');
		// 增加点击量
		$this->add_click($aid);

		$artData = M('Article')->where("aid={$aid}")->find();

		$data = M('ArticleData')->where("article_aid={$aid}")->field('content')->find();
		$artData['content'] =$data['content'];

		// 获取表前缀
		$pre_table = C('DB_PREFIX');
		$tag = M('ArticleTag')->join($pre_table . 'tag ON tag_tid = tid')->where("article_aid={$aid}")->select();

		foreach ($tag as $k => $v) {
			$artData['tag']['tname'][] = $v['tname'];
			$artData['tag']['tid'][] = $v['tid'];

		}

		//获取上一篇文章
		$pre_art = $this->get_pre_art($aid);
		$next_data = $this->get_next_art($aid);

		$this->assign('pre', $pre_art);
		$this->assign('next', $next_art);
		$this->assign('title', $artData['title']);
		$this->assign('artData',$artData);

		$this->display();

	}

	/**
	 * 增加浏览量
	 */
	private function add_click($aid){
		//获取当前文章的点击数
		$click = M("Article")->where("aid={$aid}")->getField('click',true);
		$click = $click[0] + 1;
		M('Article')->where("aid={$aid}")->save(array('click'=>$click));
	}

	/**
	 * 获取上一篇文章和下一篇文章
	 */
	private function get_ralation_cid($aid){
		// 获取当前文章的分类
		$cid = M("Article")->where("aid={$aid}")->getField('category_cid',true);
		return $cid = $cid[0];
	}

	private function get_pre_art($aid){
		$data = array();
		$cid = $this->get_ralation_cid($aid);
		$pre_table = C("DB_PREFIX");
		$data = M('Article')->join($pre_table . "category ON category_cid = cid")->where("aid < {$aid} AND category_cid={$cid}")->order('aid desc')->limit(0,1)->field('aid,title')->find();
		return $data;
	}

	private function get_next_art($aid){
		$data = array();
		$cid = $this->get_ralation_cid($aid);
		$pre_table = C("DB_PREFIX");
		$data = M('Article')->join($pre_table . "category ON category_cid = cid")->where("aid > {$aid} AND category_cid={$cid}")->order('aid asc')->limit(0,1)->field('aid,title')->find();
		return $data;
	}

}

?>
