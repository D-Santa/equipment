<?PHP
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$id=$_GET['id'];
$zapros=$_GET['zapros'];
$response = array();
if ($zapros=="active")
$list = mysqli_query( $conn,"select * from notification WHERE id_user='".$id."' and active='0' ORDER BY id DESC"); 
else{
$list = mysqli_query( $conn,"select * from notification WHERE id_user='".$id."' ORDER BY id DESC"); 
$sql2="UPDATE notification SET active='1' WHERE id_user=".$id;
mysqli_query($conn, $sql2); 
}
while($row_list = mysqli_fetch_array($list)){    
$dan['message']="ok";
if($row_his = mysqli_fetch_array(mysqli_query( $conn,"select * from zayavka_history WHERE id = ".$row_list['id_zaya_his']))){
$dan['data']=$row_his['data'];    
$dan['comment']=$row_his['comment'];    
$dan['image']=$row_his['image']; 
$dan['status']=$row_his['status']; 
if($row_user = mysqli_fetch_array(mysqli_query( $conn,"select * from user WHERE id = ".$row_his['id_user'])))
if ($row_user['roles']=="3")
$dan['fio']="Сотрудник ".$row_user['fam']." ".$row_user['name'];
else
$dan['fio']="Инжинер ".$row_user['fam']." ".$row_user['name'];
$dan['active']=$row_list['active']; 
if($row_zaya = mysqli_fetch_array(mysqli_query( $conn,"select * from zayavka WHERE id = ".$row_his['id_zayavka'])))
$dan['id_bd']=$row_zaya['id_bd']; 
}
array_push($response, $dan);
}


echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>