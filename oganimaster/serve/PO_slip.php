<?php session_start() ;

require_once '../includedb/condb.php';

$po_id = $_POST['po_id'];

$sql3 ="SELECT * FROM akksofttech_payment WHERE akksofttech_payment.po_id = '".$po_id."' " ;
$result3 = mysqli_query($conn,$sql3) or die ("error ".mysqli_error($conn));
$pay_array=[];
$row3 = mysqli_fetch_array($result3);
array_push($pay_array,$row3);
      
echo json_encode(['pay'=> $pay_array]);

?>