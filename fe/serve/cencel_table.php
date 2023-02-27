<?php session_start(); ?>

<?php 
		require_once '../includedb/condb.php';  

$res_id = $_POST['res_id'];
$ip = $_SERVER['REMOTE_ADDR'];

     $sss = "UPDATE  akksofttech_tabledreserve  SET res_status =  'cancel' , res_ip = '".$ip."' WHERE res_id = '".$res_id."'" ;
    
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