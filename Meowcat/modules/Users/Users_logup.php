<?php
    /*
    用户进行注册
    */
	header("content-type:text/html;charset=utf-8");
	if(!isset($_POST['submit2'])){
		exit('非法访问!');
	}
	$username = $_POST['logup-username'];
	$password = $_POST['logup-password'];
	$email = $_POST['logup-email'];
	$repeatpassword=$_POST['repeat-password'];
	$field=$_POST['logup-field'];
	$duty=$_POST['logup-duty'];
	
	//注册信息判断
	if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
	echo'<div style="text-align:center"><img src="/meowcat/image/wrong.jpg" width="150px" height="100px"></div>';
		exit('<div style="text-align:center">错误：用户名不符合规定。<a href="javascript:history.back(-1);">返回</a></div>');
	}
	if(strlen($password) < 6){
	echo'<div align=center><img src="/meowcat/image/wrong.jpg" width="150px" height="100px"></div>';
		exit('<div style="text-align:center">错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a><div>');
	}
	if($repeatpassword!=$password){
	echo'<div align=center><img src="/meowcat/image/wrong.jpg" width="150px" height="100px"></div>';
		exit('<div style="text-align:center">错误：两次密码填写不一致。<a href="javascript:history.back(-1);">返回</a><div>');
	}
	if(!preg_match('/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i', $email)){
		echo'<div align=center><img src="/meowcat/image/wrong.jpg" width="150px" height="100px"></div>';
    exit('<div style="text-align:center">错误：电子邮箱格式错误。<a href="javascript:history.back(-1);">返回</a></div>');
	}

	//包含数据库连接文件
	include('../config.php');
	//检测用户名是否已经存在
	$check_query = mysqli_query($config,"select email from users where Email='$email' limit 1");
	if(mysqli_fetch_array($check_query)){
		echo'<div align=center><img src="/meowcat/image/wrong.jpg" width="150px" height="100px"></div>';
		echo '<div style="text-align:center">错误：邮箱 ',$email,' 已注册使用。<a href="javascript:history.back(-1);">返回</a>';
		exit;
	}
	$id=$duty+$field+$password;
	//写入数据
	$sql = "INSERT INTO users(user_id,user_name,password,email,duty,field)VALUES('$id','$username','$password','$email','$duty','$field')";

	if(mysqli_query($config,$sql)){
		echo'<div align=center><img src="/meowcat/image/success.png" width="300px" height="120px"></div>';
		exit('<div align=center><font color=red>您已成功注册该系统！请点击此处 </font><a href="/meowcat/web/main/index.html">登录</a></div>');
	} 
	else {
		echo '抱歉！添加数据失败：',mysqli_error($config),'<br />';
		echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
	}
	
?>
