<?php
$aaa=$_GET['id'];
echo $aaa;
$db=new mysqli("localhost","root","","meowcat");
$sql1="delete from teamtm where team_id='{$aaa}'";

//这里做的是删除团队
if($db->query($sql1))
{
echo "SUCESS";
//Header("location:/meowcat/web/PM/tmlist_secondTime.html");
//转换的地方可以再定
}
else
{
echo "FALSE";
}
$sql2="delete from teamproject where team_id='{$aaa}'";
if($db->query($sql2))
{
echo "SUCESS";
//Header("location:/meowcat/web/PM/tmlist_secondTime.html");
//转换的地方可以再定
}
else
{
echo "FALSE";
}
$sql3="delete from addprotm where team_id='{$aaa}'";
if($db->query($sql3))
{
echo "SUCESS";
//Header("location:/meowcat/web/PM/tmlist_secondTime.html");
//转换的地方可以再定
}
else
{
echo "FALSE";
}
$sql4="delete from teampm where team_id='{$aaa}'";
if($db->query($sql4))
{
echo "SUCESS";
Header("location:/meowcat/web/PM/tmlist_secondTime.html");
//转换的地方可以再定
}
else
{
echo "FALSE";
}
?>