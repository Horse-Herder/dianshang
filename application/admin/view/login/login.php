<!--  --><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="__PUBLIC__/static/admin/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="skin/default/skin.css" rel="stylesheet" type="text/css" id="skin" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/shopFrame.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<title>用户登录</title>
</head>

<body class="login_style login-layout">
 <div class="loginbody">
  <div class="login-container">
   <div class="login_logo"><img src="images/logo.png" /></div>
    <div class="position-relative">
     <div id="login_add" class="login-box widget-box no-border visible">
      <div class="widget-main">
      <h4 class="header blue lighter bigger"><i class="fa fa-coffee green"></i>&nbsp;&nbsp;&nbsp;管理员登录</h4>
      <div class="clearfix">
       <div class="login_icon"><img src="images/login_bg.png" /></div>
       <div class="add_login_cont Reg_log_style ">
        <form action="{:url('login/login_do')}" method="post">
         <ul class="r_f">
          <li class="frame_style form_error"><label class="user_icon"></label><input name="user_name" data-name="用户名" type="text" id="username"><i>用户名</i></li>
          <li class="frame_style form_error"><label class="password_icon"></label><input name="user_pwd" data-name="密码" type="password" id="userpwd"><i>密码</i></li>
          <div class="Codes_region"></div>
          </li> 
          <input type="submit" style="width:200px;" class="button_width  btn btn-sm btn-primary" id="login_btn" value="登录">
         
         </ul>       
        </form>
       </div>
       <div class="login_Click_Actions">          
       </div>
      </div>
      <div class="social-or-login center"><span class="">通知</span></div>
      <div class="margin-top color center">本网站系统不再对IE8以下浏览器提供支持，请见谅。</div>
      </div>
     </div>
   </div>
   </div>
   </div>
</body>
</html>
<script type="text/javascript">
$('#login_btn').click(function(){
     user_name=$("#username").val();
	   user_pwd=$("#userpwd").val();
     if(user_name == ""){
        alert("用户名不能为空");
        return false;
     }
     if(user_pwd == ""){
        alert("密码不能为空");
        return false;
     }
	});
  
</script>



