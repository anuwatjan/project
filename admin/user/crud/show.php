<?php
$query = "SELECT *
FROM user a ORDER BY user_id DESC";
$result = mysqli_query($connection, $query);
?>