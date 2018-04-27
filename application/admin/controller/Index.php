<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;
class Index extends Base
{

	public function index()
    {
        return $this->fetch();
    }

    public function shop_index()
    {
        return $this->fetch();
    }
}
