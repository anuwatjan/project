<?php 
   session_start();
   require_once '../includedb/condb.php'; 
        $show_price_simple_total = $_POST['show_price_simple_total']; //ราคารวมจริงทั้งหมด
        $show_category = $_POST['show_category'];  //รหัสหมวดหมู่
        $show_sub_category = $_POST['show_sub_category']; ///รหัสหมวดหมู่ย่อย
        $prod_id = $_POST['prod_id'];  //รหัสสินค้า
        $st = $_POST['st'];  //รหัสสินค้า
        $show_sub_prod_id = $_POST['show_sub_prod_id']; //รหัสสินค้าย่อย
        $show_sub_prodone_id = $_POST['show_sub_prodone_id']; //รหัสสินค้าย่อย 1 
        $show_quantity_de = $_POST['show_quantity_de'];  //จำนวน
        $show_sto_id = $_POST['show_sto_id']; //รหัสร้านค้า
        $ip = $_SERVER['REMOTE_ADDR'] ; // ไอพี
        $cus_id = $_SESSION['akksofttechsess_cusid'] ;  //รหัสผู้ซื้อ
        $cus_name = $_SESSION['akksofttechsess_cusname'] ;  //ชื่อผู้ซื้อ
        $message = $_POST['message'] ; // หมายเหตุ
        $ss = "SELECT * FROM `akksofttech_cart` WHERE  cus_id  = '".$cus_id."' "  ; 
        $qq = mysqli_query ($conn , $ss) ;
        $rr = mysqli_fetch_array($qq) ;
        $nn = mysqli_num_rows($qq) ; 
        $date = date('Y-m-d H:i:s') ; 
            // เช็คเมนูหลัก 
            $sql = "SELECT * FROM `akksofttech_product` WHERE  `prod_id` = '".$prod_id."'" ;
            $rec = mysqli_query($conn ,$sql);
            $qecc = mysqli_fetch_array($rec);
            $necc = mysqli_num_rows($rec); 


            $prod_price_simple = $qecc['prod_price'];
            $sprodone_image = $qecc['prod_image'];


            // เช็คเมนูย่อย 
            $sql_sub = "SELECT * FROM `akksofttech_subproduct` WHERE  `prod_id` = '".$prod_id."'" ;
            $rec_sub = mysqli_query($conn ,$sql_sub);
            $qecc_sub = mysqli_fetch_array($rec_sub);
            $necc_sub = mysqli_num_rows($rec_sub); 


           // เช็คเมนูย่อย 1
           $sql_sub1 = "SELECT * FROM `akksofttech_subproduct_one` WHERE `sprod_id` = '".$show_sub_prod_id."' AND `prod_id` = '".$prod_id."'" ;
           $rec_sub1 = mysqli_query($conn ,$sql_sub1);
           $qecc_sub1 = mysqli_fetch_array($rec_sub1);
           $necc_sub1 = mysqli_num_rows($rec_sub1); 


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

                    /// จัดเก็บข้อมูล
                    $sprod_id = $show_sub_prod_id;
                    $sprod_name = $qecc_sub2['sprod_name'];
                    $sprod_sku  = $qecc_sub2['sprod_sku'];

                    // $prod_price_simple = $qecc_sub2['sprod_price'];

                    $prod_price_simple = $show_price_simple_total;

                    // $sprodone_image = $qecc_sub2['sprod_image'];
                }


            }else{//กรณีไม่มีข้อมูล
                // $prod_price_simple = 0;

                $sprod_id =0;
                $sprod_name = "-";
                $sprod_sku  = "0";

            }



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
                      

                        /// จัดเก็บข้อมูล
                        $sprodone_id = $show_sub_prodone_id;
                        $sprodone_name = $qecc_sub12['sprodone_name'];
                        $sprodone_sku  = $qecc_sub12['sprodone_sku'];
                        // $prod_price_simple = $qecc_sub12['sprodone_price'];

                        $prod_price_simple = $show_price_simple_total;

                      
                        // $sprodone_image = $qecc_sub12['sprodone_image'];

                }


            }else{//กรณีไม่มีข้อมูล
                // $prod_price_simple = 0;

                $sprodone_id =0;
                $sprodone_name = "-";
                $sprodone_sku  = "0";

            }


            //////////////  รูปแบบนี้คือรูปแบบ เดิมใช้ไหม /////////////////

                //////  ตรวจสอบ หมวดหลัก 
                $sqlcat = "SELECT * FROM `akksofttech_category` WHERE `cat_id` = '".$qecc['cat_id']."'" ;
                $reccat = mysqli_query($conn ,$sqlcat);
                $qecccat = mysqli_fetch_array($reccat);

                if($qecc['cat_id'] > 0){
                    $cat_id = $qecc['cat_id'];
                    $cat_name = $qecccat['cat_name'];
                }else{
                    $cat_id = 0;
                    $cat_name = "-";
                }

                //////  ตรวจสอบ หมวดหลักย่อย 
                $sqlscate = "SELECT * FROM `akksofttech_subcategory` WHERE `scate_id` = '".$qecc['scate_id']."'" ;
                $recscate = mysqli_query($conn ,$sqlscate);
                $qeccscate = mysqli_fetch_array($recscate);

                if($qecc['scate_id'] > 0){
                    $scat_id = $qecc['scate_id'];
                    $scat_name = $qeccscate['scate_name'];
                }else{
                    $scat_id = 0;
                    $scat_name = "-";
                }

                

                if($st == "det"){
                    $sql_cartsto_id2 = "DELETE FROM `akksofttech_cart` WHERE   `mem_id` = '".$cus_id."'   " ;
                    $rec_cartsto_id2 = mysqli_query($conn ,$sql_cartsto_id2);
                }



                /// เช็คร้านว่ามีร้านซำกันหรือไม่
                $sql_cartsto_id = "SELECT * FROM `akksofttech_cart` WHERE  `sto_id` <> '".$qecc['sto_id']."'  AND  `mem_id` = '".$cus_id."'   " ;
                $rec_cartsto_id = mysqli_query($conn ,$sql_cartsto_id);
                $necc_cartsto_id = mysqli_num_rows($rec_cartsto_id); 
                //มีร้านอื่นอยู่
                if($necc_cartsto_id > 0){

                    $json=array('status'=> "NOSsto" , 'suu'=> 'มีร้านอื่น' ); 
                    $resultArray = array();
                    array_push($resultArray,$json);
                    echo json_encode($resultArray);
                    exit();
                }



        //  echo 'บันทึก';
                //////// เช็คค่าสถานะ ว่ามีการบันทึกหรือยัง
                $sql_cart = "SELECT * FROM `akksofttech_cart` WHERE  `prod_id` = '".$qecc['prod_id']."' AND  `sprod_id` = '".$sprod_id."' AND  `sprodone_id` = '".$sprodone_id."' AND  `mem_id` = '".$cus_id."'   " ;
                $rec_cart = mysqli_query($conn ,$sql_cart);
                $qecc_cart = mysqli_fetch_array($rec_cart);
                $necc_cart = mysqli_num_rows($rec_cart); 
                if(empty($message)){
                    $message = "-" ; 
                }else{
                    $message ; 
                } 
                if( $necc_cart  > 0){
                    // เช็คว่า โน๊ตอันเดียวกันไหม
                        if($message != $qecc_cart['message']){
                            $seee1 = "INSERT INTO `akksofttech_cart` (`po_id`,  `pod_create` , `sto_id` , `cat_id` , `cat_name` , `scat_id`  , `scat_name` , `prod_id` ,
                            `prod_name` , `prod_price_simple` , `sprod_id` , `sprod_name`, `sprodone_id`, `sprodone_name` , `prod_sku`, `sprod_sku`, `sprodone_sku` ,
                            `prod_brand`, `prod_image`, `quantity` , `cus_id`, `mem_id`,   `mem_name`, `pod_ip`, `pod_start_date` , `message` ) 
                            VALUES ( '0' , '".$date."' , '".$show_sto_id."' , '".$cat_id."' , '".$cat_name."' , '".$scat_id."' ,  '".$scat_name."' ,
                            '".$qecc['prod_id']."'  ,   '".$qecc['prod_name']."' ,  '".$prod_price_simple."' ,  '".$sprod_id."' , 
                            '".$sprod_name."' , '".$sprodone_id."' ,  '".$sprodone_name."' , '".$qecc['prod_sku']."' ,  '".$sprod_sku."' ,  '".$sprodone_sku."' ,
                            '".$qecc['prod_brand']."' ,  '".$sprodone_image."' ,  '".$show_quantity_de."'  , '".$cus_id."' , '".$cus_id."' , '".$cus_name."' , '".$ip."' , '".date('Y-m-d H:i:s')."' , '".$message."'   )" ;           
                        }else if($message == "-"){
                        $seee1 = "UPDATE `akksofttech_cart` SET  `quantity` = `quantity` +  '".$show_quantity_de."' WHERE  `prod_id` = '".$qecc['prod_id']."' AND  `sprod_id` = '".$sprod_id."' AND  `sprodone_id` = '".$sprodone_id."' AND  `mem_id` = '".$cus_id."' " ; 
                        }else{
                            $seee1 = "UPDATE `akksofttech_cart` SET  `quantity` = `quantity` +  '".$show_quantity_de."' WHERE  `prod_id` = '".$qecc['prod_id']."' AND  `sprod_id` = '".$sprod_id."' AND  `sprodone_id` = '".$sprodone_id."' AND  `mem_id` = '".$cus_id."' " ; 
                        }
                    }else{
                        if($message != $qecc_cart['message']){
                     $seee1 = "INSERT INTO `akksofttech_cart` (`po_id`,  `pod_create` , `sto_id` , `cat_id` , `cat_name` , `scat_id`  , `scat_name` , `prod_id` ,
                    `prod_name` , `prod_price_simple` , `sprod_id` , `sprod_name`, `sprodone_id`, `sprodone_name` , `prod_sku`, `sprod_sku`, `sprodone_sku` ,
                    `prod_brand`, `prod_image`, `quantity` , `cus_id`, `mem_id`,   `mem_name`, `pod_ip`, `pod_start_date` , `message` ) 
                    VALUES ( '0' , '".$date."' , '".$show_sto_id."' , '".$cat_id."' , '".$cat_name."' , '".$scat_id."' ,  '".$scat_name."' ,
                    '".$qecc['prod_id']."'  ,   '".$qecc['prod_name']."' ,  '".$prod_price_simple."' ,  '".$sprod_id."' , 
                    '".$sprod_name."' , '".$sprodone_id."' ,  '".$sprodone_name."' , '".$qecc['prod_sku']."' ,  '".$sprod_sku."' ,  '".$sprodone_sku."' ,
                    '".$qecc['prod_brand']."' ,  '".$sprodone_image."' ,  '".$show_quantity_de."'  , '".$cus_id."' , '".$cus_id."' , '".$cus_name."' , '".$ip."' , '".date('Y-m-d H:i:s')."' , '".$message."'   )" ;        
                }else if($message == "-"){
                    $seee1 = "INSERT INTO `akksofttech_cart` (`po_id`,  `pod_create` , `sto_id` , `cat_id` , `cat_name` , `scat_id`  , `scat_name` , `prod_id` ,
                    `prod_name` , `prod_price_simple` , `sprod_id` , `sprod_name`, `sprodone_id`, `sprodone_name` , `prod_sku`, `sprod_sku`, `sprodone_sku` ,
                    `prod_brand`, `prod_image`, `quantity` , `cus_id`, `mem_id`,   `mem_name`, `pod_ip`, `pod_start_date` , `message` ) 
                    VALUES ( '0' , '".$date."' , '".$show_sto_id."' , '".$cat_id."' , '".$cat_name."' , '".$scat_id."' ,  '".$scat_name."' ,
                    '".$qecc['prod_id']."'  ,   '".$qecc['prod_name']."' ,  '".$prod_price_simple."' ,  '".$sprod_id."' , 
                    '".$sprod_name."' , '".$sprodone_id."' ,  '".$sprodone_name."' , '".$qecc['prod_sku']."' ,  '".$sprod_sku."' ,  '".$sprodone_sku."' ,
                    '".$qecc['prod_brand']."' ,  '".$sprodone_image."' ,  '".$show_quantity_de."'  , '".$cus_id."' , '".$cus_id."' , '".$cus_name."' , '".$ip."' , '".date('Y-m-d H:i:s')."' , '".$message."'   )" ;        
                }else{
                }   $seee1 = "INSERT INTO `akksofttech_cart` (`po_id`,  `pod_create` , `sto_id` , `cat_id` , `cat_name` , `scat_id`  , `scat_name` , `prod_id` ,
                `prod_name` , `prod_price_simple` , `sprod_id` , `sprod_name`, `sprodone_id`, `sprodone_name` , `prod_sku`, `sprod_sku`, `sprodone_sku` ,
                `prod_brand`, `prod_image`, `quantity` , `cus_id`, `mem_id`,   `mem_name`, `pod_ip`, `pod_start_date` , `message` ) 
                VALUES ( '0' , '".$date."' , '".$show_sto_id."' , '".$cat_id."' , '".$cat_name."' , '".$scat_id."' ,  '".$scat_name."' ,
                '".$qecc['prod_id']."'  ,   '".$qecc['prod_name']."' ,  '".$prod_price_simple."' ,  '".$sprod_id."' , 
                '".$sprod_name."' , '".$sprodone_id."' ,  '".$sprodone_name."' , '".$qecc['prod_sku']."' ,  '".$sprod_sku."' ,  '".$sprodone_sku."' ,
                '".$qecc['prod_brand']."' ,  '".$sprodone_image."' ,  '".$show_quantity_de."'  , '".$cus_id."' , '".$cus_id."' , '".$cus_name."' , '".$ip."' , '".date('Y-m-d H:i:s')."' , '".$message."'   )" ;        
            }                      
                $reee1 = mysqli_query($conn ,$seee1);
                if($reee1){
                     $coms = 'YES';
                }else{
                    $coms = 'NO';
                }  
                $suu222 = $seee1;
            $json=array('status'=> $coms , 'suu'=> $suu222 ); 
            $resultArray = array();
            array_push($resultArray,$json);
            echo json_encode($resultArray , JSON_UNESCAPED_UNICODE );

   
   ?>