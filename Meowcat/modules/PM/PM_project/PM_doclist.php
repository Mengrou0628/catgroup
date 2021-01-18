<?php
     /*
     author:王梦柔
     */
header("content-type:application/json;charset=utf-8");
require_once ('../../config.php');
session_start();
$project_id=$_POST["content"];
$team_id=$_POST["content1"];
//$res=mysqli_query($conn,"select project_id,projectname,project_id from teamproject");//测试用语句
$res=mysqli_query($conn,"select file_id,filename, project_id,team_id from teamproject where `project_id`='$project_id' and `team_id`='$team_id'");//取个人项目表里的全部数据
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
