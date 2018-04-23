<?php
namespace app\index\controller;
header("content-type:text/html;charset=utf8");
use think\Controller;
use think\Request; 
use think\Session;
use think\Cookie;
use app\index\model\Users;
class Member extends Controller
{
	//个人中心展示首页
    public function index()
    {
        $user_name = users('user_name')['user_name'];
        if(empty($user_name)){
            return $this->error('请先登录');
        }
        if(isset($user_name)){
            $this->assign('user_name',$user_name);
        }
        return $this->fetch();
    }

    //收货地址
    public function address()
    {
        
        $user_name = users('user_name')['user_name'];
        if(empty($user_name)){
            return $this->error('请先登录');
        }
        if(isset($user_name)){
            $this->assign('user_name',$user_name);
        }
        return $this->fetch();
    }

    //我的收藏
    public function collect()
    {
        $user_name = users('user_name')['user_name'];
        if(empty($user_name)){
            return $this->error('请先登录');
        }
        if(isset($user_name)){
            $this->assign('user_name',$user_name);
        }
        return $this->fetch();
    }

    //资金管理
    public function money()
    {
        
        $user_name = users('user_name')['user_name'];
        if(empty($user_name)){
            return $this->error('请先登录');
        }
        if(isset($user_name)){
            $this->assign('user_name',$user_name);
        }
        return $this->fetch();
    }

    //我的订单
    public function order()
    {
        $user_name = users('user_name')['user_name'];
        if(empty($user_name)){
            return $this->error('请先登录');
        }
        if(isset($user_name)){
            $this->assign('user_name',$user_name);
        }
        return $this->fetch();
    }

    //账户安全
    public function safe()
    {
        $Users = new Users();
        $user_name = users('user_name')['user_name'];
        $user_id = users('user_name')['user_id'];
        if(empty($user_name)){
            return $this->error('请先登录');
        }
        if($_POST){
            
            
        }else{
            if(isset($user_name)){
                $this->assign('user_name',$user_name);
            }
            return $this->fetch();
        }
    }

    //用户修改手机号
    public function safePhone()
    {
        $Users = new Users();
        $user_name = users('user_name')['user_name'];
        $user_id = users('user_name')['user_id'];
        $phone = trim(input('post.phone'));
        $phone = $Users->where('mobile_phone',$phone)->find();
        if(empty($phone)){
            return $this->success('手机号错误,请重新输入');
        }
        $data = ['mobile_phone' => trim(input('post.mobile_phone')),];
        $update = $Users->where('user_id',$user_id)->setField($data);
        if($update){
            return $this->success('修改成功','member/index');
        }
    }

    //用户修改邮箱
    public function safeEmail()
    {
        $Users = new Users();
        $user_name = users('user_name')['user_name'];
        $user_id = users('user_name')['user_id'];
        $email = trim(input('post.email'));
        $email = $Users->where('email',$email)->find();
        if(empty($email)){
            return $this->success('邮箱错误,请重新输入');
        }
        $data = ['email' => trim(input('post.member_email')),];
        $update = $Users->where('user_id',$user_id)->setField($data);
        if($update){
            return $this->success('修改成功','member/index');
        }
    }

    //用户修改密码
    public function safePwd()
    {
        $Users = new Users();
        $user_name = users('user_name')['user_name'];
        $user_id = users('user_name')['user_id'];
        $password = md5(trim(input('post.password')));
        $password = $Users->where('password',$password)->find();
        if(empty($password)){
            return $this->success('原密码错误,请重新输入');
        }
        $pwd1 = md5(trim(input('post.pwd1')));
        $pwd2 = md5(trim(input('post.pwd2')));
        if($pwd1 != $pwd2){
            return $this->success('两次密码不一致');
        }else{
            $data = ['password' => trim(input('post.pwd1')),];
            $update = $Users->where('user_id',$user_id)->setField($data);
            if($update){
                return $this->success('修改成功','member/index');
            }
        }
    }

    //用户信息
    public function user()
    {
        $Users = new Users();
        $user_name = users('user_name')['user_name'];
        if(empty($user_name)){
            return $this->error('请先登录');
        }
        if($_POST){
        }else{
            if(isset($user_name)){
                $this->assign('user_name',$user_name);
            }
            return $this->fetch();
        }
    }

    public function hh()
    {
        dump(users('user_name'));
    }
}
