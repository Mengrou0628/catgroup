<?php
    /*
    用户退出登录
    */
	session_start();
	error_reporting(0);

	if($_GET['action'] == "logout"){
    	unset($_SESSION['login-email']);
    	unset($_SESSION['login-name']);
	unset($_SESSION['login-duty']);
	unset($_SESSION['login-password']);
	}
	header("Location: /meowcat/web/main/index.html");
?>
