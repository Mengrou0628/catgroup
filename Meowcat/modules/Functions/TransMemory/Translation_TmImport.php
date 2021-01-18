<?php
/*
 author：王梦柔
 */

$fileInfo = $_FILES["tmxfile"];

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
if($fileInfo["type"]=="application/octet-stream"){
move_uploaded_file($filePath, "../../../Resources/files/".$fileName);
require_once('Trans_TM_tmx.php');
}
else{
     echo "翻译记忆库文件格式不符合条件，请重新上传";
}
?>
