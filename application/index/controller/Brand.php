<?php
namespace app\index\controller;
use think\Controller;

class Brand extends Controller
{
	//品牌首页
    public function index()
    {
        return $this->fetch();
    }

    //品牌展示
    public function list()
    {
        return $this->fetch();
    }
}
