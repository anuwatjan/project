<?php


    @session_start();
   	
    require_once '../includedb/condb.php';  


    $product_id = $_POST['product_id'];

    $name = $_POST['name'];
    
    if( $name == 'b'){

        $_SESSION['store'][$product_id][0]++;

    }else{
   
      if($_SESSION['store'][$product_id]['0'] > 1){

        // เช็คว่า ถ้า เหลือ 1 ให้เอาออกเลย 

        if($_SESSION['store'][$product_id]['0'] == 1){

             unset($_SESSION['store'][$product_id]); 
          
        }else{

        $_SESSION['store'][$product_id][0]--;

        }

      }

    }

        $resultArray = array();
        $arrayBill = array();
        $arrayBill = array("si" => 'YES' );
        array_push($resultArray , $arrayBill);


  
    echo json_encode($resultArray);

















?>