<?php session_start(); ?>
<?php 
	require_once '../includedb/condb.php'; 
				$cart_id = $_POST['cart_id'];							
				$sqlro = "select  * FROM  akksofttech_cart  
                          where   cart_id = '".$cart_id."' AND cus_id = '".$_SESSION['akksofttechsess_cusid']."' ";
				$query = mysqli_query($conn , $sqlro);
                $result = mysqli_fetch_array($query);
                $prod_name = $result['prod_name'];
                $quantity = $result['quantity'];
                $prod_price_simple = $result['prod_price_simple'] * $quantity;
                $sprod_id = $result['sprod_id'];
                $sprod_name = $result['sprod_name'];
                $sprodone_id = $result['sprodone_id'];
                $sprodone_name = $result['sprodone_name'];
                $show_price11 = $result['prod_price_simple'];
                $json=array('cart_id' => $cart_id ,  'prod_name'=> $prod_name , 'quantity'=> $quantity , 
                'prod_price_simple' => $prod_price_simple ,
                'sprod_id' => $sprod_id ,  'sprod_name' => $sprod_name ,
                'sprodone_id' => $sprodone_id ,  'sprodone_name' => $sprodone_name , 
                'show_price11' => $show_price11 ); 
                $resultArray = array();
                array_push($resultArray,$json);
                echo json_encode($resultArray);
?>