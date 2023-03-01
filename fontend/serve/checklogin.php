<?php 
   session_start();
   
   require_once '../includedb/condb.php'; 

        $cus_id = $_SESSION['akksofttechsess_cusid'] ;  //รหัสผู้ซื้อ
    

    if(!$cus_id){
        $coms = "NO" ; 
    }else{
        if($_SESSION['store'] < 0 ){
        $coms = "NOT" ; 
        }else{
        $coms = "YET" ; 
        }
    }
        $json=array('status'=> $coms); 
            $resultArray = array();
            array_push($resultArray,$json);
            echo json_encode($resultArray , JSON_UNESCAPED_UNICODE );
   ?>