<?php
     /*
     author:王梦柔
     */
header("content-type:application/json;charset=utf-8");
require_once ('../../config.php');
session_start();
$project_id=$_POST["content"];
$team_id=$_POST["content1"];
//$res=mysqli_query($conn,"select project_id,projectname,project_id from teamproject");//取团队项目表里的全部数据
$res=mysqli_query($conn,"select file_id,filename, project_id,team_id from teamproject where `project_id`='$project_id' and `team_id`='$team_id'");//取个人项目表里的全部数据
$arr = array();	
if($res){
 while($row = mysqli_fetch_array($res, MYSQLI_ASSOC)){
  /*$count=count($row);//不能在循环语句中，由于每次删除row数组长度都减小
  for($i=0;$i<$count;$i++){
      unset($row[$i]);//删除冗余数据
  }*/
  array_push($arr,$row);
 }
}

//print_r($arr);
echo json_encode($arr,JSON_UNESCAPED_UNICODE);//json编码

$conn->close();		



/*$pageSize = 10;
		

          if (isset($_GET['page']) && $_GET['page'] >1) {
               $pageVal = $_GET['page'];
          }else {
               $pageVal = 1;
          }
          //计算起始位置
          $res=mysqli_query($conn,"select * from flproject");
     $numrows = mysqli_num_rows($res);
     $pageNum = ceil($numrows/$pageSize);
     
     $result = mysqli_query($conn,"select * from flproject limit $page,$pageSize");
        $page = ($pageVal-1)*$pageSize;	
        if($pageVal <=3){
          $begin =1;
          $end = $pageNum>=5?5:$pageNum;
     }else{
          $end = $pageVal+2>=$pageNum?$pageNum:$pageVal+2;
          $begin =$end -4<=1?1:$end -4; 
     }
     $prev = $pageVal -1<=1?1:$pageVal-1;
     $next = $pageVal +1 >=$pageNum?$pageNum:$pageVal +1; 页码相关*/
?>
