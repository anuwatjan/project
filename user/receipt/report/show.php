<?php
include 'connect.php'; // MySQL Connection
if (isset($_GET['store_number']) && !empty($_GET['store_number'])) {
  $store_number = $_GET['store_number'];
  $sql = "SELECT *,d.unit_id,e.unit_id,e.unit_name AS name_unit  FROM store a JOIN product b ON a.product_id = b.product_id JOIN po c ON c.product_id = b.product_id 
  JOIN doc_unit d ON d.product_id  = b.product_id JOIN unit e ON e.unit_id = d.unit_id WHERE a.store_number = '$store_number'";
  $query = mysqli_query($connection, $sql);
  // $countnum = mysqli_num_rows($query);
  // while ($result = mysqli_fetch_assoc($query)) {
  //   echo '<pre>'.print_r($result, 1).'</pre>';
  // }
  // exit;
  $sql1 = "SELECT * ,d.unit_id,e.unit_id,e.unit_name AS name_unit FROM store a JOIN product b ON a.product_id = b.product_id JOIN po c ON c.product_id = b.product_id 
  JOIN doc_unit d ON d.product_id  = b.product_id JOIN unit e ON e.unit_id = d.unit_id WHERE a.store_number = '$store_number'";
  $query1 = mysqli_query($connection, $sql1);
  $result1 = mysqli_fetch_assoc($query1);
  // print_r($result1);
  // exit;
}
?>