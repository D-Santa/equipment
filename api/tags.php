<?
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$response = array();
$id=$_GET['id'];
$list = mysqli_query( $conn,"select * from bd_tag WHERE id_bd=".$id);
while($row_list = mysqli_fetch_array($list)){
$tag = mysqli_query( $conn,"select * from tag WHERE id=".$row_list['id_tag']);
if($row_tag= mysqli_fetch_array($tag))
$dan['name']=$row_tag['name'];
array_push($response, $dan);   
}


echo json_encode($response,JSON_UNESCAPED_UNICODE);



?>