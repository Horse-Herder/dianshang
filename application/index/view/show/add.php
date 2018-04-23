<form action="{:url('show/add')}" method="post"  onsubmit="return sub()">
	<center>
		<table border="1" cellpadding="0" cellspacing="0">
			<tr>
				<td>姓名</td>
				<td><input type="text" name="username"  onblur="love()"><font color="red"></font></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="password" name="password"  onblur="love1()"><font color="red"></font></td>
			</tr>
			<tr>
				<td>确认密码</td>
				<td><input type="password" name="pwd"  onblur="love2()"><font color="red"></font></td>
			</tr>
			<tr>
				<td>电话</td>
				<td><input type="text" name="phone_number"  onblur="love3()"><font color="red"></font></td>
			</tr>
			<tr>
				<td>邮箱</td>
				<td><input type="text" name="email"  onblur="love4()"><font color="red"></font></td>
			</tr>
			<tr rowspan="2">
				<td><input type="submit" value="注册"></td>
			</tr>
		</table>
	</center>
</form>
<script>
	var obj = document.getElementsByTagName('input');
	var d = document.getElementsByTagName('font');
	function love(){
		a = obj[0].value;
		if(a==''){
			d[0].innerHTML='用户名不能为空';
			return false;
		}else{
			d[0].innerHTML="<font color='red'>√</font>";
			return true;
		}
	}

	function love1(){
		a = obj[1].value;
		if(a==''){
			d[1].innerHTML='密码不能为空';
			return false;
		}else{
			d[1].innerHTML="<font color='red'>√</font>";
			return true;
		}
	}

	function love2(){
		a = obj[2].value;
		if(a==''){
			d[2].innerHTML='确认密码不能为空';
			return false;
		}else{
			d[2].innerHTML="<font color='red'>√</font>";
			return true;
		}
	}

	function love3(){
		a = obj[3].value;
		if(a==''){
			d[3].innerHTML='电话不能为空';
			return false;
		}else{
			d[3].innerHTML="<font color='red'>√</font>";
			return true;
		}
	}

	function love4(){
		a = obj[4].value;
		if(a==''){
			d[4].innerHTML='邮箱不能为空';
			return false;
		}else{
			d[4].innerHTML="<font color='red'>√</font>";
			return true;
		}
	}

	function sub(){
		love();
		love1();
		love2();
		love3();
		love4();
		if(love()&&love1()&&love2()&&love3()&&love4()){
			return true;
		}else{
			return false;
		}
	}
</script>