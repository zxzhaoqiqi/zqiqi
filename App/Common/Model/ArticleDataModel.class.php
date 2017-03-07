<?php namespace Common\Model;

use Think\Model;

class ArticleDataModel extends Model{

	protected $tableName = 'article_data'; 

	protected $_validate = array(
		array('content','require','文章内容不能为空'),
	);

	public function checkTable(){
		if(!$this->create()){
			return $this->getError();
		}

		return false;
	}

}

?>
