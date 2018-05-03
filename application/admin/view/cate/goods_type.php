<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="__PUBLIC__/static/admin/" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script src="js/shopFrame.js" type="text/javascript"></script>
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.dataTables.bootstrap.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<title>商品分类列表</title>
</head>

<body>
<div class="margin" id="page_style">
<div class="operation clearfix">
<button class="btn button_btn btn-danger" type="button" onclick=""><i class="fa fa-trash-o"></i>&nbsp;删除</button>
<span class="submenu"><a href="{:url('admin/cate/add_goods_type')}" name="" class="btn button_btn bg-deep-blue" title="添加产品"><i class="fa  fa-edit"></i>&nbsp;添加商品分类</a></span>
<div class="search  clearfix">
 <label class="label_name">商品分类搜索：</label><input name="" type="text"  class="form-control col-xs-6"/><button class="btn button_btn bg-deep-blue " onclick=""  type="button"><i class="fa  fa-search"></i>&nbsp;搜索</button>

</div>
</div>
<!--列表展示-->
<div class="list_Exhibition margin-sx">
 <table class="table table_list table_striped table-bordered" id="sample-table">
  <thead>
  <tr>
  <th width="30"><label><input id="check" type="checkbox" class="ace"><span class="lbl"></span></label></th>
   <th width="100">分类编号</th>
   <th width="100">分类名称</th>
   <th width="100">关键字</th>
   <th width="120">分类描述</th>
   <th width="100">排序</th>
   <th width="150">是否显示</th>
   <!-- <th width="100">状态</th> -->
   <th width="220">操作</th>
   </tr>   
  </thead>
  <tbody>

    	{volist name="type" id="vo"}
	<tr>
		<td><label><input type="checkbox" name="check[]" value="{$vo.cate_id}" class="ace"><span class="lbl"></span></td>
		<td>{$vo.cate_id}</td>
		<td><span style="margin-left:<?=$vo['level']?>em">{$vo.cate_name}</span></td>
		<td>{$vo.keywords}</td>
		<td>{$vo.cate_desc}</td>
		<td>{$vo.sort_order}</td>
		<td>
			{if condition="$vo['is_show'] eq 0"}
					是
			{elseif condition="$vo['is_show'] eq 1"}
			    否
			{/if}
		</td>
		<td>
			<a href="{:url('admin/cate/cate_del',['cate_id'=>$vo['cate_id']])}">删除</a>&nbsp;&nbsp;&nbsp;
			<a href="{:url('admin/cate/edit_cate',['cate_id'=>$vo['cate_id']])}">修改</a>
		</td>
  	</tr>
  	{/volist}
  </tbody>
</body>
</html>
<script type="text/javascript">

/*********滚动事件*********/
$("#page_style").niceScroll({  
	cursorcolor:"#888888",  
	cursoropacitymax:1,  
	touchbehavior:false,  
	cursorwidth:"5px",  
	cursorborder:"0",  
	cursorborderradius:"5px"  
});

 $(document).ready(function(){
	var ReturnWindow=$('#contents', parent.document); 
	var width = ReturnWindow.css("width");
	 $("#sample-table").css({"width":width-20+"px"});
	  $('#sample-table').location.replace(location.href);
	 });


  $('#check').on('click' , function(){ 
    // 全选

    if(this.checked){
      $("#list :checkbox").prop('checked',true);
    }else{
      $("#list :checkbox").prop('checked',false);
    }
  });
</script>
