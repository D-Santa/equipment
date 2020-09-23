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
$company=$_GET['company'];
$tag=$_GET['tag'];
$obj = json_decode($tag);
 $timezone  = +6;
 $data=date('Y-m-d H:i:s',time() + 3600*($timezone+date("I")));
if ($data_g=="")
$sql="INSERT into all_db SET Place='".$place."', EType='".$etype."', Equipment='".$equip."', SN='".$sn."', Article='".$article."', PY='".$py."', Inst_date='".$inst_date."', WTC='".$wtc."', SW_version='".$sw_version."', PUMP='".$pump."', HDF='".$hdf."', ZKV='".$zkv."', ADIMEA='".$adimea."', AKKU='".$akku."', ABPM='".$abpm."', status='".$status."', comment='".$comment."', user='".$id."', edit_data='".$data."', id_company='".$company."'"; 
else
$sql="INSERT into all_db SET Place='".$place."', EType='".$etype."', Equipment='".$equip."', SN='".$sn."', Article='".$article."', PY='".$py."', Inst_date='".$inst_date."', WTC='".$wtc."', SW_version='".$sw_version."', PUMP='".$pump."', HDF='".$hdf."', ZKV='".$zkv."', ADIMEA='".$adimea."', AKKU='".$akku."', ABPM='".$abpm."', status='".$status."', comment='".$comment."', user='".$id."', edit_data='".$data."', id_company='".$company."',garant='".$data_g."'"; 
mysqli_query($conn, $sql);
$id_db=$conn->insert_id;
for ($s=0; $s<count($obj); $s++){
$resul_tag = mysqli_query( $conn,"select * from tag WHERE name='".$obj[$s]->name."'");
if($otvet_tag = mysqli_fetch_array($resul_tag)){
$sql1="INSERT into bd_tag SET id_tag='".$otvet_tag['id']."', id_bd='".$id_db."'";
mysqli_query($conn, $sql1);
$cols = $otvet_tag['col'];
$cols++;
$sql_col="UPDATE tag SET col='".$cols."' WHERE id=".$otvet_tag['id']; 
mysqli_query($conn, $sql_col); 
}
else{
$sql1="INSERT into tag SET name='".$obj[$s]->name."', col='0'";
mysqli_query($conn, $sql1);
$id_tag=$conn->insert_id;
$sql2="INSERT into bd_tag SET id_tag='".$id_tag."', id_bd='".$id_db."'";
mysqli_query($conn, $sql2);
}
}

$response = array();
$dan['message']="ok";
array_push($response, $dan);
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>