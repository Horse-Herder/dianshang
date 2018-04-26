<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="__PUBLIC__/static/index/css/style.css" />  
<script type="text/javascript" src="__PUBLIC__/static/index/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/index/js/menu.js"></script>    
<script type="text/javascript" src="__PUBLIC__/static/index/js/select.js"></script>
        
    
<title>尤洪</title>
</head>
<body>  

{include file="public/left"}

<div class="m_right">
    <div class="mem_tit">
    	<span class="fr" style="font-size:12px; color:#55555; font-family:'宋体'; margin-top:5px;">共发现<span style="color: red"><?= $count?></span>件</span>我的收藏
    </div>
   	<table border="0" class="order_tab" style="width:930px;" cellspacing="0" cellpadding="0">
      <tr>                                                                                                                                       
        <td align="center" width="320">商品名称</td>
        <td align="center" width="180">价格</td>
        <td align="center" width="180">收藏时间</td>
        <td align="center" width="270">操作</td>
      </tr>
      <?php foreach ($data as $k => $v) { ?>        
      <tr>
        <td style="font-family:'宋体';">
        	<div class="sm_img"><img src="<?php echo $v['goods_img'] ?>" width="60" height="60" /></div><?php echo $v['goods_name'] ?>
        </td>          
        <td align="center">￥<?php echo $v['market_price'] ?></td>
        <td align="center"><?php echo date("Y-m-d H:i:s",$v['crate_time']) ?></td>
        <td align="center"><a href="#">关注</a>&nbsp; &nbsp; <a href="#" style="color:#ff4e00;">加入购物车</a>&nbsp; &nbsp; <a href="{:url('member/collectdel')}?id=<?php echo $v['collection_id'] ?>">删除</a></td>
      </tr>
      <?php } ?>
    </table> 
</div>
</div>
	<!--End 用户中心 End--> 
    <!--Begin Footer Begin -->
    {include file="public/footer"}