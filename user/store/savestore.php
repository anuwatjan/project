<?php
$n=10;
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    } 
    return $randomString;
}
date_default_timezone_set("asia/bangkok");
?>
<?php
if(isset($_POST) && !empty($_POST)){
// $po_reference = getName($n);
$store_number = getName($n);
$store_date = date('Y-m-d');
$store_get = $_POST['store_get'];
$store_change = $_POST['store_change'];
$store_total = $_POST['store_total'];
$store_customer = $_POST["store_customer"];
$store_qty =  $_POST["store_qty"];
// $store_product_total  = $sum ;
//บันทึกการสั่งซื้อลงใน po
foreach ($_SESSION['storeing'] as $product_id => $po_qty) {
    echo $product_id;
    $total = 0; 
    $sql3 = "SELECT * FROM product a JOIN doc_unit b ON a.product_id = b.product_id where a.product_id= '$product_id'";
    $query3 = mysqli_query($connection, $sql3);
    $row3 = mysqli_fetch_array($query3);
    $sum = $row3['dunit_price'] * $po_qty;
    $total += $sum ;
    $vat = 0.07 * $total; 
    $po_total = $total + $vat ;
    $count = mysqli_num_rows($query3);
    mysqli_query($connection, "BEGIN");

$sql1 = "INSERT INTO store (store_product_total,store_status,store_number,product_id,store_date,store_get,store_change,store_customer,store_qty,store_total)
VALUES('$sum','ชำระเงินแล้ว','$store_number','$product_id', '$store_date', '$store_get' , '$store_change','$store_customer' ,'$po_qty' , '$store_total')";
$query1 = mysqli_query($connection,$sql1);

$sql2 = "select max(store_id) as store_id from store where store_number='$store_number'  and store_date='$store_date'";
$query2 = mysqli_query($connection, $sql2);
$row = mysqli_fetch_array($query2);
$store_id = $row['store_id'];
// print_r($_POST);
// print_r($sql1);
// print_r($sql2);
// exit;

// ใบรับสินค้า
// $sql4 = "INSERT INTO  good (product_id,good_reference,good_date,good_contact_order,good_contact_sale,good_product_start,good_product_end,good_qty,good_vat,good_sum,good_total)  
// VALUES('$product_id','$po_reference', '$po_date', '$po_contact_order','$po_contact_sale','$po_product_start','$po_product_end','$po_qty','$vat','$sum','$po_total')";
// $query4 = mysqli_query($connection, $sql4);


    // $sql4 = "INSERT INTO  po  VALUES(null, '$product_id', '$po_qty', '$po_total')";
    // $query4 = mysqli_query($connection, $sql4);

//ตัดสต็อก
    for ($i = 0; $i < $count; $i++) {
        
        $oldnet =  $row3['product_net'];

        $newnet = $oldnet - $po_qty;

        $sql9 = "UPDATE product SET  product_net = $newnet WHERE  product_id = '$product_id' ";
        $query9 = mysqli_query($connection, $sql9);
    }
}

if ($query2 ) {
  mysqli_query($connection, "COMMIT");
   $message = "บันทึกข้อมูลเรียบร้อยแล้ว ";
   foreach ($_SESSION['storeing'] as $product_id) {
       unset($_SESSION['storeing']);
   }
 } else {
    mysqli_query($connection, "ROLLBACK");
   $message = "บันทึกข้อมูลไม่สำเร็จ";
}
mysqli_close($connection);
}
?>
<script type="text/javascript">
    alert("<?php echo $message; ?>");
    window.location = '?page=store';
</script>