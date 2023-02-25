

<?php 
require_once '../include/condb.php';
session_start();
// print_r($_POST);
// exit();


// `res_id``res_datereserve``res_status``res_ip`

   

    $res_status = "checkin";    

    $res_datereserve = date('Y-m-d H:i');

    $ip = $_SERVER['REMOTE_ADDR'];

		echo $sqli = "UPDATE akksofttech_tabledreserve 
        SET res_status  = '".$res_status."', 
        res_datereserve = '".$res_datereserve."' ,
        res_ip = '".$ip."'
		WHERE res_id ='".$_POST['id']."'"; 	
		$query =mysqli_query($connect,$sqli) or die ("Error ".mysqli_error($connect));
		mysqli_close($connect);
			
			if($query)
				{
					$com = "YES";
				}
				else{
					$com = "NO";
				}
	

		


	

?>