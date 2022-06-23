<?php
$datenow = date('Y-m-d');
$year = date("Y");
$date = date("Y-m-d");
$week = date("N", strtotime($date));
$week1 = date("W", strtotime($date));
$date = new DateTime();
$date->setISODate($year,$week1);
$start = $date->format("Y-m-d");
$date->setISODate($year,$week1,7);
$end = $date->format("Y-m-d");
?>

<?php

$sql = "SELECT * , COUNT(a.product_id) AS count_product , SUM(a.store_total) AS count_price  FROM store a JOIN po b ON a.product_id = b.product_id WHERE a.store_date = '$datenow' group by a.store_date ";
$query = mysqli_query($connection , $sql);

$sql1 = "SELECT * , COUNT(a.product_id) AS count_product , SUM(a.store_total) AS count_price  FROM store a JOIN po b ON a.product_id = b.product_id WHERE (a.store_date BETWEEN '$start' AND  '$end') group by a.store_date ";
$query1 = mysqli_query($connection , $sql1);

// print_r($query1);
// exit;
// print_r($query);
// exit;
// $result = mysqli_fetch_assoc($query);
// while($row = mysqli_num_rows(    $query) > 1){
//     if()
// }
?>