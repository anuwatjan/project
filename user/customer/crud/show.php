<?php
$query = "SELECT *
FROM customer a ORDER BY customer_id DESC";
$result = mysqli_query($connection, $query);
?>