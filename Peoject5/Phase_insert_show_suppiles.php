<?php 

$connect = mysqli_connect("localhost","root","akom2006","project_new");

 $sql ="SELECT * FROM product WHERE product_suppiles = '".$_POST['suppiles_id']."'" ; 

$query = mysqli_query($connect , $sql ) ;

$resultArray = array();

	while($rowttto = mysqli_fetch_array($query,MYSQLI_BOTH))	{	

											$arrayBill = array();

												$arrayBill  = array(

                                            	'product_name'=>$rowttto['product_name'],

                                            	'product_id'=>$rowttto['product_id'],

                                            	'product_unit'=>$rowttto['product_unit'],

                                                'product_quantity'=>$rowttto['product_quantity'],

                                                'product_suppiles'=>$rowttto['product_suppiles'],

                                                'product_point'=>$rowttto['product_point'],


                                                );

                                                		array_push($resultArray , $arrayBill);

    }


    	echo json_encode($resultArray , JSON_UNESCAPED_UNICODE);


?>