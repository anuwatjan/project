

<?php 
require_once '../include/condb.php';
session_start();
// print_r($_POST);
// exit();




// $res_id = $_POST['res_id'];
$table_id = $_POST['table_id'];
$prod_price	= $_POST['prod_price'];
$res_person = $_POST['res_person'];
// $res_datereserve	= $_POST['res_datereserve'];

$res_datereserve = date('Y-m-d H:i');
$date	= $_POST['date'];
$checkdate	= date('Y-m-d');
$time	= $_POST['time'];
$checktime = date('H')+3;
$res_status	= "booked";
$stoid = $_SESSION['akksofttechsess_stoid'];
$cus_id = 0;
$cus_name = $_POST['cus_name'];
$res_phone	= $_POST['res_phone'];
$res_note	= $_POST['res_note'];
$res_date = date('Y-m-d H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];


$res_datereserve = $date . " " . "$time";

$tbname = "SELECT table_name FROM akksofttech_tabledinning WHERE table_id = '".$table_id."'" ;
$qtb = mysqli_query($connect , $tbname);
$rqtb = mysqli_fetch_array($qtb);
$table_name = $rqtb['table_name'];

// `akksofttech_tabledreserve`
// `res_id``table_id``table_name``res_person``res_datereserve``res_status`
// `sto_id``cus_id``cus_name``res_phone``res_note``res_ip``res_date`


// if($time = $_POST['time'] <= $checktime && $date= $_POST['date'] == $checkdate){
// 	$com = "NOS";
// }else{

		$sql = "INSERT into  akksofttech_tabledreserve  (table_id, table_name, res_person, res_datereserve,
        res_status, sto_id, cus_id, cus_name, res_phone, res_note, res_ip, res_date)
		VALUES('".$table_id."', '".$table_name."', '".$res_person."', '".$res_datereserve."', '".$res_status."',
        '".$stoid."', '".$cus_id."', '".$cus_name."', '".$res_phone."', '".$res_note."', '".$ip."', '".$res_date."')";
		$query =mysqli_query($connect,$sql) or die ("Error ".mysqli_error($connect));
	    mysqli_close($connect);	
		
		if($query){
		$com = "YES";
		}
		else{
		$com = "NO";
		}
	
	
	// }
		

		$json=array('in'=>$com ); 
    	$resultArray = array();
    	array_push($resultArray,$json);
    	echo json_encode($resultArray);


	

?>