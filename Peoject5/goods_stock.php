<?php
$connect = mysqli_connect("localhost", "root", "akom2006", "project_new"); 


$goods_id = $_POST['goods_id'];

$product_lot = $_POST['product_lot'];


$sql = "SELECT * FROM goods WHERE goods_id = '$goods_id'" ; 

$query = mysqli_query($connect , $sql ) ; 

while($row = mysqli_fetch_array($query)){

    $sql1 = "SELECT * FROM goods_detail WHERE good_id = '".$row['goods_id']."'" ; 

    $query1 = mysqli_query($connect , $sql1 ) ; 

    $date = date("Y-m-d H:i:s") ; 

    while($row1 = mysqli_fetch_array($query1)){

        $backup = "INSERT INTO `backup_product`(`product_id`,
         `product_name`, `product_admit`, `backup_product_create`, `product_unit`,
          `product_payoff`, `product_balance`, `good_RefNo`, `backup_note`, `backup_employee`) 
          VALUES ('".$row1['product_id']."','".$row1['product_name']."','".$row1['product_quantity']."',
         '".$date."','".$row1['product_unit']."','0','".$row1['product_quantity']."' , '".$row['good_RefNo']."' , 'เพิ่มสินค้าเข้าสต็อก'  , '".$row['po_buyer']."'  )" ; 
        $querybackup = mysqli_query($connect , $backup ) ;
        


     $tostock = "INSERT INTO stock(stock_import , product_id , product_name , product_unit , product_quantity , product_lot  , 
     product_start_date , product_end_date , good_RefNo , po_buyer) 
     VALUES('$date' , '".$row1['product_id']."' , '".$row1['product_name']."' , '".$row1['product_unit']."' , '".$row1['product_quantity']."' ,'".$product_lot."'  ,
     '".$row1['product_start_date']."' ,'".$row1['product_end_date']."' , '".$row['good_RefNo']."'  , '".$row['po_buyer']."' ) ";
     $restock = mysqli_query($connect, $tostock);

     $tobacstock = "INSERT INTO backup_stock(stock_import , product_id , product_name , product_unit , product_quantity , product_lot  , 
     product_start_date , product_end_date , good_RefNo , po_buyer) 
     VALUES('$date' , '".$row1['product_id']."' , '".$row1['product_name']."' , '".$row1['product_unit']."' , '".$row1['product_quantity']."' ,'".$product_lot."'  ,
     '".$row1['product_start_date']."' ,'".$row1['product_end_date']."' , '".$row['good_RefNo']."'  , '".$row['po_buyer']."' ) ";
     $rebacstock = mysqli_query($connect, $tobacstock);


     $sqlproduct = "SELECT * FROM product WHERE product_id = '".$row1['product_id']."' " ;
     $queryproduct = mysqli_query($connect , $sqlproduct ) ; 
     $resultproduct = mysqli_fetch_array($queryproduct);

     $oldnet = $resultproduct['product_quantity'];
     $newnet = $oldnet + $row1['product_quantity'];
     $sqlproduct1 = "UPDATE product SET product_quantity = '$newnet'    WHERE product_id  = '".$row1['product_id']."' ";
     $resuproduct1 = mysqli_query($connect, $sqlproduct1);

     $sql10 = "UPDATE goods SET good_status = '2'  WHERE goods_id = '$goods_id' ";
     $query10 = mysqli_query($connect, $sql10);


     if($restock){
        $com = "YES";
     }else{
        $com = "NO";
     }

    }

}

$json=array('status'=> $com , 'Date' => $date ); 
$resultArray = array();
array_push($resultArray,$json);
echo json_encode($resultArray);

?>