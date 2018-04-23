<?php use think\Session; ?>
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
<div class="soubg">
	<div class="sou">
        <span class="fr">
          <?php if(empty($user_name)){ ?>
              <span class="fl">你好，请<a href="{:url('login/login')}">登录</a>&nbsp; <a href="{:url('login/regist')}" style="color:#ff4e00;">免费注册</a>&nbsp; </span>
          <?php }else{ ?>
              <span class="fl" style="color: red"><?php echo $user_name['user_name']; ?></span>
          <?php } ?>
            <span class="fl">|&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="__PUBLIC__/static/index/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
<!--End Header End--> 
<!--Begin Login Begin-->
<div class="log_bg">	
    <div class="top">
        <div class="logo"><a href="{:url('show/index')}"><img src="__PUBLIC__/static/index/images/logo.png" /></a></div>
    </div>
	<div class="login">
    	<div class="log_img"><img src="__PUBLIC__/static/index/images/l_img.png" width="611" height="425" /></div>
		<div class="log_c">
        	<form action="{:url('login/login')}" method="post">
            <table border="0" style="width:370px; font-size:14px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr height="50" valign="top">
              	<td width="55">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">登录</span>
                    <span class="fr">还没有商城账号，<a href="{:url('Login/regist')}" style="color:#ff4e00;">立即注册</a></span>
                </td>
              </tr>
              <tr height="70">
                <td>用户名</td>
                <td><input type="text" value="" name="user_name" class="l_user" /></td>
              </tr>
              <tr height="70">
                <td>密&nbsp; &nbsp; 码</td>
                <td><input type="password" value="" name="password" class="l_pwd" /></td>
              </tr>
              <tr>
              	<td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">
                	<span style="font-family:'宋体';" class="fl">
                    	<!-- <label class="r_rad"><input type="checkbox" hidden="none" name="f_enter" /></label>
                      <label class="r_txt">保存我这次的登录信息</label> -->
                    </span>
                    <input type="hidden" name="f_enter" value="f_enter" />
                    <span class="fr"><a href="{:url('login/pwd')}" style="color:#ff4e00;">忘记密码</a></span>
                </td>
              </tr>
              <tr height="60">
              	<td>&nbsp;</td>
                <td><input type="submit" value="登录" class="log_btn" /></td>
              </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!--End Login End--> 
<!--Begin Footer Begin-->
<div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
        <img src="__PUBLIC__/static/index/images/b_1.gif" width="98" height="33" /><img src="__PUBLIC__/static/index/images/b_2.gif" width="98" height="33" /><img src="__PUBLIC__/static/index/images/b_3.gif" width="98" height="33" /><img src="__PUBLIC__/static/index/images/b_4.gif" width="98" height="33" /><img src="__PUBLIC__/static/index/images/b_5.gif" width="98" height="33" /><img src="__PUBLIC__/static/index/images/b_6.gif" width="98" height="33" />
    </div>    	
</div>
<!--End Footer End -->    

</body>


<!--[if IE 6]>
<script src="__PUBLIC__/static/index///letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>
