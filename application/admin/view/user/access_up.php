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
<title>权限设置</title>
</head>
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<body>
<form action="{:url('admin/user/access_updo')}" method="post">
<div class="margin" id="page_style">
<div class=" add_Competence_style margin" id="add_Competence_style">
   <ul class="add_style">
    <li class="clearfix"><label class="label_name col-xs-1 col-lg-2">角色名称：</label><span class="col-xs-6"><input name="access_name" value="<?= $access_one['access_name'] ?>" type="text"  class="col-xs-5"/></span></li>
     <li class="clearfix"><label class="col-xs-1 col-lg-2 label_name" for="form-field-1">权限描述：</label>
    <span class="col-xs-6"><textarea name="access_desc" class="form-control col-xs-10" id="form_textarea" placeholder="" ><?= $access_one['access_desc'] ?> </textarea>
    </li>
    <li class="clearfix"><label class="col-xs-1 col-lg-2 label_name" for="form-field-1">选择用户：</label>
    <div class="col-xs-6 admin_name clearfix">
      <?php foreach ($user_info as $key => $val): ?>
         <label class="middle"><input class="ace" value="<?=$val['user_id'] ?>" name="user_id[]" type="checkbox" 
             <?php foreach ($userAccess_one as $kk => $vv): ?>
                <?php if ($vv['user_id']==$val['user_id']): ?>
                    checked="checked" 
                <?php endif; ?>
              <?php endforeach ?>
  

          id="id-disable-check"><span class="lbl"><?=$val['user_name'] ?></span></label>
      <?php endforeach ?>
  	</div></li>
   </ul>
</div>
<div class="Competence_list">
  <div class="title_name"><span>权限列表</span></div>
  <div class="list_cont clearfix">

      <?php foreach ($url_info as $key => $val): ?>
          <div class="clearfix col-xs-4 col-lg-6 ">
              <dl class="Competence_name">   
                 <dt class="Columns_One"><label class="middle"><input class="ace" disabled="disabled"  type="checkbox"  id="id-disable-check"><span class="lbl">
                  <?= $val['url_name'] ?>
                 </span></label></dt>
                 <dd class="permission_list clearfix">
                    <?php foreach ($val['child'] as $k => $v): ?>
                       <label class="middle"><input class="ace" value="<?= $v['url_id'] ?>" name="url_id[]" type="checkbox" 
                              <?php foreach ($accessUrl_one as $kk => $vv): ?>
                                <?php if ($vv['url_id']==$v['url_id']): ?>
                                    checked="checked" 
                                <?php endif; ?>
                              <?php endforeach ?>
                        id="id-disable-check"><span class="lbl"><?=$v['url_name'] ?></span></label>
                    <?php endforeach ?>
                 </dd>
              </dl>
         </div>
      <?php endforeach ?>
  </div>
</div>
<!--按钮操作-->
<div class="Button_operation btn_width">
    <input type="hidden" name="access_id" value="<?=$access_one['access_id'] ?>" />
    <button class="btn button_btn bg-deep-blue" type="submit">提交</button>
    <button class="btn button_btn bg-gray" type="reset">取消添加</button>
    <a href="javascript:ovid()" onclick="javascript :history.back(-1);" class="btn btn-info button_btn"><i class="fa fa-reply"></i> 返回上一步</a>
 </div>
</div>
</form>
</body>
</html>
<script type="text/javascript">

</script>