<?php
include 'connect.php'; // MySQL Connection
if (isset($_GET['po_reference']) && !empty($_GET['po_reference'])) {
  $po_reference = $_GET['po_reference'];
  $sql = "SELECT * , a.product_id,b.product_id,b.product_name AS name_product  , SUM(a.po_product_total) AS sumtotal , SUM(a.po_vat) AS vat
  FROM po a join product b ON a.product_id = b.product_id JOIN doc_unit c ON b.product_id = c.product_id  WHERE a.po_reference = '$po_reference'";
  $query = mysqli_query($connection, $sql);
  $result = mysqli_fetch_assoc($query);
}
?>