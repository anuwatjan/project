<?php
	session_start();
	
	$product_id = $_GET['product_id']; 
	$act1 = $_GET['act1'];
	$_SESSION['sales_get'] ; 
	$_SESSION['customer_name'];

	if($act1=='add' && !empty($product_id))
	{
		if(isset($_SESSION['cart1'][$product_id]))
		{
			$_SESSION['cart1'][$product_id]++;
		}
		else
		{
			$_SESSION['cart1'][$product_id]=1;
		}
	}

	if($act1=='remove' && !empty($product_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart1'][$product_id]);
	}

	if($act1=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $product_id=>$amount)
		{
			$_SESSION['cart1'][$product_id]=$amount;
		}
	}
?>
