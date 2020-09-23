
<?php
//header('Access-Control-Allow-Origin: *');
header('Content-Type: image/png');
include "phpqrcode/qrlib.php";
require_once('mybaza.php');
$id = $_GET['id'];
$response = array();
$vopros="tedeco";
$topic="";

$dan['id']=$id;
  array_push($response, $dan);
//echo $vopros=$vopros.json_encode($response,JSON_UNESCAPED_UNICODE);
$vopros=$vopros.json_encode($response,JSON_UNESCAPED_UNICODE);

QRcode::png($vopros, "qr.png", 16, 16);
$tag_db = mysqli_query( $conn,"select * from all_db  WHERE id = '".$id."'");   
         if($row_db = mysqli_fetch_array($tag_db)){
             $serial = $row_db['SN'];
             $version = $row_db['Equipment'];
             $tag_eq = mysqli_query( $conn,"select * from Equipment  WHERE id = '".$version."'");   
         if($row_eq = mysqli_fetch_array($tag_eq))
         $version = $row_eq['name'];
         $rotname = "qr.png";
$source = imagecreatefrompng($rotname);
 $color = imagecolorallocate($source, 0, 0, 0);
 $font = 'arial.ttf';
imagettftext($source, 12, 0, 170, 40, $color, $font, "Версия = ".$version); 
imagettftext($source, 12, 0, 50, 500, $color, $font, "ID = ".$id);
imagettftext($source, 12, 0, 280, 500, $color, $font, "Серийнный номер = ".$serial); 

imagepng($source, $rotname);

echo"<script>location.href = 'qr.png';</script>";
         }
