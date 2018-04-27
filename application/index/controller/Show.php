<?php
namespace app\index\controller;
use think\Request; 
use think\Controller;
use think\Session;
use think\Cookie;
use \think\Db;

error_reporting(0);//关闭错误报告
class Show extends Controller
{
	//前台展示首页
    public function index()
    {
        $user_name = users('user_name')['user_name'];
        if(isset($user_name)){
            $this->assign('user_name',$user_name);
        }
        return $this->fetch();
    }

    //详情页
    public function product()
    {
        $goods_id=51;
        $yanse=input('get.yanse');
        $chima=input('get.chima');
        if($yanse || $chima)
        {

          $yanse=isset($yanse)?$yanse:Cookie::get('yanse');
          $chima=isset($chima)?$chima:Cookie::get('chima');
          $sku_name=$yanse.','. $chima;
          $sku_one=Db::table('ecs_sku')->where([
                       'goods_id'    =>  $goods_id,
                        'sku'=>  $sku_name
                       ])
                  ->find();

        }else{
          $sku_one=Db::table('ecs_sku')->where('goods_id',$goods_id)->find();
        }
         if(!$sku_one)
         {
            $this->success("你选中的商品类型已售空",'show/product');
         }
         
        $sku_name=explode(',', $sku_one['sku']);
        // print_r($sku_name);die;
        Cookie::set('yanse',$sku_name['0']);
        Cookie::set('chima',$sku_name['1']);
        //echo Cookie::get('yanse').Cookie::get('chima');die;
        $goods_data=Db::table('ecs_goods')
                   ->alias('a')
                   ->join('ecs_brand w', 'a.brand_id=w.brand_id')
                   ->find($goods_id);
        //$sku=Db::table('ecs_sku')->where('goods_id',$goods_id)->select();
        $shuxing=Db::table('ecs_shuxing')->select();
        $guige=Db::table("ecs_guige")->select();
        $goods_imgs=Db::table('ecs_goods_gallery')->where('goods_id',$goods_id)->select();
        $sku=Db::table('ecs_guige')
                ->alias('a')
                ->join('ecs_shuxing w','a.shuxing_id = w.shuxing_id')
                ->select();
        // $sku_data=Db::table('ecs_sku')->where('goods_id',$goods_id)->select();
        // print_r($sku_data);die;
        $shuxing=Db::table('ecs_shuxing')->select();
        $array=array();
        foreach ($shuxing as $key => $value) {
            $array[$value['shuxing_name']]=[];
        }
        foreach ($sku as $key => $value) {
              foreach ($array as $k => $val) {
                  if($value['shuxing_name']==$k)
                  {
                    $array[$value['shuxing_name']][]=$value;
                  }
              }
        }
        $sku_name_one=array();
        foreach ($shuxing as $key => $value) {
                $sku_name_one[$value['shuxing_name']]=$sku_name[$key];
        }
        $this->assign('goods_data',$goods_data);
        $this->assign('array',$array);
        $this->assign('sku_one',$sku_one);
        $this->assign('sku_name_one',$sku_name_one);
        $this->assign('goods_imgs',$goods_imgs);
        return $this->fetch();
    }
    public function shopping()
    {
        $user_id=users('user_name')['user_id'];
        if(empty($user_id))
        {
           echo 0;die;
        }
        $data['goods_id']=input('post.goods_id');
        $data['sku']=input('post.sku');
        $data['goods_num']=input('post.n_ipt'); 
        $cart_data=Db::name('cart')->where([
                         'goods_id'=>$data['goods_id'],
                              'sku'=>$data['sku']
                              ])->find();
        if($cart_data)
        {
            $data['goods_num']=$cart_data['goods_num']+$data['goods_num'];
            $data['goods_price']=input("post.price")*$data['goods_num'];
            $res=Db::table('ecs_cart')->where([
                         'goods_id'=>$data['goods_id'],
                              'sku'=>$data['sku']])
                                   ->update([
                                   'goods_num'=>$data['goods_num'],
                                   'goods_price'=>$data['goods_price']
                                    ]);
            if($res)
            {
                echo 1;
            }else
            {
                echo 2;
            }die;
        }else
            {
                $data['goods_price']=input("post.price")*$data['goods_num'];
                $goods_data=Db::table('ecs_goods')
                           ->where("goods_id",$data['goods_id'])
                           ->find();
                $data['goods_name']=$goods_data['goods_name'];
                $data['goods_img']=$goods_data['goods_img'];
                $data['user_id']=$user_id;
                $res=Db::table('ecs_cart')->insert($data);
                if($res)
                {
                    echo 1;
                }else
                {
                    echo 2;
                }
           }
          
    }

}

