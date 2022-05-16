<?php
$query = "SELECT DISTINCT good_reference,good_date FROM good  ORDER BY good_id DESC";
$result = mysqli_query($connection, $query);
?>