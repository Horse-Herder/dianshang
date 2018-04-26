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
        $user_id = users('user_name')['user_id'];
        if(empty($user_name)){
            return $this->error('请先登录','login/login');
        }
        if(isset($user_name)){
            $user = \think\Db::table('ecs_users')->where('user_id',$user_id)->find();
            $this->assign([
                'user' => $user,
                'user_name' => $user_name,
            ]);
        }
        return $this->fetch();
    }

    //收货地址
    public function address()
    {
        
        $user_name = users('user_name')['user_name'];
        $user_id = users('user_name')['user_id'];
        $address = \think\Db::table('ecs_user_address')->where('user_id',$user_id)->find();
        if(empty($user_name)){
            return $this->error('请先登录','login/login');
        }
        if(isset($user_name)){
            $this->assign([
                'address' => $address,
                'user_name' => $user_name,
            ]);
        }
        return $this->fetch();
    }

    //收貨人信息
    public function addressdo()
    {
        $user_name = users('user_name')['user_name'];
        $user_id = users('user_name')['user_id'];
        $data = [
                    'country' => trim(input('country')),
                    'province' => trim(input('province')),
                    'city' => trim(input('city')),
                    'district' => trim(input('district')),
                    'user_id' => $user_id,
                    'consignee' => trim(input('consignee')),
                    'email' => trim(input('email')),
                    'address' => trim(input('address')),
                    'zipcode' => trim(input('zipcode')),
                    'mobile' => trim(input('mobile')),
                    'tel' => trim(input('tel')),
                    'sign_building' => trim(input('sign_building')),
                    'best_time' => trim(input('best_time')),
                ];
        $arr = \think\Db::table('ecs_user_address')->insert($data);
        return $this->success('修改成功','member/address');
    }

    //我的收藏
    public function collect()
    {
        $user_name = users('user_name')['user_name'];
        $user_id = users('user_name')['user_id'];
        if(empty($user_name)){
            return $this->error('请先登录','login/login');
        }
        if(isset($user_name)){
            $data = \think\Db::table('ecs_goods')
             ->alias('a')
             ->join('ecs_collection b', 'a.goods_id =b.goods_id')
             ->field('a.goods_name,a.market_price,a.goods_img,b.collection_id,b.crate_time')
             ->where('b.user_id ='.$user_id)
             ->select();
            $count = count($data);
            $collection= \think\Db::table('ecs_collection')->select();
            $this->assign([
                'count' => $count,
                'data' => $data,
                'user_name' => $user_name,
            ]);
        }
        return $this->fetch();
    }

    //执行收藏
    public function collectdo()
    {
        $user_name = users('user_name')['user_name'];
        $user_id = users('user_name')['user_id'];
        $goods_id = input('get.goods_id');
        $data = [
                'user_id' => $user_id,
                'goods_id' => $goods_id,
                'crate_time' => time(),
            ];
        $arr = \think\Db::table('ecs_collection')->insert($data);
        return $this->success('收藏成功','member/collect');
    }

    //删除收藏
    public function collectdel()
    {
        $id = input('get.id');
        $arr = \think\Db::table('ecs_collection')->where('collection_id',$id)->delete();
        return $this->success('删除成功','member/collect');
    }
    

    //资金管理
    public function money()
    {
        
        $user_name = users('user_name')['user_name'];
        if(empty($user_name)){
            return $this->error('请先登录','login/login');
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
            return $this->error('请先登录','login/login');
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
            return $this->error('请先登录','login/login');
        }
        if(isset($user_name)){
            $this->assign('user_name',$user_name);
        }
        return $this->fetch();
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
        $user_id = users('user_name')['user_id'];
        if(empty($user_name)){
            return $this->error('请先登录','login/login');
        }
        if($_POST){
        }else{
            if(isset($user_name)){
                $this->assign('user_name',$user_name);
            }
            $user = \think\Db::table('ecs_users')->where('user_id',$user_id)->find();
            $last_login = date("Y-m-d H:i:s",$user['last_login']);
            $reg_time = date("Y-m-d H:i:s",$user['reg_time']);
            $this->assign([
                'user' => $user,
                'last_login' => $last_login,
                'reg_time' => $reg_time,
            ]);
            return $this->fetch();
        }
    }

    //修改用户头像
    public function img()
    {
        return $this->fetch();
    }

    //修改用户头像
    public function imgdo()
    {
        $Users = new Users();
        $user_name = users('user_name')['user_name'];
        $user_id = users('user_name')['user_id'];
        $file = request()->file('answer'); 
        if(empty($file)){ 
          $this->error('请选择上传文件'); 
        }   
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/user/');
        // dump($info);die;
        if($info){
            $url = 'uploads/user/'.$info->getSaveName();
            $img = str_replace("\\", "/", $info->getSaveName());
            $url = '/uploads/user/'.$img;
            $data = $Users->where('user_id',$user_id)->setField('answer',$url);
            $this->success('文件上传成功','member/user'); 
        }else{
            //上传失败获取错误信息 
            $this->error($file->getError());
        }
    }

    //测试用户信息sesssion
    public function hh()
    {
        dump(users('user_name'));
    }

    //测试接口
    public function interface()
    {
        $id = input('get.id');
        $name = input('get.name');
        $pwd = input('get.pwd');
        $data = [
            'id' => $id,
            'name' => $name,
            'pwd' => $pwd,
        ];
        return json_encode($data);die;
    }

    //获取用户ip
    public function ip()
    {
        dump($_SERVER['REMOTE_ADDR']);
    }
}
