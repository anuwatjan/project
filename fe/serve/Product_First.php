<?php session_start(); ?>
<?php
	require_once '../includedb/condb.php';  


	$sql = "SELECT cat_id , cat_name  FROM akksofttech_category   ORDER BY cat_id ASC LIMIT 1";
	$query = mysqli_query($conn , $sql ) ; 
    $result = mysqli_fetch_array($query);

	$cat_id = $result['cat_id'];

	$cat_name = $result['cat_name'];


	$json=array('cat_id'=> $cat_id , 'cat_name'=> $cat_name ); 
	$resultArray = array();
	array_push($resultArray,$json);
	echo json_encode($resultArray);
    
?>