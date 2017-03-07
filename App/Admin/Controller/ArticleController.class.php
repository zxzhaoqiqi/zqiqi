<?php namespace Admin\Controller;

class ArticleController extends CommonController{

	public function _initialize(){
        //此处为解决Uploadify在火狐下出现http 302错误 重新设置SESSION
        $session_name = session_name();
        if (isset($_POST[$session_name])) {
            session_id($_POST[$session_name]);
            session_start();
        }
            //执行登陆验证检测函数
    }



	/**
	 * 标签展示页面
	 */
	public function index(){
		
		$model = M('Article');

		$count      = $model->where("is_recyle=0")->count();// 查询满足要求的总记录数

		if(!$count){
			$this->error("空空的先去添加吧！",'add');
		}

		$Page       = new \Org\Zx\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $model->where("is_recyle=0")->order('aid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出

		$this->display();

	}

	/**
	 * 回收站
	 */
	public function recyle(){
		$model = M('Article');

		$count      = $model->where("is_recyle=1")->count();// 查询满足要求的总记录数

		if(!$count){
			$this->error("没有东西,去别处看看吧",'index');
		}

		$Page       = new \Org\Zx\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $model->where("is_recyle=1")->order('aid desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出

		$this->display();

	}

	/**
	 * 删除到回收站
	 */
	public function delRecyle(){
		$aid = I('get.aid',0,'intval');
		
		M("Article")->where("aid={$aid}")->save(array('is_recyle'=>1));
		$this->success('丢到回收站啦，可以恢复的',U('recyle'));
	}

	/**
	 * 回收站恢复
	 */
	public function recover(){
		$aid = I('get.aid',0,'intval');
		M("Article")->where("aid={$aid}")->save(array('is_recyle'=>0));
		$this->success('恢复成功\(^o^)/~',U('index'));
	}

	/**
	 * 真正删除
	 */
	public function realdel(){
		$aid = I('get.aid',0,'intval');
		(new \Common\Model\ArticleModel())->delData($aid);
		$this->success('删除成功',U('recyle'));
	}

	/**
	 * 标签添加页面
	 */
	public function add(){
		
		if(IS_AJAX){

			$model = D('Article');
            
            if(!$model->store()){

               echo json_encode(array('status'=>false,'message'=> $model->getError()));
               

            }else{

               echo json_encode(array('status'=>true,'message'=> '添加成功'));

            }

            exit;

		}

		// 获取所有分类的树形数据
		$cateData = (new \Common\Model\CategoryModel())->getAllData();
		$this->assign('cateData',$cateData);

		$tagData = (new \Common\Model\TagModel())->select();
		$this->assign('tagData',$tagData);

		$this->display();
	}

	/**
	 * 标签编辑页面
	 */
	public function edit(){

		if(IS_AJAX){

			$model = D('Article');
            
	        if(!$model->editData()){

	           echo json_encode(array('status'=>false,'message'=> $model->getError()));
	           

	        }else{

	           echo json_encode(array('status'=>true,'message'=> '编辑成功'));

	        }

	        exit;

		}

		$aid = I('get.aid',0,'intval');
		// 文章表数据
		$oldData = M('Article')->where("aid={$aid}")->find();

		// 文章数据表
		$data = M('ArticleData')->where("article_aid={$aid}")->find();
		$oldData['content'] = $data['content'];

		// 文章标签表
		$tagData = M("ArticleTag")->where("article_aid={$aid}")->select();
		foreach ($tagData as $k => $v) {
			$oldData['tag'][] = $v['tag_tid'];
		}
		$this->assign('oldData',$oldData);

		// sp($oldData);

		$cateData = (new \Common\Model\CategoryModel())->getAllData();
		$this->assign('cateData',$cateData);

		$tagData = (new \Common\Model\TagModel())->select();
		$this->assign('tagData',$tagData);


		$this->display();
		
	}

	/**
	 * 标签删除
	 */
	public function del(){

		$model = M('Article');
		
		$aid = I('get.aid',0,'intval');
		$model->delete($aid);
		$this->success('删除成功', U('index'));
		
	}

	/**
	 * 上传方法
	 * @return [type] [description]
	 */
	public function upload(){
		$config = array(    
			'maxSize'    =>    3145728,    
			'savePath'   =>    'Uploads/',    
			'saveName'   =>    array('uniqid',''),    
			'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),    
			'autoSub'    =>    true,    
			'subName'    =>    array('date','md'),
		);
		$upload = new \Think\Upload($config);// 实例化上传类
		$info = $upload->upload();
		/** $file内部就是以下这个数组
	            $file = array(
	                0 => array(
	                'path' => 'Upload/Content/15/8/123981239172.jpg'    ,
	                'url' => 'http://localhost/cms_edu/Upload/Content/15/8/123981239172.jpg',
	                'image' => 1
	            ),
	        );**/

		if($info){
			foreach ($info as $v) {
				$path = 'Uploads/'.$v['savepath'].$v['savename'];
			}
			$return = array(
	            	'path' => $path,
	            	'url'  => __ROOT__ .'/'.$path
	            );
            echo json_encode($return);exit;
        } else {
          
           exit(json_encode($upload->getError()));
        }


	}

}



 ?>
