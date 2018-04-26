<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Users;
use think\Db;  
use think\Request;
// use think\Paginator;

class Member extends Controller
{
	public function member_list()
    {
    	$data = Db::name('users')->paginate(5);
        return $this->fetch('member_list',['data'=>$data]);
    }

    /**
	*批量删除
    */
    public function member_del()
    {
    	$user_id = input('post.user_id');
    	// var_dump($user_id);die;
    	$new_id = ltrim($user_id,',');
    	$list = Db::name('users')->select($new_id);
    	foreach ($list as $key => $value) {
    		$img[$key]=$value['answer'];
    	}
    	if(Users::destroy($new_id)){
    		foreach ($img as $k => $v) {
    			unlink('.'.$v);
    		}
    		$data['status'] = "ok";
    	}else{
    		$data['status'] = "ok";
    	}
    	echo json_encode($data);
    }
}