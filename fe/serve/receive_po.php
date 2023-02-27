<?php session_start(); ?>

<?php 
		require_once '../includedb/condb.php';  

$po_id = $_POST['po_id'];


     $sss = "UPDATE  akksofttech_purchase_order SET po_status =  '5' ,  po_update_date = '".date('Y-m-d H:i:s')."' WHERE po_id = '".$po_id."'" ;
    
    $qqq = mysqli_query($conn , $sss) ; 

    if($qqq){

        $coms = "YES" ; 

    }else{


        $coms = "NO" ; 

    }

    $json=array('status'=> $coms ); 

$resultArray = array();

array_push($resultArray,$json);

echo json_encode($resultArray);


?>