<?php


    @session_start();
    // session_destroy();
   		require_once '../includedb/condb.php';  
        
        
        $product_id = $_POST['product_id']; //รับค่าเดี่ยวไปก่อน


       //เช็คว่าเคยมีในตะกร้ายัง  หลัก

                if( $product_id > 0 ){
                    if ($_SESSION['store'][$product_id] > 1 ){
                          $_SESSION['store'][$product_id][0]++;
                    }else{
                    $_SESSION['store'][$product_id] = array(1);
                    } 
                }else{
                    $_SESSION['store']['0'] = array(1);  
                }

       

                     
                   
                     $sql = "SELECT * FROM `akksofttech_product`  WHERE `prod_id` IN (".implode(', ', array_keys($_SESSION['store'])).")";
                        $result = mysqli_query($conn,$sql) or die(mysqli_error());

                        $mainArray = array();
                        while ($rowr = mysqli_fetch_array($result, MYSQLI_ASSOC))	{
                            $arrayBill = array();
                            $arrayBill = array(
                                "product_id" => $rowr['prod_id'] ,
                                "category_id" => $rowr['cat_id'] ,
                                "product_img" => $rowr['prod_image'] ,
                                "product_name" => $rowr['prod_name'] ,
                                "product_price" => $rowr['prod_price'] ,
                                "product_quantity" =>  $_SESSION['store'][$rowr['prod_id']]['0'] ,
                                "sprod_id" => 0  ,
                                "sprod_name" => "-" ,
                                "sprod_sku" => "0"   );
                            array_push($mainArray, $arrayBill);
                        }		
                        
echo json_encode($mainArray );
        
?>