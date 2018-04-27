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
<form action="{:url('admin/user/url_del')}" method="post">
<div class="margin Competence_style" id="page_style">
    <div class="operation clearfix">
<button class="btn button_btn btn-danger" id="button" onclick=""><i class="fa fa-trash-o"></i>&nbsp;删除</button>
<a href="{:url('admin/user/add_url')}"  class="btn button_btn bg-deep-blue" title="添加管理员"><i class="fa  fa-edit"></i>&nbsp;添加权限</a>
 
   <div class="search  clearfix">

   <input name="" type="text"  class="form-control col-xs-8"/><button class="btn button_btn bg-deep-blue " onclick=""  type="button"><i class="fa  fa-search"></i>&nbsp;搜索</button>
</div>
</div>
<div class="compete_list">
       <table id="sample_table" class="table table_list table_striped table-bordered dataTable no-footer">
     <thead>
        <tr>
            <th class="center"><label><input type="checkbox" id="all" class="ace"><span class="lbl"></span></label></th>
            <th>权限名称</th>
            <th>权限路径</th>
            <th>状态</th>
            <th class="hidden-480">操作</th>
        </tr>
        </thead>
        <tbody id="list">
            <?php foreach ($data as $key => $val): ?>
              
              <tr id="list" >
              <td class="center"><label><input type="checkbox" name="url_id[]" value="<?=$val['url_id'] ?>" class="ace"><span class="lbl"></span></label></td>
              <td align="left"><?php for($i=0 ; $i<$val['level'] ; $i++){ ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php } ?><?=$val['url_name'] ?></td>
              <td><?php if ($val['url_site']==''): ?>
                  —— ——
              <?php else: ?>
                  <?=$val['url_site']; ?>
              <?php endif ?></td>
               <td><span>
                  <?php if ($val['url_status']==1): ?>
                       <a title="停用" href="{:url('admin/user/url_status',['url_id'=>$val.url_id])}" class="btn button_btn btn-Dark-success">已启用</a> 
                      
                  <?php else: ?>
                       <a title="停用" href="{:url('admin/user/url_status',['url_id'=>$val.url_id])}" class="btn button_btn btn-Dark-success">已停用</a> 
                      
                  <?php endif ?>
              </span></td>
              <td class="td-manage">
                       <a title="编辑" href="{:url('admin/user/url_up',['url_id'=>$val.url_id])}" class="btn button_btn bg-deep-blue">编辑</a>        
                       <a title="删除" href="{:url('admin/user/url_del',['url_id'=>$val.url_id])}" class="btn button_btn btn-danger">删除</a>
              </td>
               </tr>
            <?php endforeach ?>
                                  
          </tbody>
          </table>
     </div>
</div>
</form>
</body>
</html>

<script>
    $("#all").click(function(){   
    if(this.checked){   
        $("#list :checkbox").prop("checked", true);  
      }else{   
        $("#list :checkbox").prop("checked", false);
      }   
    });

</script>