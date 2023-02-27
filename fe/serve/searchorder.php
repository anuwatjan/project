<?php
require_once '../includedb/condb.php'; 

echo $cus_id = $_SESSION['akksofttechsess_cusid'] ;

echo $sql = "SELECT * FROM akksofttech_purchase_order   WHERE po_start_date >= '%{$_POST['startdate']}%' and po_start_date <= '%{$_POST['enddate']}%' "  ; 
$query = mysqli_query($conn , $sql) ; 
$num = mysqli_num_rows($query) ;
 $reslutArray = array();  
      while($data = mysqli_fetch_array($query,MYSQLI_BOTH))	{
      
                    $arrayBill = array(
                    
                    );
                    array_push($reslutArray , $arrayBill);
            }	

        echo json_encode($reslutArray);
?>