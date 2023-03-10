<?php
session_start();

$connect = mysqli_connect("localhost","root","akom2006","project_new");

$product_suppiles = 0 ;

$sql = "SELECT * FROM product WHERE product_id = '".$product_id."' " ; 

$query = mysqli_query ($connect , $sql ) ; 

$result = mysqli_fetch_array($query) ; 

$strSQL = "

INSERT INTO po (po_create,po_RefNo,po_buyer,po_status)

VALUES

('".date("Y-m-d H:i:s")."','".$_POST["po_RefNo"]."','".$_SESSION['employee_name']."' ,'รอยืนยัน') ";


mysqli_query($connect , $strSQL) or die(mysqli_error());

$strOrderID = mysqli_insert_id($connect);


if (isset($_POST) && !empty($_POST)) {

    $date = date('Y-m-d');

 foreach ($_SESSION['cart'] as $product_id => $product_quantity) {

        $total = 0;

	    $strSQLShow = "SELECT * FROM product WHERE product_id = '".$product_id."' ";

		$objQuery = mysqli_query($connect , $strSQLShow)  or die(mysqli_error());

		$objResult = mysqli_fetch_array($objQuery);

		$product_suppiles = $objResult['product_suppiles'];

		$Total = $product_quantity * $objResult["product_price"];

		$SumTotal = $SumTotal + $Total;

		$Real = (($SumTotal * 0.07) + $SumTotal);

		echo $strSQL = "

			 	INSERT INTO po_detail (po_id,product_id,product_name,product_quantity,product_total ,product_start_date , product_end_date, product_suppiles, product_unit, product_price)

				VALUES

				('".$strOrderID."','".$product_id."','".$objResult['product_name']."','".$product_quantity."','".$Total."' , '0' , '0' , '".$objResult['product_suppiles']."' , '".$objResult['product_unit']."', '".$objResult['product_price']."') 

			  ";




			  mysqli_query($connect , $strSQL) or die(mysqli_error());

 }


 if ($query1) {

    mysqli_query($connect, "COMMIT");

    $message = "บันทึกข้อมูลเรียบร้อยแล้ว ";

    foreach ($_SESSION['cart'] as $product_id) {

        unset($_SESSION['cart']);

    }
} else {

    mysqli_query($connect, "ROLLBACK");

    $message = "บันทึกข้อมูลสำเร็จ";

	foreach ($_SESSION['cart'] as $product_id) {

        unset($_SESSION['cart']);

    }

}

mysqli_close($connect);

}

?>
<script type="text/javascript">
    alert("<?php echo $message; ?>");
    window.location = 'index.php?page=phase';
</script>