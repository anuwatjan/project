<?php 
session_start();
	 
	require_once '../includedb/condb.php'; //$dbh  

	$cart_id = $_POST['cart_id'];



	$cus_id = $_SESSION['akksofttechsess_cusid'];


// check list prod have?

			 $sqll = "SELECT * FROM `akksofttech_cart` WHERE  cart_id = '".$cart_id."' ";

            $sthes  = mysqli_query($conn , $sqll) ; 

            $sthesnum = mysqli_num_rows($sthes) ; 

            $result  = mysqli_fetch_array($sthes);

            $prod_id = $result['prod_id'] ; 

            if($sthesnum != 0 ){

                $sql_i = "DELETE FROM akksofttech_cart WHERE cart_id = '".$cart_id."'";

                $stmtt = mysqli_query($conn , $sql_i) ; 

                if($stmtt){

                    $coms = "YES";

                }else{

                    $coms = "NO";

                }
    

            }else{

                $coms = "NOS";

            }


			$json=array('status'=> $coms ,  'cart_id'=> $cart_id , 'prod_id'  => $prod_id); 
			$resultArray = array();
			array_push($resultArray,$json);
			echo json_encode($resultArray);




?>
