<?php
$query = "SELECT DISTINCT store_number,store_date,store_total FROM store a ORDER BY store_id DESC";
$result = mysqli_query($connection, $query);
?>