<?php
$query = "SELECT *   FROM po a JOIN product b ON a.product_id = b.product_id WHERE DATEDIFF(po_product_end,NOW())<0  ";
$result = mysqli_query($connection, $query);
?>