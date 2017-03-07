<?php namespace Common\Model;

use Think\Model;
use Org\Zx\Data;
class CategoryModel extends Model{

	protected $table = 'category';

	protected $_validate = array(
		array('cname','require','分类名称不能为空'),
		array('cname','分类名称已经存在','',1,'unique'),
		array('csort','require','分类排序不能为空'),
		array('csort',array(1,100),'分类排序只能是1到100的数字',1,'between'),
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
	 * 编辑
	 */
	public function editData(){

		if(!$this->create()) return false;

		$cid = I('post.cid',0,'intval');

		$this->where("cid={$cid}")->save();

		return true;

	}

	/**
	 * 查询所有的数据 变成树形数据
	 */
	public function getAllData(){

		// 查询所有的分类
		$cateData = $this->order('csort desc')->select();
		$cateData = Data::tree($cateData, 'cname');

		return $cateData;

	}

	/**
	 * 传递cid 获取所有的子级
	 */
	public function getSonCid($cid){

		$data = $this->getAllData();
		
		static $tmp = array();
		foreach ($data as $k => $v) {
			if($v['pid'] == $cid) {
				$tmp[] = $v['cid'];
				$this->getSonCid($v['cid']);
			}
		}
		return $tmp;

	}

	/**
	 * 删除
	 * @return [type] [description]
	 */
	public function delData(){

		$cid = I('get.cid',0,'intval');

		// 获取父级分类 将所有子分类的层级体改一级
		$pidData = $this->where("cid={$cid}")->field('pid')->find();
		$this->where("pid={$cid}")->save($pidData);

		// 将所有文章的层级提高一级
		$model = new \Common\Model\ArticleModel();
		$model->where("cateData_cid={$cid}")->save($pidData);

		// 删除该条分类
		$this->delete($cid);

	}

}



 ?>
