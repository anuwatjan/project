<?php
$query = "SELECT *
FROM product a ORDER BY product_id DESC";
$result = mysqli_query($connection, $query);
?>