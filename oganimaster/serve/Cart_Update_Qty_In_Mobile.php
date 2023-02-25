<?php 

session_start();

require_once '../includedb/condb.php'; 


$cart_id = $_POST['cart_id'] ; 

$quantity = $_POST['quantity'] ; 

$sql_p = "SELECT * FROM akksofttech_cart WHERE cart_id = '".$cart_id."' " ; 

$que_p = mysqli_query($conn , $sql_p ) ;

$res_p = mysqli_fetch_array($que_p) ; 

$num_p = mysqli_num_rows($que_p) ; 

$quantity_p = $res_p['quantity'] ; 

$prod_id = $res_p['prod_id'] ; 

$price_p = $res_p['prod_price_simple'] ; 

if(!$num_p){

    $coms = "NOS" ; 

}else{


    $sql =  "UPDATE  akksofttech_cart SET quantity = (quantity  +  ( ($quantity *  1  ) - quantity ) )  WHERE cart_id = '".$cart_id."' "; 

    $que = mysqli_query($conn , $sql ) ;

    if($que){

        $coms = "YES"  ; 

    }else{

        $coms = "NO"  ; 

    }

}

$json=array('status'=> $coms , 'prod_id' => $prod_id ,'priceqty'=> ( $price_p *  ( $quantity_p + ( ( $quantity  ) - $quantity_p) )  ) 

) ;               

$resultArray = array();

array_push($resultArray,$json);

echo json_encode($resultArray);

?>