<?php
$con = mysqli_connect("localhost", "root", "akom2006", "project_new");

require 'functionDateThai.php' ;

if (isset($_POST) && !empty($_POST)){
     $product_name = $_POST['product_name'];
     $product_type = $_POST['product_type'];
     $product_cate = $_POST['product_cate'];
     $product_sku = $_POST['product_sku'];
     $product_symp = $_POST['product_symp'];
     $product_unit = $_POST['product_unit'];
     $product_point = $_POST['product_point'];
     $product_price = $_POST['product_price'];
     $product_sell = $_POST['product_sell'];
     $product_suppiles = $_POST['product_suppiles'];

     if (isset($_FILES['product_image']['name']) && !empty($_FILES['product_image']['name'])) {
          $extension = array("jpeg", "jpg", "png");
          $target = './image/';
          $filename = $_FILES['product_image']['name'];
          $filetmp = $_FILES['product_image']['tmp_name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          if (in_array($ext, $extension)) {
               if (!file_exists($target . $filename)) {
                    if (move_uploaded_file($filetmp, $target . $filename)) {
                         $filename = $filename;
                    } else {
                         echo 'เพิ่มไม่สำเร็จ';
                    }
               } else {
                    $newfilename = time() . $filename;
                    if (move_uploaded_file($filetmp, $target . $newfilename)) {
                         $filename = $newfilename;
                    } else {
                         echo 'เพิ่มเข้าไม่ได้';
                    }
               }
          } else {
               echo 'ประเภทไม่ถูกต้อง';
          }
     } else {
          $filename = '';
     }

     if($product_price > $product_sell){

          $com = "NOPRICE" ; 

     }else{

     $new_id="" ;
          
     $date = date("Y-m-d H:i:S") ; 

     $sql = "INSERT INTO `product`(`product_name`,
     `product_price`, `product_sell`, `product_point`, 
     `product_type`, `product_cate`, `product_symp`,
     `product_unit`, `product_image`, `product_suppiles`,
     `product_status`,`product_sku`) 
     VALUES ('$product_name','$product_price','$product_sell',
     '$product_point','$product_type','$product_cate','$product_symp',
     '$product_unit','$filename','$product_suppiles','$product_status','$product_sku')" ; 

          
     $new_product_id = mysqli_insert_id($con); 

     $new_id =  $new_product_id ;


     $sql_backup = "INSERT INTO `backup_product`(`product_id`, `product_name`, `product_admit`, `backup_product_create`, 
          `product_unit`, `product_payoff`, `product_balance`, `good_RefNo`,
           `backup_note`, `backup_employee`) 
           VALUES ('".$new_id."','$product_name','0','$date',
           '$product_unit','0','0','0','เพิ่มสินค้าใหม่เข้าระบบ','0')";
           $query_back = mysqli_query($con , $sql_backup);

     ini_set('display_errors', 1);
     ini_set('display_startup_errors', 1);
     error_reporting(E_ALL);
     date_default_timezone_set("Asia/Bangkok");
     $sToken = "Uv0soCK4s2VPPiO1s8DpbBYp5mHdqz9Y9p5NUpiPsRZ";
     // $sql1 = "SELECT * FROM product WHERE product_id = '".$new_id."' ";

     // $query1 = mysqli_query($con , $sql1);
     // $result1 = mysqli_fetch_array($query1);
     $sMessage1 = "
     <===== รายการเพิ่มข้อมูลสินค้า =====>
     วันที่เพิ่มข้อมูล : ".datethai(date('Y-m-d H:i:s'))."
     ชื่อสินค้า : ".$product_name."
     ราคาต้นทุน :". $product_price."  
     กำหนดจุดสั่งซื้อ :". $product_point."             
     ";

     $chOne = curl_init(); 
     curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
     curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
     curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
     curl_setopt( $chOne, CURLOPT_POST, 1); 
     curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage1); 
     $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
     curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
     curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
     $result = curl_exec( $chOne ); 
     // if(curl_error($chOne)) 
     // { echo 'error:' . curl_error($chOne); } 
     // else { $result_ = json_decode($result, true); echo "status : ".$result_['status']; echo "message : ". $result_['message']; } 
     // curl_close( $chOne );   

     $query = mysqli_query($con, $sql);
            
            if($query) { 
                    
                $com = "YES";

            }else {

                $com = "NO";
            }

}

}


               $json=array('status'=> $com); 
			$resultArray = array();
			array_push($resultArray,$json);
			echo json_encode($resultArray);
               
     ?>