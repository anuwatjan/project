<?php session_start(); ?>
<?php 


		require_once '../include/condb.php'; //$dbh  

        $pay_cus_id = $_POST['pay_cus_id'];

         
    $spay ="SELECT *
    FROM  akksofttech_payment
    WHERE pay_cus_id = '".$pay_cus_id."' " ;
    $rpay = mysqli_query($connect,$spay);
    $pay_array=[];
    $rowpay = mysqli_fetch_array($rpay,MYSQLI_ASSOC);


    // while($rowpay = mysqli_fetch_array($rpay,MYSQLI_ASSOC)){
    array_push($pay_array,$rowpay);
      
    // };



		

		echo json_encode(['pay'=> $rowpay]);


?>