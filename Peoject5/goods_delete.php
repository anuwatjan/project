
<?php
$connect = mysqli_connect("localhost", "root", "akom2006", "project_new");
if(isset($_POST["goods_id"]))
{
 $query = "UPDATE goods SET good_status = 3  WHERE goods_id = '".$_POST["goods_id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'ส่งคืนแล้ว';
 }else
 echo 'เกิดความผิดพลาด';
}
?>