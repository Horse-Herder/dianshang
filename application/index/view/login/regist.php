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
	<div class="regist">
    	<div class="log_img"><img src="__PUBLIC__/static/index/images/l_img.png" width="611" height="425" /></div>
		<div class="reg_c">
        	<form action="{:url('login/regist')}" method="post"  onsubmit="return sub()">
            <table border="0" style="width:420px; font-size:14px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr height="50" valign="top">
              	<td width="95">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">注册</span>
                    <span class="fr">已有商城账号，<a href="{:url('Login/login')}" style="color:#ff4e00;">我要登录</a></span>
                </td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;用户名 &nbsp;</td>
                <td><input type="text" name="user_name" value="" class="l_user" onblur="love()"><font color="red" id="f_name"></font></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;密码 &nbsp;</td>
                <td><input type="password" name="password" value="" class="l_pwd" onblur="love1()"><font color='red'  id="f_password"></font></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;确认密码 &nbsp;</td>
                <td><input type="password" name="pwd" value="" class="l_pwd" onblur="love2()"><font color="red"  id="f_pwd"></font></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;邮箱 &nbsp;</td>
                <td><input type="text" name="email" value="" class="l_email" onblur="love3()"><font color="red"  id="f_email"></font></td>
              </tr>
              <tr height="50">
                <td align="right"><font color="#ff4e00">*</font>&nbsp;手机 &nbsp;</td>
                <td><input type="text" name="mobile_phone" value="" class="l_tel" onblur="love4()"><font color="red"  id="f_phone"></font></td>
              </tr>
              <tr height="50">
                <td align="right"> <font color="#ff4e00">*</font>&nbsp;验证码 &nbsp;</td>
                <td>
                    <img src="/captcha" alt="点击更新验证码" onclick="reloadcode(this)" />
                     <input type="text" style="width: 80px; height: 40px; float: right" name="verifyCode" class="pass-text-input " placeholder="请输入验证码">
                </td>
              </tr>
              <tr>
              	<td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">
                	<span style="font-family:'宋体';" class="fl">
                    	<label class="r_rad"><input type="checkbox" /></label><label class="r_txt">我已阅读并接受《用户协议》</label>
                    </span>
                </td>
              </tr>
              <tr height="60">
              	<td>&nbsp;</td>
                <td><input type="submit" value="立即注册" class="log_btn" /></td>
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
<script src="/public/jq.js"></script>
<script>

  function reloadcode(obj) {
     obj.src="/captcha?id="+Math.random() 
  }

  var obj = document.getElementsByTagName('input');
  var d = document.getElementsByTagName('font');
  function love(){
    a = obj[0].value;
    if(a==''){
    $("#f_name").text('用户名不能为空');
      return false;
    }else{
     $("#f_name").text('√');
      return true;
    }
  }

  function love1(){
    a = obj[1].value;
    if(a==''){
    $("#f_password").text('密码不能为空');
      return false;
    }else{
     $("#f_password").text('√');
      return true;
    }
  }

  function love2(){
    a = obj[2].value;
    if(a==''){
    $("#f_pwd").text('确认密码不能为空');
      return false;
    }else{
     $("#f_pwd").text('√');
      return true;
    }
  }

  function love3(){
    a = obj[3].value;
    if(a==''){
    $("#f_email").text('邮箱不能为空');
      return false;
    }else{
     $("#f_email").text('√');
      return true;
    }
  }

  function love4(){
    a = obj[4].value;
    if(a==''){
    $("#f_phone").text('手机不能为空');
      return false;
    }else{
     $("#f_phone").text('√');
      return true;
    }
  }

  function sub(){
    love();
    love1();
    love2();
    love3();
    love4();
    if(love()&&love1()&&love2()&&love3()&&love4()){
      return true;
    }else{
      return false;
    }
  }
</script>