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


$sql = "SELECT * , COUNT(a.product_id) AS count_product , SUM(a.store_total) AS count_price   , MAX(a.store_qty) AS maxstore
FROM store a JOIN po b ON a.product_id = b.product_id 
WHERE a.store_date = '$datenow' group by a.store_date ";
$query = mysqli_query($connection , $sql);

$sql1 = "SELECT * , COUNT(a.product_id) AS count_product , SUM(a.store_total) AS count_price  FROM store a JOIN po b ON a.product_id = b.product_id
 WHERE (a.store_date BETWEEN '$start' AND  '$end') ";
$query1 = mysqli_query($connection , $sql1);

$sql2 = "SELECT * , b.product_id,c.product_id,c.product_name AS nameproduct
FROM store a JOIN po b ON a.product_id = b.product_id JOIN product c ON c.product_id = b.product_id ORDER BY store_qty DESC LIMIT 0,5 ";
$query2 = mysqli_query($connection , $sql2);
// print_r($query2);
// exit;

?>