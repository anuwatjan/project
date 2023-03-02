<?php session_start(); ?>
<?php
	require_once '../includedb/condb.php';  


	$sql = "SELECT zone_id , zone_name , sto_id  FROM akksofttech_tablezone   ";
	$query = mysqli_query($conn , $sql ) ; 
    $result = mysqli_fetch_array($query);

	$zone_id = $result['zone_id'];

	$zone_name = $result['zone_name'];

	$sto_id = $result['sto_id'];



	$json=array('zone_id'=> $zone_id , 'zone_name'=> $zone_name ,'sto_id' => $sto_id ); 
	$resultArray = array();
	array_push($resultArray,$json);
	echo json_encode($resultArray);
    
?>