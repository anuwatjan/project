<?php
include 'connect.php'; // MySQL Connection
if (isset($_GET['unit_id']) && !empty($_GET['unit_id'])) {
  $unit_id = $_GET['unit_id'];
  $sql = "SELECT *  FROM unit WHERE unit_id = '$unit_id'";
  $query = mysqli_query($connection, $sql);
  $result = mysqli_fetch_assoc($query);

}
?>