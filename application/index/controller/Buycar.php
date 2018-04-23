<?php
namespace app\index\controller;

use think\Controller;

class Buycar extends Controller
{
	//展示首页
    public function index()
    {
        return $this->fetch();
    }

    public function three()
    {
        return $this->fetch();
    }

    public function two()
    {
        return $this->fetch();
    }
}
