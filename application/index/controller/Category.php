<?php
namespace app\index\controller;
use think\Controller;

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


	public function list()
	{
		$user_name = users('user_name')['user_name'];
        if(isset($user_name)){
            $this->assign('user_name',$user_name);
        }
		return $this->fetch();
	}

}