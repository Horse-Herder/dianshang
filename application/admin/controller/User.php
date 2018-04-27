<?php
namespace app\admin\controller;
use think\Controller;   
use think\Db;
use app\admin\model\Url;
use think\Request;
use app\admin\controller\Base;
class User extends Base
{


/**************管理员管理***********************/

	/**
	 * [user 管理员列表]
	 * @return [type] [description]
	 */
	public function user()
    {
        $user_info = Db::name('admin_user')->select();

         return $this->fetch('user',['user_info'=>$user_info]);
    }

    /**
     * [add_user 管理员添加]
     */
	public function add_user()
    {
        if($_POST){
            $post = input('post.');
            //判断名户名唯一性
            $userName_one = Db::name('admin_user')->where(['user_name' => $post['user_name']])->find();
            if($userName_one){
                 $this->error('该用户名已存在');
                 exit();
            }

             //判断手机号唯一性
            $userName_one = Db::name('admin_user')->where(['user_phone' => $post['user_phone']])->find();
            if($userName_one){
                 $this->error('该手机号已存在');
                 exit();
            }

             //判断邮箱唯一性
            $userName_one = Db::name('admin_user')->where(['user_email' => $post['user_email']])->find();
            if($userName_one){
                 $this->error('该邮箱已存在');
                 exit();
            }

            $post['add_time']=time();
            $post['last_login']=time();
            $post['last_ip'] = '127.0.0.1';
            $file = request()->file('user_img');
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'. DS . 'adminuser');
                if($info){
                    $img = "/uploads/adminuser/".$info->getSaveName();
                    $post['user_img'] = str_replace('\\', '/', $img);
                    $access_id = $post['access_id'];
                    unset($post['qr_password']);
                    unset($post['access_id']);
                    $post['password'] = md5($post['password']);
                    $userInfo = Db::name('admin_user')->insert($post);
                    $user_id =  Db::name('admin_user')->getLastInsID();
                    if($userInfo){
                         $userAccess_info = Db::name('user_access')->insert(['access_id'=>$access_id,'user_id'=>$user_id]);
                         if($userAccess_info){
                                $this->redirect('admin/user/user');
                         }
                    }else{
                         $this->error('请选择上传的头像');
                    }
                }else{
                    // 上传失败获取错误信息
                    echo $file->getError();
                }
            }else{
                $this->error('请选择上传的头像');
            }
        }else{
            $accessInfo = Db::name('admin_access')->select();
            return $this->fetch('add_user',['accessInfo'=>$accessInfo]);
        }
       
    }

    /**
     * [user_del 管理员删除]
     * @return [type] [description]
     */
    public function user_del()
    {
        
        $user_id = input('get.user_id');
        $user_del = Db::name('admin_user')->where('user_id',$user_id)->where("user_name!='admin'")->delete();
        $user_access_del = Db::name('user_access')->where('user_id',$user_id)->delete();
        if($user_del and $user_access_del){
            $info['status'] = "1";
        }else{
           $info['status'] = "0";
           $info['error'] = "删除失败";
        }
        echo json_encode($info);
        
    }

    /**
     * [user_delall 管理员批量删除]
     * @return [type] [description]
     */
    /*public function user_delall()
    {
        
        $user_id = input('post.');
        var_dump($user_id);
        $user_del = Db::name('admin_user')->where('user_id',$user_id)->delete();
        $user_access_del = Db::name('user_access')->where('user_id',$user_id)->delete();
        if($user_del and $user_access_del){
            $info['status'] = "1";
        }else{
           $info['status'] = "0";
           $info['error'] = "删除失败";
        }
        echo json_encode($info);
        
    }*/

    /**
     * [user_up 管理员修改页面]
     * @return [type] [description]
     */
    public function user_up()
    {


    }


    /**
     * [user_updo 管理员修改操作]
     * @param  string [description]
     * @return [type] [description]
     */
    public function user_updo()
    {

    }
/**************角色管理***********************/

	/**
	 * [access 角色列表]
	 * @return [type] [description]
	 */
    public function access()
    {   
        $accessInfo = Db::name('admin_access')->select();
        foreach ($accessInfo as $key => $val) {
            $accessInfo[$key]['access_user'] = Db::name('user_access')->where(['access_id'=>$val['access_id']])->select();
            $accessInfo[$key]['number'] = count($accessInfo[$key]['access_user']);
        }
    	return $this->fetch('',['accessInfo'=>$accessInfo]);
        
    }


    /**
     * [add_access 角色添加]
     * @return [type] [description]
     */
     public function access_add()
    {

        if($_POST){

            Db::startTrans();
            $post = input('post.');
            $key = array_keys($post);
            if(!in_array("user_id", $key)){
                $this->error('请选择管理员');
                exit();
            }else{
                $user_arr= $post['user_id'];
            }
            

            if(!in_array("url_id", $key)){
                $this->error('请选择权限');
                exit();
            }else{
                $url_arr= $post['url_id'];
            }
            $access_name = $post['access_name'];
            $access_desc = $post['access_desc'];
            $accessName = Db::name('admin_access')->where(['access_name'=>$post['access_name']])->find();
            if (!$accessName) {
                $access_info = Db::name('admin_access')->insert(['access_name'=>$access_name,'access_desc'=>$access_desc]);
                $accessId = Db::name('admin_access')->getLastInsID();
                if($access_info){
                    foreach ($user_arr as $key => $val) {
                        $userAccess_info = Db::name('user_access')->insert(['access_id'=>$accessId,'user_id'=>$val]);
                    }
                        if (!$userAccess_info) {
                             Db::rollback();
                             $this->error('添加角色失败');
                        }

                    foreach ($url_arr as $key => $val) {
                        $userAccess_info = Db::name('access_url')->insert(['access_id'=>$accessId,'url_id'=>$val]);
                    }
                        if (!$userAccess_info) {
                             Db::rollback();
                             $this->error('添加角色失败');
                        }

                    $this->redirect("user/access");
                }else{
                    $this->error('添加角色失败');
                }
            }else{
                $this->error("角色名称已存在");
            }
            
        }else{
            $user_info = Db::name('admin_user')->field('user_id,user_name')->select();
            $url_info = Db::name('admin_url')->where('url_status=1')->select();
            $url_wx = $this -> category($url_info);
            return $this->fetch('access_add',['user_info'=>$user_info,'url_info'=>$url_wx]);
        }
        
    }

    /**
     * [access_del 角色删除]
     * @return [type] [description]
     */
    public function access_del()
    {
        if($_POST){
            $post = input('post.');
            $access_id = $post['access_id'];
        }else{
            $access_id=Request::instance()->param('access_id');
        }
        if(is_array($access_id)){
            foreach ($access_id as $key => $val) {
                $access_url_del = Db::name('access_url')->where("access_id=$val")->delete();
                $user_access_del = Db::name('user_access')->where("access_id=$val")->delete();
            }
        }else{
            $access_url_del = Db::name('access_url')->where("access_id=$access_id")->delete();
            $user_access_del = Db::name('user_access')->where("access_id=$access_id")->delete();
        }
        $access_del = Db::name('admin_access')->delete($access_id);
        if ($access_del and $access_url_del and $user_access_del) {
            $this->redirect('user/access');
        }else{
            $this->redirect('user/access');
        }
    }

    /**
     * [access_up  角色修改页面]
     * @return [type] [description]
     */
    public function access_up()
    {
        $access_id=Request::instance()->param('access_id');
        //角色表
        $access_one = Db::name('admin_access')->where(['access_id'=>$access_id])->find();
        //用户角色表
        $userAccess_one = Db::name('user_access')->where(['access_id'=>$access_id])->select();
        //角色权限表
        $accessUrl_one = Db::name('access_url')->where(['access_id'=>$access_id])->select();
        //用户表
        $user_info = Db::name('admin_user')->field('user_id,user_name')->select();
        //权限表
        $url_info = Db::name('admin_url')->where('url_status=1')->select();
        $url_wx = $this -> category($url_info);
        return $this->fetch('access_up',['user_info'=>$user_info,'url_info'=>$url_wx,'access_one'=>$access_one,'userAccess_one'=>$userAccess_one,'accessUrl_one'=>$accessUrl_one]);
    }


    public function access_updo()
    {
        Db::startTrans();
        $post = input('post.');
        $key = array_keys($post);
        if(!in_array("user_id", $key)){
            $this->error('请选择管理员');
            exit();
        }else{
            $user_arr= $post['user_id'];
        }

        if(!in_array("url_id", $key)){
            $this->error('请选择权限');
            exit();
        }else{
            $url_arr= $post['url_id'];
        }
        $access_id = $post['access_id'];
        unset($post['access_id']);
        $access_name = $post['access_name'];
        $access_desc = $post['access_desc'];
        $accessInfo = Db::name('admin_access')->where("access_id=$access_id")->update(['access_name' => $post['access_name'],'access_desc'=> $post['access_desc']]);
        if($accessInfo){
                $access_url_del = Db::name('access_url')->where("access_id=$access_id")->delete();
                $user_access_del = Db::name('user_access')->where("access_id=$access_id")->delete();

                foreach ($user_arr as $key => $val) {
                    $userAccess_info = Db::name('user_access')->insert(['access_id'=>$access_id,'user_id'=>$val]);
                }
                    if (!$userAccess_info) {
                         Db::rollback();
                         $this->error('修改角色失败1');
                    }

                foreach ($url_arr as $key => $val) {
                    $userAccess_info = Db::name('access_url')->insert(['access_id'=>$access_id,'url_id'=>$val]);
                }
                    if (!$userAccess_info) {
                         Db::rollback();
                         $this->error('修改角色失败2');
                    }

                $this->redirect("user/access");
        }else{
             Db::rollback();
             $this->error('修改角色失败');
        }
        
    }

/**************权限管理***********************/

    /**
     * [access 权限列表]
     * @return [type] [description]
     */
    public function url()
    {
        $data = Db::name('admin_url')->select();
        $url_info = $this->resort($data);
        return $this->fetch("url",['data'=>$url_info]);
    }


    /**
     * [add_access 权限添加]
     * @return [type] [description]
     */
     public function add_url()
    {
        if($_POST){
            $post = input("post.");
            if($post['url_name']==''){
                $data = Db::name('admin_url')->select();
                $url_info = $this->resort($data);
                $this->error('权限名称不能为空');
                return $this->fetch("add_url",['data'=>$url_info]);
            }
            $url_name = Db::name('admin_url')->where(['url_name'=>$post['url_name']])->find();
            $url_site = Db::name('admin_url')->where(['url_site'=>$post['url_site']])->where('`url_site`!=""')->find();
            
            if($url_name){
                $data = Db::name('admin_url')->select();
                $url_info = $this->resort($data);
                $this->error('权限名称已存在');
                return $this->fetch("add_url",['data'=>$url_info]);
            }
            if($url_site){
                $data = Db::name('admin_url')->select();
                $url_info = $this->resort($data);
                $this->error('权限路径已存在');
                return $this->fetch("add_url",['data'=>$url_info]);
            }
            $urlModel = new Url($post);
            $url_info = $urlModel->save();
            if($url_info){
                $this->redirect("user/url");
            }else{
                $this->access('权限添加失败');
            }
        }else{

            $data = Db::name('admin_url')->select();
            $url_info = $this->resort($data);
            return $this->fetch("add_url",['data'=>$url_info]);
        }
        
    }

    /**
     * [url_status 修改状态]
     * @return [type] [description]
     */
    public function url_status()
    {
        $url_id=Request::instance()->param('url_id'); 
        $url_data = Db::name('admin_url')->where(['url_id'=>$url_id])->find();
        if($url_data['url_status']==1){
            $info = Db::name('admin_url')->where('url_id', $url_id)->update(['url_status' => 0]);
            if ($info) {
                $this->redirect('user/url');
            }else{
                $this->redirect('user/url');

            }
        }else{
            $info = Db::name('admin_url')->where('url_id', $url_id)->update(['url_status' => 1]);
            if ($info) {
                $this->redirect('user/url');
            }else{
                $this->redirect('user/url');

            }
        }
    }

    /**
     * [url_del  权限删除]
     * @return [type] [description]
     */
    public function url_del()
    {
        if($_POST){
            $post = input('post.');
            $url_id = $post['url_id'];
        }else{
            $url_id=Request::instance()->param('url_id');
        }
        if(is_array($url_id)){
            foreach ($url_id as $key => $val) {
                $admin_url_del = Db::name('access_url')->where("url_id=$val")->delete();
            }
        }else{
            $admin_url_del = Db::name('access_url')->where("url_id=$url_id")->delete();
        }
        if($admin_url_del){
                $url_info = Db::name('admin_url')->delete($url_id);
                if ($url_info) {
                    $this->redirect('user/url');
                }else{
                    $this->redirect('user/url');
                }
        }else{
            $this->redirect('user/url');
        }
    }

    /**
     * [url_up 权限修改]
     * @return [type] [description]
     */
    public function url_up()
    {
        $data = Db::name('admin_url')->select();
        $url_info = $this->resort($data);
        $url_id=Request::instance()->param('url_id');
        $url_one = Db::name('admin_url')->where(['url_id'=>$url_id])->find();
        return $this->fetch("url_up",['url_one'=>$url_one,'data'=>$url_info]);
    }

    public function url_updo()
    {
        $post = input("post.");
        $url_id = $post['url_id'];
        unset($post['url_id']);
        if($post['url_name']==''){
            $data = Db::name('admin_url')->select();
            $url_info = $this->resort($data);
            $this->error('权限名称不能为空');
            return $this->fetch("url_up",['data'=>$url_info]);
        }
        $url_name = Db::name('admin_url')->where(['url_name'=>$post['url_name']])->find();
        $url_site = Db::name('admin_url')->where(['url_site'=>$post['url_site']])->find();
        
        if($url_name){
            $data = Db::name('admin_url')->select();
            $url_info = $this->resort($data);
            $this->error('权限名称已存在');
            return $this->fetch("url_up",['data'=>$url_info]);
        }
        if($url_site){
            $data = Db::name('admin_url')->select();
            $url_info = $this->resort($data);
            $this->error('权限路径已存在');
            return $this->fetch("url_up",['data'=>$url_info]);
        }
        $url_info = Db::name('admin_url')->where('url_id', $url_id)->update($post);
        if($url_info){
            $this->redirect("user/url");
        }else{
            $this->access('权限添加失败');
        }
    }

/**************个人信息管理***********************/

	/**
	 * [goods_type 个人信息展示]
	 * @return [type] [description]
	 */
    public function user_access()
    {
    	return $this->fetch();
    }







    /**
     * [resort 无限级分类 字段体现]
     * @param  [type]  $data     [数据]
     * @param  integer $parentid [父级id]
     * @param  integer $level    [额外key]
     * @return [type]            [二维数组]
     */
    public function resort($data,$parentid=0,$level=0){
        static $ret = array();
        foreach ($data as $key => $v) {
            if ($v['url_parent']==$parentid) {
                $v['level']=$level;
                $ret[]=$v;
                $this->resort($data,$v['url_id'],$level+1);
            }
        }
        return $ret;
    }

    /**
     * [resort 无限级分类  数组体现]
     * @param  [type]  $data     [数据]
     * @param  integer $parentid [父级id]
     * @param  integer $level    [额外key]
     * @return [type]            [二维数组]
     */
    function category($data,$parent_id=0,$level=0){  
        $arr=array();  
            foreach($data as $k=>$v){  
                if($v['url_parent']==$parent_id){  
                    $v['level']=$level;  
                    $v['child']=$this->category($data,$v['url_id'],$level+1);  
                    $arr[]=$v;  
                }  
            }      
         return $arr;  
    }  
}

