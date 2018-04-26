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
        
    <script type="text/javascript" src="__PUBLIC__/static/index/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/static/index/js/menu.js"></script>    
        
  <script type="text/javascript" src="__PUBLIC__/static/index/js/select.js"></script>
        
    
<title>尤洪</title>
</head>
<body>  
<!--Begin Header Begin-->
{include file="public/left"}
    <div class="m_right">
          <div class="m_des">
              <table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td width="115"><img src="{$user.answer}" width="90" height="90" /></td>
                    <td>
                      <div class="m_user"><a href="{:url('member/img')}">{$user.user_name}</a></div>

                        <p>
                            等级：注册用户 <br />
                            <font color="#ff4e00">您还差 270 积分达到 分红100</font><br />
                            上一次登录时间: 2015-09-28 18:19:47<br />
                            您还没有通过邮件认证 <a href="#" style="color:#ff4e00;">点此发送认证邮件</a>
                        </p>
                        <div class="m_notice">
                          用户中心公告！
                        </div>
                    </td>
                  </tr>
                </table>  
            </div>
            
            <div class="mem_t">资产信息</div>
            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="33%">用户等级：<span style="color:#555555;">普通会员</span></td>
                <td width="33%">消费金额：<span>￥200元</span></td>
                <td width="33%">返还积分：<span>99R</span></td>
              </tr>
              <tr>
                <td>账户余额：<span>￥200元</span></td></td>
                <td>红包个数：<span style="color:#555555;">3个</span></td></td>
                <td>红包价值：<span>￥50元</span></td></td>
              </tr>
              <tr>
                <td colspan="3">订单提醒：
                  <font style="font-family:'宋体';">待付款(<span>0</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待收货(<span>2</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待评论(<span>1</span>)</font>
                </td>
              </tr>
            </table>

            <div class="mem_t">账号信息</div>
            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td>电&nbsp; &nbsp; 话：<span style="color:#555555;">{$user.mobile_phone}</span></td>
                <td>邮&nbsp; &nbsp; 箱：<span style="color:#555555;">{$user.email}</span></td>
              </tr>
              <tr>
                <td>QQ号码：<span style="color:#555555;">{$user.qq}</span></td>
                <td>注册时间：<span style="color:#555555;"><?php echo date('Y-m-d'); ?></span></td>
              </tr>

            </table>
               
            
        </div>
    </div>
  <!--End 用户中心 End--> 
    <!--Begin Footer Begin -->
   {include file="public/footer"}