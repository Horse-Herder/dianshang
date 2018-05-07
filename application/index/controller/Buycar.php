<?php
namespace app\index\controller;

use think\Controller;
use think\Db;

//购物车详情
class Buycar extends Controller
{
	//购物车信息
    public function index()
    {
        $user_id=users('user_name')['user_id'];
        $cart_data=Db::name('cart')
                  ->alias('a')
                  ->field("a.rec_id,a.goods_name,a.goods_price,a.sku,a.goods_img,a.goods_num")
                  ->where('a.user_id='.$user_id)
                  ->select();
        $shuxing=Db::name('shuxing')->select();
      foreach ($cart_data as $key => $value) {
          $sku[]=explode(',', $value['sku']);
          foreach ($shuxing as $ke => $val) {
              $cart_data[$key][$key][]=$val['shuxing_name'].":".$sku[$key][$ke];
          }
      }
        return view('index',['cart_data'=>$cart_data,'shuxing'=>$shuxing]);
    }
    public function del_cart()
    {
        $rec_id=input('get.rec_id');
        $res=Db::name('cart')->delete($rec_id);
        if($res)
        {
            $this->success("删除成功",'buycar/index');
        }else{
            $this->error("删除失败");
        }
    }

    //订单信息
    public function two()
    {

        $user_id=users('user_name')['user_id'];
        $cart_data=Db::name('cart')
                  ->alias('a')
                  ->field("a.rec_id,a.goods_name,a.goods_price,a.sku,a.goods_img,a.goods_num")
                  ->where('a.user_id='.$user_id)
                  ->select();
        $shuxing=Db::name('shuxing')->select();
        $num_price="";
      foreach ($cart_data as $key => $value) {
          $sku[]=explode(',', $value['sku']);
          foreach ($shuxing as $ke => $val) {
              $cart_data[$key][$key][]=$val['shuxing_name'].":".$sku[$key][$ke];
          }
          $num_price+=$value['goods_price'];
      }
      $user_address=Db::name('user_address')->where('user_id',$user_id)->find();
      $num_price=$num_price+"15";
        return view('two',['cart_data'=>$cart_data,'shuxing'=>$shuxing,'user_address'=>$user_address,'num_price'=>$num_price]);
    }
     public function ding()
     {
        $data=input('post.');
        $data['add_time']=time();
        $data['order_sn']=md5(time()).rand(1,9999);
         Db::name('order_info')->insert($data);
         $goodsId = Db::name('order_info')->getLastInsID();
         echo $goodsId;die;
        rint_r($data);die;
     }
    //成功提交订单
     public function three()
    {
        return $this->fetch();
    }
    
}
