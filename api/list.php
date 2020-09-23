<?
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$spisok = array();
$response = array();
$response2 = array();
$zapros=$_POST['zapros'];
$sql = $_POST["sql"];
 $sql = json_decode($sql,true);  
 $status_sql = $sql[0]['status'];
 $zapros_sql = $sql[0]['zapros_sql'];
 $place_option = $sql[0]['place_option'];
 $type_option = $sql[0]['type_option'];
 $equip_option = $sql[0]['equip_option'];
 $version = $sql[0]['version'];
 $pump = $sql[0]['pump'];
 $hdf = $sql[0]['hdf'];
 $zkv = $sql[0]['zkv'];
 $adimea = $sql[0]['adimea'];
 $akku = $sql[0]['akku'];
 $abpm = $sql[0]['abpm'];
$tag = $_POST['tag'];
$sort = $_POST['sort'];
$myArray = array();
$id = $_POST['id'];
if ($zapros == "find"){
    if ($tag=="tag"){
      $tags = $_POST['find'];  
       $tag_list = mysqli_query( $conn,"select * from tag  WHERE name = '".$tags."'");   
         if($row_tag = mysqli_fetch_array($tag_list)){
            $tag_id = $row_tag['id'];
              $tag_bd_list = mysqli_query( $conn,"SELECT * FROM `bd_tag` WHERE id_tag = ".$tag_id);   
         while($row_bd_tag = mysqli_fetch_array($tag_bd_list)){
             $id_db=$row_bd_tag['id_bd'];
             $zapr = " and id = ".$id_db;
    if ($sort=="")
         $list = mysqli_query( $conn,"select * from all_db WHERE ".$zapros_sql.$zapr." ORDER BY id DESC");  
         else
         $list = mysqli_query( $conn,"select * from all_db WHERE ".$zapros_sql.$zapr." ORDER BY ".$sort);    
while($row_list = mysqli_fetch_array($list)){
for ($s1 = 0; $s1<count($status_sql);$s1++)
if ($status_sql[$s1]===$row_list['status'] || $status_sql[$s1]=="all")
for ($s2 = 0; $s2<count($place_option);$s2++)
if ($place_option[$s2]===$row_list['Place'] || $place_option[$s2]=="all")
for ($s3 = 0; $s3<count($type_option);$s3++)
if ($type_option[$s3]===$row_list['EType'] || $type_option[$s3]=="all")
for ($s4 = 0; $s4<count($equip_option);$s4++)
if ($equip_option[$s4]===$row_list['Equipment'] || $equip_option[$s4]=="all")
for ($s5 = 0; $s5<count($version);$s5++)
if ($version[$s5]===$row_list['SW_version'] || $version[$s5]=="all")
for ($s6 = 0; $s6<count($pump);$s6++)
if ($pump[$s6]===$row_list['PUMP'] || $pump[$s6]=="all")
for ($s7 = 0; $s7<count($hdf);$s7++)
if ($hdf[$s7]===$row_list['HDF'] || $hdf[$s7]=="all")
for ($s8 = 0; $s8<count($zkv);$s8++)
if ($zkv[$s8]===$row_list['ZKV'] || $zkv[$s8]=="all")
for ($s9 = 0; $s9<count($adimea);$s9++)
if ($adimea[$s9]===$row_list['ADIMEA'] || $adimea[$s9]=="all")
for ($s10 = 0; $s10<count($akku);$s10++)
if ($akku[$s10]===$row_list['AKKU'] || $akku[$s10]=="all")
for ($s11 = 0; $s11<count($abpm);$s11++)
if ($abpm[$s11]===$row_list['ABPM'] || $abpm[$s11]=="all")
{
$dan['message']="ok";
$dan['id']=$row_list['id'];
$place = mysqli_query( $conn,"select * from group_place WHERE id=".$row_list['Place']);
if($row_place = mysqli_fetch_array($place))
$dan['place']=$row_place['name'];
else
$dan['place']="Не выбрано";
$dan['place_re']=$row_list['Place'];


$etype = mysqli_query( $conn,"select * from EType WHERE id=".$row_list['EType']);
if($row_etype= mysqli_fetch_array($etype))
$dan['etype']=$row_etype['name'];
else
$dan['etype']="Не выбрано";
$dan['etype_re']=$row_list['EType'];

$equip = mysqli_query( $conn,"select * from Equipment WHERE id=".$row_list['Equipment']);
if($row_equip= mysqli_fetch_array($equip))
$dan['equip']=$row_equip['name'];
else
$dan['equip']="Не выбрано";
$dan['equip_re']=$row_list['Equipment'];

$dan['sn']=$row_list['SN'];
$dan['article']=$row_list['Article'];
$dan['py']=$row_list['PY'];
$dan['inst_date']=$row_list['Inst_date'];
$dan['wtc']=$row_list['WTC'];
$dan['sw_version']=$row_list['SW_version'];
$dan['pump']=$row_list['PUMP'];
$dan['hdf']=$row_list['HDF'];
$dan['zkv']=$row_list['ZKV'];
$dan['adimea']=$row_list['ADIMEA'];
$dan['akku']=$row_list['AKKU'];
$dan['abpm']=$row_list['ABPM'];

$status = mysqli_query( $conn,"select * from status WHERE id=".$row_list['status']);
if($row_status= mysqli_fetch_array($status))
$dan['status']=$row_status['name'];
else
$dan['status']="Не выбрано";
$dan['status_re']=$row_list['status'];

$dan['comment']=$row_list['comment'];
$dan['edit_data']=$row_list['edit_data'];

$user = mysqli_query( $conn,"select * from user WHERE id=".$row_list['user']);
if($row_user= mysqli_fetch_array($user))
$dan['user']=$row_user['name'];
else
$dan['user']="Не выбрано";
array_push($response, $dan);    
    
$history = mysqli_query( $conn,"select * from history WHERE id_bd=".$id." ORDER BY id DESC");
while($row_history = mysqli_fetch_array($history)){
$sob = mysqli_query( $conn,"select * from sobytie WHERE id=".$row_history['sobytie']);
if($row_sob= mysqli_fetch_array($sob))
$dan2['sobytie']=$row_sob['name']; 
$dan2['tip']=$row_history['tip'];
$user = mysqli_query( $conn,"select * from user WHERE id=".$row_history['user_id']);
if($row_user = mysqli_fetch_array($user))
$dan2['user']=$row_user['fam']." ".$row_user['name']; 


$dan2['data']=$row_history['data'];   
array_push($response2, $dan2);    
}

break;

}


 }
   
   
   
    
         }
         }
    }
    else
    {
    if ($sort=="")
    
         $list = mysqli_query( $conn,"select * from all_db WHERE ".$zapros_sql." ORDER BY id DESC");  
         else
         $list = mysqli_query( $conn,"select * from all_db WHERE ".$zapros_sql." ORDER BY ".$sort);    

while($row_list = mysqli_fetch_array($list)){

for ($s1 = 0; $s1<count($status_sql);$s1++)
if ($status_sql[$s1]===$row_list['status'] || $status_sql[$s1]=="all")
for ($s2 = 0; $s2<count($place_option);$s2++)
if ($place_option[$s2]===$row_list['Place'] || $place_option[$s2]=="all")
for ($s3 = 0; $s3<count($type_option);$s3++)
if ($type_option[$s3]===$row_list['EType'] || $type_option[$s3]=="all")
for ($s4 = 0; $s4<count($equip_option);$s4++)
if ($equip_option[$s4]===$row_list['Equipment'] || $equip_option[$s4]=="all")
for ($s5 = 0; $s5<count($version);$s5++)
if ($version[$s5]===$row_list['SW_version'] || $version[$s5]=="all")
for ($s6 = 0; $s6<count($pump);$s6++)
if ($pump[$s6]===$row_list['PUMP'] || $pump[$s6]=="all")
for ($s7 = 0; $s7<count($hdf);$s7++)
if ($hdf[$s7]===$row_list['HDF'] || $hdf[$s7]=="all")
for ($s8 = 0; $s8<count($zkv);$s8++)
if ($zkv[$s8]===$row_list['ZKV'] || $zkv[$s8]=="all")
for ($s9 = 0; $s9<count($adimea);$s9++)
if ($adimea[$s9]===$row_list['ADIMEA'] || $adimea[$s9]=="all")
for ($s10 = 0; $s10<count($akku);$s10++)
if ($akku[$s10]===$row_list['AKKU'] || $akku[$s10]=="all")
for ($s11 = 0; $s11<count($abpm);$s11++)
if ($abpm[$s11]===$row_list['ABPM'] || $abpm[$s11]=="all")
{
$dan['message']="ok";
$dan['id']=$row_list['id'];
$place = mysqli_query( $conn,"select * from group_place WHERE id=".$row_list['Place']);
if($row_place = mysqli_fetch_array($place))
$dan['place']=$row_place['name'];
else
$dan['place']="Не выбрано";
$dan['place_re']=$row_list['Place'];


$etype = mysqli_query( $conn,"select * from EType WHERE id=".$row_list['EType']);
if($row_etype= mysqli_fetch_array($etype))
$dan['etype']=$row_etype['name'];
else
$dan['etype']="Не выбрано";
$dan['etype_re']=$row_list['EType'];

$equip = mysqli_query( $conn,"select * from Equipment WHERE id=".$row_list['Equipment']);
if($row_equip= mysqli_fetch_array($equip))
$dan['equip']=$row_equip['name'];
else
$dan['equip']="Не выбрано";
$dan['equip_re']=$row_list['Equipment'];

$dan['sn']=$row_list['SN'];
$dan['article']=$row_list['Article'];
$dan['py']=$row_list['PY'];
$dan['inst_date']=$row_list['Inst_date'];
$dan['wtc']=$row_list['WTC'];
$dan['sw_version']=$row_list['SW_version'];
$dan['pump']=$row_list['PUMP'];
$dan['hdf']=$row_list['HDF'];
$dan['zkv']=$row_list['ZKV'];
$dan['adimea']=$row_list['ADIMEA'];
$dan['akku']=$row_list['AKKU'];
$dan['abpm']=$row_list['ABPM'];

$status = mysqli_query( $conn,"select * from status WHERE id=".$row_list['status']);
if($row_status= mysqli_fetch_array($status))
$dan['status']=$row_status['name'];
else
$dan['status']="Не выбрано";
$dan['status_re']=$row_list['status'];

$dan['comment']=$row_list['comment'];
$dan['edit_data']=$row_list['edit_data'];

$user = mysqli_query( $conn,"select * from user WHERE id=".$row_list['user']);
if($row_user= mysqli_fetch_array($user))
$dan['user']=$row_user['name'];
else
$dan['user']="Не выбрано";
array_push($response, $dan);    
    
$history = mysqli_query( $conn,"select * from history WHERE id_bd=".$id." ORDER BY id DESC");
while($row_history = mysqli_fetch_array($history)){
$sob = mysqli_query( $conn,"select * from sobytie WHERE id=".$row_history['sobytie']);
if($row_sob= mysqli_fetch_array($sob))
$dan2['sobytie']=$row_sob['name']; 
$dan2['tip']=$row_history['tip'];
$user = mysqli_query( $conn,"select * from user WHERE id=".$row_history['user_id']);
if($row_user = mysqli_fetch_array($user))
$dan2['user']=$row_user['fam']." ".$row_user['name']; 


$dan2['data']=$row_history['data'];   
array_push($response2, $dan2);    
}

break;

}


 }
   
   
   
   
   
} 
}
else
if ($zapros == "spisok"){

$list = mysqli_query( $conn,"select * from user WHERE id=".$id);    
if($row_list = mysqli_fetch_array($list)){
$list_db = mysqli_query( $conn,"select * from all_db WHERE Place = ".$row_list['place']);    
while($row_list_db = mysqli_fetch_array($list_db)){
    $dan['message']="ok";
$dan['id']=$row_list_db['id']; 
$equip = mysqli_query( $conn,"select * from Equipment WHERE id=".$row_list_db['Equipment']);
if($row_equip= mysqli_fetch_array($equip))
$dan['equip']=$row_equip['name'];  
array_push($spisok, $dan); 
}
}
}
else
{
if ($id=="")
$list = mysqli_query( $conn,"select * from all_db ORDER BY id DESC");
else
$list = mysqli_query( $conn,"select * from all_db WHERE id=".$id);

while($row_list = mysqli_fetch_array($list)){
$dan['message']="ok";
$dan['id']=$row_list['id'];

$place = mysqli_query( $conn,"select * from group_place WHERE id=".$row_list['Place']);
if($row_place = mysqli_fetch_array($place))
$dan['place']=$row_place['name'];
else
$dan['place']="Не выбрано";
$dan['place_re']=$row_list['Place'];


$etype = mysqli_query( $conn,"select * from EType WHERE id=".$row_list['EType']);
if($row_etype= mysqli_fetch_array($etype))
$dan['etype']=$row_etype['name'];
else
$dan['etype']="Не выбрано";
$dan['etype_re']=$row_list['EType'];

$equip = mysqli_query( $conn,"select * from Equipment WHERE id=".$row_list['Equipment']);
if($row_equip= mysqli_fetch_array($equip))
$dan['equip']=$row_equip['name'];
else
$dan['equip']="Не выбрано";
$dan['equip_re']=$row_list['Equipment'];

$dan['sn']=$row_list['SN'];
$dan['article']=$row_list['Article'];
$dan['py']=$row_list['PY'];
$dan['inst_date']=$row_list['Inst_date'];
$dan['wtc']=$row_list['WTC'];
$dan['sw_version']=$row_list['SW_version'];
$dan['pump']=$row_list['PUMP'];
$dan['hdf']=$row_list['HDF'];
$dan['zkv']=$row_list['ZKV'];
$dan['adimea']=$row_list['ADIMEA'];
$dan['akku']=$row_list['AKKU'];
$dan['abpm']=$row_list['ABPM'];
$dan['data_g']=$row_list['garant'];
$status = mysqli_query( $conn,"select * from status WHERE id=".$row_list['status']);
if($row_status= mysqli_fetch_array($status))
$dan['status']=$row_status['name'];
else
$dan['status']="Не выбрано";
$dan['status_re']=$row_list['status'];

$dan['comment']=$row_list['comment'];
$dan['edit_data']=$row_list['edit_data'];

$user = mysqli_query( $conn,"select * from user WHERE id=".$row_list['user']);
if($row_user= mysqli_fetch_array($user))
$dan['user']=$row_user['name'];
else
$dan['user']="Не выбрано";
array_push($response, $dan);    
    
$history = mysqli_query( $conn,"select * from history WHERE id_bd=".$id." ORDER BY id DESC");
while($row_history = mysqli_fetch_array($history)){
$sob = mysqli_query( $conn,"select * from sobytie WHERE id=".$row_history['sobytie']);
if($row_sob= mysqli_fetch_array($sob))
$dan2['sobytie']=$row_sob['name']; 
$dan2['tip']=$row_history['tip'];
$user = mysqli_query( $conn,"select * from user WHERE id=".$row_history['user_id']);
if($row_user = mysqli_fetch_array($user))
$dan2['user']=$row_user['fam']." ".$row_user['name']; 


$dan2['data']=$row_history['data'];   
array_push($response2, $dan2);      
}
    
}




}
if ($zapros == "spisok"){
   echo json_encode($spisok,JSON_UNESCAPED_UNICODE); 
}
else
{

$myArray[0] = $response;
$myArray[1] = $response2; 


echo json_encode($myArray,JSON_UNESCAPED_UNICODE);
}

?>