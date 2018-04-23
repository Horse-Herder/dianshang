<?php
namespace app\index\controller;

use think\Controller;

class Sell extends Controller
{
	//前台展示首页
    public function index()
    {
        return $this->fetch();
    }

    //产品管理
    public function details()
    {
        return $this->fetch();
    }
}
