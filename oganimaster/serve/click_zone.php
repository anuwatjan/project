<?php session_start(); ?>

<?php 
		require_once '../includedb/condb.php';  


        $zone_id = $_POST['zone_id'];

        $sql = "SELECT * FROM `akksofttech_tabledinning` INNER JOIN akksofttech_tablechart 
        
        ON akksofttech_tabledinning.sto_id = akksofttech_tablechart.sto_id WHERE akksofttech_tabledinning.zone_id = '".$zone_id."'" ; 

     

        $reslutArray = array();



        $sql111 = "SELECT sto_name FROM `akksofttech_tabledinning` INNER JOIN akksofttech_tablechart 
        
        ON akksofttech_tabledinning.sto_id = akksofttech_tablechart.sto_id
        
        INNER JOIN akksofttech_member_store ON akksofttech_member_store.sto_id = akksofttech_tablechart.sto_id
        
         WHERE akksofttech_tabledinning.zone_id = '".$zone_id."'  " ; 

        $query = mysqli_query($conn , $sql111) ; 

        $data1 = mysqli_fetch_array($query,MYSQLI_BOTH);

        $query = mysqli_query($conn , $sql) ; 


 
            
        while($data = mysqli_fetch_array($query,MYSQLI_BOTH))	{
            
                    $arrayBill = array( 

                                        "zone_id" => $zone_id ,

                                        "chart_name" => $data['chart_name'] ,

                                        "table_name" => $data['table_name'] ,

                                        "table_person" => $data['table_person'] ,

                                        "table_status" =>  $data['table_status']  ,                              
                                       
                                        "table_id" => $data['table_id'] , 

                                        "sto_id" => $data['sto_id'] , 

                                        "sto_name" => $data1['sto_name'] , 

                                    );

                    array_push($reslutArray , $arrayBill);  

            }		
            
    

            echo json_encode($reslutArray);


?>