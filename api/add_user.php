<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$fam=$_GET['fam'];
$name=$_GET['name'];
$roles=$_GET['roles'];
$log=$_GET['log'];
$pass=$_GET['pass'];
$zapros=$_GET['zapros'];
$response = array();
$response2 = array();
$glav=$_GET['glav'];
$sklad=$_GET['sklad'];
$place=$_GET['place'];

if ($zapros=="list"){
$list = mysqli_query( $conn,"select * from user WHERE roles='$roles' ORDER BY id DESC");    
while($row_list = mysqli_fetch_array($list)){    
$dan['message']="ok";
$dan['fam']=$row_list['fam']; 
$dan['name']=$row_list['name']; 
$dan['id']=$row_list['id']; 
$dan['log']=$row_list['log']; 
$dan['pass']=$row_list['pass']; 
if ($roles=="3"){
if($row_place = mysqli_fetch_array(mysqli_query( $conn,"select * from group_place WHERE id=".$row_list['place'])))
$dan['place']=$row_place['name'];
if ($row_list['glav']=="1")
$dan['glav']=" <font color='red'>(Заведующий)</font>"; 
else
$dan['glav']=""; 
}
else
if ($roles=="2"){
    $response2 = array();
    $dan1['place']="";
$place_user = mysqli_query($conn,"select * from place_user WHERE id_user=".$row_list['id']);
while($row_user = mysqli_fetch_array($place_user)){
    $place_user2 = mysqli_query( $conn,"select * from group_place WHERE id=".$row_user['id_place']);
if($row_place = mysqli_fetch_array($place_user2)){
$dan1['place']=$row_place['name'];
array_push($response2, $dan1);
}
}
if ($dan1['place']==""){
if($row_place = mysqli_fetch_array(mysqli_query( $conn,"select * from group_place WHERE id=".$row_list['place'])))
$dan1['place']=$row_place['name'];
array_push($response2, $dan1);
}
$dan['place'] = $response2;
if ($row_list['sklad']=="1")
$dan['glav']=" <font color='red'>(Отвечает за склад)</font>"; 
else
$dan['glav']=""; 
if ($row_list['glav']=="1")
$dan['sklad']=" <font color='blue'>(Главный)</font>"; 
else
$dan['sklad']=""; 
}
array_push($response, $dan);
}
}
else
if ($zapros=="dell"){
$sql="DELETE FROM user WHERE id=".$name; 
if (mysqli_query($conn, $sql))
$dan['message']="ok";
else
$dan['message']="no";
array_push($response, $dan);
}
else
{
$list2 = mysqli_query( $conn,"select * from user WHERE log='$log'");    
if($row_list2 = mysqli_fetch_array($list2)){ 
$dan['message']='nolog'; 
array_push($response, $dan);    
}
else
{
if ($roles == "2"){
$place = json_decode($place,true);    
$sql="INSERT into user SET fam='".$fam."', name='".$name."', roles='".$roles."', log='".$log."', pass='".$pass."', glav='".$glav."',place='0', sklad='".$sklad."'"; 
if (mysqli_query($conn, $sql)){
$id_user = $conn->insert_id;
for ($s=0;$s<count($place);$s++){
$sql1="INSERT into place_user SET id_user='".$id_user."', id_place='".$place[$s]."'"; 
mysqli_query($conn, $sql1);
}
$dan['message']="ok";
}
else
$dan['message']="no";
}
else{
$sql="INSERT into user SET fam='".$fam."', name='".$name."', roles='".$roles."', log='".$log."', pass='".$pass."', glav='".$glav."',place='".$place."', sklad='".$sklad."'"; 
if (mysqli_query($conn, $sql))
$dan['message']="ok";
else
$dan['message']="no";
}
array_push($response, $dan);
}
}
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>