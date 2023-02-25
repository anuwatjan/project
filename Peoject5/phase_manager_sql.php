<?php
session_start();
$n = 10;
date_default_timezone_set('Asia/Bangkok');
function getName($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0,  strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

$connect = mysqli_connect("localhost","root","akom2006","project_new");

    $po_id = $_POST['po_id'];
    $good_RefNo = getName($n);
    $sql = "SELECT * FROM po  JOIN po_detail  ON po.po_id = po_detail.po_id 
    WHERE po.po_id = '$po_id' AND po.po_status = 'รอยืนยัน' ";
    $query = mysqli_query($connect, $sql);

    $sql111 = "SELECT * FROM po  JOIN po_detail  ON po.po_id = po_detail.po_id 
    WHERE po.po_id = '$po_id' AND po.po_status = 'รอยืนยัน' ";
    $query111 = mysqli_query($connect, $sql111);
    $result111 = mysqli_fetch_assoc($query111);

    $date = date('Y-m-d H:i:s');
    $sqlinsert = "INSERT INTO `goods`(`good_RefNo`, 
    `good_status`, `good_create`, `po_buyer`, `good_saler`) 
    VALUES ( 'GO-$good_RefNo'  , '0' , '$date' , '".$_SESSION['employee_name']."' , '".$result111['product_suppiles']."')";
     $query2 = mysqli_query($connect, $sqlinsert);
     $new_po_id = mysqli_insert_id($connect);
     
  
        while ($result = mysqli_fetch_assoc($query)) {
            $po_id = $_POST['po_id'];
            $date = date('Y-m-d H:i:s');

         
           
            $sqlinsert1 = "INSERT INTO goods_detail(po_id , po_RefNo , product_id , product_name , product_price , product_quantity , product_total , good_id , product_unit   )
            values('$result[po_id]' , '$result[po_RefNo]' , '$result[product_id]' , '$result[product_name]'  , '$result[product_price]'  , '$result[product_quantity]', '$result[product_total]','$new_po_id' , '$result[product_unit]' )";
            $query2 = mysqli_query($connect, $sqlinsert1);
            $sqlstatus = "UPDATE  po  SET po_status = 'สั่งแล้ว'  WHERE po_id = '$result[po_id]' ";

           

            $query2 = mysqli_query($connect, $sqlstatus);                
           
        }

            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            date_default_timezone_set("Asia/Bangkok");
        
            $sToken = "Uv0soCK4s2VPPiO1s8DpbBYp5mHdqz9Y9p5NUpiPsRZ";
        
        
            require 'functionDateThaiOnTime.php'; 
            $con = mysqli_connect("localhost", "root", "akom2006", "project_new");
            $sql1 = "SELECT *   FROM po WHERE po_id = '".$po_id."' ";
            $query1 = mysqli_query($con , $sql1);
            $product_name = "" ;
            $product_quantity = "";
            $product_unit = "" ;
            while ($row1 = mysqli_fetch_array($query1)) { 
                $po_buyer = $row1['po_buyer'];     
                $po_RefNo = $row1['po_RefNo'];     
                $i=1;
                        $sql2 = "SELECT * FROM po_detail
                        WHERE po_id = '".$row1['po_id']."'    " ;
                             $query2 = mysqli_query($con , $sql2);
                             while ($result2 = mysqli_fetch_array($query2)){ 
                                $product_name =  $product_name.$result2['product_name']."\r"."จำนวน : ".$product_quantity.$result2['product_quantity']. "\r" .$product_unit.$result2['product_unit']."\n" ;      
                        }    
                    }


                    $sMessage1 = "
                    <----- สั่งซื้อสินค้า ----->
                    วันที่สั่งซื้อ : ".datethai(date('Y-m-d H:i:s'))."
                    หมายเลขใบสั่งซื้อ : ".$po_RefNo."
                    ผู้สั่งซื้อ :". $po_buyer."      
                    <====== รายการ ======>               
                    " .$product_name. "
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
            if(curl_error($chOne)) 
            { 
                echo 'error:' . curl_error($chOne); 
            } 
            else { 
                $result_ = json_decode($result, true); 
                echo "status : ".$result_['status']; echo "message : ". $result_['message'];
                
            } 
            curl_close( $chOne );   
          
          
          
            if($query2){
                $com = "YES";
            }else{
                $com = "NO";
            }

            // echo "<script>";
            // echo "alert(' เพิ่มใบรับสินค้านี้เรียบร้อยแล้ว !');";
            // echo "window.location='index.php?page=phase_manager';";
            // echo "</script>";

            $json=array('status'=> $com ); 
			$resultArray = array();
			array_push($resultArray,$json);
			echo json_encode($resultArray);


        


        ?>