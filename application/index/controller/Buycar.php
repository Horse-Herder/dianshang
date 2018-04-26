<?php
namespace app\index\controller;

use think\Controller;

//购物车详情
class Buycar extends Controller
{
	//购物车信息
    public function index()
    {
        return $this->fetch();
    }

    //订单信息
    public function three()
    {
        return $this->fetch();
    }

    //成功提交订单
    public function two()
    {
        return $this->fetch();
    }
}
