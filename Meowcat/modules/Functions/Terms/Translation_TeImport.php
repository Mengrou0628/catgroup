<?php
/*
 author：王梦柔
 */

$fileInfo = $_FILES["xlsfile"];

// print_r($fileInfo);
// echo "<br>";

// 获取上传文件的名称
$fileName = $fileInfo["name"];

// 获取上传文件保存的临时路径
//$filePath = $fileInfo["tmp_name"];

// echo $fileName;
// echo "<br>";
// echo $filePath;

//移动文件
if($fileInfo["type"]=="application/vnd.ms-excel"||$fileInfo["type"]=="application/msexcel"){
move_uploaded_file($filePath, "../../../Resources/files/".$fileName);
require_once('Trans_term_xlsx.php');
}
else{
     echo "术语库文件格式不符合条件，请重新上传";
}
?>
