<?php
/*
 author：王梦柔
 */

require_once '../../config.php';
session_start();
$name=$_POST["con1"];
$fileInfo = $_FILES["fileup"];
$project_id=$_SESSION["project_id"];
$user_id=$_SESSION["user_id"];
// print_r($fileInfo);
// echo "<br>";

// 获取上传文件的名称
$fileName = $fileInfo["name"];
$res0=mysqli_query($conn,"select duty from users where user_id={$user_id}");
$duty=mysqli_fetch_array($res0,MYSQLI_ASSOC);
if($duty["duty"]=='translator'){
// 获取上传文件保存的临时路径
//$filePath = $fileInfo["tmp_name"];
$uid=mysqli_query($conn,"select count(*) from flproject where project_id='$projec_id'");
$row=mysqli_fetch_array($uid,MYSQLI_ASSOC);
$pid=$row["count(*)"]+1;
$_SESSION["file_id"]=$pid;
mysqli_query($conn,"insert into flproject (file_id,filename,project_id,user_id) values($pid,$name,$projec_id,$user_id)");
// echo $fileName;
// echo "<br>";
// echo $filePath;
}
else{
     $team_id=$_POST["con2"];
     $_SESSION["team_id"]=$team_id;
     $uid=mysqli_query($conn,"select count(*) from teamproject where project_id='$projec_id'");
$row=mysqli_fetch_array($uid,MYSQLI_ASSOC);
$pid=$row["count(*)"]+1;
$_SESSION["file_id"]=$pid;
mysqli_query($conn,"insert into teamproject (file_id,filename,project_id,team_id) values($pid,$name,$projec_id,$team_id)");
}
//移动文件

//.docx文件上传后台没实现,phpword和phpcom都出现了bug
if($fileInfo["type"]=="application/msword"){
move_uploaded_file($filePath, "../../../Resources/transfiles/".$fileName);
require_once('./Segmentation/Translation_TrSegment_word.php');
}
else if($fileInfo["type"]=="text/plain"){
     move_uploaded_file($filePath, "../../../Resources/transfiles/".$fileName);
     require_once('./Segmentation/Translation_TrSegment_txt.php');
}
else{
     echo "翻译文件格式不符合条件，请重新上传";
}
?>
