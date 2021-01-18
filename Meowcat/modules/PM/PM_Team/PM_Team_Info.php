<!--武睿文-->                                                                       
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<title>团队成员显示界面</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

		
</head>

		<style>
	#link{color:black;}
#link:visited{color:blue;}		
      		.navbar {
        	margin-top: 5px;
			margin-bottom:0px;
      		}
			div{
			font-family:幼圆;
			font-weight:600;
			font-size:100%;
			}
			a
			{
				color:#FFFFFF;
			}
			td
			{
    			text-align:middle;
				padding-top:5px;
				padding-bottom:10px;
				padding-left:5px;
				padding-right:5px;
			}
			#table0
			{
				margin-bottom:15px;
				margin-top:25px;
				margin-left:35px;
				outline: #FFFFFF solid 5px;
				background: #FFFFFF;
				color:#333366;
			}
			#row1
			{
				background-color: #0066CC;
			}
			#row2col1
			{
				background-color: #333366;
			}
			.row{
				margin-left:0;
				margin-right:0;

			}
			li
			{
				padding-top:10px;
				padding-bottom:10px;
				margin-bottom:5px;
				margin-top:0px;
			}
		</style>
	</head>

    <body>
    	<div class="container-fiuled" id="row1">
			<div class="row clearfix">
				<div class="col-md-12 column">
					<nav class="navbar navbar-expand-sm" role="navigation">
						<div class="navbar-header">
							<a class="navbar-brand" href="#">
								<img alt="logo" width="180px" src="/meowcat/image/logo1.png"/>
							</a>
						</div>
						<div>
							<ul class="nav navbar-nav pull-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">开始工作<strong class="caret"></strong></a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">团队项目</a>
										</li>
										<li class="divider">
										</li>
										<li>
									 		<a href="#">人员管理</a>
										</li>
									</ul>
								</li>
							                 <li>
									<a href="#">项目经理档案</a>
								</li>
								<li>
									<a href="#">注销</a>
								</li>
							</ul>
                        </div>
					</nav>
				</div>
			</div>
		</div>

		<div class="container-fiuled" >
			<div class="row clearfix">
				<div class="col-md-2 column" id="row2col1">
					<ul class="nav nav-stacked text-center">
						<li>
							<table id="table0">
								<tr>
									<td colspan="2">
										<svg width="6em" height="6em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  											<path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
  											<path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
 											<path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
										</svg>
									<td>
								</tr>
								<tr>
									<td align="left">
										用户名
									</td>
									<td align="right">
										xxx
									</td>
								</tr>
								<tr>
									<td align="left">
										用户ID
									</td>
									<td align="right">
										xxxxxx
									</td>
								</tr>
								<tr>
									<td align="left">
										邮箱
									</td>
									<td align="right">
										xxxxx@xx.com
									</td>
								</tr>
							</table>
						</li>
						<li class="row2-3">
							<a href="#">文档列表</a>
						</li>
						<li class="row2-3">
							<a href="#">术语库</a>
						</li>
						<li class="row2-3">
							<a href="#">翻译记忆库</a>
						</li>
						<li class="row2-3">
							<a href="#">机器翻译</a>
						</li>
						<li class="row2-3">
							<a href="#">风格指南</a>
						</li>
						<li>
							<a href="#">关于我们</a>
						</li>
					</ul>
				</div>
			

		

<div class="container-fluid col-md-10 column" style="margin-top:60px;">
<div class="col-sm-25 col-md-20" style="margin-left:60px;margin-right:200px;margin-bottom:50px">
        <table class="table table-hover" >
            <thead class="thead-dark">
              <tr>
                <th style="width:200px">译者ID</th>
                <th style="width:300px">译者</th>
                <th style="width:300px">操作</th>
<?php
$aaa=$_GET['id'];
//echo $aaa;
$db=new mysqli("localhost","root","","meowcat");
/*if($db)
{
echo "SUCESS";
}
*/


$sql="select user_id from teamfl where team_id='{$aaa}'";
$sql_result=mysqli_query($db,$sql);


$name="select user_name from users where user_id in (select user_id from teamfl where team_id='{$aaa}')";
$result=mysqli_query($db,$name);


while(($row_a= mysqli_fetch_assoc($sql_result)) and ($row_b=mysqli_fetch_assoc($result)))
{echo "<tr><td>{$row_a['user_id']}</td><td>{$row_b['user_name']}</td><td><a id='link' href='PM_Team_MemberDelete.php'><button name= 'check' type = 'submit'>将该成员从团队中删除</button></td></tr>";
}
mysqli_close($db);
//这一个用来译者经理显示的团队里的译者列表:加载译者ID和译者用户名
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
    </body>
</html>