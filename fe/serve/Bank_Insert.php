<?php
session_start();

require_once '../includedb/condb.php'; 

$cus_id = $_SESSION['akksofttechsess_cusid'] ;

$cus_name = $_SESSION['akksofttechsess_cussurname'] ;

$ip = $_SERVER['REMOTE_ADDR'] ;

        if (!$_POST) {

            exit;

        }else{

        $po_id	 = !empty($_POST['po_id'])?$_POST['po_id']:null;
        $amount	 = !empty($_POST['amount'])?$_POST['amount']:null;
        $tranfer_date = !empty($_POST['tranfer_date'])?$_POST['tranfer_date']:null;
        $bac_name = !empty($_POST['bac_name'])?$_POST['bac_name']:null;
        $bac_number = !empty($_POST['bac_number'])?$_POST['bac_number']:null;
        $bac_account = !empty($_POST['bac_account'])?$_POST['bac_account']:null;
        $imagebroswer = $_POST['imagebroswer'];

      
        $noimage = $_POST['logo_img64'];
        $date = date('Y-m-d H:i:s');
	
        // คนขาย
        $bac_id = !empty($_POST['bac_id'])?$_POST['bac_id']:null;


        $sql_sto = "SELECT * FROM akksofttech_bank_account INNER JOIN akksofttech_bank ON akksofttech_bank.bak_id = akksofttech_bank_account.bak_id
        WHERE akksofttech_bank_account.bac_id = '".$bac_id."' " ; 
        $query_sto = mysqli_query($conn , $sql_sto) ;
        $result_sto = mysqli_fetch_array($query_sto) ;


        // if(trim($noimage) != "")
		// {     
	
            $imgname = 'naropos_'.date("YmdHis").'.png';
			define('UPLOAD_DIR', 'images/');
			$image_parts = explode(";base64,", $noimage);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_base64 = base64_decode($image_parts[1]);
			file_put_contents('../../backend/getimg/slip/'.$imgname , $image_base64);


			// $imgname = 'bank_'.date("YmdHis").'.png';
			// define('UPLOAD_DIR', 'images/');
			// $image_parts = explode(";base64,", $noimage);
			// $image_type_aux = explode("image/", $image_parts[0]);
			// $image_type = $image_type_aux[1];
			// $image_base64 = base64_decode($image_parts[1]);
			// file_put_contents('../../backend/getimg/slip/'.$imgname , $image_base64);

            // echo $imgname ; 
			
		// }
	

        $sql = "INSERT INTO `akksofttech_payment`(`po_id`, `bac_name`, `bac_number`, `bac_account`,
          
            `amount`, `tranfer_image`, `tranfer_date`, `pay_ip` ,`bac_number_mem` , `bac_mem_name` , `bac_sto_name` , `pay_start_date`, `mem_id`, `mem_name`)

            VALUES ('".$po_id."','".$bac_name."','".$bac_number."','".$bac_account."','".$amount."','".$imgname."','".$tranfer_date."','".$ip."' , '".$result_sto['bac_number_mem']."','".$result_sto['bac_mem_name']."','".$result_sto['bac_name']."','".$date."','".$cus_id."','".$cus_name."')";


            $query = mysqli_query($conn, $sql);
            
            if($query) { 
                    
                $com = "YESIMAGE";

                // update status 

                $sqll = "UPDATE akksofttech_purchase_order SET po_status = '2' ,  po_update_date = '".date('Y-m-d H:i:s')."' WHERE po_id = '".$po_id."' " ; 

                $queryy = mysqli_query($conn, $sqll);
            
                if($queryy) { 

                    $com = "YES";

                }else{

                    $com = "NO";

                }

            }else {

                $com = "NOIMAGE";
            }


    }
 

			$json=array('status'=> $com  ); 
			$resultArray = array();
			array_push($resultArray,$json);
			echo json_encode($resultArray);
?>