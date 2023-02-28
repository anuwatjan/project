<?php 
   session_start();

   require_once '../includedb/condb.php'; 

   $sto_id = $_POST['sto_id'];  //รหัสสินค้า


            // เช็คเมนูหลัก 
            $sql = "SELECT * FROM `akksofttech_member_store` WHERE  `sto_id` = '".$sto_id."'" ;
            $rec = mysqli_query($conn ,$sql);
            $qecc = mysqli_fetch_array($rec);
            $necc = mysqli_num_rows($rec); 
            $sto_id = $qecc['sto_id'];
            $sto_address = $qecc['sto_address'];
            $sto_logo = $qecc['sto_logo'];
            $sto_province = $qecc['sto_province'];
            $sto_zipcode = $qecc['sto_zipcode'];
            $sto_name = $qecc['sto_name'];

        
     
    $json=array('store_id' => $sto_id , 'sto_logo' => $sto_logo , 'sto_name' => $sto_name , 'address' => "" . $sto_address."". ", " . $sto_province."".  "," . $sto_zipcode ); 
    $resultArray = array();
    array_push($resultArray,$json);
    echo json_encode($resultArray , JSON_UNESCAPED_UNICODE );
    ?>