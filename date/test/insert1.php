<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "" , "test");

?>

<form action="insert.php" method="post">
    <p>ชื่อ</p>
    <input name="name" >
    <button type="submit">ตกลง</button>
</form>