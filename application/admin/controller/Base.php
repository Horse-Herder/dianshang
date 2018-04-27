<?php
namespace app\admin\controller;

use think\Db;
use think\Controller;
use think\Session;
class Base extends Controller
{
    public function _initialize(){

        $session = session::get('user','admin');
        if($session['user_name']){
        	if(!$this->checkdate()){
        		$this->error('没有权限','admin/index/shop_index');
        	}
        }else{
        	$this->error('请登录去','login/login');
        	exit();
        }



    }


    
    private function checkdate(){
    	$request = \think\Request::instance();
        $m = $request->module();
        $c = $request->controller();
        $f = $request->action();
		$session = session::get('user','admin');
        $mcf = $m.'/'.$c.'/'.$f;
        $mcf = strtolower($mcf);

        if($c == "Index"){
        	return true;
        }

        if($session['user_name']=='admin'){
            return true;
        }
       

        $info = Db::name('user_access')->alias('a')->where('user_id',$session['user_id'])->join('access_url	 b','a.access_id = b.access_id')->join('admin_url c','b.url_id = c.url_id')->select();
        $site_info=array_column($info, 'url_site');

        if (in_array($mcf, $site_info)) {
        	return true;
        }

    }
}