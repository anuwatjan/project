
<?php
$connect = mysqli_connect("localhost", "root", "akom2006", "project_new");
if(isset($_POST["type_id"]))
{
 $query = "DELETE FROM type WHERE type_id = '".$_POST["type_id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'ลบข้อมูลแล้ว';
 }else
 echo 'เกิดความผิดพลาด';
}
?>