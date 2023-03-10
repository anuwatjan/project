
<?php
$connect = mysqli_connect("localhost", "root", "akom2006", "project_new");
if(isset($_POST["customer_name"], $_POST["customer_last"], $_POST["customer_phone"], $_POST["customer_address"], $_POST["customer_drug"]))
{
 $customer_name = mysqli_real_escape_string($connect, $_POST["customer_name"]);
 $customer_last = mysqli_real_escape_string($connect, $_POST["customer_last"]);
 $customer_phone = mysqli_real_escape_string($connect, $_POST["customer_phone"]);
 $customer_address = mysqli_real_escape_string($connect, $_POST["customer_address"]);
 $customer_drug = mysqli_real_escape_string($connect, $_POST["customer_drug"]);
 $query = "INSERT INTO customer(customer_name, customer_last,customer_phone,customer_address,customer_drug) VALUES('$customer_name', '$customer_last', '$customer_phone', '$customer_address', '$customer_drug')";
 if(mysqli_query($connect, $query))
 {
  echo 'เพิ่มเรียบร้อย';
 }
}
?>
