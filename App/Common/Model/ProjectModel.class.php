<?php namespace Common\Model;

use Think\Model;

class ProjectModel extends Model{

	protected $tableName = 'project'; 

	protected $_validate = array(
		array('pname','require','项目名称不能为空'),
		array('pname','项目名称已经存在','',1,'unique'),
		array('digest','require','项目排序不能为空'),
		array('psort','require','项目排序不能为空'),
		array('psort',array(1,100),'项目排序只能是1到100的数字',1,'between'),
		array('list','require','项目图不能为空'),
	);

	/**
	 * 添加
	 */
	public function store(){

		if(!$this->create()) return false;

		$this->add();

		return true;

	}

	/**
	 * 剪辑
	 */
	public function editData(){

		if(!$this->create()) return false;
		$pid = I('post.pid',0,'intval');
		$this->where("pid={$pid}")->save();

		return true;

	}

}

?>
