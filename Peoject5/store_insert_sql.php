<?php
session_start();

$connect = mysqli_connect("localhost","root","akom2006","project_new");


function random_char($len)
{
     $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"; //ตัวอักษรที่สามารถสุ่มได้
     $ret_char = "";
     $num = strlen($chars);
     for ($i = 0; $i < $len; $i++) {
          $ret_char .= $chars[rand() % $num];
          $ret_char .= "";
     }
     return $ret_char;
}

if (isset($_POST) && !empty($_POST)) {

    $das = random_char(10);

 foreach ($_SESSION['cart1'] as $product_id => $product_quantity) {
	  

		 $strSQL = "SELECT * FROM product WHERE product_id = '".$product_id."' ";
											$objQuery = mysqli_query($connect , $strSQL);
											$objResult = mysqli_fetch_array($objQuery);
          $Total = $product_quantity * $objResult["product_sell"];
        
          $Vat = 0.07 ;
          $VatTotal =  (($Total * $Vat)  + $Total) ;  
          $SumTotal = $SumTotal + $Total;
          $moneyget = $_SESSION['sales_get'] - $VatTotal ;

              


                    if($_POST['sales_get']  <= 0){

                        

                    }

                    	$strSQL = "
				INSERT INTO sales (sales_RefNo , sales_date,sales_get,product_quantity,customer_name,
                product_sell,product_price,product_id,product_name,sales_change,product_total,po_buyer)
				VALUES
				('".$das."' , '".date("Y-m-d H:i:s")."','".$_SESSION['sales_get']."','".$product_quantity."','".$_SESSION['customer_name']."',
                '".$objResult['product_sell']."','".$objResult['product_price']."','".$product_id."','".$objResult['product_name']."','$moneyget','".$VatTotal."','".$_SESSION['employee_name']."') 
			";

           
				$resultSQL = mysqli_query($connect , $strSQL);


                $new_id = mysqli_insert_id($connect);


               $strQTY = "SELECT * FROM product WHERE product_id = '".$product_id."'";
               $resultQTY = mysqli_query($connect  , $strQTY);
               $queryQTY = mysqli_fetch_array($resultQTY);

               $oldqty = $queryQTY['product_quantity'];
               $newqty = $oldqty - $product_quantity; 

            //    ลดจำนวนไปก่อนเพื่อโชว์หน้าร้าน

               $strSQL1 = "
                    UPDATE product SET product_quantity = '$newqty' WHERE product_id = '".$product_id."' " ; 
                    $resultSQL1 = mysqli_query($connect , $strSQL1);


            // ลดสต็อกแต่ดึงสต็อก fifo มาแทน

            
            $sql="SELECT stock_id, product_quantity from stock 
            where product_id='".$product_id."' and product_quantity > 0 order by stock_id asc ";
            $res=mysqli_query($connect , $sql);
            $num=mysqli_num_rows($res);
            if(!$num){
                exit;
            }else{
                $arr = mysqli_fetch_assoc($res);
                while($product_quantity > 0 ){
                     $sqlcutstock1 = "SELECT stock_id , product_id , product_quantity FROM stock WHERE product_quantity > 0 AND product_id='".$product_id."' order by stock_import ASC" ;
                    $querycutstock1=mysqli_query($connect , $sqlcutstock1);
                    $arr1 = mysqli_fetch_assoc($querycutstock1);
                     $balance = $arr1['product_quantity'] - $product_quantity;
            
                if($balance<0){
                     $strSQL4 = "update stock set product_quantity = 0 WHERE product_id = '".$product_id."' AND stock_id = '".$arr1['stock_id']."' " ; 
                    $qtySQL4=mysqli_query($connect , $strSQL4);
                     $product_quantity -= $arr1['product_quantity']; 
                }else{
                     $strSQL5 = "update stock set product_quantity = product_quantity -  $product_quantity WHERE product_id = '".$product_id."'  AND stock_id = '".$arr1['stock_id']."'   ";
                    $qtySQL5 =mysqli_query($connect , $strSQL5);
                    $product_quantity = 0;
                }
            
                }
            
              
            
            }
      
               }

               ini_set('display_errors', 1);
               ini_set('display_startup_errors', 1);
               error_reporting(E_ALL);
               date_default_timezone_set("Asia/Bangkok");
           
               $sToken = "Uv0soCK4s2VPPiO1s8DpbBYp5mHdqz9Y9p5NUpiPsRZ";
           
           
               require 'functionDateThaiOnTime.php'; 
               $con = mysqli_connect("localhost", "root", "akom2006", "project_new");
               $sql1 = "SELECT *   FROM sales  ORDER BY sales_RefNo DESC LIMIT 1";
               $query1 = mysqli_query($connect , $sql1);
               $product_name = "" ;
               $product_quantity = "";
               $product_unit = "" ;
               while ($row1 = mysqli_fetch_array($query1)) { 
                   $po_buyer = $row1['po_buyer'];     
                   $sales_RefNo = $row1['sales_RefNo'];     
                   $i=1;
                           $sql2 = "SELECT * FROM sales
                          ORDER BY sales_RefNo DESC LIMIT 1    " ;
                                $query2 = mysqli_query($connect , $sql2);
                                while ($result2 = mysqli_fetch_array($query2)){ 
                                   $product_name =  $product_name.$result2['product_name']."\r"."จำนวน : ".$product_quantity.$result2['product_quantity']. "\r" .$product_unit.$result2['product_unit']."\n" ;      
                           }    
                       }
   
   
                       $sMessage1 = "
                       <----- ขายสินค้า ----->
                       วันที่ขายสินค้า : ".datethai(date('Y-m-d H:i:s'))."
                       หมายเลขใบบิล : ".$sales_RefNo."
                       ผู้ขาย :". $po_buyer."      
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
             

       
 if ($resultSQL1) {

     mysqli_query($connect, "COMMIT");
 
     $message = "บันทึกข้อมูลเรียบร้อยแล้ว ";
 
     foreach ($_SESSION['cart1'] as $product_id) {
 
         unset($_SESSION['cart1']);
 
     }
 } else {
 
     mysqli_query($connect, "ROLLBACK");
 
     $message = "บันทึกข้อมูลไม่สำเร็จ";
 
      foreach ($_SESSION['cart1'] as $product_id) {
 
         unset($_SESSION['cart1']);
 
     }
 
 }
 
mysqli_close($connect);

          }
          ?>

<script type="text/javascript">
alert("<?php echo $message; ?>");
window.location = 'index.php?page=store_index';
</script>