<?
header('Access-Control-Allow-Origin: *');
require_once('mybaza.php');
$myArray = array();
$response = array();
$response2 = array();
$response3 = array();
$response4 = array();
$response5 = array();
$response6 = array();
$response7 = array();
$group_place = mysqli_query( $conn,"select * from group_place");
while($row_place = mysqli_fetch_array($group_place)){
$dan['id_place']=$row_place['id'];
$dan['name_place']=$row_place['name'];
array_push($response, $dan);   
}
$group_type = mysqli_query( $conn,"select * from EType");
while($row_type = mysqli_fetch_array($group_type)){
$dan2['id_type']=$row_type['id'];
$dan2['name_type']=$row_type['name'];
array_push($response2, $dan2);   
}
$group_eqip = mysqli_query( $conn,"select * from Equipment");
while($row_eqip  = mysqli_fetch_array($group_eqip )){
$dan3['id_eqip']=$row_eqip['id'];
$dan3['name_eqip']=$row_eqip['name'];
$dan3['etype_eqip']=$row_eqip['EType_id'];
array_push($response3, $dan3);   
}
$company_type = mysqli_query( $conn,"select * from company");
while($row_company = mysqli_fetch_array($company_type)){
$dan4['id_company']=$row_company['id'];
$dan4['name_company']=$row_company['name'];
array_push($response4, $dan4);   
}
$place= mysqli_query( $conn,"select * from place");
while($row_place = mysqli_fetch_array($place)){
$dan5['id_place']=$row_place['id'];
$dan5['name_place']=$row_place['name'];
array_push($response5, $dan5);   
}
$tag= mysqli_query( $conn,"select * from tag ORDER BY col DESC");
while($row_tag = mysqli_fetch_array($tag)){
$dan6['id_tag']=$row_tag['id'];
$dan6['name_tag']=$row_tag['name'];
array_push($response6, $dan6);   
}
$version= mysqli_query( $conn,"select * from all_db ORDER BY SW_version DESC");
while($row_version = mysqli_fetch_array($version)){
    $dd=1;
for ($ss=0; $ss<count($response7); $ss++)
if ($response7[$ss]['name_version']===$row_version['SW_version']){
$dd=0;
break;
}
else
$dd=1;

if ($dd==1){
$dan7['name_version']=$row_version['SW_version'];
array_push($response7, $dan7);  
}
}
$myArray[0] = $response;
$myArray[1] = $response2; 
$myArray[2] = $response3; 
$myArray[3] = $response4; 
$myArray[4] = $response5; 
$myArray[5] = $response6; 
$myArray[6] = $response7; 
echo json_encode($myArray,JSON_UNESCAPED_UNICODE);





?>