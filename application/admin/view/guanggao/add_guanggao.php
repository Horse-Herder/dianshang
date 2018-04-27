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
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.dataTables.bootstrap.js"></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<script src="js/laydate/laydate.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<title>添加</title>
</head>
<!-- style="background-image:url(../images/css_tutorials/background.jpg)" -->
<body>
<form action="{:url('guanggao/add2')}" method="post" id="callajax" enctype="multipart/form-data">

  <table style="font-size:45px;">

    <tr>
    <td>广告名称</td>
    <td><input type="text" name="position_name" /></td>
    </tr>
    <tr>
    <td>显示状态</td>
    <td><select name="ad_status" id="">
        <option value="1">开启</option>
        <option value="0">关闭</option>
    </select></td>
    </tr>
    <tr>
    <td>图片</td>
    <td><input type="file" name="ad_file" /></td>
    </tr>
    <tr>
    <td>开始日期</td>
    <td><input type="date" name="fist" /></td>
    </tr>
    <tr>
    <td>结束日期</td>
    <td><input type="date" name="last" /></td>
    </tr>
    <tr>
    <td>广告链接</td>
    <td><input type="text" name="lianjie" /></td>
    </tr>
    <tr>
    <td>广告位置</td>
    <td><select name="weizhi" id="">
    <option value="0">站内</option>
    <option value="1">站外</option>
    </select></td>
    </tr>
    <tr>
      <td>广告联系人</td>
      <td><input type="text" name="ren" /></td>
    </tr>
    <tr>
      <td>广告联系邮箱</td>
      <td><input type="email" name="email" /></td>
    </tr>
    <tr>
      <td>广告联系人电话</td>
      <td><input type="text" name="tel" /></td>
    </tr>
    <tr>
      <td><input type="submit" id="submit" value="添加" /></td>
    </tr>
  </table>
 <!-- <div class="Button_operation btn_width">
    <button class="btn button_btn bg-deep-blue" id="ids" type="button">保存并提交</button>
    <button class="btn button_btn bg-orange" type="button">保存草稿</button>
    <button class="btn button_btn bg-gray" type="button">取消添加</button>
 </div> -->
<!-- </div>
</div> -->
</form>
</body>
</html>
   <!--复文本编辑框-->
    <script type="text/javascript" charset="utf-8" src="js/utf8-jsp/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/utf8-jsp/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="js/utf8-jsp/lang/zh-cn/zh-cn.js"></script>
<script>
// $(document).ready(function(){
//   $("#ids").click(function(){
//      var formdata = $("#callajax").serialize();
//       console.log(formdata);

//   });
// });
// $("#submit").click(function () {
//             var a = new FormData();
//             a.append("image", $("#filess")[0].files[0]);
//             a.append("id", 1);
//             $.ajax({
//                 url:"{:url('guanggao/add2')}",
//                 xhrFields:{
//                         withCredentials:true
//                 },
//                 type: "POST",
//                 cache: false,
//                 data: a,
//                 processData: false,
//                 contentType:false,
//                 async: false,
//                 success: function (result) {
//                       console.log(data);
//                 }
//                 //cache 上传文件不需要缓存，所以设置false
//                 //processData 因为data值是FormData对象，不需要对数据处理
//                 //contentType 因为是由form表单构造的FormData对象，且已声明了属性enctype，所以为false
//             })
//         })
</script>
