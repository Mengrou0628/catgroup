<?php
    /*
    �û�����ע��
    */
	
	if(!isset($_POST['submit2'])){
		exit('�Ƿ�����!');
	}
	$username = $_POST['login-username'];
	$password = $_POST['login-password'];
	$email = $_POST['login-email'];
	
	//ע����Ϣ�ж�
	if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
	echo'<div align=center><img src="wrong.jpg" width="150px" height="60px"></div>';
		exit('<div text=center>�����û��������Ϲ涨��<a href="javascript:history.back(-1);">����</a></div>');
	}
	if(strlen($password) < 6){
	echo'<div align=center><img src="wrong.jpg" width="150px" height="60px"></div>';
		exit('<div text=center>�������볤�Ȳ����Ϲ涨��<a href="javascript:history.back(-1);">����</a><div>');
	}
	if(!preg_match('/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i', $email)){
		echo'<div align=center><img src="wrong.jpg" width="150px" height="60px"></div>';
    exit('<div text=center>���󣺵��������ʽ����<a href="javascript:history.back(-1);">����</a></div>');
	}

	//�������ݿ������ļ�
	include('config.php');
	//����û����Ƿ��Ѿ�����
	$check_query = mysqli_query($config,"select email from users where Email='$email' limit 1");
	if(mysqli_fetch_array($check_query)){
		echo'<div align=center>ע������</div>';
		echo '<div text=center>�������� ',$email,' ��ע��ʹ�á�<a href="javascript:history.back(-1);">����</a>';
		exit;
	}

	//д������
	$sql = "INSERT INTO users(user_name,password,email)VALUES('$username','$password','$email')";
	if(mysqli_query($config,$sql)){
		exit('<div align=center><img src="success.png" width="150px" height="60px"><font color=red>���ѳɹ�ע���ϵͳ�������˴� </font><a href="login.html">��¼</a></div>');
	} 
	else {
		echo '��Ǹ���������ʧ�ܣ�',mysqli_error($conn),'<br />';
		echo '����˴� <a href="javascript:history.back(-1);">����</a> ����';
	}
	
?>