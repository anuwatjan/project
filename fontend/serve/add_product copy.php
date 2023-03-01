<?php


    @session_start();

   		require_once '../includedb/condb.php';  

        // echo "<pre>";
        // print_r(var_export($_SESSION));
        // echo "</pre>";

        $product_id = $_POST['product_id'];  //รหัสสินค้า
        $show_sub_prod_id = $_POST['show_sub_prod_id']; //รหัสสินค้าย่อย
        $show_price_simple_total = $_POST['show_price_simple_total']; //ราคารวมจริงทั้งหมด
        $show_category = $_POST['show_category'];  //รหัสหมวดหมู่
        $show_sub_category = $_POST['show_sub_category']; ///รหัสหมวดหมู่ย่อย
        $st = $_POST['st'];  
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

    $data_all = array();

    $_SESSION['store'][$product_id] = array(1);
    $_SESSION['store1'][$show_sub_prod_id] = array(1);

    // เช็คหลักก
        $sql = "SELECT * FROM `akksofttech_product` WHERE 
       `prod_id` IN (".implode(', ', array_keys($_SESSION['store'])).")";
        $rec = mysqli_query($conn ,$sql);
        $qecc = mysqli_fetch_array($rec);
        $necc = mysqli_num_rows($rec); 

    // เช็คย่อย
        $sql_sub = "SELECT * FROM `akksofttech_subproduct` WHERE  
        `prod_id` IN (".implode(', ', array_keys($_SESSION['store'])).")";
        $rec_sub = mysqli_query($conn ,$sql_sub);
        $qecc_sub = mysqli_fetch_array($rec_sub);
        $necc_sub = mysqli_num_rows($rec_sub); 

     // เช็คเมนูย่อย 1
        //    $sql_sub1 = "SELECT * FROM `akksofttech_subproduct_one` WHERE 
        //    `sprod_id` IN (".implode(', ', array_keys($_SESSION['store1'])).") AND  `prod_id` IN (".implode(', ', array_keys($_SESSION['store'])).")";
        //    $rec_sub1 = mysqli_query($conn ,$sql_sub1);
        //    $qecc_sub1 = mysqli_fetch_array($rec_sub1);
        //    $necc_sub1 = mysqli_num_rows($rec_sub1); 

            if($necc_sub > 0){ //กรณีมีเมนูย่อย
                /// ตรวจเช็คเมนูย่อยว่ารับค่ามายัง กรณีรับค่าแล้ว 
                if($_SESSION['store1'] == 0 || $_SESSION['store1'] == ""){
                    
                       $json=array('status'=> "NOS" , 'suu'=> 'กรณีมีเมนูย่อย' ); 
                       $resultArray = array();
                       array_push($resultArray,$json);
                       echo json_encode($resultArray);
                       // จบการทำงาน
                       exit();

                }else{
                    //// กรณีเลือกมาตรวจสอบข้อมูล

                    if( $show_sub_prod_id > 0 ){
                    if ($_SESSION['store1'][$show_sub_prod_id] > 1 ){
                          $_SESSION['store'][$show_sub_prod_id][0]++;
                    }else{
                    $_SESSION['store'][$show_sub_prod_id] = array(1);
                    } 
                    }else{
                    $_SESSION['store']['0'] = array(1);  
                    }

                    $sql_sub2 = "SELECT * FROM `akksofttech_subproduct` INNER JOIN `akksofttech_product` ON akksofttech_subproduct.prod_id = akksofttech_product.prod_id 
                    WHERE akksofttech_subproduct.`prod_id` IN (".implode(', ', array_keys($_SESSION['store'])).") AND  akksofttech_subproduct.`sprod_id` IN (".implode(', ', array_keys($_SESSION['store1'])).") " ;
                    $rec_sub2 = mysqli_query($conn ,$sql_sub2);
                    $necc_sub2 = mysqli_num_rows($rec_sub2); 

                    $mainArray = array();
                    while ($rowr_sub2 = mysqli_fetch_array($rec_sub2, MYSQLI_ASSOC))	{
                    $arrayBill_sub2 = array();
                    $arrayBill_sub2 = array(
                        "product_id" => $rowr_sub2['prod_id'] ,
                        "category_id" => $rowr_sub2['cat_id'] ,
                        "product_img" => $rowr_sub2['prod_image'] ,
                        "product_name" => $rowr_sub2['prod_name'] ,
                        "product_price" => $rowr_sub2['sprod_price'] ,
                        "product_quantity" =>  $show_quantity_de ,
                        "sprod_id" => $rowr_sub2['sprod_id'] ,
                        "sprod_name" => $rowr_sub2['sprod_name'] ,
                        "sprod_sku" => $rowr_sub2['sprod_sku'] ,
                        "message" => $message ,

                     );
                    array_push($mainArray, $arrayBill_sub2);
                    }		
                }

            }else{//กรณีไม่มีข้อมูลย่อย

                    $mainArray = array();         
                    $arrayBill = array();
                    $arrayBill = array(    
                        "sprod_id" => 0  ,
                        "sprod_name" => "-" ,
                        "sprod_sku" => "0" ,
                        "message" => $message 
                     );
                    array_push($mainArray, $arrayBill);

            }



            //  if($necc_sub1 > 0){ //กรณีมีเมนูย่อย 1
            //     /// ตรวจเช็คเมนูย่อยว่ารับค่ามายัง กรณีรับค่าแล้ว 
            //     if($show_sub_prodone_id == 0 || $show_sub_prodone_id == ""){
                    
            //            $json=array('status'=> "NOS1" , 'suu'=> 'กรณีมีเมนูย่อย1' ); 
            //            $resultArray = array();
            //            array_push($resultArray,$json);
            //            echo json_encode($resultArray);
            //            // จบการทำงาน
            //            exit();
            //     }else{

            //             // เช็คเมนูย่อย 1
            //             $sql_sub12 = "SELECT * FROM `akksofttech_subproduct_one` WHERE  `sprodone_id` = '".$show_sub_prodone_id."'" ;
            //             $rec_sub12 = mysqli_query($conn ,$sql_sub12);
            //             $qecc_sub12 = mysqli_fetch_array($rec_sub12);
                      

            //             /// จัดเก็บข้อมูล
            //             $sprodone_id = $show_sub_prodone_id;
            //             $sprodone_name = $qecc_sub12['sprodone_name'];
            //             $sprodone_sku  = $qecc_sub12['sprodone_sku'];
            //             // $prod_price_simple = $qecc_sub12['sprodone_price'];

            //             $prod_price_simple = $show_price_simple_total;

                      
            //             // $sprodone_image = $qecc_sub12['sprodone_image'];

            //     }


            // }else{//กรณีไม่มีข้อมูล
            //     // $prod_price_simple = 0;

            //     $sprodone_id =0;
            //     $sprodone_name = "-";
            //     $sprodone_sku  = "0";

            // }


            //   //////  ตรวจสอบ หมวดหลัก 
            //     $sqlcat = "SELECT * FROM `akksofttech_category` WHERE `cat_id` = '".$qecc['cat_id']."'" ;
            //     $reccat = mysqli_query($conn ,$sqlcat);
            //     $qecccat = mysqli_fetch_array($reccat);

            //     if($qecc['cat_id'] > 0){
            //         $cat_id = $qecc['cat_id'];
            //         $cat_name = $qecccat['cat_name'];
            //     }else{
            //         $cat_id = 0;
            //         $cat_name = "-";
            //     }

            //     //////  ตรวจสอบ หมวดหลักย่อย 
            //     $sqlscate = "SELECT * FROM `akksofttech_subcategory` WHERE `scate_id` = '".$qecc['scate_id']."'" ;
            //     $recscate = mysqli_query($conn ,$sqlscate);
            //     $qeccscate = mysqli_fetch_array($recscate);

            //     if($qecc['scate_id'] > 0){
            //         $scat_id = $qecc['scate_id'];
            //         $scat_name = $qeccscate['scate_name'];
            //     }else{
            //         $scat_id = 0;
            //         $scat_name = "-";
            //     }


            //     /// เช็คร้านว่ามีร้านซำกันหรือไม่
            //     $sql_cartsto_id = "SELECT * FROM `akksofttech_cart` WHERE  `sto_id` <> '".$qecc['sto_id']."'  AND  `mem_id` = '".$cus_id."'   " ;
            //     $rec_cartsto_id = mysqli_query($conn ,$sql_cartsto_id);
            //     $necc_cartsto_id = mysqli_num_rows($rec_cartsto_id); 
            //     //มีร้านอื่นอยู่
            //     if($necc_cartsto_id > 0){

            //         $json=array('status'=> "NOSsto" , 'suu'=> 'มีร้านอื่น' ); 
            //         $resultArray = array();
            //         array_push($resultArray,$json);
            //         echo json_encode($resultArray);
            //         exit();
            //     }





         


                





echo json_encode($mainArray , $mainArray_subproduct);






?>