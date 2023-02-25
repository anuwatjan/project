<?php 
require_once '../include/condb.php';
session_start();

   

    $res_id = $_POST['res_id'];    

	
	$date	= $_POST['date'];
	
	$time	= $_POST['time'];
	
	$res_datereserve = $date . " " . "$time";
	$res_date = date('Y-m-d H:i:s');
	$table_id = $_POST['table_id'];
   

    $ip = $_SERVER['REMOTE_ADDR'];

	$tbname = "SELECT table_name FROM akksofttech_tabledinning WHERE table_id = '".$table_id."'" ;
	$qtb = mysqli_query($connect , $tbname);
	$rqtb = mysqli_fetch_array($qtb);
	$table_name = $rqtb['table_name'];

	// $sqli = "UPDATE akksofttech_category 
    //     SET cat_name = '".$cat_name."',cat_img = '".$imgname."', cat_ip ='".$ip."', cat_start_date = '".$cat_start_date."'
    //     WHERE cat_id='".$cat_id."'";

	// `res_id``table_id``table_name``res_person``res_datereserve``res_status`
	// `sto_id``cus_id``cus_name``res_phone``res_note``res_ip``res_date`
		$sqli = "UPDATE akksofttech_tabledreserve  SET
		table_id = '".$table_id."',
        table_name = '".$table_name."',
        res_datereserve = '".$res_datereserve."',

		res_ip = '".$ip."',
		res_date = '".$res_date."'
		WHERE res_id ='".$res_id."'"; 	
		$query =mysqli_query($connect,$sqli) or die ("Error ".mysqli_error($connect));
		mysqli_close($connect);
			
			if($query)
				{
					$com = "YES";
				}
				else{
					$com = "NO";
				}
	

				$json=array('in'=>$com ); 
				$resultArray = array();
				array_push($resultArray,$json);
				echo json_encode($resultArray);


	

?>