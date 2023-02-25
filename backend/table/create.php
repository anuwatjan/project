

<?php 
require_once '../include/condb.php';
session_start();
// print_r($_POST);
// exit();




$table_id = $_POST['table_id'];
$table_name = $_POST['table_name'];
$table_person = $_POST['table_person'];
$table_status = "NO";
$zone_id	= $_POST['zone_id'];
$memid =   $_SESSION['akksofttechsess_memid'];
$memname = $_SESSION['akksofttechsess_name'];
$stoid = $_SESSION['akksofttechsess_stoid'];
$ip = $_SERVER['REMOTE_ADDR'];
$table_date = date('Y-m-d H:i:s');




	
	if($table_id != 0){
		
		$sqli = "UPDATE akksofttech_tabledinning 
        SET table_name = '".$table_name."', 
        table_person = '".$table_person."',
         zone_id = '".$zone_id."', 
         table_status = '".$table_status."',
		 table_ip = '".$ip."',
		 table_date = '".$table_date."'
         WHERE table_id='".$table_id."'";
		$query =mysqli_query($connect,$sqli) or die ("Error ".mysqli_error($connect));
		mysqli_close($connect);
			
			
			
			if($query)
				{
					$com = "YES";
				}
				else{
					$com = "NO";
				}
			
	}else{
		// `akksofttech_tabledinning` 
// `table_id`
// `table_name`
// `table_person`
// `table_status`
// `zone_id`
// `sto_id`
// `mem_id`
// `mem_name`
// `table_ip`
// `table_date`

		
		$sql = "INSERT into akksofttech_tabledinning  
        (table_name, table_person, table_status, zone_id, sto_id, 
		mem_id , mem_name, table_ip, table_date)
		VALUES('".$table_name."',  '".$table_person."', '".$table_status."',
        '".$zone_id."',
       
         '".$stoid."', '".$memid."' , '".$memname."' , '".$ip."' , '".$table_date."')";
		$query =mysqli_query($connect,$sql) or die ("Error ".mysqli_error($connect));
	    mysqli_close($connect);	
		
		if($query){
		$com = "YES";
		}
		else{
		$com = "NO";
		}
		
	
	
	
	}

		

		$json=array('in'=>$com ); 
    	$resultArray = array();
    	array_push($resultArray,$json);
    	echo json_encode($resultArray);




?>