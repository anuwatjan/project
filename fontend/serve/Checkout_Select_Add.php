<?php session_start(); ?>
<?php 


	require_once '../includedb/condb.php'; 

	
										$cusa_id = $_POST['cusa_id'];

									
										 $sqlro = "select  *   FROM  akksofttech_customer_address  where   cusa_id = '".$cusa_id."' ";

										$result = mysqli_query($conn , $sqlro);

										$resultArray = array();
							
										while($rowttto = mysqli_fetch_array($result,MYSQLI_BOTH))	{	

											$arrayBill = array();

												$arrayBill  = array(
																				'cus_id'=>$rowttto['cus_id'],

																				'cusa_name'=>$rowttto['cusa_name'],
                                                                                
																				'cusa_surname'=>$rowttto['cusa_surname'],

																				'cusa_address'=>$rowttto['cusa_address'],

																				'cusa_province'=>$rowttto['cusa_province'],
                                                                                
																				'cusa_zipcode'=>$rowttto['cusa_zipcode'],
                                                                                
																				'cusa_note'=>$rowttto['cusa_note'], 

																				'cusa_id'=>$rowttto['cusa_id'], 

                                                                                'cusa_phone'=>$rowttto['cusa_phone'] 
																					
																				) ; 

											array_push($resultArray , $arrayBill);
																				
										}
				
									
										echo json_encode($resultArray);


?>