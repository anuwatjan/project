<?php
// ตรวจสอบค่าที่จำเป็นว่ามีการส่งมามั้ย ถ้าไม่ส่งมา จะไม่ทำงานทั้งหมด
if (isset($_GET['po_reference']) && !empty($_GET['po_reference'])) {
    $po_reference = $_GET['po_reference'];
    // ค้นฐานข้อมูลจากค่าที่ส่งเข้ามา ได้ 3 รายการ
    $sql = "SELECT * FROM po a JOIN product b ON a.product_id = b.product_id WHERE a.po_reference = '$po_reference'";
    $query = mysqli_query($connection, $sql);
    // เช็คข้อมูลที่ query ออกมาว่ามีกี่รายการ แล้วเก็บค่าไว้ในตัวแปร $count
    $countnum = mysqli_num_rows($query);
    // ถ้า ตัวแปร $query(po_reference) ที่รับค่ามา ซึ่งเก็บใน ตัวแปร $count มีค่าในฐานข้อมูลแล้ว ให้แสดงว่าเก็บไปแล้ว   
    if ($countnum < 0) {
        echo "<script>";
        echo "alert(' เพิ่มใบรับสินค้านี้ไปแล้ว !');";
        echo "window.location='?page=PO';";
        echo "</script>";
        // วนแสดงผลทั้งสามรายการ แต่ละรอบ $result ก็จะมีค่าเปลี่ยนไปในแต่ละรอบ ตามข้อมูลแต่ละรายการจากทั้งหมด สามรายการ
        // หากเราต้องการทำอะไรกับ 3 รายการนี้ เช่น แสดงผล หรือ insert ก็สามารถทำได้ใน while loop นี้เลย แต่ละรอบ ข้อมูลก็จะแตกต่างการตามข้อมูลแต่ละรายการ
        // ถ้าไม่มีค่า ก็ทำการ insert
    } else {
        while ($result = mysqli_fetch_assoc($query)) {
            $date = date('Y-m-d');
            $sqlinsert = "INSERT INTO good(good_reference,good_date,good_import,good_contact_order,good_contact_sale,product_id,good_product_start,good_product_end,good_qty,good_vat,good_sum,good_total)
            values('$result[po_reference]','$result[po_date]','$date','$result[po_contact_order]','$result[po_contact_sale]','$result[product_id]','$result[po_product_start]','$result[po_product_end]','$result[po_qty]','$result[po_vat]','$result[po_sum]','$result[po_total]')";
            $query2 = mysqli_query($connection, $sqlinsert);
            // เพิ่มจำนวนสินค้า
            // for ($i = 0; $i < $countnum; $i++) {
            // ค่า $result['product_net'] ไม่ถูกเปลี่ยนตาม while loop
            $oldnet =  $result['product_net'];
            $newnet = $oldnet + $result['po_qty']; // อันนี้ด้วย
            $sql9 = "UPDATE product SET  product_net = $newnet WHERE  product_id = '$result[product_id]' "; // อันนี้ด้วย
            $result9 = mysqli_query($connection, $sql9);
            // echo '<pre>'.print_r($newnet, 1).'</pre>';
            echo "<script>";
            echo "alert(' เพิ่มใบรับสินค้านี้ไปแล้ว !');";
            echo "window.location='?page=GOOD';";
            echo "</script>";
        }
              // if (mysqli_query($connection, $sql9)) {
            //     $alert = '<script type="text/javascript">';
            //     $alert .= 'alert("เพิ่มลงในใบรับสินค้าสำเร็จ !!");';
            //     $alert .= 'window.location.href = "?page=GOOD";';
            //     $alert .= '</script>';
            //     echo $alert;
            //     exit();
            // } else {
            //     echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            // }
            // mysqli_close($connection);
    }
}
    // }
// $po_date = $result['po_date'];
// $po_contact_order = $result['po_contact_order'];
// $po_contact_sale = $result['po_contact_sale'];
// $product_id = $result['product_id'];
// $po_product_start = $result['po_product_start'];
// $po_product_end = $result['po_product_end'];
// $po_qty = $result['po_qty'];
// $po_sum = $result['po_sum'];
// $po_total = $result['po_total'];
// $po_vat = $result['po_vat'];
// $date = date('Y-m-d');
// $check1 = "select * from good  where good_reference = '$po_reference' ";
// $query1 = mysqli_query($connection, $check1);
// while ($result1 = mysqli_fetch_assoc($query1)) {
//     echo '<pre>'.print_r($result1, 1).'</pre>';
// }
// $num = mysqli_num_rows($query1);
// if ($num > 0) {
//     echo "<script>";
//     echo "alert(' เพิ่มใบรับสินค้านี้ไปแล้ว !');";
//     echo "window.location='?page=PO';";
//     echo "</script>";
// } else {
    // while ($result1 = mysqli_fetch_assoc($query1)) {
    // $sqlinsert = "INSERT INTO good(good_reference,good_date,good_import,good_contact_order,good_contact_sale,product_id,good_product_start,good_product_end,good_qty,good_vat,good_sum,good_total)
    // values('$po_reference','$po_date','$date','$po_contact_order','$po_contact_sale','$product_id','$po_product_start','$po_product_end','$po_qty','$po_vat','$po_sum','$po_total')";
    // $query2 = mysqli_query($connection, $sqlinsert);
    // $result2 = mysqli_fetch_assoc($query2) ;
    // print_r($result);
    // exit;

    // echo '<pre>'.print_r($result2, 1).'</pre>';
    // exit;
    // while ($result2 = mysqli_fetch_assoc($query1)) {
    //     echo '<pre>'.print_r($result2, 1).'</pre>';
    // }
    // // ตัดสต็อก
    // for ($i = 0; $i < $count; $i++) {

    //     $oldnet =  $result['product_net'];

    //     $newnet = $oldnet + $po_qty;

    //     $sql9 = "UPDATE product SET  product_net = $newnet WHERE  product_id = '$product_id' ";
    //     if (mysqli_query($connection, $sql9)) {
    //         $alert = '<script type="text/javascript">';
    //         $alert .= 'alert("เพิ่มลงในใบรับสินค้าสำเร็จ !!");';
    //         $alert .= 'window.location.href = "?page=GOOD";';
    //         $alert .= '</script>';
    //         echo $alert;
    //         exit();
    //     } else {
    //         echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    //     }
    //     mysqli_close($connection);
    // }