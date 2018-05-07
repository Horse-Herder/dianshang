<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/static/index/css/style.css" />
    <!--[if IE 6]>
    <script src="__PUBLIC__/static/index/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="__PUBLIC__/static/index/js/jquery-1.11.1.min_044d0927.js"></script>
	<script type="text/javascript" src="__PUBLIC__/static/index/js/jquery.bxslider_e88acd1b.js"></script>
    
    <script type="text/javascript" src="__PUBLIC__/static/index/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/index/js/menu.js"></script>    
        
	<script type="text/javascript" src="__PUBLIC__/static/index/js/select.js"></script>
    
	<script type="text/javascript" src="__PUBLIC__/static/index/js/lrscroll.js"></script>
    
    <script type="text/javascript" src="__PUBLIC__/static/index/js/iban.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/index/js/fban.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/index/js/f_ban.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/index/js/mban.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/index/js/bban.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/index/js/hban.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/index/js/tban.js"></script>
    
	<script type="text/javascript" src="__PUBLIC__/static/index/js/lrscroll_1.js"></script>
    
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->

{include file="public/header"}
<!--End Menu End--> 
<div class="i_bg bg_color">
	<div class="i_ban_bg">
		<!--Begin Banner Begin-->
    	<div class="banner">    	
            <div class="top_slide_wrap">
                <ul class="slide_box bxslider">
                    {volist name="img" id="vo"}
                    <li><img src="/uploads/{$vo.ad_file}" width="740" height="401" /></li>
                    {/volist}
                </ul>	
                <div class="op_btns clearfix">
                    <a href="#" class="op_btn op_prev"><span></span></a>
                    <a href="#" class="op_btn op_next"><span></span></a>
                </div>        
            </div>
        </div>
        <script type="text/javascript">
        //var jq = jQuery.noConflict();
        (function(){
            $(".bxslider").bxSlider({
                auto:true,
                prevSelector:jq(".top_slide_wrap .op_prev")[0],nextSelector:jq(".top_slide_wrap .op_next")[0]
            });
        })();
        </script>
        <!--End Banner End-->
        <div class="inews">
        	<div class="news_t">
            	<span class="fr"><a href="#">更多 ></a></span>新闻资讯
            </div>
            <ul>
            	<li><span>[ 特惠 ]</span><a href="#">掬一轮明月 表无尽惦念</a></li>
            	<li><span>[ 公告 ]</span><a href="#">好奇金装成长裤新品上市</a></li>
            	<li><span>[ 特惠 ]</span><a href="#">大牌闪购 · 抢！</a></li>
            	<li><span>[ 公告 ]</span><a href="#">发福利 买车就抢千元油卡</a></li>
            	<li><span>[ 公告 ]</span><a href="#">家电低至五折</a></li>
            </ul>
            <div class="charge_t">
            	话费充值<div class="ch_t_icon"></div>
            </div>
            <form>
            <table border="0" style="width:205px; margin-top:10px;" cellspacing="0" cellpadding="0">
              <tr height="35">
                <td width="33">号码</td>
                <td><input type="text" value="" class="c_ipt" /></td>
              </tr>
              <tr height="35">
                <td>面值</td>
                <td>
                	<select class="jj" name="city">
                      <option value="0" selected="selected">100元</option>
                      <option value="1">50元</option>
                      <option value="2">30元</option>
                      <option value="3">20元</option>
                      <option value="4">10元</option>
                    </select>
                    <span style="color:#ff4e00; font-size:14px;">￥99.5</span>
                </td>
              </tr>
              <tr height="35">
                <td colspan="2"><input type="submit" value="立即充值" class="c_btn" /></td>
              </tr>
            </table>
            </form>
        </div>
    </div>

    <!--Begin 热门商品 Begin-->
    <div class="i_t mar_10">
        <span class="fl">热门商品</span>
        <span class="i_mores fr"><a href="javascript:void(0)">更多</a></span>
    </div>
    <div class="like">  
        <div id="featureContainer1">
            <div id="feature1">
                <div id="block1">
                    <div id="botton-scroll1" style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; width: 1200px;">
                        <ul class="featureUL" style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; width: 3600px; left: -2400px;">
                            {volist name="goods" id="vo"}
                            <li class="featureBox" style="overflow: hidden; float: left; width: 238px; height: 228px;">
                                <div class="box">
                                    <div class="h_icon"><img width="50" height="50" src="__PUBLIC__/static/index/images/hot.png">
                                    </div>
                                    <div class="imgbg">
                                        <a href="{:url('show/product',['goods_id'=>$vo.goods_id])}"><img width="160" height="136" src="{$vo.goods_img}"></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="javascript:void(0)">
                                        <h2>{$vo.goods_name}</h2>
                                        {$vo.goods_brief}
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>{$goods_price}</span></font> &nbsp; 26R
                                    </div>
                                </div>
                            </li>
                            {/volist}
                              
                        </ul>
                    </div>
                </div>
                <a href="javascript:void();" class="l_prev">Previous</a>
                <a href="javascript:void();" class="l_next">Next</a>
            </div>
        </div>
    </div>    
    <div class="content mar_20">
    	<img src="__PUBLIC__/static/index/images/mban_1.jpg" width="1200" height="110" />
    </div>
	<!--Begin 进口 生鲜 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num">1F</span>
    	<span class="fl">进口 <b>·</b> 生鲜</span>                
        <span class="i_mores fr"><a href="#">进口咖啡</a>&nbsp; &nbsp; &nbsp; <a href="#">进口酒</a>&nbsp; &nbsp; &nbsp; <a href="#">进口母婴</a>&nbsp; &nbsp; &nbsp; <a href="#">新鲜蔬菜</a>&nbsp; &nbsp; &nbsp; <a href="#">新鲜水果</a></span>
    </div>
    <div class="content">

        <div class="fresh_mid">
        	<ul>
            	<li>
                	<div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                    	<font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/fre_1.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                    	<font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/fre_2.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                    	<font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/fre_3.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                    	<font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/fre_4.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                    <div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                        <font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/fre_1.jpg" width="185" height="155" /></a></div>
                </li>                
                <li>
                	<div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                    	<font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/fre_5.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                    	<font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/fre_6.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                    <div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                        <font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/fre_5.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                    <div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                        <font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/fre_5.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                    <div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                        <font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/fre_5.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                    <div class="name"><a href="#">新鲜美味  进口美食</a></div>
                    <div class="price">
                        <font>￥<span>198.00</span></font> &nbsp; 26R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/fre_5.jpg" width="185" height="155" /></a></div>
                </li>
                                                                                
            </ul>
        </div>

    </div>    
    <!--End 进口 生鲜 End-->

    <!-- Begin 广告 Begin -->
    <div class="content mar_20">
        <img width="1200" height="110" src="__PUBLIC__/static/index/images/mban_1.jpg">
    </div>    
    <!-- End 广告 End -->

    <!--Begin 食品饮料 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num">2F</span>
    	<span class="fl">食品饮料</span>                                
        <span class="i_mores fr"><a href="#">咖啡</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">休闲零食</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">饼干糕点</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">冲饮谷物</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">营养保健</a></span>
    </div>
    <div class="content">

        <div class="fresh_mid">
        	<ul>
            	<li>
                	<div class="name"><a href="#">莫斯利安酸奶</a></div>
                    <div class="price">
                    	<font>￥<span>96.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/food_1.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">莫斯利安酸奶</a></div>
                    <div class="price">
                    	<font>￥<span>96.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/food_2.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">莫斯利安酸奶</a></div>
                    <div class="price">
                    	<font>￥<span>96.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/food_3.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">莫斯利安酸奶</a></div>
                    <div class="price">
                    	<font>￥<span>96.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/food_4.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">莫斯利安酸奶</a></div>
                    <div class="price">
                    	<font>￥<span>96.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/food_5.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">莫斯利安酸奶</a></div>
                    <div class="price">
                    	<font>￥<span>96.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/food_6.jpg" width="185" height="155" /></a></div>
                </li>
            </ul>
        </div>
    </div>    
    <!--End 食品饮料 End-->

    <!-- Begin 广告 Begin -->
    <div class="content mar_20">
        <img width="1200" height="110" src="__PUBLIC__/static/index/images/mban_1.jpg">
    </div>    
    <!-- End 广告 End -->

    <!--Begin 个人美妆 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num">3F</span>
    	<span class="fl">个人美妆</span>                                
        <span class="i_mores fr"><a href="#">洗发护发</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">面膜</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">洗面奶</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">香水</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">沐浴露</a></span>                
    </div>
    <div class="content">
        <div class="fresh_mid">
        	<ul>
            	<li>
                	<div class="name"><a href="#">美宝莲粉饼</a></div>
                    <div class="price">
                    	<font>￥<span>260.00</span></font> &nbsp; 16R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/make_1.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">美宝莲粉饼</a></div>
                    <div class="price">
                    	<font>￥<span>260.00</span></font> &nbsp; 16R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/make_2.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">美宝莲粉饼</a></div>
                    <div class="price">
                    	<font>￥<span>260.00</span></font> &nbsp; 16R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/make_3.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">美宝莲粉饼</a></div>
                    <div class="price">
                    	<font>￥<span>260.00</span></font> &nbsp; 16R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/make_4.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">美宝莲粉饼</a></div>
                    <div class="price">
                    	<font>￥<span>260.00</span></font> &nbsp; 16R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/make_5.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">美宝莲粉饼</a></div>
                    <div class="price">
                    	<font>￥<span>260.00</span></font> &nbsp; 16R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/make_6.jpg" width="185" height="155" /></a></div>
                </li>
            </ul>
        </div>
    </div>    
    <!--End 个人美妆 End-->
    <div class="content mar_20">
    	<img src="__PUBLIC__/static/index/images/mban_1.jpg" width="1200" height="110" />
    </div>
    <!--Begin 母婴玩具 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num">4F</span>
    	<span class="fl">母婴玩具</span>                                
        <span class="i_mores fr"><a href="#">营养品</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">孕妈背带裤</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">儿童玩具</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">婴儿床</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">喂奶器</a></span>                               
    </div>
    <div class="content">
        <div class="fresh_mid">
        	<ul>
            	<li>
                	<div class="name"><a href="#">儿童玩具  变形金刚</a></div>
                    <div class="price">
                    	<font>￥<span>260.00</span></font> &nbsp; 20R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/baby_1.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">儿童玩具  变形金刚</a></div>
                    <div class="price">
                    	<font>￥<span>260.00</span></font> &nbsp; 20R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/baby_2.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">儿童玩具  变形金刚</a></div>
                    <div class="price">
                    	<font>￥<span>260.00</span></font> &nbsp; 20R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/baby_3.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">儿童玩具  变形金刚</a></div>
                    <div class="price">
                    	<font>￥<span>260.00</span></font> &nbsp; 20R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/baby_4.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">儿童玩具  变形金刚</a></div>
                    <div class="price">
                    	<font>￥<span>260.00</span></font> &nbsp; 20R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/baby_5.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">儿童玩具  变形金刚</a></div>
                    <div class="price">
                    	<font>￥<span>260.00</span></font> &nbsp; 20R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/baby_6.jpg" width="185" height="155" /></a></div>
                </li>
            </ul>
        </div>
    </div>    
    <!--End 母婴玩具 End-->
    <!--Begin 家居生活 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num">5F</span>
    	<span class="fl">家居生活</span>                                
        <span class="i_mores fr"><a href="#">床上用品</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">家纺布艺</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">餐具</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">沙发</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">汽车用品</a></span>                                              
    </div>
    <div class="content">
        <div class="fresh_mid">
        	<ul>
            	<li>
                	<div class="name"><a href="#">品质蓝色沙发</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 50R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/home_1.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">品质蓝色沙发</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 50R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/home_2.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">品质蓝色沙发</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 50R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/home_3.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">品质蓝色沙发</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 50R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/home_4.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">品质蓝色沙发</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 50R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/home_5.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">品质蓝色沙发</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 50R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/home_6.jpg" width="185" height="155" /></a></div>
                </li>
            </ul>
        </div>
    </div>    
    <!--End 家居生活 End-->
    <!--Begin 数码家电 Begin-->
    <div class="i_t mar_10">
    	<span class="floor_num">6F</span>
    	<span class="fl">数码家电</span>                                
        <span class="i_mores fr"><a href="#">手机</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">苹果</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">华为手机</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">洗衣机</a>&nbsp; &nbsp; | &nbsp; &nbsp;<a href="#">数码配件</a></span>                                               
    </div>
    <div class="content">
        <div class="fresh_mid">
        	<ul>
            	<li>
                	<div class="name"><a href="#">乐视高清电视</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/tel_1.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">乐视高清电视</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/tel_2.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">乐视高清电视</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/tel_3.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">乐视高清电视</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/tel_4.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">乐视高清电视</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/tel_5.jpg" width="185" height="155" /></a></div>
                </li>
                <li>
                	<div class="name"><a href="#">乐视高清电视</a></div>
                    <div class="price">
                    	<font>￥<span>2160.00</span></font> &nbsp; 25R
                    </div>
                    <div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/tel_6.jpg" width="185" height="155" /></a></div>
                </li>
            </ul>
        </div>
    </div>    
    <!--End 数码家电 End-->
    <!--Begin 猜你喜欢 Begin-->
    <div class="i_t mar_10">
    	<span class="fl">猜你喜欢</span>
    </div>    
    <div class="like">        	
        <div id="featureContainer1">
            <div id="feature1">
                <div id="block1">
                    <div id="botton-scroll1">
                        <ul class="featureUL">
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="__PUBLIC__/static/index/images/hot1.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>德国进口</h2>
                                        德亚全脂纯牛奶200ml*48盒
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>189</span></font> &nbsp; 26R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="__PUBLIC__/static/index/images/hot2.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>iphone 6S</h2>
                                        Apple/苹果 iPhone 6s Plus公开版
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>5288</span></font> &nbsp; 25R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="__PUBLIC__/static/index/images/hot3.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>倩碧特惠组合套装</h2>
                                        倩碧补水组合套装8折促销
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>368</span></font> &nbsp; 18R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="__PUBLIC__/static/index/images/hot4.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>品利特级橄榄油</h2>
                                        750ml*4瓶装组合 西班牙原装进口
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>280</span></font> &nbsp; 30R
                                    </div>
                                </div>
                            </li>
                            <li class="featureBox">
                                <div class="box">
                                    <div class="imgbg">
                                        <a href="#"><img src="__PUBLIC__/static/index/images/hot4.jpg" width="160" height="136" /></a>
                                    </div>                                        
                                    <div class="name">
                                        <a href="#">
                                        <h2>品利特级橄榄油</h2>
                                        750ml*4瓶装组合 西班牙原装进口
                                        </a>
                                    </div>
                                    <div class="price">
                                        <font>￥<span>280</span></font> &nbsp; 30R
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <a class="l_prev" href="javascript:void();">Previous</a>
                <a class="l_next" href="javascript:void();">Next</a>
            </div>
        </div>
    </div>
    <!--End 猜你喜欢 End-->
 {include file="public/footer"}
