<?php namespace Common\Model;

use Think\Model;
use Think\Upload;
use Think\Image;
class ArticleModel extends Model{

	protected $tableName = 'article'; 

	protected $_validate = array(
		array('title','require','标题不能为空'),
		array('author','require','作者不能为空'),
		array('digest','require','描述不能为空'),
		array('category_cid','require','分类不能为空'),
		array('asort','require','排序不能为空'),
		array('asort',array(1,100),'排序只能是1到100的数子','between',1),
	);

	protected $_auto = array(
		array('sendtime','time',1,'function'),
		// array('thumb','img',3,'callback'),
	);

	
	/**
	 * 验证表
	 */
	public function checkVali(){
		// 验证第一张表
		if(!$this->create()) return false;

		// 验证第二张表
		$tagModel = new \Common\Model\ArticleTagModel();
		if($tagModel->checkTable()){
			$this->error = $tagModel->checkTable();
			return false;
		}
		// 验证第三张表
		$dataModel = new \Common\Model\ArticleDataModel();
		if($dataModel->checkTable()){
			$this->error = $dataModel->checkTable();
			return false;
		}

		return true;
	}
	
	/**
	 * 添加第二张表
	 */
	public function addTwo($aid){

		$tagArr = I('post.tag_tid',array());

		foreach ($tagArr as $v) {
			$data = array(
				'article_aid' => $aid,
				'tag_tid'     => $v,
			);

			M('ArticleTag')->add($data);

		}
	}

	/**
	 * 添加
	 */
	public function store(){

		// 验证表
		if(!$this->checkVali()) return false;

		// 添加第一张表
		$aid = $this->add();

		// 添加第二张表
		$this->addTwo($aid);

		
		// 添加第三张表
		$contentData = array(
			'article_aid' => $aid,
			'content'     => $_POST['content'],
		);
		M('ArticleData')->add($contentData);
		return true;

	}

	/**
	 * 删除第二张表
	 */
	public function delTwo($aid){

		M('ArticleTag')->where("article_aid={$aid}")->delete();

	}

	/**
	 * 编辑
	 */
	public function editData(){

		// 验证表
		if(!$this->checkVali()) return false;

		$aid = I('post.aid',0,'intval');

		// 修改第一张表
		$this->where("aid={$aid}")->save();

		// 删除第二张表
		$this->delTwo($aid);

		// 添加第二张表
		$this->addTwo($aid);

		// 修改第三张表
		M('ArticleData')->where("article_aid={$aid}")->save(array('content'=>$_POST['content']));

		return true;

	}

	/**
	 * 删除
	 */
	public function delData($aid){

		// 删除第一张表
		$this->delete($aid);

		// 删除第二张表
		$this->delTwo($aid);

		// 删除第三张表
		M('ArticleData')->where("article_aid={$aid}")->delete();

	}

}

	


 ?>
