<?php 
/*
 author：王梦柔
 */
require_once('../../config.php');
session_start();
$projectname=$_POST["con1"];
$srclan=$_POST["con2"];
$tarlan=$_POST["con3"];
$tmx=$_POST["con4"];
$xls=$_POST["con5"];
$uid=mysqli_query($conn,"select count(*) from sequence3");
$row=mysqli_fetch_array($uid,MYSQLI_ASSOC);
$pid=$row["count(*)"]+1;
mysqli_query($conn,"insert into sequence3 values(null)");
$res=mysqli_query($conn,"insert into profl values('{$_SESSION["user_id"]}', '{$projectname}', '{$srclan}', '{$pid}', '{$tarlan}')");
if($tmx=="option2"){
    require_once('../TransMemory/Translation_TmImport.php');
}
if($xls=="option2"){
    require_once('../Terms/Translation_TeImport.php');
}




$conn->close();	
?>