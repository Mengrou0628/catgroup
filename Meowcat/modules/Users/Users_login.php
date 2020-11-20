<?php
    /*
    用户进行登录
    */
	header("Content-Type: text/html;charset=utf-8");
	$email = htmlspecialchars($_POST['sign-email']);
	$password = $_POST['sign-password'];

	//包含数据库连接文件
	include('config.php');
	
	//检测邮箱及密码是否正确
	$check_query = mysqli_query($config,"select user_name from users where Email='$email' and password='$password'");

	//if (!$check_query) {
	//printf("Error: %s\n", mysqli_error($config));
	//exit();
	//}
	if( $result= mysqli_fetch_array($check_query)){
		//登录成功
		$_SESSION['sign-email'] = $email;
		$_SESSION['sign-name'] = $result['user_name'];
		$_SESSION['sign-password'] = $password;
		$name=$result['user_name'];
	} 
	else {
		//登录失败
	}
?>