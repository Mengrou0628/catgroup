<!--武睿文-->
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
#link{color:black;}
#link:visited{color:blue;}
                                                    #box{

        width: 400px;

margin-top:50px;
        margin:30px auto;

        font-family: 'Microsoft YaHei';

        font-size: 14px;

    }
#search{

        width: 78px;

        height: 32px;

        float: right;

        background: black;

        color: white;

        text-align: center;

        line-height: 32px;

        cursor: pointer;

    }
.navbar {
        	margin-top: 5px;
			margin-bottom:0px;
      		}
    
			#content-0
			{
				position:absolute;
				top:-700px;
				left:0;
				
			}
		</style>
</head>
<body>
	<script type="text/javascript" src="/meowcat/Resources/js/PM_navigation.js"></script>

		
<div id="content-0">
<div class="container-fluid col-md-10 column" style="margin-top:0;margin-left:380px;">
<nav class="navbar navbar-default" role="navigation">
<div id="box">
<form action="/meowcat/modules/Translators/Translator_info2.php" method="post">
<input style="width: 260px;

        border: 1px solid #e2e2e2;

        height: 30px;

        float: left;

        background-image: url(images/search.jpg);

        background-repeat: no-repeat;

        background-size: 25px;

        background-position:5px center;

        padding:0 0 0 40px" type="text" name="keywords" placeholder="请输入译者用户名或译者ID">
<input id="search" style="margin:0 auto"  type="submit" value="搜索" onclick="print()"/>
</div>
<br></br><br></br>
        <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th style="width:200px;margin-top:100px">译者ID</th>
                <th style="width:300px">译者</th>
                <th style="width:300px">操作</th>
<?php
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"MeowCAT");
$db=new mysqli("localhost","root","","meowcat");
$sql1="delete from teamtm where team_id='{$aaa}'";
$keywords=$_POST['keywords'];
$sql="select * from users where user_name like'%$keywords%'";
 $result=mysqli_query($conn,$sql);
     if(!$result){
die('无法读取数据:'.mysqli_error());
}

while($row=mysqli_fetch_assoc($result)){
echo"<tr><td>{$row['user_id']}</td>";
echo"<td>{$row['user_name']}</td>";
echo"<td><a id='link' href='12.php?id={$row['team_id']}'><button name= 'check' type = 'submit'>确认添加</button></td>";
echo"</tr>";
}
?>
            </thead>
            <tbody>

            </tbody>
        </table>

        <div align="center" class="container-fluid" >
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">上一页</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">下一页</a></li>
              </ul>
        </div>
      </div>
 </div>
</div>
    </body>
</html>