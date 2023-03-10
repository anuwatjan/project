
<?php 
	
        $connect = mysqli_connect("localhost","root","akom2006","project_new");

        echo $cate_name = $_POST['cate_name'];

        echo $sql = "SELECT * FROM `product` WHERE product_cate = '".$cate_name."'" ; 

        $query = mysqli_query($connect , $sql) ; 

        $reslutArray = array();
            
        while($data = mysqli_fetch_array($query,MYSQLI_BOTH))	{

                    $arrayBill =  array(

                        "product_name" => $data['product_name'] 

                    ) ; 

                    array_push($reslutArray , $arrayBill);

            }		
            
    

            echo json_encode($reslutArray);


?>