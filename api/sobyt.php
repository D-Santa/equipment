<?
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$response = array();
$roles=$_GET['roles'];

if ($roles=="2")
$list = mysqli_query( $conn,"select * from sobytie");
else
if ($roles=="3")
$list = mysqli_query( $conn,"select * from porblems");
while($row_list = mysqli_fetch_array($list)){
$dan['message']="ok";
$dan['name']=$row_list['name'];
$dan['id']=$row_list['id'];
$dan['comment']=$row_list['comment'];
array_push($response, $dan);    
}
echo json_encode($response,JSON_UNESCAPED_UNICODE);





?>