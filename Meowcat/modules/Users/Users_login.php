<!--王紫-->
<html>
<head>
<title>登录结果</title>
<meta charset="UTF-8">
</head>


<?php
    /*
    用户进行登录
    */
	header("content-type:text/html;charset=utf-8");
	
	$email = $_POST['login-email'];
	$password = $_POST['login-password'];

	//包含数据库连接文件
	include('../config.php');
	
	//检测邮箱及密码是否正确
	$check_query = mysqli_query($config,"select user_name from users where Email='$email' and password='$password'");
	
	//if (!$check_query) {
	//printf("Error: %s\n", mysqli_error($config));
	//exit();
	//}
	if( $result= mysqli_fetch_array($check_query)){
		//登录成功
		$_SESSION['login-email'] = $email;
		$_SESSION['login-name'] = $result['user_name'];
		$_SESSION['login-duty'] = $result['duty'];
		$_SESSION['login-password'] = $password;
		$_SESSION['login-id'] = $result['user_id'];
		$name=$result['user_name'];
		$duty=$result['duty'];
		$id=$result['user_id'];
		if($duty==1)
		{
			header("Location: /meowcat/web/PM/tmlist.html");
		}
		else
		{
			header("Location: /meowcat/web/translator/translfile.html");
		}
	} 
	else {
		echo'<div align=center><img src="/meowcat/image/wrong.jpg" width="150px" height="100px"></div>';
		echo'<div style="text-align:center" margin="200px">登录失败！点击此处   <a href="javascript:history.back(-1);">返 回</a></div>';
		
		//登录失败
	}
?>
</html>
