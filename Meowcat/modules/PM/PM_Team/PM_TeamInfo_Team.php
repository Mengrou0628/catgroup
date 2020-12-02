<?php
$dbh = mysqli_connect("localhost","root","");
mysqli_select_db($dbh,"meowcat");
$q = "select team_id from teamtmtemp";
$result = mysqli_query($dbh,$q);     
if(!$result){
die('无法读取数据:'.mysqli_error());
}
while($row = mysqli_fetch_assoc($result)) {echo " <tr>
                <td>{$row['team_id']}</td>";}
mysqli_close($dbh);
/* 关闭到mysql数据库的连接 */
//这一个用来译者经理显示的团队列表:加载团队ID和【团队名称】
?>