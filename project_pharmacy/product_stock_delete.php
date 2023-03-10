<?php 

$con = mysqli_connect("localhost", "root", "akom2006", "project_new");

$sql1 = "SELECT *  FROM stock WHERE stock_id = '".$_POST['stock_id']."' " ; 
$query1 = mysqli_query($con , $sql1 ) ; 
$result1 = mysqli_fetch_array($query1);

$date = date("Y-m-d H:i:s") ; 


$backup = "INSERT INTO `backup_product`(`product_id`,
`product_name`, `product_admit`, `backup_product_create`, `product_unit`,
 `product_payoff`, `product_balance`, `good_RefNo`, `backup_note`, `backup_employee`) 
 VALUES ('".$result1['product_id']."','".$result1['product_name']."','0',
'".$date."','".$result1['product_unit']."','".$result1['product_quantity']."','".$result1['product_quantity']."' , '".$result1['good_RefNo']."' , 'ลบสินค้าออกจากสต็อก'  , '".$result1['po_buyer']."'  )" ; 
$querybackup = mysqli_query($con , $backup ) ;


$sql = "UPDATE  stock SET stock_status = 1 WHERE stock_id = '".$_POST['stock_id']."' " ; 

$query = mysqli_query($con , $sql ) ; 

if($query){

    $com  = "YES" ; 

}else{

    $com  = "NO" ; 

}

$json=array('status'=> $com ); 
$resultArray = array();
array_push($resultArray,$json);
echo json_encode($resultArray);


?>