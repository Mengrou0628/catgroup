<?php
    /*
    �û����е�¼
    */
	header("Content-Type: text/html;charset=utf-8");
	$email = htmlspecialchars($_POST['sign-email']);
	$password = $_POST['sign-password'];

	//�������ݿ������ļ�
	include('config.php');
	
	//������估�����Ƿ���ȷ
	$check_query = mysqli_query($config,"select user_name from users where Email='$email' and password='$password'");

	//if (!$check_query) {
	//printf("Error: %s\n", mysqli_error($config));
	//exit();
	//}
	if( $result= mysqli_fetch_array($check_query)){
		//��¼�ɹ�
		$_SESSION['sign-email'] = $email;
		$_SESSION['sign-name'] = $result['user_name'];
		$_SESSION['sign-password'] = $password;
		$name=$result['user_name'];
	} 
	else {
		//��¼ʧ��
	}
?>