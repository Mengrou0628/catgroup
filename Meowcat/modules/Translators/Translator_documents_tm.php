<?php
     /*
     author：王梦柔
     */
header("content-type:application/json");
require_once ('../config.php');
session_start();
$getid=$_POST['content'];
$_SESSION['project_id']=$getid;
$res=mysqli_query($conn,"select file_id,filename,project_id from fltmproject where project_id='{$getid}'");//取文件表里id和名称数据
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
