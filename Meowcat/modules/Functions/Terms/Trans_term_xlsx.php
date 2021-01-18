<?php
/*
 author：王梦柔
 */
require_once('../../config.php');
session_start();
$file = '../../../Resources/files/'.$_FILES["tmxfile"]["name"];
$con = file_get_contents($file);
require_once '../../../Resources/Classes/PHPExcel/IOFactory.php';

if (!file_exists($file)) {
    exit("not found file\n");
}
$reader = PHPExcel_IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)
$PHPExcel = $reader->load($file); // 载入excel文件
$sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
$highestRow = $sheet->getHighestRow(); // 取得总行数
$highestColumm = $sheet->getHighestColumn(); // 取得总列数
 

/** 循环读取每个单元格的数据 */
for ($row = 1; $row <= $highestRow; $row++){//行数是以第1行开始
    $obj=array();
    for ($column = 'A'; $column <= $highestColumm; $column++) {//列数是以A列开始
        //$dataset[] = $sheet->getCell($column.$row)->getValue();

         array_push($obj,$sheet->getCell($column.$row)->getValue());
        //echo $column.$row.":".$sheet->getCell($column.$row)->getValue()."<br />";
    }

$res0=mysqli_query($conn,"select duty from users where user_id={$_SESSION["user_id"]}");
$duty=mysqli_fetch_array($res0,MYSQLI_ASSOC);
if($duty["duty"]=='translator'){
    $uid=mysqli_query($conn,"select count(*) from sequence3");
    $row=mysqli_fetch_array($uid,MYSQLI_ASSOC);
    $pid=$row["count(*)"];
    mysqli_query($conn,"insert into fltb (source,target,user_id,project_id) values('{$obj[0]}','{$obj[1]}','{$_SESSION["user_id"]}','{$pid}')");
}
else{
    $uid=mysqli_query($conn,"select count(*) from sequence4");
$row=mysqli_fetch_array($uid,MYSQLI_ASSOC);
$pid=$row["count(*)"];
mysqli_query($conn,"insert into teamtb (source,target,team_id,user_id,project_id) values('{$obj[0]}','{$obj[1]}','{$_SESSION["team_id"]}','{$_SESSION["user_id"]}','{$pid}')");
}
}
?>