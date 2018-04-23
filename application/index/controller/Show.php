<?php
namespace app\index\controller;
use think\Request; 
use think\Controller;
use think\Session;
use think\Cookie;
error_reporting(0);//关闭错误报告
class Show extends Controller
{
	//前台展示首页
    public function index()
    {
        $user_name = users('user_name')['user_name'];
        if(isset($user_name)){
            $this->assign('user_name',$user_name);
        }
        return $this->fetch();
    }

    //产品管理
    public function product()
    {
        return $this->fetch();
    }

}

