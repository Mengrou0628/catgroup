<?php
error_reporting(0);
$dbh = mysqli_connect("localhost","root","");
mysqli_select_db($dbh,"meowcat");
$sql="create table sequence2
(
id int(10) not null auto_increment,
primary key(id)
)";
$dbh->query($sql);

$sql2="insert into sequence2 values(null)";
$dbh->query($sql2);

$uid="select count(*) from sequence2";
$uid_final=mysqli_query($dbh,$uid);
$info = mysqli_fetch_array($uid_final); 
print_r($info);

$sql3="insert into teampm (team_id,user_id) VALUES ($info[0],1)";
if ($dbh->query($sql3)) {
    echo "新记录插入成功";
} 
else {
    echo "Error: " . $sql3 . "<br>" . $dbh->error;
}

//teampm表中team_id的自增方法
Header("location:/meowcat/web/PM/tmlist_secondTime.html");
?>