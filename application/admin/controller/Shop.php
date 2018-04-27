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

        if($goods_name=input('get.goods_name'))
        { 
            $where=" goods_name like '%".$goods_name."%'";
        }else{
            $where=" 1=1";
        }
        // echo $where;die;
         $data=Db::table('ecs_goods')
                ->alias('a')
                ->join('ecs_goods_type w','a.cat_id = w.cat_id')
                ->where($where)
                ->paginate(2,false,['query'=>request()->param()]);;
        // dump(Db::table('ecs_goods')->getLastSql());die;
         $page=$data->render();
         $this->assign('page',$page);
         $this->assign('data',$data);
        return $this->fetch();
    }

     /**
     * [add_goods 商品是否上架
     */
    public function update_display()
    {
        $goods_id=input("post.goods_id");
        $is_on_sale=input("post.is_on_sale");
        $sql="update ecs_goods set is_on_sale='".$is_on_sale."' where goods_id=".$goods_id;
       $res=Db::execute($sql);
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }
    /**
     * [add_goods 商品批删
     */
    public function del_all()
    {
        $goods=input("post.");
        foreach ($goods['goods'] as $key => $value) {
             $res=Db::table("ecs_goods_gallery")->where('goods_id',$value)->delete();
        }
        $res=Db::table('ecs_goods')->delete($goods['goods']); 
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }
    /**
     * [add_goods 商品添加]
     */
    public function add_goods()
    {
        if(input("post."))
        {
           $data=input("post."); 
           //print_r($data);die;
           // $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
           // echo $info->getSaveName();;
           $arr=array();
           foreach ($data as $key => $value) {
                if(is_array($value)){
                    foreach ($value as $k => $val) {
                        $arr[$k][]=$val;
                    }
                    unset($data[$key]);
                }
            }
            $goods_img=request()->file('goods_img');
            $info = $goods_img->move(ROOT_PATH . 'public' . DS . 'uploads');
            $data['goods_img']=str_replace('\\', '/', '/uploads/'.$info->getSaveName());
            $data['add_time']=date("Y-m-d H:i:s",time());
            Db::name('goods')->insert($data);
            $goodsId = Db::name('goods')->getLastInsID();

            $imgs=array();
            $files=request()->file('img');
            foreach ($files as $key=> $file) {
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                $imgs[$key]['goods_id']=$goodsId;
                $imgs[$key]['img_url']=str_replace('\\', '/', '/uploads/'.$info->getSaveName());
            }

            foreach ($imgs as $key => $value) {
             $res_img=Db::name('goods_gallery')->insert($value);
            }
            $array=array();
            foreach ($arr as $key => $value) {
                $array[$key]['goods_id']=$goodsId;
                $array[$key]['sku']=$value['0'].",".$value['1'];
                $array[$key]['sku_price']=$value['2'];
                $array[$key]['sku_num']=$value['3'];
            }
            foreach ($array as $key => $value) {
             $res=Db::name('sku')->insert($value);
            }
            if($res){
                $this->success("添加成功","shop/goods");
            }else{
                $this->error("添加失败");die;
            }
        }
      $res_shuxing= \think\Db::table('ecs_shuxing')->select();
      $res_guige=Db::table('ecs_guige')
                ->alias('a')
                ->join('ecs_shuxing w','a.shuxing_id = w.shuxing_id')
                ->select();
        $goods_brand=Db::table("ecs_brand")->select();
        $goods_type=Db::table("ecs_goods_type")->select();
        $goods_type_data=$this->digui($goods_type);
       // print_r($goods_type_data);die;
        $this->assign("goods_type_data",$goods_type_data);
        $this->assign("goods_brand",$goods_brand);
        $this->assign("guige",$res_guige);
        $this->assign("shuxing",$res_shuxing);
        return $this->fetch();
    }
      /**
     * 分类递归
     * @return [type] [description]
     */
      public function digui($date,$path=0,$flag=1)
      {
        static $array=array();
        foreach ($date as $key => $value) {
            if($value['attr_group']==$path)
            {
                $value['f']=$flag;
                $array[]=$value;
                $this->digui($date,$value['cat_id'],$value['f']+1);
             }
        }
        return $array;
      }
    /**
     * 商品修改
     * @return [type] [description]
     */
    public function update_goods()
    {
          $goods_id=input("get.goods_id");

          if(input("post."))
          {
              $data=input("post."); 

              $arr=array();
                foreach ($data as $key => $value) {
                if(is_array($value)){
                    foreach ($value as $k => $val) {
                        $arr[$k][]=$val;
                    }
                    unset($data[$key]);
                }
            }
               $data['add_time']=date("Y-m-d H:i:s",time());
               if($arr['0']['0']!=NULL)
               {  
                $array=array();
                foreach ($arr as $key => $value) {
                $array[$key]['goods_id']=$goods_id;
                $array[$key]['sku']=$value['0'].",".$value['1'];
                $array[$key]['sku_price']=$value['2'];
                $array[$key]['sku_num']=$value['3'];
            }
            $res=Db::name('sku')->where('goods_id',$goods_id)->delete();
            foreach ($array as $key => $value) {
             $res=Db::name('sku')->insert($value);
            }
            }
             $files=request()->file('img');
             if(!empty($files))
             {
              Db::name('goods_gallery')->where('goods_id',$goods_id)->delete();
              $imgs=array();
            //$files=request()->file('img');
            foreach ($files as $key=> $file) {
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                $imgs[$key]['goods_id']=$goods_id;
                $imgs[$key]['img_url']= str_replace('\\', '/', '/uploads/'.$info->getSaveName());
            }
            foreach ($imgs as $key => $value) {
             $res_img=Db::name('goods_gallery')->insert($value);
            }
            }
            $goods_img=request()->file('goods_img');
            if($goods_img)
            {
            $info = $goods_img->move(ROOT_PATH . 'public' . DS . 'uploads');
            $data['goods_img']=str_replace('\\', '/', '/uploads/'.$info->getSaveName());
            }

              $res=Db::name('goods')
                   ->where('goods_id', $goods_id)
                   ->update($data);
            if($res){
                $this->success("修改成功","shop/goods");
            }else{
                $this->error("修改失败");die;
            }
          }
       $goods_data=Db::table('ecs_goods')->where('goods_id',$goods_id)->find();
       $res_shuxing= \think\Db::table('ecs_shuxing')->select();
       $res_guige=Db::table('ecs_guige')
                ->alias('a')
                ->join('ecs_shuxing w','a.shuxing_id = w.shuxing_id')
                ->select();
        $goods_brand=Db::table("ecs_brand")->select();
        $goods_type=Db::table("ecs_goods_type")->select();
        $goods_type_data=$this->digui($goods_type);
       // print_r($goods_type_data);die;
        $this->assign("goods_type_data",$goods_type_data);
        $this->assign("goods_brand",$goods_brand);
        $this->assign("guige",$res_guige);
        $this->assign("shuxing",$res_shuxing);
         $this->assign("goods_data",$goods_data);
           return $this->fetch();
    }
   /**
     * 商品删除
     * @return [type] [description]
     */
    public function del_goods()
    {
        $goods_id=input("get.goods_id");
        $re=Db::table('ecs_goods')->delete($goods_id);
        $res=Db::table("ecs_goods_gallery")->where('goods_id',$goods_id)->delete();
        if($res || $re){
            $this->success("删除成功","shop/goods");
        }else{
            $this->error("删除失败");
        }
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

