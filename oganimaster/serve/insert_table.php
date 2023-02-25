<?php
@session_start();

require '../includedb/condb.php' ;

if (!$_POST) {

    exit;

}else{

    $table_id = $_POST['table_id'] ; 
    $table_name = $_POST['table_name'] ; 
    $res_person = $_POST['res_person'] ; 
    $res_datereserve = $_POST['res_datereserve'] ; 
    $res_status = "booked" ; 
    $sto_id = $_POST['sto_id'] ; 
    $cus_id = $_SESSION['akksofttechsess_cusid'] ; 
    $cus_name = $_POST['cus_name'] ; 
    $res_phone = $_POST['res_phone'] ; 
    $res_note = $_POST['res_note'] ; 
	$ip = $_SERVER['REMOTE_ADDR'];
    $date = date('Y-m-d H:i:s');
    $day = $_POST['day'] ; 
    $month = $_POST['month']+1 ;
    $year = $_POST['year'] ;
    $hour = $_POST['hour']+3 ;
    $minute = $_POST['minute'] ;
    $time = date("H:i") ; 
    $ee = explode(":" , $time);
    $second = $ee[1] ;
    if($minute == 60){
        $minute = 00 ; 
        $hour += 1 ;
        $second = 00 ;
    }

    
     $dateall = $year . "-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-" . str_pad($day, 2, "0", STR_PAD_LEFT) . " " . $hour. ":" . "$minute" . ":" . "$second";

    //  $dateall1 = $year . "-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-" . str_pad($day, 2, "0", STR_PAD_LEFT) . " " . $hour ;

     $dateall1 = $year . "-" . str_pad($month, 2, "0", STR_PAD_LEFT) . "-" . str_pad($day, 2, "0", STR_PAD_LEFT) . " " . str_pad($hour, 2, "0", STR_PAD_LEFT) ;



    // เช็คก่อนว่าวันที่รับมาย้อนหลังไหม

    $datee = date('Y-m-d H' , strtotime('+3 hours'));

    $explode  = explode("-",$datee); 

                // if($day >= $explode[2] && $month >=$explode[1] && $year >= $explode[0]){

                if($dateall1 >= date('Y-m-d H', strtotime('+3 hours'))){

                      // เช็คเงื่อนไขว่าวันเวลาชนกันไหม

                     $sql_check = "SELECT * FROM akksofttech_tabledreserve WHERE res_datereserve = '".$dateall."' AND table_id = '".$table_id."'  " ; 
  
                      $query_check = mysqli_query($conn , $sql_check) ; 
  
                      $num_rows=mysqli_num_rows($query_check);
  
                      if($num_rows == 0){
  
                          $sql = "INSERT INTO `akksofttech_tabledreserve`(`table_id`, `table_name`, `res_person`, `res_datereserve`, `res_status`, `sto_id`, `cus_id`, `cus_name`, `res_phone`, `res_note`, `res_ip`, `res_date`) 
                          
                          VALUES ('".$table_id."','".$table_name."','".$res_person."','".$dateall."','".$res_status."','".$sto_id."','".$cus_id."','".$cus_name."','".$res_phone."','".$res_note."','".$ip."','".$date."') " ;
                          
                          $query = mysqli_query($conn , $sql) ; 
  
                          $old_id = mysqli_insert_id($conn);
  
                          if($query) { 
  
                              $com = "YES";
  
                          }else {
  
                              $com = "NO";
                          }
  
  
                      }else{
                          
                                      
                          $com = "TABLE_NOTNULL" ; 
                              
                              }

                }else{

                  
                        $com = "DAY_NO" ; 

                    }

                
                           
                                        
                                                    
                                $json=array('status'=> $com , 'cusa_id' => $old_id , 'day_get' => $dateall1 , 'day_ori' => $datee ); 
                                $resultArray = array();
                                array_push($resultArray,$json);
                                echo json_encode($resultArray);
   
                            }
                    
                
                