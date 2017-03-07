<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){

        // 文章数据
        $artData = S('index_artData');

        if(!$artData){
            $artData = M('article')->order('sendtime desc')->limit(6)->select();
            // 加入标签
            $artData = add_tag($artData);
            S('index_artData',$artData, C("CACHE_TIME"));
        }

    	$this->assign('artData',$artData);
    	// 项目数据
        $proData = S('index_proData');

        if(!$proData){
            $proData = M('project')->order('psort desc')->select();
            S('index_proData',$proData,C("CACHE_TIME"));
        }

        $this->assign('title', "七七博客");
    	$this->assign('proData',$proData);

        $this->show();
    }
	
   
}
