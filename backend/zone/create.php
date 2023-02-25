

<?php 
require_once '../include/condb.php';
session_start();
// print_r($_POST);
// exit();


//`akksofttech_tablezone` 
//`zone_id`
//`zone_name`
//`sto_id`
// `mem_id`
//`mem_name`
//`zone_ip`
//`zone_date`

$zone_id = $_POST['zone_id'];
$zone_name = $_POST['zone_name'];
$memid =   $_SESSION['akksofttechsess_memid'];
$memname = $_SESSION['akksofttechsess_name'];
$stoid = $_SESSION['akksofttechsess_stoid'];	
$zone_date = date('Y-m-d H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];


	
	if($zone_id != 0){

			
	
			
		$sqli = "UPDATE akksofttech_tablezone 
        SET zone_name = '".$zone_name."',
        
        zone_ip ='".$ip."', 
        zone_date = '".$zone_date."'
        WHERE zone_id='".$zone_id."'";

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
		
		//เช็ค
		$check = " SELECT zone_name FROM akksofttech_tablezone  WHERE  zone_name = '".$zone_name."' ";
 
	   $qcheck  = mysqli_query($connect, $check) or die("Error ".mysqli_error($connect));
	   $num=mysqli_num_rows($qcheck);
	   $recheck = mysqli_fetch_array($qcheck);
			   
	   if($num)
	   {
		   $com = "NOS";
	   }else{
		
		$sql = "INSERT into akksofttech_tablezone (zone_name,sto_id,mem_id,mem_name,zone_ip,zone_date)
		VALUES('".$zone_name."','".$stoid."','".$memid."','".$memname."', '".$ip."' ,'".$zone_date."')";
		$query =mysqli_query($connect,$sql) or die ("Error ".mysqli_error($connect));
	    mysqli_close($connect);	
		
		if($query){
		$com = "YES";
		}
		else{
		$com = "NO";
		}
		
	}
}
		

	$json=array('in'=>$com ); 
    $resultArray = array();
    array_push($resultArray,$json);
    echo json_encode($resultArray);


	

?>