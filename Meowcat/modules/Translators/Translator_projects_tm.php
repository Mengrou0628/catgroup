<?php
     /*
     author：王梦柔
     */
header("content-type:application/json");
require_once ('../config.php');
session_start();
//$res=mysqli_query($conn,"select project_id,projectname from protm");//测试用语句
$team=mysqli_query($conn,"select team_id from teamfl where `user_id`='{$_SESSION['user_id']}'");
$res=mysqli_query($conn,"select project_id,projectname from protm where `team_id`='{$team}'");//取个人项目表里的全部数据	
$arr = array();	
if($res){
 while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
  array_push($arr,$row);
 }
}
print_r($arr);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);//json编码
$conn->close();		

?>
