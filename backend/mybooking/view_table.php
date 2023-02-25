

<?php 
require_once '../include/condb.php';
session_start();
// print_r($_POST);
// exit();


            $table_id =$_POST["table_id"];
            $zone_id =$_REQUEST["zone_id"];
	
            $sql2= "SELECT * FROM  akksofttech_tabledinning WHERE zone_id = '".$zone_id."' AND 
            sto_id = '".$_SESSION['akksofttechsess_stoid']."'"; 

            $result2 = mysqli_query($connect, $sql2); 

            $num2 = mysqli_num_rows($result2) ; 

              if($num2 == 0){

                     // echo"<option value='0'>Choss</option>"; 

              }else{
                      

                     while($row2 = mysqli_fetch_array($result2)) { 


                
                     echo"<option value='$row2[0]'>" .$row2["table_name"]." </option>"; 
                      
                         
                         
                      
                      
                      
                     
                     }
              }

          


	

?>