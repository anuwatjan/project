<?php 
   session_start();
   require_once '../includedb/condb.php'; 
   $prod_id = $_POST['prod_id'];  //รหัสสินค้า
   $cus_id = $_SESSION['akksofttechsess_cusid'] ;  //รหัสผู้ซื้อ
   $sql = "DELETE FROM `akksofttech_cart` WHERE   `mem_id` = '".$cus_id."' AND prod_id = '".$prod_id."'   " ;
   $rec = mysqli_query($conn ,$sql);
   $result = mysqli_fetch_array($query);
   $quantity = $result['quantity'];
   $json=array('prod_id'=> $prod_id , 'quantity'=> $quantity ); 
	$resultArray = array();
	array_push($resultArray,$json);
	echo json_encode($resultArray);
?>