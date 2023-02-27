<?php 
   session_start();
   require_once '../includedb/condb.php'; 
   $prod_id = $_POST['product_id'];  //รหัสสินค้า


            // เช็คเมนูหลัก 
            $sql = "SELECT * FROM `akksofttech_product` WHERE  `prod_id` = '".$prod_id."'" ;
            $rec = mysqli_query($conn ,$sql);
            $qecc = mysqli_fetch_array($rec);
            $necc = mysqli_num_rows($rec); 
            $sto_id = $qecc['sto_id'];
            // เช็คเมนูย่อย 
            $sql_sub = "SELECT * FROM `akksofttech_subproduct` WHERE  `prod_id` = '".$prod_id."'" ;
            $rec_sub = mysqli_query($conn ,$sql_sub);
            $qecc_sub = mysqli_fetch_array($rec_sub);
            $necc_sub = mysqli_num_rows($rec_sub); 
            // เช็คแล้วพบว่ามีเมนูย่อย
            if($necc_sub <= 0){ 
                $coms = "YES" ; 
            }else{
                $coms = "NO" ; 
            }
     
    $json=array('status'=> $coms , 'store_id' => $sto_id , 'prod_id' => $prod_id ); 
    $resultArray = array();
    array_push($resultArray,$json);
    echo json_encode($resultArray , JSON_UNESCAPED_UNICODE );
    ?>