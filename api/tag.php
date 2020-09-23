<?
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$response = array();
$list = mysqli_query( $conn,"select * from tag");
while($row_list = mysqli_fetch_array($list)){
$dan['name']=$row_list['name'];
array_push($response, $dan);   
    
}


echo json_encode($response,JSON_UNESCAPED_UNICODE);



?>