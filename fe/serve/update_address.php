<?php

require '../includedb/condb.php' ;
	

$cusa_id = $_POST['cusa_id'] ; 

$cusa_name = $_POST['cusa_name'] ; 

$cusa_surname = $_POST['cusa_surname'] ; 

$cusa_address = $_POST['cusa_address'] ; 

$cusa_phone = $_POST['cusa_phone'] ; 

$cusa_province = $_POST['cusa_province'] ; 

$cusa_zipcode = $_POST['cusa_zipcode'] ; 

$cusa_note = $_POST['cusa_note'] ; 


$sql = "UPDATE akksofttech_customer_address SET cusa_name = '".$cusa_name."' , cusa_surname = '".$cusa_surname."' , cusa_address = '".$cusa_address."' , cusa_phone = '".$cusa_phone."' ,
cusa_province = '".$cusa_province."'  , cusa_zipcode = '".$cusa_zipcode."'  , cusa_note = '".$cusa_note."'  WHERE cusa_id = '".$cusa_id."'" ;

$que = mysqli_query($conn , $sql) ; 

if(!$que){

    $coms = "NO";

}else{
    $coms = "YES";


}





$json=array('status'=> $coms  ); 
$resultArray = array();
array_push($resultArray,$json);
echo json_encode($resultArray);

?>