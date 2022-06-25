<?php
$query = "SELECT DISTINCT store_number,store_date FROM store a ORDER BY store_id DESC";
$result = mysqli_query($connection, $query);
?>