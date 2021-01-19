<!--王紫-->
<?php

include "../../config.php";

//从另一个文件中获取操作指令

$method = $_SERVER["REQUEST_METHOD"];//$_SERVER是一个超全局变量，$_SERVER["REQUEST_METHOD"]用于返回访问页面使用的请求方法，比如GET或POST都是请求的方法。

if($method == "GET") //查看访问页面使用的方式是否是GET
{
	
	
	$sql = "SELECT * FROM fltmtemp";
	$huoqu = mysqli_query($config,$sql);
	mysqli_query($config, "set names 'utf8'");	
	while ($row = mysqli_fetch_array($huoqu, MYSQLI_ASSOC)) 
	{   
		$id=$row['id']
		$sql_update = "UPDATE fltmtemp SET source = '$en_US', target = '$zh_CN' WHERE id = '$id'";
	
		mysqli_select_db( $config,"graduate" );
		mysqli_query($config,$sql_update);
	} 
	//print_r($output);

}


	
	
/* 	$sqli = "INSERT INTO tm (tm_source) VALUES ('$zh_CN')";
	mysqli_select_db( $conn,"graduate" );
	mysqli_query($conn,$sqli); */
}
 
?>
