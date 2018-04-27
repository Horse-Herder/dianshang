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
<title>商品列表</title>
</head>

<body>
<div class="margin" id="page_style">
<div class="operation clearfix">
 <span class="submenu"><a href="{:url('admin/guanggao/add')}" name="" class="btn button_btn bg-deep-blue" title="添加广告"><i class="fa  fa-edit"></i>&nbsp;添加广告</a></span>

<!-- <button class="del" type="button" onclick="">&nbsp;删除</button> -->
<!-- <i class="fa fa-trash-o"> --><input type="button" value="删除" style="margin-left:85px;" onclick="dels()"><!-- </i> -->
 反选<input type="checkbox" name="ddd" id="" onclick="bb()">
          全不选<input type="checkbox" name="bbb" id="" onclick="cc()">
          全选<input type="checkbox" name="kkk" id="k" onclick="aa()">&nbsp;&nbsp;&nbsp;
          商品搜索<input name="" type="text"/>&nbsp;&nbsp;&nbsp;
          <button onclick="" type="button" value="搜索">搜索</button>

</div>
</div>
<!--列表展示-->
<div class="list_Exhibition margin-sx" id="rep">
 <table class="table table_list table_striped table-bordered" id="sample-table">
  <thead>
  <tr>
   <th class="center">  
           <br>
         
        </th>
  <th width="130">ID</th>
   <th width="130">广告名称</th>
   <th width="120">显示状态</th>
   <th height="100">图片</th>
   <th width="100">开始日期</th>
   <th width="100" >结束日期</th>
   <th width="100">广告链接</th>
   <th width="100">广告位置</th>
   <th width="100">广告联系人</th>
   <th width="100">广告联系邮箱</th>
   <th width="100">广告联系人电话</th>
   </tr>  <!-- __PUBLIC__/static/admin/. -->
   <!-- public/static/admin/uploads -->
  {foreach name="arr" item="v"}
 
     <tr id="{$v.position_id}_asd">
     <td class="center">  
           <input type="checkbox" name="chk" id="con" title="{$v.position_id}">
        </td>
     <th>{$v.position_id}</th>
     <th>{$v.position_name}</th>
     <th>{$v.ad_status}</th>
     <th><img src="/uploads/{$v.ad_file}" width="100" height="100"></th>
     <th>{$v.fist}</th>
     <th>{$v.last}</th>
     <th>{$v.lianjie}</th>
     <th>{$v.weizhi}</th>
     <th>{$v.ren}</th>
     <th>{$v.email}</th>
     <th>{$v.tel}</th>
     </tr>
    {/foreach}
    
  </thead>
 </table>
</div>
{$arr->render()}

</body>
</html>
<script type="text/javascript" src="js/jquery-1.9.1.min.js">
</script>
<script>
  var chk = document.getElementsByName('chk');
  function aa(){
    for(var i=0; i<chk.length; i++){
        chk[i].checked=true;
    }
}
function bb(){
    for(var i=0; i<chk.length; i++){
        if(chk[i].checked){
            chk[i].checked=false;
        }else{
            chk[i].checked=true;
        }
    }
}
function cc(){
    for(var i=0; i<chk.length; i++){
        if(chk[i].checked){
            chk[i].checked=false;
        }
    }
}


function dels(){
    
    var str='';
    var box=document.getElementsByName('chk');
    // console.log(box);
    var aa=document.getElementById('aa');

    for(var i=0;i<chk.length;i++){
        if(chk[i].checked){
            str=str+chk[i].title+',';
            // console.log(str);
        }
    }
    str=str.substring(str.length-1,',');

    // alert(str);die;
    $.ajax({  
                type: "GET",  
                url: "{:url('admin/guanggao/dels')}",  
                data:"id="+str,  
                success: function(data){
                  if(data=="1"){
                    alert("删除成功")
                    $("#"+str+"_asd").remove();//主要就是这个删除成功后移除这行数据
                }
                }  
            });  
//     var ajax=new XMLHttpRequest();
//     ajax.onreadystatechange=function(res){
//         if(ajax.readyState==4){
//               document.getElementById('rep').innerHTML=ajax.responseText;
//             // console.log(res);
//         }
//     }       
//     ajax.open('get','/admin/guanggao/dels?id='+str);
//     ajax.send(null);
}
</script>
