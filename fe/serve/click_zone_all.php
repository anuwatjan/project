<?php session_start(); ?>

<?php 
		require_once '../includedb/condb.php';  


        $sql = "SELECT * FROM `akksofttech_tabledinning` INNER JOIN akksofttech_member_store ON akksofttech_member_store.sto_id =  akksofttech_tabledinning.sto_id " ; 
      
        $query = mysqli_query($conn , $sql) ; 

        $reslutArray = array();
            
        while($data = mysqli_fetch_array($query,MYSQLI_BOTH))	{

                    $arrayBill = array( 

                                        "zone_id" => $data['zone_id'] ,

                                        "table_name" => $data['table_name'] ,

                                        "table_person" => $data['table_person'] ,

                                        "table_status" =>  $data['table_status']  ,                              
                                       
                                        "table_id" => $data['table_id'] , 

                                        "sto_id" => $data['sto_id'] , 

                                        "sto_name" => $data['sto_name'] , 


                                        

                                    );

                    array_push($reslutArray , $arrayBill);

            }		
            
    

            echo json_encode($reslutArray);


?>