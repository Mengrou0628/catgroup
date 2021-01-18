<?php
     /*
     author：王梦柔
     */
header("content-type:application/json");
require_once ('../config.php');
session_start();
$res=mysqli_query($conn,"select user_id, user_name,email,duty,field from users where user_id='{$_SESSION["user_id"]}'");//取文件表里id和名称数据
$arr = array();	
if($res){
 while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
 
  array_push($arr,$row);
 }
}
//print_r($arr);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);//json编码
$conn->close();		




?>
