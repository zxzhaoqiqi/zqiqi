<?php
namespace Admin\Controller;
use Think\Controller;


/**
 * 用户控制器
 */
class ManageController extends Controller {

	

    /**
     * 登录页面
     */
    public function index(){

    	$this->display();
    	
    }

    /**
     * 登录方法
     */
    public function login(){

        if(IS_AJAX){

            $userModel = D('Manage');
            
            if(!$userModel->login(I('post.'))){

               echo json_encode(array('status'=>false,'message'=> $userModel->getError()));
               

            }else{

               echo json_encode(array('status'=>true,'message'=> '登陆成功'));

            }

            exit;

        }

    }


    /**
     * 修改密码
     */
    public function changePwd(){

        if(IS_AJAX){

            $userModel = D('Manage');
            
            if(!$userModel->changePwd()){

               echo json_encode(array('status'=>false,'message'=> $userModel->getError()));
               

            }else{

               echo json_encode(array('status'=>true,'message'=> '修改成功'));

            }

            exit;

        }


        $this->display();
    }

    /**
     * 退出
     */
    public function out(){

        unset($_SESSION['mname']);
        unset($_SESSION['mid']);

        $this->success('退出成功','index',3);

    }

}
