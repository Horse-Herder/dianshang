<?php
namespace app\admin\model;

use think\Db;//引入Db
use think\Model;//引入Model
class guang extends Model
{
	protected $table='ecs_ad_position';//表名

		//增加
	function insertData($data)
	{

	return Db::table($this->table)->insertGetId($data);
	}
	//查询
	function show()
	{
	return Db::table($this->table)->select();    
	}
	//删除
	function deleteData($id)
	{
	return Db::table($this->table)->where('uid','=',$id)->delete();    
	}
	//查询单条
	function findData($id)
	{
	return Db::table($this->table)->where('position_id','=',$id)->find();    
	}
	//修改
	function updateData($data,$id)
	{
	return Db::table($this->table)->where('uid','=',$id)->update($data);    
	}
	function deleteAll($id)
	{
	return Db::table($this->table)->where('position_id','in',$id)->delete();    
	}

	function page()
	{
	return Db::table($this->table)->paginate(3);    
	}



}