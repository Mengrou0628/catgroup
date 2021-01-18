<?php
/*
 author：王梦柔
 */
require_once('../../config.php');
session_start();
$file = '../../../Resources/files/'.$_FILES["tmxfile"]["name"];
$con = file_get_contents($file);

//XML标签配置，根据具体需要
$x = 
    'seg'
;
$arr = array();

preg_match_all("/<".$x.">.*<\/".$x.">/",$con,$temp);
//preg_match_all("/<tuv\sxml:lang=".$x.">(.*)<\/tuv>/", $con, $temp);
//去除XML标签并组装数据
$data = array();
$i=0;
foreach($temp as $key => $value) {

    foreach($value as $k => $v) {
        if($k%2==0){
            $data[$i] = $v;
        }
        else{
            $data[$i] = $v;
        }
       // $a = explode($xmlTag[$key].'>', $v);
       // $v = substr($a[1], 0, strlen($a[1])-2);
       $i++;
    }
}
//print_r($data);
$b=$_SESSION["user_id"];
$res0=mysqli_query($conn,"select duty from users where user_id={$b}");
$duty=mysqli_fetch_array($res0,MYSQLI_ASSOC);
if($duty["duty"]=='translator'){
$uid=mysqli_query($conn,"select count(*) from sequence3");
$row=mysqli_fetch_array($uid,MYSQLI_ASSOC);
$pid=$row["count(*)"];
for($i=0;$i<count($data);$i=$i+2){
    $a=$i+1;
    $sql="insert into fltm (source,target,user_id,project_id) values('{$data[$i]}','{$data[$a]}','{$b}','{$pid}')";
    mysqli_query($conn,$sql);
}
}
else{
    $uid=mysqli_query($conn,"select count(*) from sequence4");
$row=mysqli_fetch_array($uid,MYSQLI_ASSOC);
$pid=$row["count(*)"];
for($i=0;$i<count($data);$i=$i+2){
    $a=$i+1;
    $sql="insert into teamtm (source,target,team_id,user_id,project_id) values('{$data[$i]}','{$data[$a]}','{$_SESSION["team_id"]}',{$b}','{$pid}')";
    mysqli_query($conn,$sql);
}
}
?>