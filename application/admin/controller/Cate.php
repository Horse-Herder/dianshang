<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Category;
use think\Db;
use think\Request;
class Cate extends Controller
{
	/**
	**分类展示
	*/
	public function goods_type()
	{
		$cate = Db::name('category')->select();
		$type = $this->resort($cate,0,0);
		// echo "<pre>";
		// var_dump($type);
		return $this->fetch('goods_type',['type'=>$type]);
	}
	/**
	*添加分类
	*/
	public function add_goods_type()
	{
		if(request()->isPost())
		{
			$data = input('post.');
			$data['cate_name']= trim($data['cate_name']);
			$data['keywords']= trim($data['keywords']);
			$data['cate_desc']= trim($data['cate_desc']);
			$data['parent_id']= trim($data['parent_id']);
			$data['sort_order']= trim($data['sort_order']);
			$data['is_show']= trim($data['is_show']);
			$data['add_time'] = time();
			$res = Db::table('ecs_category')->where(['cate_name'=>$data['cate_name']])->find();
			if($res['cate_name'] != $data['cate_name']){
				if(Category::insert($data)){
					$this->success('添加成功','cate/goods_type');
				}else{
					$this->orror('添加失败','cate/add_goods_type');
				}
			}else{
				$this->error('该分类已经存在');
			}
		}else{
			$cate = Db::name('category')->select();
			$type = $this->category($cate,0,0);
			return $this->fetch('add_goods_type',['type'=>$type]);
		}
	}


	public function cate_del()
	{
		$cate_id=Request::instance()->param('cate_id');
		 $result = Category::destroy($cate_id);
            if($result)
            {
                $this->success("删除成功",'cate/goods_type');
            }else{
                $this->error("删除失败",'cate/goods_type');
            }
	}

	public function  edit_cate()
	{
		$cate_id=Request::instance()->param('cate_id');
        $data = Category::find($cate_id);
        $cate = Db::name('category')->select();
		$type = $this->resort($cate,0,0);
        return $this->fetch('edit_cate',['data'=>$data,'type'=>$type]);
			
	}

	public function cate_update()
	{
		$cate = new Category();
		$data = input('post.');
		$result = $cate->save([
			    
				'cate_name'=> trim(input('post.cate_name')),
				'keywords'=> trim(input('post.keywords')),
				'cate_desc'=> trim(input('post.cate_desc')),
				'parent_id'=> trim(input('post.parent_id')),
				'sort_order'=> trim(input('post.sort_order')),
				'is_show'=> trim(input('post.is_show')),
				'add_time' => time()
			],['cate_id' => input('post.cate_id')]);
		if($result)
            {
                $this->success("修改成功",'cate/goods_type');
            }else{
                $this->error("修改失败",'cate/goods_type');
            }

	}






	public function resort($data,$parentid=0,$level=0){
        static $ret = array();
        foreach ($data as $key => $v) {
            if ($v['parent_id']==$parentid) {
                $v['level']=$level;
                $ret[]=$v;
                $this->resort($data,$v['cate_id'],$level+1);
            }
        }
        return $ret;
	}

	//无限极分类展示
    function category($data,$parent_id=0,$level=0){  
        $arr=array();  
            foreach($data as $k=>$v){  
                if($v['parent_id']==$parent_id){
                	$flg = str_repeat('└―',$level);  
                    $v['level']=$level;  
                    $v['child']=$this->category($data,$v['cate_id'],$level+1);  
                    $arr[]=$v;  
                }  
            }      
         return $arr;  
    }
}