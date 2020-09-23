<?
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$name=$_GET['name'];
$zapros = $_GET['zapros'];
$response = array();
if ($zapros=="list"){
$list = mysqli_query( $conn,"select * from company ORDER BY id ASC");    
while($row_list = mysqli_fetch_array($list)){    
$dan['message']="ok";
$dan['name']=$row_list['name']; 
$dan['id']=$row_list['id']; 
array_push($response, $dan);
}   
}
else
if ($zapros=="dell"){
$sql="DELETE FROM company WHERE id=".$name; 
if (mysqli_query($conn, $sql))
$dan['message']="ok";
else
$dan['message']="no";
array_push($response, $dan);
}
else
{
$sql="INSERT into company SET name='".$name."'"; 
if (mysqli_query($conn, $sql))
$dan['message']="ok";
else
$dan['message']="no";
array_push($response, $dan);
}
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>