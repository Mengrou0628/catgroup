<?php
/*
     author:王梦柔
     */
require_once '../../config.php';
session_start();
$file_id=$_POST["content"];
$team_id=$_POST["content1"];
$project_id=$_POST["content2"];
$res=mysqli_query($conn,"select count(*) from teamfl where team_id='$team_id'");
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$a=$row["count(*)"];

$res=mysqli_query($conn,"select count(*) from teamtmtemp where file_id='$file_id'");
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$b=$row["count(*)"];

function rand_file($b, $a)
  {
      $arr = [];//结果数组
     $average = $b / $a;
    if($average == 1){// 所有人平均分
         for ($i=0; $i<$a; $i++) {
             $arr[] = $average;
         }
     }else{// 每个人随机分配
         for ($i=0; $i<$a; $i++) {
             $range_file = round(($b / ($a - $i)));
             $rand_file = mt_rand(1, $range_file);
             $arr[] = $rand_file;
             $b= $b- $rand_file;// 获取剩下的文件
         }
     }
     return $arr;
}
$id=array();
$res6=mysqli_query($conn,"select user_id from teamfl where team_id='$team_id'");
while($row6 = mysqli_fetch_array($res6, MYSQLI_ASSOC)){
 array_push($id,$row6["user_id"]);
}


$res=mysqli_query($conn,"select id from teamtmtemp where file_id='$file_id' limit 1");
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$first=$row["id"];
for($i=0;$i<count($arr);$i++){
mysqli_query($conn,"update table teamtmtemp set user_id='$id[$i]' where file_id='$file_id' limit '$first','$arr[$i]'");
$first=$first+$arr[$i];
}
$res=mysqli_query($conn,"select filename from teamproject where file_id='$file_id'");
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
$filename=$row["filename"];

for($i=0;$i<count($arr);$i++){
     for($k=0;$k<$arr[$i];$k++)
     mysqli_query($conn,"insert into fltmproject(file_id,filename,project_id,user_id) values('$file_id','$filename','$project_id','$id[$i]')");
}
$conn->close();	

?>
