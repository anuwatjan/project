<?php session_start(); ?>
<?php 


require_once '../includedb/condb.php';  

$prod_id = $_POST['prod_id'] ; 



$sql = "SELECT * FROM akksofttech_product  where prod_id = '".$prod_id."'  ORDER BY prod_price ASC ";
$result = mysqli_query($conn, $sql);
$reslutArray = array();
while ($data = mysqli_fetch_array($result, MYSQLI_BOTH))	{

        $sql1 = "SELECT * FROM akksofttech_subproduct WHERE prod_id = '".$data['prod_id']."'  ORDER BY sprod_price ASC ";
        $result1 = mysqli_query($conn, $sql1);
        $reslutArray1 = array();
        while ($data1 = mysqli_fetch_array($result1, MYSQLI_ASSOC))	{

                $arrayBill1 = array();				
                $arrayBill1 = array( 
                        "sprod_id" => $data1['sprod_id'] ,
                        "sprod_name" => $data1['sprod_name'] ,
                        "sprod_quantity" => $data1['sprod_quantity'] ,
                        "sprod_price" => $data1['sprod_price'] ,
                   );

                array_push($reslutArray1 , $arrayBill1);

                $sql2 = "SELECT * FROM akksofttech_subproduct_one WHERE prod_id = '".$data['prod_id']."' AND sprod_id = '".$data1['sprod_id']."'  ORDER BY sprod_price ASC ";
                $result2 = mysqli_query($conn, $sql2);
                $reslutArray2 = [];
                while ($data2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))	{
                
                        $arrayBill2 = array();				
                        $arrayBill2 = array(
                                "sprodone_id" => $data2['sprodone_id'] ,
                                "sprodone_name" => $data2['sprodone_name'] ,
                                "sprodone_quantity" => $data2['sprodone_quantity'] ,
                                "sprodone_price" => $data2['sprodone_price'] ,
                         );
        
                         array_push($reslutArray2 , $arrayBill2);
        
                }
                
        }

     

                $arrayBill = array();				
                $arrayBill = array(
                        "prod_id" => $data['prod_id'] ,
                        "prod_name" => $data['prod_name'] ,
                        "prod_quantity" => $data['prod_quantity'] ,
                        "prod_price" => $data['prod_price'] ,
                        "prod_image" => $data['prod_image'] ,
                        "prod_detail" => $data['prod_detail'] ,
                        "reslutArray1" => $reslutArray1,
			"reslutArray2" => $reslutArray2,
                );

         array_push($reslutArray , $arrayBill);
	
              

}

							
echo json_encode($reslutArray);


?>


