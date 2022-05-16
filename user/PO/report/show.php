<?php
include 'connect.php'; // MySQL Connection
if (isset($_GET['po_reference']) && !empty($_GET['po_reference'])) {
  $po_reference = $_GET['po_reference'];
  $sql = "SELECT * , a.product_id,b.product_id,b.product_name AS name_product , c.unit_id,d.unit_id,d.unit_name AS name_unit
  FROM po a join product b ON a.product_id = b.product_id JOIN doc_unit c ON b.product_id = c.product_id
  JOIN unit d ON d.unit_id = c.unit_id  WHERE a.po_reference = '$po_reference'";
  $query = mysqli_query($connection, $sql);
  // $result1 = mysqli_fetch_assoc($query);

  $sql1 = "SELECT * , a.product_id,b.product_id,b.product_name AS name_product , c.unit_id,d.unit_id,d.unit_name AS name_unit
  FROM po a join product b ON a.product_id = b.product_id JOIN doc_unit c ON b.product_id = c.product_id
  JOIN unit d ON d.unit_id = c.unit_id  WHERE a.po_reference = '$po_reference'";
  $query1 = mysqli_query($connection, $sql1);
  $result1 = mysqli_fetch_assoc($query1);
}
?>
<?php 
$sql_con = "select * from contact";
$query_con = mysqli_query($connection , $sql_con);
$result_con = mysqli_fetch_assoc($query_con);
?>