<?
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');

$place=$_GET['place'];
$etype=$_GET['etype'];
$equip=$_GET['equip'];
$sn=$_GET['sn'];
$article=$_GET['article'];
$py=$_GET['py'];
$inst_date=$_GET['inst_date'];
$data_g=$_GET['data_g'];
$wtc=$_GET['wtc'];
$sw_version=$_GET['sw_version'];
$pump=$_GET['pump'];
$hdf=$_GET['hdf'];
$zkv=$_GET['zkv'];
$adimea=$_GET['adimea'];
$akku=$_GET['akku'];
$abpm=$_GET['abpm'];
$status=$_GET['status'];
$comment=$_GET['comment'];
$id=$_GET['id'];
$tag=$_GET['tag'];
$obj = json_decode($tag);
$id=$_GET['id'];
 $timezone  = +6;
 $data=date('Y-m-d H:i:s',time() + 3600*($timezone+date("I")));

$resul_etype = mysqli_query( $conn,"select * from EType WHERE name='".$etype."'");
if($otvet_etype = mysqli_fetch_array($resul_etype))$etype=$otvet_etype['id'];

$resul_place = mysqli_query( $conn,"select * from group_place WHERE name='".$place."'");
if($otvet_place = mysqli_fetch_array($resul_place))$place=$otvet_place['id'];

$resul_equip = mysqli_query( $conn,"select * from Equipment WHERE name='".$equip."'");
if($otvet_equip = mysqli_fetch_array($resul_equip))$equip=$otvet_equip['id'];

if ($data_g=="")
$sql="UPDATE all_db SET Place='".$place."', EType='".$etype."', Equipment='".$equip."', SN='".$sn."', Article='".$article."', PY='".$py."', Inst_date='".$inst_date."', WTC='".$wtc."', SW_version='".$sw_version."', PUMP='".$pump."', HDF='".$hdf."', ZKV='".$zkv."', ADIMEA='".$adimea."', AKKU='".$akku."', ABPM='".$abpm."', status='".$status."', comment='".$comment."', user='".$id."', edit_data='".$data."',garant=NULL WHERE id=".$id; 
else
$sql="UPDATE all_db SET Place='".$place."', EType='".$etype."', Equipment='".$equip."', SN='".$sn."', Article='".$article."', PY='".$py."', Inst_date='".$inst_date."', WTC='".$wtc."', SW_version='".$sw_version."', PUMP='".$pump."', HDF='".$hdf."', ZKV='".$zkv."', ADIMEA='".$adimea."', AKKU='".$akku."', ABPM='".$abpm."', status='".$status."', comment='".$comment."', user='".$id."', edit_data='".$data."',garant='".$data_g."' WHERE id=".$id; 

mysqli_query($conn, $sql);

$sql5="DELETE FROM bd_tag WHERE id_bd=".$id;
mysqli_query($conn, $sql5);


for ($s=0; $s<count($obj); $s++){
$resul_tag = mysqli_query( $conn,"select * from tag WHERE name='".$obj[$s]->name."'");
if($otvet_tag = mysqli_fetch_array($resul_tag)){
$sql1="INSERT into bd_tag SET id_tag='".$otvet_tag['id']."', id_bd='".$id."'";
mysqli_query($conn, $sql1);
$cols = $otvet_tag['col'];
$cols++;
$sql_col="UPDATE tag SET col='".$cols."' WHERE id=".$otvet_tag['id']; 
mysqli_query($conn, $sql_col); 
}
else{
$sql1="INSERT into tag SET name='".$obj[$s]->name."', col ='0'";
mysqli_query($conn, $sql1);
$id_tag=$conn->insert_id;
$sql2="INSERT into bd_tag SET id_tag='".$id_tag."', id_bd='".$id."'";
mysqli_query($conn, $sql2);
}
}

$response = array();
$dan['message']="ok";
array_push($response, $dan);
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>