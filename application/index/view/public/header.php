<?php use think\Session; ?>
<div class="soubg">
	<div class="sou">
    	<!--Begin 所在收货地区 Begin-->
    	<span class="s_city_b">
        	<span class="fl">送货至：</span>
            <span class="s_city">
            	<span>四川</span>
                <div class="s_city_bg">
                	<div class="s_city_t"></div>
                    <div class="s_city_c">
                    	<h2>请选择所在的收货地区</h2>
                        <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
                          <tr>
                            <th>A</th>
                            <td class="c_h"><span>安徽</span><span>澳门</span></td>
                          </tr>
                          <tr>
                            <th>B</th>
                            <td class="c_h"><span>北京</span></td>
                          </tr>
                          <tr>
                            <th>C</th>
                            <td class="c_h"><span>重庆</span></td>
                          </tr>
                          <tr>
                            <th>F</th>
                            <td class="c_h"><span>福建</span></td>
                          </tr>
                          <tr>
                            <th>G</th>
                            <td class="c_h"><span>广东</span><span>广西</span><span>贵州</span><span>甘肃</span></td>
                          </tr>
                          <tr>
                            <th>H</th>
                            <td class="c_h"><span>河北</span><span>河南</span><span>黑龙江</span><span>海南</span><span>湖北</span><span>湖南</span></td>
                          </tr>
                          <tr>
                            <th>J</th>
                            <td class="c_h"><span>江苏</span><span>吉林</span><span>江西</span></td>
                          </tr>
                          <tr>
                            <th>L</th>
                            <td class="c_h"><span>辽宁</span></td>
                          </tr>
                          <tr>
                            <th>N</th>
                            <td class="c_h"><span>内蒙古</span><span>宁夏</span></td>
                          </tr>
                          <tr>
                            <th>Q</th>
                            <td class="c_h"><span>青海</span></td>
                          </tr>
                          <tr>
                            <th>S</th>
                            <td class="c_h"><span>上海</span><span>山东</span><span>山西</span><span class="c_check">四川</span><span>陕西</span></td>
                          </tr>
                          <tr>
                            <th>T</th>
                            <td class="c_h"><span>台湾</span><span>天津</span></td>
                          </tr>
                          <tr>
                            <th>X</th>
                            <td class="c_h"><span>西藏</span><span>香港</span><span>新疆</span></td>
                          </tr>
                          <tr>
                            <th>Y</th>
                            <td class="c_h"><span>云南</span></td>
                          </tr>
                          <tr>
                            <th>Z</th>
                            <td class="c_h"><span>浙江</span></td>
                          </tr>
                        </table>
                    </div>
                </div>
            </span>
        </span>
        <!--End 所在收货地区 End-->
        <span class="fr">
            <?php if (empty($user_name)) { ?>
                <span class="fl">你好，请<a href="{:url('Login/login')}">登录</a>&nbsp; <a href="{:url('Login/regist')}" style="color:#ff4e00;">免费注册</a>&nbsp;|&nbsp;<a href="{:url('member/order')}">我的订单</a>&nbsp;|</span>
            <?php }else{ ?>
                <span class="fl"><span style="color: red"><?php echo $user_name; ?></span>&nbsp;|&nbsp;<a href="{:url('login/out')}">退出</a>&nbsp;|&nbsp;<a href="{:url('member/order')}">我的订单</a>&nbsp;|</span>
            <?php } ?>
        	<span class="ss">
            	<div class="ss_list">
                	<a href="{:url('member/collect')}">收藏夹</a>
                    <div class="ss_list_bg">
                    	
                    </div>     
                </div>
                <div class="ss_list">
                	<a href="#">客户服务</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                       
                    </div>    
                </div>
                <div class="ss_list">
                	<a href="#">网站导航</a>
                    <div class="ss_list_bg">
                    	<div class="s_city_t"></div>
                        
                    </div>    
                </div>
            </span>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="__PUBLIC__/static/index/images/s_tel.png" align="absmiddle" /></a></span>
            <a href="{:url('index/login/qqlogin')}">QQ</a>
        </span>
    </div>
</div>
<div class="top">
    <div class="logo"><a href="Index.html"><img src="__PUBLIC__/static/index/images/logo.png" /></a></div>
    <div class="search">
    	<form>
        	<input type="text" value="" class="s_ipt" />
            <input type="submit" value="搜索" class="s_btn" />
        </form>                      
        <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
    </div>
    <div class="i_car">
    	<div class="car_t">购物车 [ <span>3</span> ]</div>
        <div class="car_bg">
       		<!--Begin 购物车未登录 Begin-->
        	
            <?php if (empty($user_name)) { ?>
                <div class="un_login">还未登录！<a href="{:url('Login/login')}" style="color:#ff4e00;">马上登录</a> 查看购物车！</div>
            <?php }else{ ?>
                <span style="color: red; margin-left: 50px;">欢迎&nbsp;<?php echo $user_name; ?>&nbsp;登陆</span>
            <?php } ?>
            <!--End 购物车未登录 End-->
            <!--Begin 购物车已登录 Begin-->
            <ul class="cars">
            	<li>
                	<div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/car1.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">法颂浪漫梦境50ML 香水女士持久清新淡香 送2ML小样3只</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                	<div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
                <li>
                	<div class="img"><a href="#"><img src="__PUBLIC__/static/index/images/car2.jpg" width="58" height="58" /></a></div>
                    <div class="name"><a href="#">香奈儿（Chanel）邂逅活力淡香水50ml</a></div>
                    <div class="price"><font color="#ff4e00">￥399</font> X1</div>
                </li>
            </ul>
            <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span>1058</span></div>
            <div class="price_a"><a href="#">去购物车结算</a></div>
            <!--End 购物车已登录 End-->
        </div>
    </div>
</div>
<!--End Header End--> 
<!--Begin Menu Begin-->
<div class="menu_bg">
	<div class="menu">
    	<!--Begin 商品分类详情 Begin--> 
        <?php 
           $list = infinite();
           // echo "<pre>";
           // var_dump($list);die;
         ?>   
    	<div class="nav">
        	<div class="nav_t">全部商品分类</div>
            <div class="leftNav">
                <ul>      
                    {volist name="list" id="vo"}
                    <li>
                    	<div class="fj">
                        	<span class="n_img"><span></span><img src="__PUBLIC__/static/index/images/nav1.png" /></span>
                            <span class="fl">{$vo.cate_name}</span>
                        </div>
                        <div class="zj">
                            <div class="zj_l">
                                {volist name="$vo.child" id="v"}
                                <div class="zj_l_c">
                                    <h2>{$v.cate_name}</h2>
                                    {volist name="$v.child" id="vv"}
                                        <a href="{:url('category/list',['cate_id'=>$vo.cate_id])}">{$vv.cate_name}</a>
                                {/volist}    
                                </div>
                                {/volist}
                            </div>
                    </li>     
                    {/volist}               	
                </ul>            
            </div>
        </div>  
        <!--End 商品分类详情 End--> 
        <?php 

        $cate = category();

         ?>                                                    
    	<ul class="menu_r">
            <li><a href="{:url('Show/index')}">首页</a></li>
            {volist name="cate" id="vo"}           
            <li><a href="{:url('category/list',['cate_id'=>$vo.cate_id])}">{$vo.cate_name}</a></li>
            {/volist}
        </ul>
        <div class="m_ad">中秋送好礼！</div>
    </div>
</div>
