<?php namespace Common\Model;

use Think\Model;

class ManageModel extends Model{


	//定义表名 不带表前缀
	protected $tableName = 'manage'; 


	// 自动验证
	protected $_validate = array(
		array('mname','require','用户名不能为空'),
		array('password','require','密码不能为空'),
		array('cpassword', 'password', '确认密码不正确', 0, 'confirm'),
	);

	/**
	 * 登陆
	 */
	public function login($data){
		
		// 触发自动验证
		if(!$this->create()) return false;
		
		$mname = I('post.mname','');
		$password = $this->encrypt($mname,I('post.password',''));

		// 判断用户名密码
		$result = $this->where("mname='{$mname}' AND password='{$password}'")->find();

		if(!$result){
			$this->error = '用户名或密码不正确';
			return false;
		}

		// 设置session 
		$_SESSION['mname']=$result['mname'];
		$_SESSION['mid']  =$result['mid'];

		return true;

	}

	/**
	 * 修改密码
	 */
	public function changePwd(){

		if(!$this->create()) return false;

		$mname = I('post.mname','');

		// 判断用户名存在不存在
		$data = $this->where("mname = '{$mname}'")->find();
		if(!$data){
			$this->error = '用户名不存在';
			return false;
		}

		$password = I('post.password','');

		$password = $this->encrypt($mname, $password);

		// 修改操作
		$this->where("mname='{$mname}'")->save(array('password'=>$password));
		return true;
	}

	/**
	 * 加密方法
	 */
	public function encrypt($name, $password){

		return md5($name.md5($password).'zx');

	}

} 

 ?>
