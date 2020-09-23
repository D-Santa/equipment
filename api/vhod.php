<?
header('Access-Control-Allow-Origin: *');
function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}
require_once('mybaza.php');
$log=$_POST['log'];
$pass=$_POST['pass'];
$token=$_POST['token'];
$response = array();
$vhod=$_POST['vhod'];
if ($vhod=="app"){
if ($token!=null){
$result = mysqli_query( $conn,"select * from user WHERE token='$token' and roles!=1");
if($row = mysqli_fetch_array($result)){
$dan['message']="ok";
  $dan['id']=$row['id'];
   $dan['fam']=$row['fam'];
 $dan['name']=$row['name'];
 $dan['roles']=$row['roles'];
 $dan['glav']=$row['glav'];
}else 
$dan['message']="no";
}else{
$result = mysqli_query( $conn,"select * from user WHERE log='$log' and pass='$pass' and roles!=1");    
if($row = mysqli_fetch_array($result)){   
 $dan['message']='ok'; 
 $token=random_string(50);
  $dan['id']=$row['id'];
 $dan['token']=$token;
 $dan['fam']=$row['fam'];
 $dan['name']=$row['name'];
 $dan['roles']=$row['roles'];
 $dan['glav']=$row['glav'];
 
 $sql="UPDATE user SET token='".$token."' WHERE id=".$row['id'];
 mysqli_query($conn, $sql);
}
else $dan['message']='no'; 
}
    
    
    
}

else{
if ($token!=null){
$result = mysqli_query( $conn,"select * from user WHERE token='$token' and roles=1");
if($row = mysqli_fetch_array($result)){
$dan['message']="ok";
  $dan['id']=$row['id'];
}else
$dan['message']="no";
}else{
$result = mysqli_query( $conn,"select * from user WHERE log='$log' and pass='$pass' and roles=1");    
if($row = mysqli_fetch_array($result)){   
 $dan['message']='ok'; 
 $token=random_string(50);
  $dan['id']=$row['id'];
 $dan['token']=$token;
 $sql="UPDATE user SET token='".$token."' WHERE id=".$row['id'];
 mysqli_query($conn, $sql);
}
else $dan['message']='no'; 
}

}
    array_push($response, $dan);
    echo json_encode($response,JSON_UNESCAPED_UNICODE);

?>