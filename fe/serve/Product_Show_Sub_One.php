<?php session_start(); ?>

<?php 
		require_once '../includedb/condb.php';  

		    $sprodone_id = $_POST['sprodone_id'];

		    $sql = "SELECT * FROM  akksofttech_subproduct_one 
       
            WHERE akksofttech_subproduct_one.sprodone_id = '".$sprodone_id."' ";
        
            $result = mysqli_query($conn,$sql);

            $reslutArray = array();

            $numm = mysqli_num_rows($result) ;

                                while($data = mysqli_fetch_array($result,MYSQLI_BOTH))	{

                                    
                                    $arrayBill = array( 

                                        "status" =>   "YES 1"  , 

                                        "sprodone_id" => $data['sprodone_id'] ,

                                        "sprodone_name" => $data['sprodone_name'] ,
                                        
                                        // "sprod_name" => $data['sprod_name'] ,

                                        "sprodone_image" => $data['sprodone_image'] ,

                                        "sprodone_price" => $data['sprodone_price'] ,

                                        // "sprod_price" => $data['sprod_price'] ,

                                        "sprodone_sku" => $data['sprodone_sku'] ,

                                        "sprodone_detail" => $data['sprodone_detail'] ,

                                        "sprodone_quantity" => $data['sprodone_quantity'] ,

                                        "prod_id" => $data['prod_id'] ,

                                        // "sprod_id" => $data['sprod_id'] 

                                    );

                    array_push($reslutArray , $arrayBill);
                                
                                }


            
         
            echo json_encode($reslutArray , JSON_UNESCAPED_UNICODE );


?>