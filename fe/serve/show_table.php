<?php session_start(); ?>
<?php 


	require_once '../includedb/condb.php'; 
	
				$table_id = $_POST['table_id'];

				$sto_id = $_POST['sto_id'];

									
				$sqlro = "select  * FROM  akksofttech_tabledinning   where   table_id = '".$table_id."'  ";
				$query = mysqli_query($conn , $sqlro);
                $result = mysqli_fetch_array($query);
                $table_name = $result['table_name'] ; 
              
                $sqlrr = "select * from akksofttech_tabledinning INNER JOIN akksofttech_tablezone on akksofttech_tabledinning.zone_id = akksofttech_tablezone.zone_id
                where akksofttech_tabledinning.table_id = '".$table_id."'   " ; 
                $queryrr = mysqli_query($conn , $sqlrr);
                $resultrr = mysqli_fetch_array($queryrr);
                $zone_name = $resultrr['zone_name'] ; 
          

                $json=array('table_id' => $table_id ,  'table_name'=> $table_name  , 'zone_name' => $zone_name , 'sto_id' => $sto_id ); 
                $resultArray = array();
                array_push($resultArray,$json);
                echo json_encode($resultArray);


?>