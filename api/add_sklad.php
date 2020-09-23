<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$response = array();
$name=$_GET['name'];
$col = $_GET['col'];
$zapros=$_GET['zapros'];
$place=$_GET['place'];
$article=$_GET['article'];
$id=$_GET['id'];
$id_place=$_GET['id_place'];
if ($zapros=="list"){
$list = mysqli_query( $conn,"select * from sklad WHERE id_group_place = ".$id_place." ORDER BY id DESC"); 
if($row_list = mysqli_fetch_array($list)){ 
    $list1 = mysqli_query( $conn,"select * from sklad WHERE id_group_place = ".$id_place." ORDER BY id DESC");
 while($row_list1 = mysqli_fetch_array($list1)){      
$dan['message']="ok";  
$dan['name']=$row_list1['name'];
$dan['article']=$row_list1['article'];
$dan['col']=$row_list1['col'];
$dan['id']=$row_list1['id'];
 array_push($response, $dan);
}   
}
else
{
   $dan['message']="no"; 
  array_push($response, $dan);   
}
   
}
else
if ($zapros=="add"){
  $sql="INSERT into sklad SET name='".$name."', col='".$col."', article='".$article."', id_group_place='".$place."'"; 
if (mysqli_query($conn, $sql))
$dan['message']="ok";
else
$dan['message']="no";
array_push($response, $dan);  
}else
if ($zapros=="dell"){
 $sql="DELETE FROM sklad WHERE id=".$id; 
if (mysqli_query($conn, $sql))
$dan['message']="ok";
else
$dan['message']="no";
array_push($response, $dan);   
}
else
if ($zapros=="pere"){
    
    
}
else{
$dan['message']="no";
array_push($response, $dan);
}
echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>