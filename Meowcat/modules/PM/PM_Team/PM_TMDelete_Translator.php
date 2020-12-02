<?php
$aaa=$_GET['id'];
echo $aaa;
$db=new mysqli("localhost","root","","meowcat");
if($db)
{
echo "SUCESS";
}
$sql="delete from teamfl where user_id='{$aaa}'";
//这里做的是删除团队中的译者，但具体要从哪个表中删除还要再看;同时还可以添加二次确定
if($db->query($sql))
{
echo "SUCESS";
Header("location:../meowcat/web/PM/tmlist.html");
//转换的地方可以再定
}
else
{
echo "FALSE";
}
?>