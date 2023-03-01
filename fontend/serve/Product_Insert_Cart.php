<?php 
   session_start();
   require_once '../includedb/condb.php'; 

          if(!empty($_SESSION['store']))
                    {
                        $i = 1 ;
                        foreach($_SESSION['store'] as $product_id)
                        {


                            echo $product_id ; 
                            // $strSQLShow = "SELECT * FROM akksofttech_product WHERE prod_id = '".$product_id."' ";
                            // $objQuery = mysqli_query($conn , $strSQLShow)  or die(mysqli_error());
		                    // $objResult = mysqli_fetch_array($objQuery);

                            //    echo $sql = "INSERT INTO akksofttech_cart (prod_id)  VALUES ('".$objResult['prod_name']."' )" ; 
                            //     $re = mysqli_query($conn ,$sql);
                            //             if($re){
                            //                 $coms = 'YES';
                            //             }else{
                            //                 $coms = 'NO';
                            //             }  

                            //             $suu222 = $re;

                            //         $json=array('status'=> $coms , 'suu'=> $suu222 ); 
                            //         $resultArray = array();
                            //         array_push($resultArray,$json);
                            //         echo json_encode($resultArray , JSON_UNESCAPED_UNICODE );

                                    }
        }
   ?>