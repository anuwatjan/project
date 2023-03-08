<?php 


    @session_start();

   		require_once '../includedb/condb.php';  

            
        echo  $p_id = implode(', ', array_keys($_SESSION['store'])) ;


        //  $p_id  = array("Tricia Allison");



        if(is_array($p_id)){
            foreach ($p_id as $row) {
                $val1 = mysqli_real_escape_string($conn, $row);
               echo $sql = "INSERT INTO cart (p_n) values ('".implode(',', $val1)."')";
               $rec = mysqli_query($conn ,$sql);

            }
        }

?>