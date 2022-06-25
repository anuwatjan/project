<?php
include 'connect.php' ;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set("Asia/Bangkok");

// เลือก
$sql = "SELECT * FROM product";
$query = mysqli_query($connection, $sql);
// เลือกวันหมดอายุ
$sql1 = "SELECT * ,c.unit_id,d.unit_id,d.unit_name AS name_unit FROM po a JOIN product b  ON a.product_id = b.product_id JOIN doc_unit c ON c.product_id = b.product_id JOIN unit d ON d.unit_id = c.unit_id WHERE DATEDIFF(po_product_end,NOW())<0";
if($result1 = mysqli_query($connection , $sql1)){
while($result2 = mysqli_fetch_assoc($result1)){ 
$sMessage = ($result2['product_name']) . "\n" . "จำนวน : " . $result2['product_net'] . $result2['name_unit'] . "\n" ."หมดอายุวันที่ : " . datethai($result2['po_product_end']); 
$sToken = "sKhBoFjEkf8sgz7RtJK2ewLosFLJu8EOjenaNxOuNUi";
$chOne = curl_init(); 
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt( $chOne, CURLOPT_POST, 1); 
curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec( $chOne ); 

//Result error 
if(curl_error($chOne)) { 
 echo 'error:' . curl_error($chOne);
} 
else { 
 $result_ = json_decode($result, true); 
//  echo "status : ".$result_['status']; echo "message : ". $result_['message'];
} 
curl_close( $chOne );
}
}
exit;
