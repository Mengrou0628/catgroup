<?php
    /*
    判断登录状态：未登录显示登录注册选项，用户登陆后切换显示成昵称和注销选项
    */
	session_start();
	error_reporting(0);
	
	//包含数据库连接文件
	include('config.php');
	$email = $_SESSION['sign-email'];
	$password = $_SESSION['sign-password'];
	$user=$_SESSION['sign-user']

	//检测邮箱及密码是否正确
	$check_query = mysqli_query($config,"select user_name from users where Email='$email' and password='$password'");

	if($result= mysqli_fetch_array($check_query)){
    //登录成功
    $_SESSION['sign-email'] = $email;
    $_SESSION['sign-user'] = $result['user_name'];
	$name=$result['user_name'];
    
?>