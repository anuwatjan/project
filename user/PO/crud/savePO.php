<?php
function datetodb($date)
//    23/04/2564
{
    $day = substr($date, 0, 2); // substrตัดข้อความที่เป็นสติง
    $month = substr($date, 3, 2); //ตัดตำแหน่ง
    $year = substr($date, 6) - 543;
    $dateme = $year . '-' . $month . '-' . $day;
    return $dateme; //return ส่งค่ากลับไป
}

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
?>
<?php
if(isset($_POST) && !empty($_POST)){
$date = date('Y-m-d , H:i:s');
$po_reference = getName($n);
// $po_date = datetodb($_POST['po_date']);
$po_contact_order = $_POST['po_contact_order'];
$po_contact_sale = $_POST['po_contact_sale'];
// $po_product_start = $_POST["po_product_start"];
// $po_product_end = $_POST["po_product_end"];
@$po_qty =  $_POST["po_qty"];
@$po_total =  $_POST["po_total"];


//บันทึกการสั่งซื้อลงใน po

foreach ($_SESSION['carting'] as $product_id => $po_qty) {
    // echo $product_id;
    $po_product_start = ($_POST["po_product_start"]["$product_id"]);
    $po_product_end = ($_POST["po_product_end"]["$product_id"]);
    $total = 0 ;
    $sql3 = "SELECT * FROM product a JOIN doc_unit b ON a.product_id = b.product_id where a.product_id= '$product_id'";
    $query3 = mysqli_query($connection, $sql3);
    $row3 = mysqli_fetch_array($query3);
    $sum = $row3['dunit_price'] * $po_qty;
    $total += $sum ;
    $vat = 0.07 * $total; 
    $po_total = $total + $vat ;
    $count = mysqli_num_rows($query3);

mysqli_query($connection, "BEGIN");
$sql1 = "INSERT INTO po (product_id,po_reference,po_date,po_contact_order,po_contact_sale,po_product_start,po_product_end,po_qty,po_vat,po_sum,po_total,po_product_total)
VALUES('$product_id','$po_reference', '$date', '$po_contact_order' , '$po_contact_sale','$po_product_start' ,'$po_product_end' , '$po_qty', '$vat', '$sum' , '$po_total','$total')";
$query1 = mysqli_query($connection,$sql1);
// print_r($_SESSION['carting']);
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit;

// $sql2 = "select max(po_id) as po_id from po where po_reference='$po_reference'  and po_date='$po_date'";
// $query2 = mysqli_query($connection, $sql2);
// $row = mysqli_fetch_array($query2);
// $po_id = $row['po_id'];

// print_r($_POST);
// print_r($query1);
// print_r($row);
// exit;

// ใบรับสินค้า
// $sql4 = "INSERT INTO  good (product_id,good_reference,good_date,good_contact_order,good_contact_sale,good_product_start,good_product_end,good_qty,good_vat,good_sum,good_total)  
// VALUES('$product_id','$po_reference', '$po_date', '$po_contact_order','$po_contact_sale','$po_product_start','$po_product_end','$po_qty','$vat','$sum','$po_total')";
// $query4 = mysqli_query($connection, $sql4);


    // $sql4 = "INSERT INTO  po  VALUES(null, '$product_id', '$po_qty', '$po_total')";
    // $query4 = mysqli_query($connection, $sql4);

// ตัดสต็อก
    // for ($i = 0; $i < $count; $i++) {
        
    //     $oldnet =  $row3['product_net'];

    //     $newnet = $oldnet + $po_qty;

    //     $sql9 = "UPDATE product SET  product_net = $newnet WHERE  product_id = '$product_id' ";
    //     $query9 = mysqli_query($connection, $sql9);
    // }
}

if ($query1 ) {
    mysqli_query($connection, "COMMIT");
    $message = "บันทึกข้อมูลเรียบร้อยแล้ว ";
    foreach ($_SESSION['carting'] as $product_id) {
        unset($_SESSION['carting']);
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
    window.location = '?page=PO&function=PO';
</script>