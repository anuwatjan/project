<?php

    $connect = mysqli_connect("localhost", "root", "akom2006", "project_new");

    $sql = "UPDATE product SET product_status = 1 WHERE product_id = '".$_POST['product_id']."' " ; 

    $query = mysqli_query($connect, $sql);

    if($query){
        
        $com = "YES" ; 

    }else{

        $com = "NO" ; 

    }

?>