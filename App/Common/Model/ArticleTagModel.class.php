<?php namespace Common\Model;

use Think\Model;

class ArticleTagModel extends Model{

	protected $tableName = 'article_tag'; 

	protected $_validate = array(
		
	);

	public function checkTable(){
		if(!$this->create()){
			return $this->getError();
		}

		return false;
	}

}

?>
