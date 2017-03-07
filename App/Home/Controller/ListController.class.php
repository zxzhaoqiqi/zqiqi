<?php
namespace Home\Controller;
use Think\Controller;
class ListController extends Controller {

	/**
	 * 首页
	 */
	public function index(){

		// 接收get参数
		$cid = I('get.cid',0,'intval');
		$tid = I('get.tid',0,'intval');

		$pre_table = C("DB_PREFIX");

		// 如果是标签筛选
		if($tid){

			// 根据tid获取缓存
			$artData = S('list_artData_tid_'.$tid);
			$artTitle = S('list_Title_tid_'.$tid);

			// 判断存不存在缓存
			if(!$artData){
				$artData = M('Article')->join($pre_table . 'article_tag ON article_aid=aid')->where("tag_tid={$tid}")->select();

				// 加入标签
        		$artData = add_tag($artData);

				$tname = M('Tag')->where("tid={$tid}")->getField('tname',true);
				$listTitle = "标签（" . $tname[0] . ")";
				// 根据tid设置缓存)
				S('list_artData_tid_'.$tid, $artData, C("CACHE_TIME"));
				S('list_Title_tid_'.$tid, $listTitle, C("CACHE_TIME"));
			}


		}

		// 如果是分类筛选
		if($cid){

			// 获取缓存
			$artData = S('list_artData_cid_'.$cid);
			$artTitle = S('list_Title_cid_'.$cid);

			// 判断缓存
			if(!$artData){
				// 查询包含自己和自己子级所数据
				$cids = D('Category')->getSonCid($cid);
				$cids[] = $cid;
				$artData = M('Article')->where("category_cid IN(".implode(',', $cids).")")->select();

				$cname = M('Category')->where("cid={$cid}")->getField('cname',true);
				$listTitle = "分类（" . $cname[0] . ")";

				// 加入标签
        		$artData = add_tag($artData);

				// 设置缓存
				S('list_artData_cid_'.$cid, $artData, C("CACHE_TIME"));
				S('list_Title_cid_'.$cid, $listTitle, C("CACHE_TIME"));
			}
		}
		
		// 分配数据
		$title = $artTitle;
        $this->assign('title', $title);
		$this->assign('artData',$artData);
		// 引入模板
		$this->display();

	}

}
?>
