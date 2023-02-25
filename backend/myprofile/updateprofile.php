
<?php require_once '../include/condb.php';
@session_start();     
	
// `akksofttech_member` 
// `mem_id``mem_name``mem_surname``mem_email``mem_phone``mem_username`
// `mem_password``mem_ip``mem_id_save``mem_name_save``mem_date`
     
   
     
         

     $mem_id = $_POST['mem_id'];
     $mem_name = $_POST['mem_name'];
     $mem_surname = $_POST['mem_surname'];
     $mem_email = $_POST['mem_email'];
     $mem_phone = $_POST['mem_phone'];
     $mem_date = date('Y-m-d H:i:s');
     $ip = $_SERVER['REMOTE_ADDR'];
     
     
        
        
        $sql = "UPDATE akksofttech_member 
        SET mem_email = '".$mem_email."',
        mem_phone = '".$mem_phone."',
        mem_name = '".$mem_name."',
        mem_surname = '".$mem_surname."',
        
        mem_ip = '".$ip."',
        mem_date = '".$sto_start_date."'
        
        WHERE mem_id='".$mem_id."'";



$query = mysqli_query($connect,$sql) or die ("ERROR ".mysqli_error($connect));
mysqli_close($connect);


if ($query) {
  	echo "<script>";
  	echo "alert('successfully saved');";
  	echo "window.location='index.php'";
  	echo "</script>";
}else{
	echo "<script>";
  	echo "alert('error');";
  	echo "window.history.back()";
  	echo "</script>";
}
     
?>