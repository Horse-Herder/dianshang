<?php 

namespace app\index\model;

use think\Model;

class user extends Model
{
    // protected $pk = 'userid';


    //定义表名
   protected $table = 'Index';
   /*
      添加    add();
      查询所有   select();
      查询单挑数据   find();
      删除  delete();
      更新 save(); 
    */
   public function insert($data){
      return M($this->table)->add($data);
   }

   //显示所有信息
   public function show(){
      return M($this->table)->select();
   }

   //查询单条数据
   public function find($where){
      return M($this->table)->where($where)->find();
   }

   //修改操作
   public function update($where,$data){
      return M($this->table)->where($where)->save($data);
   }
    //删除操作
    public function delete($where){
        return M($this->table)->where($where)->delete();
    }
}
