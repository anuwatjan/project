<?php
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
$datenow = date('Y-m-d');
$sql = "SELECT * FROM store WHERE store_date = '$datenow'";
$query = mysqli_query($connection , $sql);
print_r($query);
exit;
// $result = mysqli_fetch_assoc($query);
// while($row = mysqli_num_rows($query) > 1){
//     if()
// }
?>