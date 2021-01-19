<!--王紫-->
<?php error_reporting(0); ?>
<html lang="zh-CN">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<title>机器翻译</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style>
			#content-0
			{
				position:absolute;
				top:-550px;
				left:300px;
				width:1100px;
			}
		</style>
	</head>
<body>
	<script type="text/javascript" src="/meowcat/Resources/js/PM_navigation.js"></script>
		<div id="content-0">
			
<?php
			
			include "../../modules/config.php";
			$sql = "SELECT * FROM 'fltmtemp'";
			$huoqu = mysqli_query($config,$sql);
			
			mysqli_query($config, "set names 'utf8'");	
			echo mysqli_error($config);	
			echo "<table class='table'>";
			echo "<thead>
					<tr>
						<th>原文</th>
						<th>机器翻译</th>
					</tr>
				</thead>";
			echo "<tbody>";
			echo "<tr>
				  <td>On Wednesday, Disney CEO Bob Chapek announced that Shanghai Disneyland will reopen on May 11.</td>
				  <td></td>
				  </tr>
				  <tr>
				  <td>The Happiest Place on Earth may soon be welcoming visitors again.</td>
				  <td></td>
				  </tr>";
		    
			while($row = mysqli_fetch_array($huoqu, MYSQLI_ASSOC))
			{   
				
				echo "<tr>
					  <td>{$row["source"]}</td>
					  <td>{$row["target"]}</td>
					  </tr>";
			}
			
			echo "</tbody></table>";
?>		
				
			
		</div>

</body>
</html>

