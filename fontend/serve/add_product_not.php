<?php


    @session_start();
    // session_destroy();
   		require_once '../includedb/condb.php';  

        // $product_id = array('a','1','ก') ;
        
        
        $product_id = $_POST['product_id']; //รับค่าเดี่ยวไปก่อน

        // เอามายัดใส่ array รวมๆ แปลว่า มีค่ารวมใน array นี่แล้ว และมันแสดง แบบ ("","","") ให้ impord

        $_SESSION['store'][]  = $product_id ;
       

            echo $sql = "SELECT * FROM `akksofttech_product`  WHERE `prod_id` IN (".implode(', ', array_keys($_SESSION['store'])).") ";

            foreach($_SESSION['store'] as $key ){

                $user_responses = $key;

          

            }


              echo $sql1 = "INSERT INTO cart (p_n)  VALUES ('".$_SESSION['store']."') " ;

             $re = mysqli_query($conn ,$sql1); 


                 //เช็คว่าเคยมีในตะกร้ายัง  หลัก

                // if( $product_id > 0 ){
                //     if ($_SESSION['store'][$product_id] > 1 ){
                //           $_SESSION['store'][$product_id][0]++;
                //     }else{
                //     $_SESSION['store'][$product_id] = array(0);
                //     } 
                // }else{
                //     $_SESSION['store']['0'] = array(1);  
                // }


                   // หาผลรวมของตะกร้า

             


 
                     
                   
                    //  $sql = "SELECT * FROM `akksofttech_product`  WHERE `prod_id` IN (".implode(', ', array_keys($_SESSION['store'])).")";
                    //     $result = mysqli_query($conn,$sql) or die(mysqli_error());

                    //     $mainArray = array();
                    //     while ($rowr = mysqli_fetch_array($result, MYSQLI_ASSOC))	{
                    //         $arrayBill = array();
                    //         $arrayBill = array(
                    //             "product_id" => $rowr['prod_id'] ,
                    //             "category_id" => $rowr['cat_id'] ,
                    //             "product_img" => $rowr['prod_image'] ,
                    //             "product_name" => $rowr['prod_name'] ,
                    //             "product_price" => $rowr['prod_price'] ,
                    //             "product_quantity" =>  $_SESSION['store'][$rowr['prod_id']]['0'] ,
                    //             "sprod_id" => 0  ,
                    //             "sprod_name" => "-" ,
                    //             "sprod_sku" => "0"   );
                    //         array_push($mainArray, $arrayBill);
                    //     }		
                        
echo json_encode($mainArray );
        
?>