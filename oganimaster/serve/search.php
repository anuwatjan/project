<?php
require_once '../includedb/condb.php'; 


$sql = "SELECT * FROM akksofttech_product WHERE prod_name LIKE '%{$_POST['itemname']}%'";
$query = mysqli_query($conn , $sql) ; 
$num = mysqli_num_rows($query);

 if($num < 1 && $num = NULL ){
        $comn = "NODATA" ; 
 }else{

   $reslutArray = array();  
        while($data = mysqli_fetch_array($query,MYSQLI_BOTH))	{
      
                
                $sql3 = "SELECT sum(quantity) as quantity FROM `akksofttech_cart` WHERE   `mem_id` = '".$cus_id."' AND prod_id = '".$data['prod_id']."'  " ;
                $query3 = mysqli_query($conn ,$sql3);
                $data3 = mysqli_fetch_array($query3);

                // เช็คว่ามีย่อยไหมจะได้ดึงราคาเริ่มต้น
                $sql4 = "SELECT * FROM `akksofttech_subproduct` WHERE   prod_id = '".$data['prod_id']."'  ORDER BY sprod_price ASC  " ;
                $query4 = mysqli_query($conn ,$sql4);
			    $num4 = mysqli_num_rows($query4);
                $data4 = mysqli_fetch_array($query4,MYSQLI_BOTH);

                    $arrayBill = array( 
                                        "comn" => $comn , 
                                        "product_num" => $num ,
                                        "prod_id" => $data['prod_id'] ,
                                        "prod_name" => $data['prod_name'] ,
                                        "prod_image" => $data['prod_image'] ,
                                        "prod_price" =>  $data['prod_price']  ,    
                                        "sprod_price" => $data4['sprod_price'] ,   
                                        "prod_detail" => $data['prod_detail'] ,
                                        "cat_id" => $cat_id ,      
                                        // ส่วนของผู้ซื้อ
                                        "quantity" => $data3['quantity'],
                                        // ราคาเริ่มต้น
									    "num4" => $num4 ,
                                  

                                    );
                    array_push($reslutArray , $arrayBill);
            }	

        }
        echo json_encode($reslutArray);
?>