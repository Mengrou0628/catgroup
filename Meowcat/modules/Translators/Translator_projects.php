<?php
     /*
     author：王梦柔
     */
header("content-type:application/json;charset=utf-8");
require_once ('../config.php');
session_start();
//$res=mysqli_query($conn,"select project_id,projectname from profl");//测试用语句
$res=mysqli_query($conn,"select project_id,projectname from profl where `user_id`='{$_SESSION['user_id']}'");//取个人项目表里的全部数据
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
