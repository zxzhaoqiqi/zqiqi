<?php namespace Admin\Controller;

class LinkController extends CommonController{

    /**
     * 标签展示页面
     */
    public function index(){
        $model = M('Link');
        $count      = $model->count();// 查询满足要求的总记录数
        if(!$count){
            $this->error("空空的先去添加吧！",'add');
        }
        $Page       = new \Org\Zx\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $model->order('lid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();

    }

    /**
     * 标签添加页面
     */
    public function add(){
        if(IS_AJAX){
            $model = D('Link');
            if(!$model->store()){
               echo json_encode(array('status'=>false,'message'=> $model->getError()));
            }else{
               echo json_encode(array('status'=>true,'message'=> '添加成功'));
            }
            exit;
        }
        $this->display();
    }

    /**
     * 标签编辑页面
     */
    public function edit(){
        if(IS_AJAX){
            $model = D('Link');
            if(!$model->editData()){
               echo json_encode(array('status'=>false,'message'=> $model->getError()));
            }else{
               echo json_encode(array('status'=>true,'message'=> '编辑成功'));
            }
            exit;
        }
        $lid = I('get.lid',0,'intval');
        $data = M('Link')->where("lid={$lid}")->find();
        $this->assign('oldData', $data);
        $this->display();
    }

    /**
     * 标签删除
     */
    public function del(){
        $model = M('Link');
        $lid = I('get.lid',0,'intval');
        $model->delete($lid);
        $this->success('删除成功', U('index'));
        
    }
}

 ?>
