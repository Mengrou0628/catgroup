<?php
  header('content-type:text/html;charset=utf-8');

$conn=mysqli_connect('localhost','root','','cattool') or die('数据库连接出错！');
mysqli_query($conn,'set names utf8');

?>