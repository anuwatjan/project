<?php
include 'connect.php'; // MySQL Connection
if (isset($_GET['good_reference']) && !empty($_GET['good_reference'])) {
  $good_reference = $_GET['good_reference'];
  $sql = "SELECT * , a.product_id,b.product_id,b.product_name AS name_product 
  FROM good a join product b ON a.product_id = b.product_id JOIN doc_unit c ON b.product_id = c.product_id  WHERE a.good_reference = '$good_reference'";
  $query = mysqli_query($connection, $sql);
  $result = mysqli_fetch_assoc($query);


}
?>