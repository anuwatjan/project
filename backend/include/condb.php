<?php

$pass = 'akom2006';
$host = '192.168.0.134';
$usr = 'root';
$dbname = 'akk_ecommerce';	

// $pass = 'akom2006';
// $host = '119.59.125.79';
// $usr = 'admin_akkecommerce';
// $dbname = 'admin_akkecommerce';	






$connect = mysqli_connect($host,$usr,$pass);
mysqli_select_db($connect,$dbname);
mysqli_query($connect,"set names utf8");

?>





