<?php
    /*
    �жϵ�¼״̬��δ��¼��ʾ��¼ע��ѡ��û���½���л���ʾ���ǳƺ�ע��ѡ��
    */
	session_start();
	error_reporting(0);
	
	//�������ݿ������ļ�
	include('config.php');
	$email = $_SESSION['sign-email'];
	$password = $_SESSION['sign-password'];
	$user=$_SESSION['sign-user']

	//������估�����Ƿ���ȷ
	$check_query = mysqli_query($config,"select user_name from users where Email='$email' and password='$password'");

	if($result= mysqli_fetch_array($check_query)){
    //��¼�ɹ�
    $_SESSION['sign-email'] = $email;
    $_SESSION['sign-user'] = $result['user_name'];
	$name=$result['user_name'];
    
?>