<?php


    @session_start();

   		require_once '../includedb/condb.php';  


        // echo print_r($_POST);

        $mainArray = array();

        $product_id = $_POST['product_id']; //รับค่าเดี่ยวไปก่อน
        $show_sub_prod_id = $_POST['show_sub_prod_id']; //รหัสสินค้าย่อย
        $show_price_simple_total = $_POST['show_price_simple_total']; //ราคารวมจริงทั้งหมด
        $show_category = $_POST['show_category'];  //รหัสหมวดหมู่
        $show_sub_category = $_POST['show_sub_category']; ///รหัสหมวดหมู่ย่อย
        $show_sub_prodone_id = $_POST['show_sub_prodone_id']; //รหัสสินค้าย่อย 1 
        $show_quantity_de = $_POST['show_quantity_de'];  //จำนวน
        $show_sto_id = $_POST['show_sto_id']; //รหัสร้านค้า
        $ip = $_SERVER['REMOTE_ADDR'] ; // ไอพี
        $cus_id = $_SESSION['akksofttechsess_cusid'] ;  //รหัสผู้ซื้อ
        $cus_name = $_SESSION['akksofttechsess_cusname'] ;  //ชื่อผู้ซื้อ
        $message = $_POST['message'] ; // หมายเหตุ


        // ตรวจสอบว่ามีค่าไหม
        
                if( $product_id > 0 ){

                     $_SESSION['store1'][$product_id] = array(1);
                     
                }else{

                    $_SESSION['store1']['0'] = array(1);  

                }
                


            // เช็คเมนูหลัก 
            $sql = "SELECT * FROM `akksofttech_product` WHERE  `prod_id` IN (".implode(', ', array_keys($_SESSION['store1'])).")";
            $rec = mysqli_query($conn ,$sql);
            $qecc = mysqli_fetch_array($rec);
            $necc = mysqli_num_rows($rec); 

            // ราคาสินค้า
            $prod_price_simple = $qecc['prod_price'];

            // เช็คเมนูย่อย 
            $sql_sub = "SELECT * FROM `akksofttech_subproduct` WHERE  `prod_id` IN (".implode(', ', array_keys($_SESSION['store1'])).")";
            $rec_sub = mysqli_query($conn ,$sql_sub);
            $qecc_sub = mysqli_fetch_array($rec_sub);
            $necc_sub = mysqli_num_rows($rec_sub); 

            // เช็คเมนูย่อย 1
            // $sql_sub1 = "SELECT * FROM `akksofttech_subproduct_one` WHERE `sprod_id` = '".$show_sub_prod_id."' AND `prod_id` IN (".implode(', ', array_keys($_SESSION['store'])).")";
            // $rec_sub1 = mysqli_query($conn ,$sql_sub1);
            // $qecc_sub1 = mysqli_fetch_array($rec_sub1);
            // $necc_sub1 = mysqli_num_rows($rec_sub1); 

            if($necc_sub > 0){ //กรณีมีเมนูย่อย

                /// ตรวจเช็คเมนูย่อยว่ารับค่ามายัง กรณีรับค่าแล้ว 
                
                if($show_sub_prod_id == 0 || $show_sub_prod_id == ""){
                    
                       $json=array('status'=> "NOS" , 'suu'=> 'กรณีมีเมนูย่อย' ); 
                       $resultArray = array();
                       array_push($resultArray,$json);
                       echo json_encode($resultArray);
                       // จบการทำงาน
                       exit();

                }else{

                    //// กรณีเลือกมาตรวจสอบข้อมูล
                    $sql_sub2 = "SELECT * FROM `akksofttech_subproduct` WHERE  `sprod_id` = '".$show_sub_prod_id."'" ;
                    $rec_sub2 = mysqli_query($conn ,$sql_sub2);
                    $qecc_sub2 = mysqli_fetch_array($rec_sub2);
                    $necc_sub2 = mysqli_num_rows($rec_sub2); 


                    $sprod_id = $show_sub_prod_id;
                    $sprod_name = $qecc_sub2['sprod_name'];
                    $sprod_sku  = $qecc_sub2['sprod_sku'];
                    $prod_price_simple = $qecc_sub2['sprod_price'];

                }

            }else{

                $sprod_id = 0 ;
                $sprod_name = "-";
                $sprod_sku  = "0";

            }


            // //////////////////////////////////////////////////////////// ย่อย 1 ///////////////////////////////////////////////



            if($necc_sub1 > 0){ //กรณีมีเมนูย่อย
                /// ตรวจเช็คเมนูย่อยว่ารับค่ามายัง กรณีรับค่าแล้ว 
                if($show_sub_prodone_id == 0 || $show_sub_prodone_id == ""){
                    
                       $json=array('status'=> "NOS1" , 'suu'=> 'กรณีมีเมนูย่อย1' ); 
                       $resultArray = array();
                       array_push($resultArray,$json);
                       echo json_encode($resultArray);
                       // จบการทำงาน
                       exit();
                }else{

                    // เช็คเมนูย่อย 1
                        $sql_sub12 = "SELECT * FROM `akksofttech_subproduct_one` WHERE  `sprodone_id` = '".$show_sub_prodone_id."'" ;
                        $rec_sub12 = mysqli_query($conn ,$sql_sub12);
                        $qecc_sub12 = mysqli_fetch_array($rec_sub12);

                }
            
            }else{//กรณีไม่มีข้อมูล
                // $prod_price_simple = 0;

                $sprodone_id =0;
                $sprodone_name = "-";
                $sprodone_sku  = "0";

            }


            // //////////////////////////////////////////////////////////// ย่อย 1 ///////////////////////////////////////////////
            

                $arrayBill = array();

                 $arrayBill = array(

                                "product_id" => $qecc['prod_id'] ,
                                "product_img" => $qecc['prod_image'] ,
                                "product_name" => $qecc['prod_name'] ,
                                "product_price" => $prod_price_simple ,
                                "product_quantity" =>  $show_quantity_de ,
                                "sprod_name" => $sprod_name ,
                                "sprodone_name" => $sprodone_name ,        
                                "message" => $message ,
                                
                            );

                            array_push($mainArray, $arrayBill);


               
echo json_encode($mainArray);






?>