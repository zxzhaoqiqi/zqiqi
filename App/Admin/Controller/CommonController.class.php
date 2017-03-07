<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * 后台公共控制器
 */
class CommonController extends Controller {

	public function __construct(){
        parent::__construct();
		$this->auth();

	}

    /**
     * 判断自动登录
     */
    public function auth(){

        if(!isset($_SESSION['mname']) || !isset($_SESSION['mid'])){
            $this->error('请先登录', U('Admin/Manage/index'));
        }

    }

}
