<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$response = array();
$name=$_GET['name'];
$company=$_GET['company'];
$zapros=$_GET['zapros'];
$id=$_GET['id'];
$id_place=$_GET['id_place'];
if ($zapros=="list"){
$list = mysqli_query( $conn,"select * from group_place WHERE id_company = ".$id_place." ORDER BY id DESC"); 
if($row_list = mysqli_fetch_array($list)){ 
    $list1 = mysqli_query( $conn,"select * from group_place WHERE id_company = ".$id_place." ORDER BY id DESC");
 while($row_list1 = mysqli_fetch_array($list1)){      
$dan['message']="ok";  
$dan['name']=$row_list1['name'];
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
  $sql="INSERT into group_place SET name='".$name."', id_company='".$company."'"; 
if (mysqli_query($conn, $sql))
$dan['message']="ok";
else
$dan['message']="no";
array_push($response, $dan);  
}else
if ($zapros=="dell"){
 $sql="DELETE FROM group_place WHERE id=".$id; 
if (mysqli_query($conn, $sql))
$dan['message']="ok";
else
$dan['message']="no";
array_push($response, $dan);   
}
else
if ($zapros=="update"){
  $sql="UPDATE group_place SET name='".$name."', id_company='".$company."' WHERE id=".$id; 
mysqli_query($conn, $sql);  
$dan['message']="ok"; 
array_push($response, $dan);
}
else{
$dan['message']="no";
array_push($response, $dan);
}
echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>