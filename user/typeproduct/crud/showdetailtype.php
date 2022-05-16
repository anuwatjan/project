<?php
include 'connect.php'; // MySQL Connection
if (isset($_GET['type_id']) && !empty($_GET['type_id'])) {
  $type_id = $_GET['type_id'];
  $sql = "SELECT *  FROM type WHERE type_id = '$type_id'";
  $query = mysqli_query($connection, $sql);
  $result = mysqli_fetch_assoc($query);

}
?>