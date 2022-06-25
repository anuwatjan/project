<?php
include 'connect.php'; // MySQL Connection
if (isset($_GET['customer_id']) && !empty($_GET['customer_id'])) {
  $customer_id = $_GET['customer_id'];
  $sql = "SELECT * , a.customer_id,b.typec_id,b.typec_name AS name_type FROM customer a JOIN type_customer b ON a.customer_type = b.typec_id
  WHERE customer_id = '$customer_id'";
  $query = mysqli_query($connection, $sql);
  $result = mysqli_fetch_assoc($query);

}
?>