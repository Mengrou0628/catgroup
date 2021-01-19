<!--王紫-->
<?php
/* header('Content-type: text/html; charset=utf-8');
header("Content-Type: application/force-download");
header("Content-Disposition: attachment;filename=译文.txt"); */
include "../../../api/youdao_transapi.php";
include "../../config.php";
mysqli_query($config, "set names 'utf8'");	

$sql = "select source from fltmtemp"; 
$num_sql=mysqli_query($config,$sql);
$row=mysqli_fetch_array($num_sql,MYSQLI_ASSOC);
if($result=mysqli_query($config,$sql)){
	$num=mysqli_num_rows($result);
}
//echo $num;
			
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

	//echo $source;	
	$i=$row['id'];
    $result = translate($source,"en","zh");
    $target = $result["trans_result"][0]["dst"]; 
	//echo $i."\t".$source."\t".$target."\n";
	$sqli = "UPDATE fltmtemp SET target = '$target' WHERE id = {$i}";
    $insert = mysqli_query($config, $sqli);
    if (!$insert) {
		die('插入数据失败: ' .mysqli_error($config));
    }
	else{
		echo "<script>location='subtitle.php'</script>";
	} 
	
}
mysqli_free_result($result);

		
	
?>
