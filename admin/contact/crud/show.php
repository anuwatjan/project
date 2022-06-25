<?php
$query = "SELECT *
FROM contact a ORDER BY contact_id DESC";
$result = mysqli_query($connection, $query);
?>