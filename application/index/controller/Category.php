<?php
namespace app\index\controller;
use think\Controller;

class Category extends Controller
{

	public function index()
	{
		return $this->fetch();
	}


	public function list()
	{
		return $this->fetch();
	}

}