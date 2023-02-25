

<?php 
require_once '../include/condb.php';
session_start();
// print_r($_POST);
// exit();



$noimage = $_POST['logo_img64'];
$chart_id = $_POST['chart_id'];

$memid =   $_SESSION['akksofttechsess_memid'];
$memname = $_SESSION['akksofttechsess_name'];
$stoid = $_SESSION['akksofttechsess_stoid'];

$chart_date = date('Y-m-d H:i:s');
$ip = $_SERVER['REMOTE_ADDR'];

$sqllgoods = "SELECT * FROM `akksofttech_tablechart` WHERE `chart_id`  =  '".$chart_id."' ";					 
$resultgoods = mysqli_query($connect,$sqllgoods);
$dataggoods = mysqli_fetch_array($resultgoods,MYSQLI_BOTH);
		
$imgname = $dataggoods['chart_name'];

if(trim($_FILES["filecat_picture"]["name"]) != "")
		{     
	
			$imgname = 'naropos_'.date("YmdHis").'.png';
			define('UPLOAD_DIR', 'images/');
			$image_parts = explode(";base64,", $noimage);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_base64 = base64_decode($image_parts[1]);
			file_put_contents('../getimg/plan/'.$imgname , $image_base64);

		}


	if($chart_id != 0){

			

			
		$sqli = "UPDATE akksofttech_tablechart 
        SET 
        chart_name = '".$imgname."', 
        chart_ip ='".$ip."', 
        chart_date = '".$chart_date."'
        WHERE chart_id ='".$chart_id."'";
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
		
// `akksofttech_tablechart`
// `chart_id``chart_name``sto_id``mem_id``mem_name``chart_ip``chart_date`
		
		$sql = "INSERT into akksofttech_tablechart (sto_id,mem_id,mem_name,chart_ip,chart_date,chart_name)
		VALUES('".$stoid."','".$memid."','".$memname."', '".$ip."' ,'".$chart_date."','".$imgname."')";
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