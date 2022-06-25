<?php
$datenow = date('Y-m-d');
$year = date("Y");
$date = date("Y-m-d");
$week = date("N", strtotime($datenow));
$week1 = date("W", strtotime($datenow));
$date = new DateTime();
$date->setISODate($year,$week1);
$start = $date->format("Y-m-d");
$date->setISODate($year,$week1,7);
$end = $date->format("Y-m-d");


$sql = "SELECT * , COUNT(a.product_id) AS count_product , SUM(a.store_total) AS count_price  FROM store a JOIN po b ON a.product_id = b.product_id 
WHERE a.store_date = '$datenow' group by a.store_date ";
$query = mysqli_query($connection , $sql);
// $result = mysqli_fetch_assoc($query);

$sql1 = "SELECT * , COUNT(a.product_id) AS count_product , SUM(a.store_total) AS count_price  FROM store a JOIN po b ON a.product_id = b.product_id
 WHERE (a.store_date BETWEEN '$start' AND  '$end') ";
$query1 = mysqli_query($connection , $sql1);
// $result1 = mysqli_fetch_assoc($query1);
// echo '<pre>';
// echo print_r($result1);
// echo '</pre>';
// exit;    
// print_r($result);
// exit;
// print_r($query);
// exit;
// $result = mysqli_fetch_assoc($query);
// while($row = mysqli_num_rows(    $query) > 1){
//     if()
// }
?>