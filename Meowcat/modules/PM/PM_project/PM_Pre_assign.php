<?php
/*
     author:王梦柔
     */
require_once '../../config.php';
session_start();
$file_id=$_POST["content"];
$team_id=$_POST["content1"];
$arr=array();
$res=mysqli_query($conn,"select user_id from teamfl where team_id='$team_id'");
while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
    $temp=array();
    $user_id=$row["user_id"];
    $result=mysqli_query($conn,"select use_name from users where user_id='$user_id'");
    $row1=mysqli_fetch_array($result, MYSQLI_ASSOC);
    array_push($temp,$row);
    array_push($temp,$row1);
    array_push($arr,$temp);
}

echo json_encode($arr,JSON_UNESCAPED_UNICODE);//json编码

$conn->close();	

?>