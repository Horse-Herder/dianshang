<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request; 
class Category extends Controller
{

	public function index()
	{
		$user_name = users('user_name')['user_name'];
        if(isset($user_name)){
            $this->assign('user_name',$user_name);
        }
		return $this->fetch();
	}

	// 分类信息
	public function list()
	{
		$user_name = users('user_name')['user_name'];
        if(isset($user_name)){
            $this->assign('user_name',$user_name);
        }
        $cate_id=Request::instance()->param('cate_id');
        $goods = Db('goods')->where('cate_id',$cate_id)->select();
        $this->assign('goods',$goods);
		return $this->fetch();
	}

}