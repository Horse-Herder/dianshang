<?php
namespace app\admin\controller;
use think\Controller;
use think\Session;
use app\admin\model\User;
class Login extends Controller
{
	/**
	 * [login 后台管理员登录页面]
	 * @return [type] [description]
	 */
	public function login()
    {
    	
	    return $this->fetch();
    	
    }

    /**
     * [login_do 后台管理员登录操作]
     * @return [type] [description]
     */
    public function login_do()
    {
    	$data = input('post.');
        if($data['user_name']==""){
            $this->error('用户名不能为空');
            die;
        }

        if($data['user_pwd']==""){
            $this->error('密码不能为空');
            die;
        }
    	$userModel = new User();
        $insert = [
            'user_name'=>$data['user_name'],
            'password'=>md5($data['user_pwd'])
        ];
    	$login_info = $userModel->where($insert)->find();
    	if($login_info){
            Session::set('user',$login_info,'admin');

            $this->success('登录成功', 'index/index');
        }else{
            $this->error('登录失败');
        }
    }
}