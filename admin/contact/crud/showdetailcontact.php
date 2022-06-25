<?php
include 'connect.php'; // MySQL Connection
if (isset($_GET['contact_id']) && !empty($_GET['contact_id'])) {
  $contact_id = $_GET['contact_id'];
  $sql = "SELECT *  FROM contact a left join provinces b on a.contact_province = b.id   WHERE a.contact_id = '$contact_id'";
  
  $query = mysqli_query($connection, $sql);
  $result = mysqli_fetch_assoc($query);

}
?>