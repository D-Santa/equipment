<?php
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$response = array();
$zapros=$_POST['zapros'];
$spisok=$_POST['spisok'];
$ostatok=$_POST['ostatok'];
$user = $_POST['user'];
$group_place = $_POST['group_place'];
$do_group_place = $_POST['do_group_place'];
$timezone  = +6;
$data=date('Y-m-d H-i-s',time() + 3600*($timezone+date("I")));
$obj = json_decode($spisok);
$ostatoks = json_decode($ostatok);
if ($zapros=="pere"){
$sql="INSERT into vputi SET id_user='".$user."', id_group_place='".$group_place."', do_id_group_place='".$do_group_place."', data='".$data."'"; 
mysqli_query($conn, $sql);
$id_db=$conn->insert_id;
for ($s=0; $s<count($obj); $s++){
$sql1="INSERT into group_sklad SET id_sklad='".$obj[$s]->id."',  id_vputi='".$id_db."', col='".$obj[$s]->col."'";
mysqli_query($conn, $sql1); 
}
for ($s=0; $s<count($ostatoks); $s++){
$sql2="UPDATE sklad SET col='".$ostatoks[$s]->col."' WHERE id=".$ostatoks[$s]->id;
mysqli_query($conn, $sql2); 
}
}
else
if ($zapros=="list"){
$list = mysqli_query( $conn,"select * from vputi");
while($row_list = mysqli_fetch_array($list)){    
$dan['message']="ok";
$dan['id']=$row_list['id'];
$list2 = mysqli_query( $conn,"select * from group_place WHERE id = ".$row_list['id_group_place']);
if ($row_list2 = mysqli_fetch_array($list2))
$dan['ot']=$row_list2['name'];
$list3 = mysqli_query( $conn,"select * from group_place WHERE id = ".$row_list['do_id_group_place']);
if ($row_list3 = mysqli_fetch_array($list3))
$dan['dos']=$row_list3['name'];
$dan['data']=$row_list['data'];
$list4 = mysqli_query( $conn,"select * from user WHERE id = ".$row_list['id_user']);
if ($row_list4 = mysqli_fetch_array($list4))
$dan['user']=$row_list4['name']." ".$row_list4['fam'];
array_push($response, $dan);   
}
}
else

if ($zapros=="where"){
$id = $_POST['id'];
$dan['message']="ok";
$list2 = mysqli_query( $conn,"select * from group_sklad WHERE id_vputi = ".$id);
while ($row_list2 = mysqli_fetch_array($list2)){
$id_sklad=$row_list2['id_sklad'];
$list3 = mysqli_query( $conn,"select * from sklad WHERE id = ".$id_sklad);
if ($row_list3 = mysqli_fetch_array($list3)){
$dan['name'] = $row_list3['name'];
$dan['article'] = $row_list3['article'];
}
$dan['col'] = $row_list2['col'];
array_push($response, $dan);   

}

}

else{
$dan['message']="no";
array_push($response, $dan);
}
echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>