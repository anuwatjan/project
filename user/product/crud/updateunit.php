<?php
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM product a JOIN doc_unit b ON a.product_id = b.product_id  WHERE a.product_id = '$product_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST) && !empty($_POST)) {
    $dunit_sale = $_POST["dunit_sale"];
    $dunit_price = $_POST["dunit_price"];
    $product_reorder = $_POST["product_reorder"];
    $sql = "UPDATE product a JOIN doc_unit b ON a.product_id = b.product_id  SET dunit_sale='$dunit_sale',dunit_price='$dunit_price' ,product_reorder='$product_reorder' WHERE a.product_id = '$product_id'";
    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=product";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
