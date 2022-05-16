<?php
include 'connect.php'; // MySQL Connection
if (isset($_GET['symptom_id']) && !empty($_GET['symptom_id'])) {
  $symptom_id = $_GET['symptom_id'];
  $sql = "SELECT *  FROM symptom WHERE symptom_id = '$symptom_id'";
  $query = mysqli_query($connection, $sql);
  $result = mysqli_fetch_assoc($query);

}
?>