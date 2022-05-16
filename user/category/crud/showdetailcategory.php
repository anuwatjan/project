<?php
include 'connect.php'; // MySQL Connection
if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
  $category_id = $_GET['category_id'];
  $sql = "SELECT * FROM category a WHERE category_id = '$category_id'";
  $query = mysqli_query($connection, $sql);
  $result = mysqli_fetch_assoc($query);
}
?>