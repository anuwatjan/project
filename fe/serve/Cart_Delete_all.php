<?php 
session_start();
	 
	require_once '../includedb/condb.php'; //$dbh  

	$cus_id = $_SESSION['akksofttechsess_cusid'];


// check list prod have?

			 $sqll = "SELECT * FROM `akksofttech_cart` WHERE  cus_id = '".$cus_id."' ";

            $sthes  = mysqli_query($conn , $sqll) ; 

            $sthesnum = mysqli_num_rows($sthes) ; 

            $mainArray = array();

            if($sthesnum != 0 ){

                
            while($result  = mysqli_fetch_array($sthes)){

                array_push($mainArray, $result);
                

                $sql_i = "DELETE FROM akksofttech_cart WHERE cus_id = '".$cus_id."' AND prod_id  = '".$result['prod_id']."'";

                $stmtt = mysqli_query($conn , $sql_i) ; 

              
                if($result_stmtt){

                    $coms = "YES";

                }else{

                    $coms = "NO";

                }
           
    
            }

            }else{

                $coms = "NOS";

            }

            echo json_encode(['main'  => $mainArray]);




?>