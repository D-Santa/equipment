<?
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$id_user=$_GET['id'];
$roles=$_GET['roles'];
$zapros = $_GET['zapros'];
$glav=$_GET['glav'];
$response = array();
$id_zayavka=$_GET['id_zayavka'];
if ($zapros=="admin"){
 $list = mysqli_query( $conn,"select * from zayavka ORDER BY id DESC");    
while($row_list = mysqli_fetch_array($list)){    
$dan['message']="ok";
 $date = date_create($row_list['data']);
    $dan['data']= date_format($date, 'Y-m-d');
$dan['id']=$row_list['id']; 
$all_db =$row_list['id_bd'];
$dan['id_bd']=$all_db; 
if($row_bd = mysqli_fetch_array(mysqli_query( $conn,"select * from all_db WHERE id = ".$all_db))) {   
$Equipmnet=$row_bd['Equipment']; 
$EType=$row_bd['EType']; 
$Place=$row_bd['Place'];

}
if($row_Equipmnet = mysqli_fetch_array(mysqli_query( $conn,"select * from Equipment WHERE id = ".$Equipmnet)))    
$dan['Equipment']=$row_Equipmnet['name']; 
if($row_EType = mysqli_fetch_array(mysqli_query( $conn,"select * from EType WHERE id = ".$EType)))    
$dan['EType']=$row_EType['name']; 
if($row_Place = mysqli_fetch_array(mysqli_query( $conn,"select * from group_place WHERE id = ".$Place)))    
$dan['Place']=$row_Place['name']; 
$dan['status']=$row_list['status']; 
array_push($response, $dan);   
    
}  
    
}
else
if ($zapros=="list"){
    if ($roles=="3"){
    $moi = array();
    $all = array();
    $sot = array();
    $list_moi = mysqli_query( $conn,"select * from zayavka WHERE id_user = '$id_user' ORDER BY id DESC");   
while($row_moi = mysqli_fetch_array($list_moi)){  
$dan['message']="ok";
 $date = date_create($row_moi['data']);
    $dan['data']= date_format($date, 'Y-m-d');
$dan['id']=$row_moi['id']; 
$dan['id_db']=$row_moi['id_bd']; 
$dan['comment']=$row_moi['comment']; 
$all_db =$row_moi['id_bd']; 
if($row_bd = mysqli_fetch_array(mysqli_query( $conn,"select * from all_db WHERE id = ".$all_db)))    
$Equipmnet=$row_bd['Equipment']; 
if($row_Equipmnet = mysqli_fetch_array(mysqli_query( $conn,"select * from Equipment WHERE id = ".$Equipmnet)))    
$dan['name']=$row_Equipmnet['name']; 
$dan['active']=$row_moi['active']; 
array_push($moi, $dan);    
}
if($row_user_moi = mysqli_fetch_array(mysqli_query( $conn,"select * from user WHERE id = ".$id_user))) {   
    $place=$row_user_moi['place'];
    $list2_moi = mysqli_query( $conn,"select * from user WHERE place = ".$place);  
     while($row_users_moi = mysqli_fetch_array($list2_moi)) { 
    $client=$row_users_moi['id'];
    $list_sot_moi = mysqli_query( $conn,"select * from zayavka WHERE id_user = '$client' and id_user!='$id_user' and active = '2' or id_user = '$client' and id_user!='$id_user' and active = '3' ORDER BY id DESC");    
while($row_sot_moi = mysqli_fetch_array($list_sot_moi)){    
$dan['message']="ok";
 $date = date_create($row_sot_moi['data']);
    $dan['data']= date_format($date, 'Y-m-d');
$dan['id']=$row_sot_moi['id']; 
$dan['fio']=$row_users_moi['fam']." ".$row_users_moi['name']; 
$dan['id_db']=$row_sot_moi['id_bd']; 
$dan['comment']=$row_sot_moi['comment']; 
$all_db =$row_sot_moi['id_bd']; 
if($row_bd = mysqli_fetch_array(mysqli_query( $conn,"select * from all_db WHERE id = ".$all_db)))    
$Equipmnet=$row_bd['Equipment']; 
if($row_Equipmnet = mysqli_fetch_array(mysqli_query( $conn,"select * from Equipment WHERE id = ".$Equipmnet)))    
$dan['name']=$row_Equipmnet['name']; 
$dan['active']=$row_sot_moi['active']; 
array_push($moi, $dan);
} 
     }
    }

if($row_user = mysqli_fetch_array(mysqli_query( $conn,"select * from user WHERE id = ".$id_user))) {   
    $place=$row_user['place'];
    $list2 = mysqli_query( $conn,"select * from user WHERE place = ".$place);  
     while($row_users = mysqli_fetch_array($list2)) { 
    $client=$row_users['id'];
    $list_all = mysqli_query( $conn,"select * from zayavka WHERE id_user = '$client' ORDER BY id DESC");    
while($row_all = mysqli_fetch_array($list_all)){    
$dan2['message']="ok";
 $date = date_create($row_all['data']);
    $dan2['data']= date_format($date, 'Y-m-d');
$dan2['id']=$row_all['id']; 
$dan2['fio']=$row_users['fam']." ".$row_users['name']; 
$dan2['id_db']=$row_all['id_bd']; 
$dan2['comment']=$row_all['comment']; 
$all_db =$row_all['id_bd']; 
if($row_bd = mysqli_fetch_array(mysqli_query( $conn,"select * from all_db WHERE id = ".$all_db)))    
$Equipmnet=$row_bd['Equipment']; 
if($row_Equipmnet = mysqli_fetch_array(mysqli_query( $conn,"select * from Equipment WHERE id = ".$Equipmnet)))    
$dan2['name']=$row_Equipmnet['name']; 
$dan2['active']=$row_all['active']; 
array_push($all, $dan2);
} 
     }
    }  
    
if($row_user = mysqli_fetch_array(mysqli_query( $conn,"select * from user WHERE id = ".$id_user))) {   
    $place=$row_user['place'];
    $list2 = mysqli_query( $conn,"select * from user WHERE place = ".$place);  
     while($row_users = mysqli_fetch_array($list2)) { 
    $client=$row_users['id'];
    $list_sot = mysqli_query( $conn,"select * from zayavka WHERE id_user = '$client' and id_user!='$id_user' ORDER BY id DESC");    
while($row_sot = mysqli_fetch_array($list_sot)){    
$dan3['message']="ok";
 $date = date_create($row_sot['data']);
    $dan3['data']= date_format($date, 'Y-m-d');
$dan3['id']=$row_sot['id']; 
$dan3['fio']=$row_users['fam']." ".$row_users['name']; 
$dan3['id_db']=$row_sot['id_bd']; 
$dan3['comment']=$row_sot['comment']; 
$all_db =$row_sot['id_bd']; 
if($row_bd = mysqli_fetch_array(mysqli_query( $conn,"select * from all_db WHERE id = ".$all_db)))    
$Equipmnet=$row_bd['Equipment']; 
if($row_Equipmnet = mysqli_fetch_array(mysqli_query( $conn,"select * from Equipment WHERE id = ".$Equipmnet)))    
$dan3['name']=$row_Equipmnet['name']; 
$dan3['active']=$row_sot['active']; 
array_push($sot, $dan3);
} 
     }
    }


$response[0]['moi']=$moi;
$response[0]['all']=$all;
$response[0]['sot']=$sot;
    /*if ($glav=="1"){
    if($row_user = mysqli_fetch_array(mysqli_query( $conn,"select * from user WHERE id = ".$id_user))) {   
    $place=$row_user['place'];
    $list2 = mysqli_query( $conn,"select * from user WHERE place = ".$place);  
     while($row_users = mysqli_fetch_array($list2)) { 
    $client=$row_users['id'];
    $list = mysqli_query( $conn,"select * from zayavka WHERE id_user = '$client' ORDER BY id DESC");    
while($row_list = mysqli_fetch_array($list)){    
$dan['message']="ok";
 $date = date_create($row_list['data']);
    $dan['data']= date_format($date, 'Y-m-d');
$dan['id']=$row_list['id']; 
$dan['id_db']=$row_list['id_bd']; 
$dan['comment']=$row_list['comment']; 
$all_db =$row_list['id_bd']; 
if($row_bd = mysqli_fetch_array(mysqli_query( $conn,"select * from all_db WHERE id = ".$all_db)))    
$Equipmnet=$row_bd['Equipment']; 
if($row_Equipmnet = mysqli_fetch_array(mysqli_query( $conn,"select * from Equipment WHERE id = ".$Equipmnet)))    
$dan['name']=$row_Equipmnet['name']; 
$dan['active']=$row_list['active']; 
array_push($response, $dan);
} 
     }
    } 
    }
    else
    {
$list = mysqli_query( $conn,"select * from zayavka WHERE id_user = '$id_user' ORDER BY id DESC");    
while($row_list = mysqli_fetch_array($list)){    
$dan['message']="ok";
 $date = date_create($row_list['data']);
    $dan['data']= date_format($date, 'Y-m-d');
$dan['id']=$row_list['id']; 
$dan['id_db']=$row_list['id_bd'];
$dan['comment']=$row_list['comment']; 
$all_db =$row_list['id_bd']; 
if($row_bd = mysqli_fetch_array(mysqli_query( $conn,"select * from all_db WHERE id = ".$all_db)))    
$Equipmnet=$row_bd['Equipment']; 
if($row_Equipmnet = mysqli_fetch_array(mysqli_query( $conn,"select * from Equipment WHERE id = ".$Equipmnet)))    
$dan['name']=$row_Equipmnet['name']; 
$dan['active']=$row_list['active']; 
array_push($response, $dan);
} 
}*/
}
else
{
    
    
   /* if ($glav=="1"){
 if($row_user = mysqli_fetch_array(mysqli_query( $conn,"select * from user WHERE id = ".$id_user))) {   
    $place=$row_user['place'] ;
    $list2 = mysqli_query( $conn,"select * from user WHERE place = ".$place);  
     while($row_users = mysqli_fetch_array($list2)) { 
    $client=$row_users['id'];
    $list = mysqli_query( $conn,"select * from zayavka WHERE id_user = '$client' ORDER BY id ASC");    
while($row_list = mysqli_fetch_array($list)){    
$dan['message']="ok";
 $date = date_create($row_list['data']);
    $dan['data']= date_format($date, 'Y-m-d');
$dan['id']=$row_list['id']; 
$all_db =$row_list['id_bd']; 
if($row_bd = mysqli_fetch_array(mysqli_query( $conn,"select * from all_db WHERE id = ".$all_db)))    
$Equipmnet=$row_bd['Equipment']; 
if($row_Equipmnet = mysqli_fetch_array(mysqli_query( $conn,"select * from Equipment WHERE id = ".$Equipmnet)))    
$dan['name']=$row_Equipmnet['name']; 
$dan['active']=$row_list['active']; 
array_push($response, $dan);
} 
     }
    } 
    }
    else
    {*/
        $place = mysqli_query( $conn,"select * from place_user WHERE id_user = '$id_user'");    
while($row_place = mysqli_fetch_array($place)){ 
    $id_place = $row_place['id_place'];
 $bd = mysqli_query( $conn,"select * from all_db WHERE Place = '$id_place'");    
while($row_bd = mysqli_fetch_array($bd)){ 
    $id_bd = $row_bd['id'];
$list = mysqli_query( $conn,"select * from zayavka WHERE id_bd = '$id_bd' ORDER BY id DESC");    
while($row_list = mysqli_fetch_array($list)){    
$dan['message']="ok";
 $date = date_create($row_list['data']);
    $dan['data']= date_format($date, 'Y-m-d');
$dan['id']=$row_list['id']; 
$dan['id_db']=$row_list['id_bd']; 
$dan['comment']=$row_list['comment']; 
$all_db =$row_list['id_bd']; 
if($row_bd = mysqli_fetch_array(mysqli_query( $conn,"select * from all_db WHERE id = ".$all_db)))    
$Equipmnet=$row_bd['Equipment']; 
if($row_Equipmnet = mysqli_fetch_array(mysqli_query( $conn,"select * from Equipment WHERE id = ".$Equipmnet)))    
$dan['name']=$row_Equipmnet['name']; 
$dan['active']=$row_list['active']; 
array_push($response, $dan);
} 
}
}
//}
    
    
    
}
}
else
if ($zapros=="dell"){
$sql="DELETE FROM zayavka WHERE id=".$name; 
if (mysqli_query($conn, $sql))
$dan['message']="ok";
else
$dan['message']="no";
array_push($response, $dan);
}
else
if ($id_zayavka!=""){
$zayavka = mysqli_query( $conn,"select * from zayavka_history WHERE id_zayavka = ".$id_zayavka." ORDER BY id ASC");
while($row_bd = mysqli_fetch_array($zayavka))
{
    $zayavka_db = mysqli_query( $conn,"select * from zayavka WHERE id = ".$id_zayavka);
if($row_zaya = mysqli_fetch_array($zayavka_db))
if ($roles=="2" && $glav=="1" && $row_zaya['active']=="4"){
$sql2="UPDATE zayavka SET active='5' WHERE id=".$id_zayavka;
            mysqli_query($conn, $sql2); 
}
    $dan['comment']= $row_zaya['comment'];
    $dan['comment_his']= $row_bd['comment'];
    $dan['active']= $row_zaya['active'];
    $dan['message']="ok";
    $date = date_create($row_bd['data']);
    $dan['data']= date_format($date, 'H:i:s');
    $dan['status']= $row_bd['status'];
    array_push($response, $dan);
}
    
}
echo json_encode($response,JSON_UNESCAPED_UNICODE);
?>