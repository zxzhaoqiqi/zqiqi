<?php namespace Common\Model;

use Think\Model;

class TagModel extends Model{

	protected $tableName = 'tag'; 

	protected $_validate = array(
		array('tname','require','标签名不能为空'),
	);

	/**
	 * 添加
	 */
	public function store(){

		if(!$this->create()) return false;

		// 判断标签名不能为空 不能重复 循环添加
		$Arr = I('post.',array());
		$tnameArr = explode('|', $Arr['tname']);
		$tmpArr = array();
		foreach ($tnameArr as $k => $v) {
			// 如果$v不为空
			if($v){
				$tmp = $this->where("tname='{$v}'")->find();
				// 如果$v不存在
				if(!$tmp){
					$data['tname'] = $v;
					$this->add($data);
				}
			}
		}

		return true;

	}

	/**
	 * 编辑
	 */
	public function editTag(){

		if(!$this->create()) return false;
		$tid = I('post.tid',0,'intval');
		$this->where("tid={$tid}")->save();

		return true;

	}

}

	


 ?>
