<?php namespace Admin\Controller;
use Think\Controller;
use Org\Zx\Data;
class CategoryController extends CommonController{

	protected $model;

	public function __construct(){
		parent::__construct();
		$this->model = new \Common\Model\CategoryModel();
	}

	/**
	 * 标签展示页面
	 */
	public function index(){
		

		$data = $this->model->getAllData();

		if(!$data){
			$this->error("空空的先去添加吧！",'add');
		}

		$this->assign('data', $data);
		

		$this->display();

	}

	/**
	 * 标签添加页面
	 */
	public function add(){
		
		if(IS_AJAX){

			$model = D('Category');
            
            if(!$model->store()){

               echo json_encode(array('status'=>false,'message'=> $model->getError()));
               

            }else{

               echo json_encode(array('status'=>true,'message'=> '添加成功'));

            }

            exit;

		}

		// 获取所有的分类数据
		$cateData = $this->model->getAllData();
		$this->assign('cateData', $cateData);

		$this->display();
	}

	/**
	 * 添加子分类
	 */
	public function addSon(){

		if(IS_AJAX){

			$model = D('Category');
            
	        if(!$model->store()){

	           echo json_encode(array('status'=>false,'message'=> $model->getError()));
	           

	        }else{

	           echo json_encode(array('status'=>true,'message'=> '添加子分类成功'));

	        }

	        exit;

		}

		$cid = I('get.cid',0,'intval');

		// 获取父级分类
		$model = M('Category');
		$parent = $model->where("cid={$cid}")->find();
		$this->assign('parent',$parent);

		$this->display();
	}

	/**
	 * 标签编辑页面
	 */
	public function edit(){

		if(IS_AJAX){

			$model = D('Category');
            
	        if(!$model->editData()){

	           echo json_encode(array('status'=>false,'message'=> $model->getError()));
	           

	        }else{

	           echo json_encode(array('status'=>true,'message'=> '编辑成功'));

	        }

	        exit;

		}

		// 获取旧数据
		$cid = I('get.cid',0,'intval');
		$data = M('Category')->where("cid={$cid}")->find();
		$this->assign('oldData', $data);

		// 获取所有分类的数据
		$cateData = $this->model->getAllData();
		$this->assign('cateData',$cateData);		

		// 获取不包含自己和自己子级的数据
		$sonCids = $this->model->getSonCid($cid);
		$sonCids[] = $cid;
		$this->assign('sonCids',$sonCids);

		$this->display();
	}

	/**
	 * 标签删除
	 */
	public function del(){

		$model = new \Common\Model\CategoryModel();
		
		$model->delData();
		$this->success('删除成功', U('index'));
		
	}

}



 ?>
