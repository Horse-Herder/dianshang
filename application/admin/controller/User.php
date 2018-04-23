<?php
namespace app\admin\controller;
use think\Controller;
class User extends Controller
{


/**************管理员管理***********************/

	/**
	 * [user 管理员列表]
	 * @return [type] [description]
	 */
	public function user()
    {
        return $this->fetch();
    }

    /**
     * [add_user 管理员添加]
     */
	public function add_user()
    {
        return $this->fetch();
    }

/**************权限管理***********************/

	/**
	 * [access 权限列表]
	 * @return [type] [description]
	 */
    public function access()
    {
    	return $this->fetch();
    }


    /**
     * [add_access 权限添加]
     * @return [type] [description]
     */
     public function add_access()
    {
    	return $this->fetch();
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



}

