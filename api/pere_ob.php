<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$response = array();
$zapros=$_POST['zapros'];
$spisok=$_POST['spisok'];
$kuda = $_POST['kuda'];
$id=$_POST['id'];
$timezone  = +6;
$data=date('Y-m-d H-i-s',time() + 3600*($timezone+date("I")));
$obj = json_decode($spisok);

if ($zapros=="pere"){
    $ss=0;
for ($s=0; $s<count($obj); $s++){
$list = mysqli_query( $conn,"select * from all_db WHERE id = ".$obj[$s]->id);
if ($row_list = mysqli_fetch_array($list)) {
    if ($row_list['Place']!=$kuda){
 $place= mysqli_query( $conn,"select * from group_place WHERE id = ".$row_list['Place']);
if ($row_place = mysqli_fetch_array($place)) { 
   $place_do = mysqli_query( $conn,"select * from group_place WHERE id = ".$kuda);
if ($row_place_do = mysqli_fetch_array($place_do)) {  
$sql="UPDATE all_db SET Place='".$kuda."' WHERE id=".$obj[$s]->id; 
mysqli_query($conn, $sql); 
$sql1="INSERT into history SET id_bd='".$obj[$s]->id."',  sobytie='10', tip='".$row_place['name']." -> ".$row_place_do['name']."', user_id='".$id."', data='".$data."'";
mysqli_query($conn, $sql1); 
if ($ss==0){
    $dan['message']="ok";
array_push($response, $dan);
}
}

}
}
else{
$ss=1;
$dan['message']="nos";
array_push($response, $dan);
}
}
}
}
else{
$dan['message']="no";
array_push($response, $dan);
}
echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>