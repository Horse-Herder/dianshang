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
            <p></p>
            <div class="mem_tit">收货地址</div>
			<div class="address">
            	<div class="a_close"><a href="#"><img src="__PUBLIC__/static/index/images/a_close.png" /></a></div>
            	<table border="0" class="add_t" align="center" style="width:98%; margin:10px auto;" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2" style="font-size:14px; color:#ff4e00;">湖北黃岡</td>
                  </tr>
                  <tr>
                    <td align="right" width="80">收货人姓名：</td>
                    <td>{$address.consignee}</td>
                  </tr>
                  <tr>
                    <td align="right">配送区域：</td>
                    <td>{$address.country}{$address.province}{$address.city}{$address.district}</td>
                  </tr>
                  <tr>
                    <td align="right">详细地址：</td>
                    <td>{$address.address}</td>
                  </tr>
                  <tr>
                    <td align="right">手机：</td>
                    <td>{$address.mobile}</td>
                  </tr>
                  <tr>
                    <td align="right">电话：</td>
                    <td>{$address.tel}</td>
                  </tr>
                  <tr>
                    <td align="right">电子邮箱：</td>
                    <td>{$address.email}</td>
                  </tr>
                  <tr>
                    <td align="right">标志建筑：</td>
                    <td>{$address.sign_building}</td>
                  </tr>
                </table>
				
                <p align="right">
                	<a href="#" style="color:#ff4e00;">设为默认</a>&nbsp; &nbsp; &nbsp; &nbsp; <a href="" style="color:#ff4e00;">编辑</a>&nbsp; &nbsp; &nbsp; &nbsp; 
                </p>
            </div>

            <div class="mem_tit">
            	<a href="#"><img src="__PUBLIC__/static/index/images/add_ad.gif" /></a>
            </div>
            <form action="{:url('member/addressdo')}" method="post">
            <table border="0" class="add_tab" style="width:930px;"  cellspacing="0" cellpadding="0">
              <tr>
                <td width="135" align="right">配送地区</td>
                <td colspan="3" style="font-family:'宋体';">

              <script src="/jsAddress.js ?>"></script>
                
              地区：<select id="area" name="country"></select>  
              省：<select id="cmbProvince" name="province"></select>  
              市：<select id="cmbCity" name="city"></select>  
              区：<select id="cmbArea" name="district"></select>  
              <br /><br />  （必填）
              <script>  
                  addressInit('area','cmbProvince','cmbCity','cmbArea','西北地区', '北京', '市辖区', '东城区');  
              </script>   
                </td>
              </tr>
              <tr>
                <td align="right">收货人姓名</td>
                <td style="font-family:'宋体';"><input type="text" name="consignee" value="姓名" class="add_ipt" />（必填）</td>
                <td align="right">电子邮箱</td>
                <td style="font-family:'宋体';"><input type="text" name="email" value="12345678@qq.com" class="add_ipt" />（必填）</td>
              </tr>
              <tr>
                <td align="right">详细地址</td>
                <td style="font-family:'宋体';"><input type="text" name="address" value="世外桃源" class="add_ipt" />（必填）</td>
                <td align="right">邮政编码</td>
                <td style="font-family:'宋体';"><input type="text" name="zipcode" value="610000" class="add_ipt" /></td>
              </tr>
              <tr>
                <td align="right">手机</td>
                <td style="font-family:'宋体';"><input type="text" name="mobile" value="1361234587" class="add_ipt" />（必填）</td>
                <td align="right">电话</td>
                <td style="font-family:'宋体';"><input type="text" name="tel" value="028-12345678" class="add_ipt" /></td>
              </tr>
              <tr>
                <td align="right">标志建筑</td>
                <td style="font-family:'宋体';"><input type="text" name="sign_building" value="世外桃源大酒店" class="add_ipt" /></td>
                <td align="right">最佳送货时间</td>
                <td style="font-family:'宋体';"><input type="text" name="best_time" value="" class="add_ipt" /></td>
              </tr>
            </table>
           	<p align="right">
            	<a href="#">删除</a>&nbsp; &nbsp; <input type="submit"  class="add_b" value="确认修改" />
            </p> 
            </form>
            
        </div>
    </div>
	<!--End 用户中心 End--> 
    <!--Begin Footer Begin -->
    {include file="public/footer"}


    