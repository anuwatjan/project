
<?php
$connect = mysqli_connect("localhost", "root", "akom2006", "project_new");
if(isset($_POST["type_name"]))
{
 $type_name = mysqli_real_escape_string($connect, $_POST["type_name"]);
 $query = "INSERT INTO type(type_name) VALUES('$type_name')";
 if(mysqli_query($connect, $query))
 {
  echo 'เพิ่มเรียบร้อย';
 }
}
?>
