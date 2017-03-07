<?php namespace Common\Model;

use Think\Model;

class LinkModel extends Model{
    protected $tableName = 'link'; 
    protected $_validate = array(
        array('lname','require','友情链接名不能为空'),
        array('url','require','友情链接地址不能为空'),
        array('url','url','请填写正确的网址格式'),
    );
    /**
     * 添加
     */
    public function store(){
        if(!$this->create()) return false;
        $Arr = I('post.',array());
        $this->add();
        
        return true;
    }

    /**
     * 编辑
     */
    public function editData(){
        if(!$this->create()) return false;
        $lid = I('post.lid',0,'intval');
        $this->where("lid={$lid}")->save();
        return true;
    }

}
 ?>
