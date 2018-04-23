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
        	<form action="{:url('login/pwd')}" method="post">
            <table border="0" style="width:370px; font-size:14px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr height="50" valign="top">
              	<td width="55">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">修改密码</span>
                </td>
              </tr>
              <tr height="50">
                <td>账&nbsp; &nbsp; 号</td>
                <td><input type="text" value="" placeholder="原账号" name="user_name" class="l_user" /></td>
              </tr>
              <tr height="50">
                <td>邮&nbsp; &nbsp; 箱</td>
                <td><input type="text" value="" placeholder="原邮箱"  id="y_yzm" name="email" class="l_user" /></td>
              </tr>
              <tr height="50">
                <td>验证码</td>
                <td><input type="text" style="width: 100px;" value="" placeholder="验证码" name="yzm" class="l_user" /><input type="button" style="margin-left: 50px;" value="发送"  id="yzm"/></td>
              </tr>
              <tr height="70">
                <td>密&nbsp; &nbsp; 码</td>
                <td><input type="password" value="" placeholder="要修改的密码" name="password" class="l_pwd" /></td>
              </tr>
              <tr height="50">
              	<td>&nbsp;</td>
                <td><input type="submit" value="修改" class="log_btn" /></td>
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
<script src="jquery.js"></script>
<script>
    $(document).on('click','#yzm',function(){
        var yzm = $('#y_yzm').val();
          $.ajax({  
            "url":"{:url('login/email')}",  
            "type":"post",  
            "data":{"yzm":yzm},    
            success:function(msg){
              if(msg==1){
                 alert("请勿频繁获取验证码");
              }
            }, 
        });
        
    })
</script>
