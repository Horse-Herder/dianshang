<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<base href="__PUBLIC__/static/admin/" />
<head>
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
<script src="js/laydate/laydate.js" type="text/javascript"></script>
<title>会员管理</title>
</head>
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<body>
<div class="margin" id="page_style">
   <div class="operation clearfix">
    <ul class="choice_search">
     <li class="clearfix col-xs-2 col-lg-2 col-ms-3 "><label class="label_name ">会员名称：</label><input name="" type="text"  class="form-control col-xs-6 col-lg-5"/></li>
      <li class="clearfix col-xs-4 col-lg-5 col-ms-5 "><label class="label_name ">注册时间：</label> 
     <input class="laydate-icon col-xs-4 col-lg-3" id="start" style=" margin-right:10px; height:28px; line-height:28px; float:left">
      <span  style=" float:left; padding:0px 10px; line-height:32px;">至</span>
      <input class="laydate-icon col-xs-4 col-lg-3" id="end" style="height:28px; line-height:28px; float:left"></li>
     <button class="btn button_btn bg-deep-blue " onclick=""  type="button"><i class="fa  fa-search"></i>&nbsp;搜索</button>
    </ul>
    </div>
<div class="bkg_List_style">
 <div class="bkg_List_operation clearfix">
  <ul class="bkg_List_Button_operation">
   <li class="btn btn-danger"><span id="delete_all" class="btn_add"><em class="bkg_List_icon icon_add"></em>删除用户</span></li>
   <li class="btn bg-deep-blue"><a href="javascrpt:void()" class="btn_add"><em class="bkg_List_icon icon_modify"></em>修改用户</a></li>
   <li class="btn bg-deep-blue"><a href="javascrpt:void()" class="btn_add"><em class="bkg_List_icon icon_delete"></em>添加用户</a></li>
   <li class="btn btn-Dark-success"><a href="javascrpt:void()" class="btn_add"><em class="bkg_List_icon icon_close"></em>关闭用户</a></li>
  </ul>
 </div>
 <div class="bkg_List clearfix">
  <table class="table  table_list table_striped table-bordered">
   <thead>
    <tr>
     <th  width="40"><label><input name="check"  type="checkbox" class="ace"><span class="lbl"></span></label></th>
     <th>用户名</th>
     <th>电话</th>
     <th>邮箱</th>
     <th>加入时间</th>
     <th>上次登录时间</th>
     <th>头像</th>
     <th>操作</th>
    </tr>
   </thead>
   <tbody id="list">
    {volist name="data" id='v'}
    <tr id="apple">
     <td><label><input type="checkbox" name="user_id[]" value="{$v.user_id}" class="ace"><span class="lbl"></span></label></td>
     <td>{$v.user_name}</td>
     <td>{$v.mobile_phone}</td>
     <td>{$v.email}</td>
     <td>{:date("Y-m-d H:i:s",$v.reg_time)}</td>
     <td>{:date("Y-m-d H:i:s",$v.last_login)}</td>
     <td><img src="{$v.answer}" alt=""  width="50" heigth="50"/></td>
     <td></td>
    </tr>
    {/volist}

   </tbody>
  </table>
 <div style="padding-left: 40% ; margin-top: 20px">{$data->render()}</div> 
 </div>
</div>
</div>
</body>
</html>
<script>
/*******滚动条*******/
$("body").niceScroll({  
	cursorcolor:"#888888",  
	cursoropacitymax:1,  
	touchbehavior:false,  
	cursorwidth:"5px",  
	cursorborder:"0",  
	cursorborderradius:"5px"  
});
/******时间设置*******/
  var start = {
    elem: '#start',
    format: 'YYYY-MM-DD',
   // min: laydate.now(), //设定最小日期为当前日期
    max: '2099-06-16', //最大日期
    istime: true,
    istoday: false,
    choose: function(datas){
         end.min = datas; //开始日选好后，重置结束日的最小日期
         end.start = datas //将结束日的初始值设定为开始日
    }
};
var end = {
    elem: '#end',
    format: 'YYYY-MM-DD',
    //min: laydate.now(),
    max: '2099-06-16',
    istime: true,
    istoday: false,
    choose: function(datas){
        start.max = datas; //结束日选好后，重置开始日的最大日期
    }
};
laydate(start);
laydate(end);
/********************列表操作js******************/
 $('table th input:checkbox').on('click' , function(){ 
    // 全选

    if(this.checked){
      $("#list :checkbox").prop('checked',true);
    }else{
      $("#list :checkbox").prop('checked',false);
    }
  });


$('#delete_all').on('click',function(){
       var id_array="";
       $("input[name='user_id[]']:checked").each(function(){
          id_array+=','+$(this).attr('value');
       })
       $.ajax({
         type: "POST",
         url: "{:url('admin/member/member_del')}",
         data: {'user_id':id_array},
         dataType: "json",
         success: function(msg){
            if(msg.status=="ok"){ 
                alert('删除成功');   
                $("input[name='user_id[]']:checked").parents("tr").remove() 
                window.location.reload()
            }else{
              alert('删除失败');
            }
         }
    });
});
</script>
