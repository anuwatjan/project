<?php 
   session_start();
   require_once '../includedb/condb.php'; 
   $cus_id = $_SESSION['akksofttechsess_cusid'] ;  //รหัสผู้ซื้อ
   $sql = "SELECT * FROM akksofttech_cart WHERE cus_id = '".$cus_id."'" ; 
   $query = mysqli_query($conn , $sql ) ; 
   $reslutArray = array();
   while($data = mysqli_fetch_array($query,MYSQLI_BOTH))	{
    $b = "" ;
    $c = "-" ;
    $d = "NOTE :" ; 
    $arrayBill = array( 
                        "prod_name" => $data['prod_name'] ,
                        "prod_price_simple" => $data['prod_price_simple'] ,
                        "sprod_name" => $data['sprod_name'] <> "-" && $data['sprodone_name'] == "-"  ?  "<br>".$data['sprod_name'] : $b , 
                        "sprodone_name" => $data['sprodone_name'] <> "-" && "<br>".$data['sprod_name'] <> "-"  ? $data['sprod_name']."                   ".$data['sprodone_name']  :  $b , 
                        "prod_image" =>  $data['prod_image']  ,                              
                        "quantity" => $data['quantity'] ,
                        "cart_id" => $data['cart_id'] ,   
                        "message" => $data['message'] <> "-" ? "<br>".$d." ".$data['message']  :  $b ,               
                    );
    array_push($reslutArray , $arrayBill);
}		
echo json_encode($reslutArray);
   ?>