<?php session_start(); ?>
<?php 


require_once '../include/condb.php';
	
				$res_id = $_POST['res_id'];
									
				 $sqlro = "select  * FROM  akksofttech_tabledreserve   where   res_id = '".$res_id."' ";
				$query = mysqli_query($connect , $sqlro);
                $result = mysqli_fetch_array($query);

                $res_datereserve = $result['res_datereserve'] ; 


                $orderdate = explode("-"  , $res_datereserve);


                $orderdate1 = list($date,$time) = explode(" ",$res_datereserve);

                $time   = $orderdate1[1];

             
                $day   = $orderdate1[0];
         
       
          

                $table_id = $result['table_id'] ; 
                $table_name = $result['table_name'] ; 

                $date = date("Y-m-d H:i:s") ; 


              
    

                $json=array('date' => $day , 'time' => $time ,   'res_id' => $res_id ,  'res_datereserve'=> $res_datereserve  , 'table_id' => $table_id , 'table_name' => $table_name ); 
                $resultArray = array();
                array_push($resultArray,$json);
                echo json_encode($resultArray);


?>