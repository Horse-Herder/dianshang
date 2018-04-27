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
<title>管理员列表</title>
</head>
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<body>
<div class="margin Competence_style" id="page_style">
    <div class="operation clearfix">
<button class="btn button_btn btn-danger-all" type="button" ><i class="fa fa-trash-o"></i>&nbsp;删除</button>
<a href="{:url('admin/user/add_user')}"  class="btn button_btn bg-deep-blue" title="添加管理员"><i class="fa  fa-edit"></i>&nbsp;添加管理员</a>
  <select class="select Competence_sort" name="admin-role" size="1" id="Competence_sort">
					<option value="0">--选择分类--</option>
					<option value="1">超级管理员</option>
					<option value="2">普通管理员</option>
					<option value="3">栏目编辑</option>
				</select>
   <div class="search  clearfix">

   <input name="" type="text"  class="form-control col-xs-8"/><button class="btn button_btn bg-deep-blue "  type="button"><i class="fa  fa-search"></i>&nbsp;搜索</button>
</div>
</div>
<div class="compete_list">
       <table id="sample_table" class="table table_list table_striped table-bordered dataTable no-footer">
		 <thead>
			<tr>
			  <th class="center"><label><input type="checkbox" id="all" class="ace"><span class="lbl"></span></label></th>
			  <th>登录名</th>
			  <th>手机</th>
              <th>邮箱</th>
              <th>角色</th>
			  <th class="hidden-480">加入时间</th>          
			  <th class="hidden-480">操作</th>
             </tr>
		    </thead>
             <tbody id="list">
             <?php foreach ($user_info as $key => $val): ?>
             	
			  <tr>
				<td class="center"><label><input type="checkbox" name="user_id[]" value="<?=$val['user_id'] ?>" class="ace"><span class="lbl"></span></label></td>
				<td><?=$val['user_name'] ?></td>
				<td><?=$val['user_phone'] ?></td>
				<td ><?=$val['user_email'] ?></td>
				<td>超级管理员</td>
                <td><?=date('Y-m-d H:i:s',$val['add_time']) ?></td>
				<td class="td-manage">
                 <a title="编辑" onclick="Competence_modify('560')" href="javascript:;"  class="btn button_btn bg-deep-blue">编辑</a>        
                 <a title="删除" href="javascript:;" onclick="Competence_del(this,'1')" id="<?=$val['user_id'] ?>" class="btn button_btn btn-danger">删除</a>
                 <a title="查看" href="javascript:;" onclick="Competence_View(this,'1')" class="btn button_btn btn-green">查看</a>
				</td>
			  </tr>								
             <?php endforeach ?>
		      </tbody>
	        </table>
     </div>
</div>
</body>
</html>
<script>
$(function(){
	$("#Competence_sort").click(function(){
		var option=$(this).find("option:selected").text();
		var value=$(this).val();
		if(value==0){
			  
			$("#sample_table tbody tr").show()
			}
			else{
		$("#sample_table tbody tr").hide().filter(":contains('"+(option)+"')").show();	
			}
		}).click();	
	});

/*******滚动条*******/
$("body").niceScroll({  
	cursorcolor:"#888888",  
	cursoropacitymax:1,  
	touchbehavior:false,  
	cursorwidth:"5px",  
	cursorborder:"0",  
	cursorborderradius:"5px"  
});

$("#all").click(function(){   
    if(this.checked){   
        $("#list :checkbox").prop("checked", true);  
      }else{   
        $("#list :checkbox").prop("checked", false);
      }   
});


//删除单条
$(".btn-danger").click(function(){
	obj = $(this);
	var user_id = $(this).attr('id'); 
	$.ajax({ 
		type:"GET",
		url: "{:url('admin/user/user_del')}",
		data:"user_id="+user_id,
		dataType:"json",
		success: function(msg){
			if(msg.status==1){
				obj.parent().parent().remove();
			}else{
				alert(msg.error);
			}
      	}
  	});
})


//删除多条
$(".btn-danger-all").click(function(){

	var str = "";  
    $.each($("input[name='user_id']"), function (k, v) {  
        if (v.checked == false) {  
            return;  
        } else {  
            str += v.value + ",";  
        }
    }); 

    alert(str); 
	/*obj = $(this);
	var user_id = $(this).attr('id'); 
	$.ajax({ 
		type:"GET",
		url: "{:url('admin/user/user_del')}",
		data:"user_id="+user_id,
		dataType:"json",
		success: function(msg){
			if(msg.status==1){
				obj.parent().parent().remove();
			}else{
				alert(msg.error);
			}
      	}
  	});*/
})
</script>
