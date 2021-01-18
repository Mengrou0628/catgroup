<?php
/*
 author：王梦柔
 */
require_once('../../../config.php');
session_start();
function ischinese($contents){
     $allen = preg_match("/^[^/x80-/xff]+$/", $contents);   //判断是否是英文
 
     $allcn = preg_match("/^[".chr(0xa1)."-".chr(0xff)."]+$/",$contents);  //判断是否是中文
 
     if($allcn){ 
 
           return 'allcn'; 
 
     }else{ 
 
       return 'allen'; 
 
       } 
     }

    $filename = "test.txt";
    $handle = fopen($filename, "r");//读取二进制文件时，需要将第二个参数设置成'rb'
    
    //通过filesize获得文件大小，将整个文件一下子读到一个字符串中
    $contents = fread($handle, filesize ($filename));
    $text=iconv("gb2312","utf-8",$contents);
    fclose($handle);
    $arr=array();
    if(ischinese($text)=='allen'){
         //echo "英文";
     $arr=preg_split("/(.|!|?|;)/",$text);//没有保留分隔符
    }
    else{
        // echo "中文";
     $arr=preg_split("/(。|！|？|；)/",$text); //没有保留分隔符
    }
    
$b=$_SESSION["user_id"];
$c=$_SESSION["file_id"];
$d=$_SESSION["team_id"];
$res0=mysqli_query($conn,"select duty from users where user_id={$b}");
$duty=mysqli_fetch_array($res0,MYSQLI_ASSOC);
if($duty["duty"]=='translator'){
   for($i=0;$i<count($arr)-1;$i++){
      mysqli_query($conn,"insert into fltmtemp (source, user_id,file_id) values('$arr[$i]','$b','$c')");
   } 
}
else{
    for($i=0;$i<count($arr)-1;$i++){
      mysqli_query($conn,"insert into teamtmtemp (source,team_id,file_id) values('$arr[$i]','$d','$c')");
   } //存储数据在PM_asign.php中使用

}/*
for($i=0;$i<count($arr)-1;$i++){
     mysqli_query($conn,"insert into fltmtemp (source, user_id) values('$arr[$i]','1')");
  } */
  //echo "插入成功";
   // echo $text;
?>
