<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Brand;
use think\Db;  
use think\Request;


class Shop extends Controller
{


/**************商品管理***********************/
	/**
	 * [goods 商品展示]
	 * @return [type] [description]
	 */
	public function goods()
    {
        return $this->fetch();
    }

    /**
     * [add_goods 商品添加]
     */
    public function add_goods()
    {
        return $this->fetch();
    }

/**************品牌管理***********************/

	/**
	 * [brand 品牌展示]
	 * @return [type] [description]
	 */
    public function brand()
    {       
        
        $data = Db::name('brand')->paginate(2);
        return $this->fetch('brand',['data'=>$data]);
    }


    /**
     * [add_brand 品牌添加]
     */
    public function add_brand()
    {
        if($_POST){
            $brand = new Brand();
            $file = request()->file('brand_logo');
            // 移动到框架应用根目录/public/uploads/ 目录下
            if($file!=''){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    $data = input('post.');
                    $apply = str_replace('\\', '/',$info->getSaveName());
                    $data['brand_logo']='/uploads/'.$apply;
                }else{
                    // 上传失败获取错误信息
                    return array("resultcode" => -4, "resultmsg" => "文件上传失败", "data" => $file->getError());
                }
            }
            $res = Db::table('ecs_brand')->where(['brand_name'=>input('post.brand_name')])->find();
            if(input('post.brand_name')==''){
                $this->error('品牌名不能为空');   
            }elseif(input('post.brand_name')==$res['brand_name']){
                 $this->error('品牌名已存在');    
            }else{
                $data['brand_name']=input('post.brand_name');
            }
            if(input('post.brand_desc')==''){
                $this->error('品牌描述不能为空');
            }else{
                $data['brand_desc']=input('post.brand_desc');
            }
            if(input('post.site_url')==''){
                $this->error('品牌网址不能为空');
            }else{
                $data['site_url']=input('post.site_url');
            }
            if(input('post.sort_order')==''){
                $this->error('品牌排序不能为空');
            }else{
                $data['sort_order']=input('post.sort_order');
            }

            $data['add_time'] = date('Y-m-d H:i:s');
            $res = $brand->save($data);
            if($res){
                $this->success('添加成功','shop/brand');
            }else{
                $this->error('添加失败','shop/add_brand');
            }
        }else{
            return $this->fetch();
        }
    	
    }
    /**
     * [brand_del 品牌删除]
     */
    public function brand_del()
    {
        if($_POST){
            $brand_id = input('post.brand_id');
            $id = ltrim($brand_id,',');
            $res = Brand::destroy($id);
            if($res){
                $data['status']=1;
                $data['content']="删除成功";
            }else{
                $data['status']=2;
                $data['content']="删除失败";
            }
            echo json_encode($data);
        }else{
            $brand_id=Request::instance()->param('brand_id');
            $brand = Db::name('brand')->find($brand_id);
            $brand_logo ='.'. $brand['brand_logo'];
            $result = Brand::destroy($brand_id);
            if($result)
            {
                unlink($brand_logo);
                $this->success("删除成功",'shop/brand');
            }else{
                $this->error("删除失败",'shop/brand');
            }
        }
       
    }
    /*
    *[update_brand 品牌修改]
    */
    public function update_brand()
    {
         $brand_id=Request::instance()->param('brand_id');
         $data = Brand::find($brand_id);
         return $this->fetch('update_brand',['data'=>$data]);
    }
   
    public function brand_update_do()
    {
        if(request()->isPost()){
            $old_img = input("post.old_img");
            $file = request()->file('brand_logo');
            if($file){
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    $apply = str_replace('\\', '/',$info->getSaveName());
                    $brand_logo = '/uploads/'.$apply;
                }
            }else{
                $brand_logo = $old_img;
            }
            
            $brand = new Brand();
            if($brand->save([
                'brand_name'       =>  input("post.brand_name"),
                'site_url'         =>  input("post.site_url"),
                'is_show'          =>  input("post.is_show"),
                'brand_desc'       =>  input("post.brand_desc"),
                'sort_order'       =>  input("post.sort_order"),
                'brand_logo'       =>  $brand_logo
            ],['brand_id'=>input("post.brand_id")])){
                if($brand_logo!=$old_img){
                    if($old_img!=""){
                        unlink('.'.$old_img);
                    }
                    
                }
                $this->success('修改成功', 'shop/brand');
            }else{
                if($brand_logo!=$old_img){
                    unlink('.'.$brand_logo);
                }
                $this->error('修改失败', 'shop/brand');
            }
        }
    }


/**************商品分类管理***********************/

	/**
	 * [goods_type 商品分类展示]
	 * @return [type] [description]
	 */
    public function goods_type()
    {
    	return $this->fetch();
    }


    /**
     * [add_goods_type 商品分类添加]
     */
    
     public function add_goods_type()
    {
    	return $this->fetch();
    }
}

