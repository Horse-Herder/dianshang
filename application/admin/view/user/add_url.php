
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
<script type="text/javascript" src="js/Validform/Validform.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script src="js/shopFrame.js" type="text/javascript"></script>
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<title>添加管理员</title>
</head>
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<body>
<div class="margin add_administrator" id="page_style">
    <div class="add_style add_administrator_style">
    <div class="title_name">添加权限</div>
    <form action="{:url('admin/user/add_url')}" method="post" >
    <ul>
     <li class="clearfix">
		     <label class="label_name col-xs-2 col-lg-2"><i>*</i>权限名称：</label>
		     <div class="formControls col-xs-6">
		     <input type="text" class="input-text col-xs-12" value="" placeholder="" id="user-name" name="url_name" datatype="*2-16" nullmsg="用户名不能为空"></div>
		    <div class="col-4"> <span class="Validform_checktip"></span></div>
     </li>

     <li class="clearfix">
		     <label class="label_name col-xs-2 col-lg-2"><i>*</i>权限路径：</label>
		     <div class="formControls col-xs-6">
		     <input type="text" class="input-text col-xs-12" value="" placeholder="" id="user-name" name="url_site" datatype="*2-16" nullmsg="用户名不能为空"></div>
		    <div class="col-4"> <span class="Validform_checktip"></span></div>
     </li>
	
	<li class="clearfix">
	    <label class="label_name col-xs-2 col-lg-2"><i class="c-red">*</i>父级名称：</label>
		    <div class="formControls col-xs-6"> <span class="select-box" style="width:150px;">
		        <select class="select" name="url_parent" size="1">
			          <option value="0">一级权限</option>
			          <?php foreach ($data as $key => $val): ?>
			          		<option value="<?= $val['url_id'] ?>">
								<?php for($i=0 ; $i<$val['level'] ; $i++){ ?>
					                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php } ?>
			          		<?= $val['url_name'] ?></option>
			          <?php endforeach ?>
			         
		        </select>
		        </span>
	         </div>
    </li>
  
         <li class="clearfix">
      <div class="col-xs-2 col-lg-2">&nbsp;</div>
      <div class="col-xs-6">
    <input class="btn button_btn bg-deep-blue " type="submit" value="提交注册">
      <input name="reset" type="reset" class="btn button_btn btn-gray" value="取消重置" />
      <a href="javascript:ovid()" onclick="javascript :history.back(-1);" class="btn btn-info button_btn"><i class="fa fa-reply"></i> 返回上一步</a>
      </div>
    </li>
    </ul>
    </form>
    </div>
    <div class="split_line"></div>
    <div class="Notice_style l_f">
      
    </div>
</div>
</body>
</html>

