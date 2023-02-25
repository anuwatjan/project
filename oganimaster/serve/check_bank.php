<?php
session_start();

require_once '../includedb/condb.php'; 

$cus_id = $_SESSION['akksofttechsess_cusid'] ;

$cus_name = $_SESSION['akksofttechsess_cussurname'] ;

$ip = $_SERVER['REMOTE_ADDR'] ;

$show_po_id_ = $_POST['show_po_id_'];

$sql = "SELECT * FROM akksofttech_purchase_order WHERE po_id = '".$show_po_id_."' AND po_status <> 1 " ; 

$query = mysqli_query($conn , $sql ) ; 

$result = mysqli_fetch_array($query) ; 

$num = mysqli_num_rows($query) ; 

if($num){


    $coms = "YES" ; 

}else{


    $coms = "NO" ; 

}



$json=array('status'=> $coms  ); 
$resultArray = array();
array_push($resultArray,$json);
echo json_encode($resultArray);


?>