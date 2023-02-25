<?php 
   session_start();
   require_once '../includedb/condb.php'; 

   $prod_id = $_POST['prod_id'] ; 
   $cus_id = $_SESSION['akksofttechsess_cusid']; 

   // เช็คเฉพาะสินค้านั้นๆ
   $sql = "SELECT sum(quantity) as quantity  , SUM(prod_price_simple * quantity ) as prod_price_simple 
   FROM akksofttech_cart WHERE cus_id = '".$cus_id."' AND prod_id = '".$prod_id."'" ; 
   $query = mysqli_query($conn , $sql ) ;  
   $result = mysqli_fetch_array($query) ; 
   $prod_price_simple = $result['prod_price_simple'];
   $quantity = $result['quantity'];
   if($num >  0 ){
      $coms = 'YES';
   }else{
       $coms = 'NO';
   }

   // เช็คผลรวมทั้งหมดที่มีในตะกร้า
   $sql1 = "SELECT  COUNT(cart_id) AS cart_id , SUM(prod_price_simple * quantity ) as prod_price_simple 
   FROM akksofttech_cart WHERE cus_id = '".$cus_id."'" ; 
   $query1 = mysqli_query($conn , $sql1 ) ;  
   $result1 = mysqli_fetch_array($query1) ; 
   $num1 = mysqli_num_rows($query1) ; 
   $prod_price_simple1 = $result1['prod_price_simple'];

  
   $json=array('status'=> $coms ,'prod_id' => $prod_id ,  'cart_id'=> $result1['cart_id']  ,
    'prod_price_simple1' => $prod_price_simple1 , 'num'  => $num1  , 'quantity' => $quantity); 
   $resultArray = array();
   array_push($resultArray,$json);
   echo json_encode($resultArray , JSON_UNESCAPED_UNICODE );
   ?>