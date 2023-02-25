   <table class="table table-bordered" id="example">
<?php
	require'database.php';
	if(ISSET($_POST['filter'])){
		$product_suppiles=$_POST['category'];
 
		$query=mysqli_query($conn, "SELECT * FROM `product` WHERE `product_suppiles`='".$product_suppiles."'");
		while($fetch=mysqli_fetch_array($query)){
			echo"<tr><td>".$fetch['product_name']."</td><td>".$fetch['product_suppiles']."</td><td>".$fetch['product_quantity']."</td><td>".$fetch['product_point']."</td></tr>";
		}
	}else if(ISSET($_POST['reset'])){
		$query=mysqli_query($conn, "SELECT * FROM `product`");
		while($fetch=mysqli_fetch_array($query)){
	echo"<tr><td>".$fetch['product_name']."</td><td>".$fetch['product_suppiles']."</td><td>".$fetch['product_quantity']."</td><td>".$fetch['product_point']."</td></tr>";
		}
	}else{
		$query=mysqli_query($conn, "SELECT * FROM `product`");
		while($fetch=mysqli_fetch_array($query)){
	echo"<tr><td>".$fetch['product_name']."</td><td>".$fetch['product_suppiles']."</td><td>".$fetch['product_quantity']."</td><td>".$fetch['product_point']."</td></tr>";
		}
	}
?>
 </table>

