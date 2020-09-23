<?
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
 $timezone  = +6;
 $data=date('Y-m-d H:i:s',time() + 3600*($timezone+date("I")));
 $roles=$_GET['roles'];
$id_db=$_GET['id_db'];
$id_user=$_GET['id_user'];
$id_sobyt=$_GET['id_sobyt'];
$active=$_GET['active'];
$comment = $_GET['comment'];
$response = array();
$zapros=$_GET['zapros'];
if ($zapros=="update"){
 $zaya_list = mysqli_query( $conn,"select * from zayavka  WHERE id = '".$id_db."'");   
         if($row_zaya = mysqli_fetch_array($zaya_list)){  
             $id=$row_zaya['id_bd'];
             if($row_bd = mysqli_fetch_array(mysqli_query( $conn,"select * from sobytie WHERE id = ".$id_sobyt)))    
            $status=$row_bd['name'];
            if ($_GET['pod']==""){
            $sql_hist="INSERT INTO `zayavka_history` (`id`, `id_user`, `status`, `data`, `id_zayavka`, `image`, `comment`) VALUES (NULL, '$id_user', '$status', '$data', '$id_db', NULL, NULL);"; 
            mysqli_query($conn, $sql_hist);
            $id_his = $conn -> insert_id;
if($row_bd = mysqli_fetch_array(mysqli_query( $conn,"select * from all_db WHERE id = ".$id_db))) 
$user = mysqli_query( $conn,"select * from user");
while($row_user = mysqli_fetch_array($user)) {
    $id_user="";
    if ($row_user['roles']=="3") {
    if ($row_user['place']==$row_bd['Place'])
    $id_user=$row_user['id'];
    }
    else
    {
    $place = mysqli_query( $conn,"select * from place_user WHERE id_user = ".$row_user['id']);    
    if($row_place = mysqli_fetch_array($place)){ 
    if ($row_place['id_place']==$row_bd['Place'])
    $id_user=$row_user['id'];
    }
    }
    if ($id_user!=""){
    $sql_notifi="INSERT into notification SET id_user='".$id_user."', id_zaya_his='".$id_his."', active='0'"; 
mysqli_query($conn, $sql_notifi);
} 
    }
            $sqls="INSERT INTO `history` (`id`, `id_bd`, `sobytie`, `tip`, `user_id`, `data`) VALUES (NULL, '$id', '$id_sobyt', '', '$id_user', '$data');"; 
            mysqli_query($conn, $sqls); 
            }
            if ($active=="4"){
                
                
            }
            else
            {
                
                
            }
            $sql2="UPDATE zayavka SET active='".$active."', comment='".$comment."' WHERE id=".$id_db;
            mysqli_query($conn, $sql2); 
            $dan['message']="ok";
         }
    
    
    
}
else
{
if ($roles=="2"){
$sql="INSERT INTO `history` (`id`, `id_bd`, `sobytie`, `tip`, `user_id`, `data`) VALUES (NULL, '$id_db', '$id_sobyt', '', '$id_user', '$data');"; 
if (mysqli_query($conn, $sql))
$dan['message']="ok";
else
$dan['message']="no";
}
else
if ($roles=="3"){
$sqls="INSERT INTO `history` (`id`, `id_bd`, `sobytie`, `tip`, `user_id`, `data`) VALUES (NULL, '$id_db', '3', '', '$id_user', '$data');"; 
mysqli_query($conn, $sqls);  
if($row_bd = mysqli_fetch_array(mysqli_query( $conn,"select * from porblems WHERE id = ".$id_sobyt)))    
$status=$row_bd['name'];
$sql_zaya="INSERT into zayavka SET id_bd='".$id_db."', id_user='".$id_user."', status='".$status."', data='".$data."', active='0'"; 
if (mysqli_query($conn, $sql_zaya)) 
$id_zaya = $conn -> insert_id;
 
$sql_hist="INSERT INTO `zayavka_history` (`id`, `id_user`, `status`, `data`, `id_zayavka`, `image`, `comment`) VALUES (NULL, '$id_user', '$status', '$data', '$id_zaya', NULL, '$comment');"; 
if(mysqli_query($conn, $sql_hist)){
$id_his = $conn -> insert_id;

if($row_bd = mysqli_fetch_array(mysqli_query( $conn,"select * from all_db WHERE id = ".$id_db))) 
$user = mysqli_query( $conn,"select * from user");
while($row_user = mysqli_fetch_array($user)) {
    $id_user="";
    if ($row_user['roles']=="3") {
    if ($row_user['place']==$row_bd['Place'])
    $id_user=$row_user['id'];
    }
    else
    {
    $place = mysqli_query( $conn,"select * from place_user WHERE id_user = ".$row_user['id']);    
    if($row_place = mysqli_fetch_array($place)){ 
    if ($row_place['id_place']==$row_bd['Place'])
    $id_user=$row_user['id'];
    }
    }
    if ($id_user!=""){
    $sql_notifi="INSERT into notification SET id_user='".$id_user."', id_zaya_his='".$id_his."', active='0'"; 
mysqli_query($conn, $sql_notifi);
} 
    }
   
$dan['message']="ok";
}
else
$dan['message']="no";
}
}
array_push($response, $dan);
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>