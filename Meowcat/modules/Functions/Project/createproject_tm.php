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
$team_id=$_POST["con6"];
$_SESSION["team_id"]=$team_id;
$uid=mysqli_query($conn,"select count(*) from sequence4");
$row=mysqli_fetch_array($uid,MYSQLI_ASSOC);
$pid=$row["count(*)"]+1;
mysqli_query($conn,"insert into sequence4 values(null)");
$res=mysqli_query($conn,"insert into protm (team_id,projectname,srclan,project_id,tarlan) values('{$team_id}','{$projectname}','{$srclan}','{$pid}','{$tarlan}')");
if($tmx=="option2"){
    require_once('../TransMemory/Translation_TmImport.php');
}
if($xls=="option2"){
    require_once('../Terms/Translation_TeImport.php');
}



$conn->close();	
?>