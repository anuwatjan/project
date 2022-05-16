<?php
$query = "SELECT *
FROM symptom a ORDER BY symptom_id DESC";
$result = mysqli_query($connection, $query);
?>