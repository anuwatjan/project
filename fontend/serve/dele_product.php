<?php


    @session_start();
   		require_once '../includedb/condb.php';  




    $product_id = $_POST['product_id'];



        unset($_SESSION['store'][$product_id]); 
 

        $resultArray = array();
        $arrayBill = array();
        $arrayBill = array("si" => 'YES' );
        array_push($resultArray , $arrayBill);


  
    echo json_encode($resultArray);



















?>