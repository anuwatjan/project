<?php


    @session_start();

   		require_once '../includedb/condb.php';  
        
        
        $product_id = $_POST['product_id']; //รับค่าเดี่ยวไปก่อน
        $show_sub_prod_id = $_POST['show_sub_prod_id']; //รหัสสินค้าย่อย
        $mainArray = array();
        $_SESSION['store'][$product_id] = array(1);

                                        // เช็คเมนูย่อย 
                                            $sql_sub = "SELECT * FROM `akksofttech_subproduct` WHERE  `prod_id` IN (".implode(', ', array_keys($_SESSION['store'])).")";
                                            $rec_sub = mysqli_query($conn ,$sql_sub);
                                            $qecc_sub = mysqli_fetch_array($rec_sub);
                                            $necc_sub = mysqli_num_rows($rec_sub); 
                                            if($necc_sub > 0){ //กรณีมีเมนูย่อย
                                                    /// ตรวจเช็คเมนูย่อยว่ารับค่ามายัง กรณียังไม่ได้รับค่า
                                                    if($show_sub_prod_id == 0 || $show_sub_prod_id == ""){
                                                        $json=array('status'=> "NOS" , 'suu'=> 'กรณีมีเมนูย่อย' ); 
                                                        $resultArray = array();
                                                        array_push($resultArray,$json);
                                                        echo json_encode($resultArray);
                                                        // จบการทำงาน
                                                        exit();
                                                    }else{
                                                        //// กรณีเลือกมาตรวจสอบข้อมูล
                                                         $sql_sub2 = "SELECT * FROM `akksofttech_subproduct` as a INNER JOIN  akksofttech_product as b ON a.prod_id = b.prod_id 
                                                                     WHERE  a.`sprod_id` = '".$show_sub_prod_id."'  ";
                                                        $rec_sub2 = mysqli_query($conn ,$sql_sub2);
                                                        $spromainArray = array();
                                                        while($qecc_sub2 = mysqli_fetch_array($rec_sub2,MYSQLI_BOTH))	{	
                                                            $sproarrayBill = array();
                                                            $sproarrayBill = array( 
                                                                                "product_id" => $qecc_sub2['prod_id'] ,
                                                                                "category_id" => $qecc_sub2['cat_id'] ,
                                                                                "product_img" => $qecc_sub2['prod_image'] ,
                                                                                "product_name" => $qecc_sub2['prod_name'] ,
                                                                                "product_price" => $qecc_sub2['sprod_price'] ,
                                                                                "sproduct_id" => $show_sub_prod_id ,
                                                                                "sprod_name" => $qecc_sub2['sprod_name'] ,
                                                                            );
                                                            array_push($spromainArray , $sproarrayBill);
                                                        }
                                                    }
                                                    
                                            }else{

                                                // ไม่มีเมนุย่อยเลย เอาลงได้ปกติ 
                                                                                                    
                                                    // if ($_SESSION['store'][$product_id] > 1 ){
                                                    //     $_SESSION['store'][$product_id][0]++;
                                                    // }
                    
                                                    
                                                    $sql = "SELECT * FROM `akksofttech_product`  WHERE `prod_id` IN (".implode(', ', array_keys($_SESSION['store'])).")";
                                                    $result = mysqli_query($conn,$sql) or die(mysqli_error());
                                                    $promainArray = array();
                                                    while ($rowr = mysqli_fetch_array($result, MYSQLI_ASSOC))
                                                    {
                                                    $proarrayBill = array();
                                                    $proarrayBill = array(
                                                    "product_id" => $rowr['prod_id'] ,
                                                    "category_id" => $rowr['cat_id'] ,
                                                    "product_img" => $rowr['prod_image'] ,
                                                    "product_name" => $rowr['prod_name'] ,
                                                    "product_price" => $rowr['prod_price'] ,
                                                    "sproduct_id" => 0  ,
                                                    "sprod_name" => "-" ,
                                                    "product_quantity" =>  $_SESSION['store'][$rowr['prod_id']]['0'] ,
                                                     );
                                                        array_push($promainArray, $proarrayBill);                                                      
                                                    }		
                                            
                                      
                                            }       
                                            
                                                    $arrayBill = array();
                                                                $arrayBill = array(
                                                                "product" =>  $promainArray , 
                                                                "sproduct" => $spromainArray
                                                                );
                                                        array_push($mainArray, $arrayBill);         
echo json_encode($mainArray);
        
?>