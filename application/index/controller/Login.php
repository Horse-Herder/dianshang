<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Users;
use think\Db;
use think\Session;
use think\Cookie;

//添加自动加载支持
class Login extends Controller
{
	//前台登录
	public function login()
	{  
        $Users = new Users();
        if($_POST){
            $name = trim(input('post.user_name'));
            $password = md5(trim(input('post.password')));
            $user_name = $Users->where('user_name',$name)->find();
            $pwd = $Users->where('password',$password)->find();
            if(empty($user_name)){
                return $this->success('账号错误');
            }
            if(empty($pwd)){
                return $this->success('密码错误');
            }else{
                //设置七天免登陆
                $f_enter = input('post.f_enter');
                if (!empty($f_enter)) {
                    Cookie::set('user_name',$user_name,3600*24*7);
                }
                $user_id = $user_name['user_id'];
                $data = [
                    'last_login' => time(),
                ];
                $update = $Users->where('user_id',$user_id)->setField($data);
                Session::set('user_name',$user_name);
                return $this->success('登录成功','show/index');
            }
        }else{
            $user_name = Cookie::get('user_name');
            if(isset($user_name)){
                $user_name=json_decode($user_name,true);
             $this->assign('user_name',$user_name);
            }
            return $this->fetch();
        }
	}

	//前台注册
	public function regist()
	{
        $Users = new Users();
		if($_POST){
            $verifyCode = input('post.verifyCode');
            if(!captcha_check($verifyCode)) {
                $this->error('验证码不正确');
            }
            $password = input('post.password');
            $pwd = input('post.pwd');
            if($password != $pwd){
                return $this->success('两次密码不一致');
            }else{
                $data = [
                    'user_name' => trim(input('user_name')),
                    'password' => md5(trim(input('password'))),
                    'mobile_phone' => trim(input('mobile_phone')),
                    'email' => trim(input('email')),
                    'reg_time' => time(),
                ];
                $name = $data['user_name'];
                $user_name = $Users->where('user_name',$name)->find();
                if($name === $user_name['user_name']){
                    return $this->success('名称已注册','login/regist');
                }else{
                    $add =  $Users->insert($data);
                    return $this->success('注册成功','login/login');
                }
            }
        }else{
            $user_name = Cookie::get('user_name');
            if(isset($user_name)){
                $user_name=json_decode($user_name,true);
             $this->assign('user_name',$user_name);
            }
            return $this->fetch();
        }
	}

    //忘记密码
    public function pwd()
    {
        $Users = new Users();
        if($_POST){
            $yzm_email = Cookie::get('email');
            $name = input('post.user_name');
            $user_name = $Users->where('user_name',$name)->find();
            if(empty($user_name)){
                return $this->success('账号错误,没有这个账号');
            }
            $email = input('post.email');
            $email = $Users->where('email',$email)->find();
            if(empty($email)){
                return $this->success('邮箱错误,请重新输入');
            }
            $yzm = input('post.yzm');
            if($yzm_email != $yzm){
                return $this->success('验证码错误,请重新输入');
            }
            $user_id = $user_name['user_id'];
            $data = [
                'password' => md5(trim(input('post.password'))),
            ];
            $update = $Users->where('user_id',$user_id)->setField($data);
            if($update){
                return $this->success('修改成功','login/login');
            }else{
                return $this->success('修改失败');
            }
        }else{
            $user_name = Cookie::get('user_name');
            if(isset($user_name)){
                $user_name=json_decode($user_name,true);
             $this->assign('user_name',$user_name);
            }
            return $this->fetch();
        }
    }

    //邮箱
    public function email() {
        $now = time();    
        $data = input('post.yzm');
        $email = rand(1000,9999);
        Cookie::set('email',$email);
        $toemail=$data;
        $up_time=Cookie::get('time');
        if($up_time && $now - $up_time < 60){
            echo "1";die;
        }
        $name='验证';
        $subject='验证码';
        $content='你的验证码为'.$email;
        dump(send_mail($toemail,$name,$subject,$content));
        Cookie::set('time',$now);
    }

    //退出
    public function out()
    {
        Cookie('user_name',null);
        Session('user_name',null);
        $this->success('退出成功','show/index');
    }
}