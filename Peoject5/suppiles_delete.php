
<?php
$connect = mysqli_connect("localhost", "root", "akom2006", "project_new");
if(isset($_POST["suppiles_id"]))
{
 $query = "DELETE FROM suppiles WHERE suppiles_id = '".$_POST["suppiles_id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'ลบข้อมูลแล้ว';
 }else
 echo 'เกิดความผิดพลาด';
}
?>