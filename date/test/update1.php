<?php
$conn = mysqli_connect("localhost", "root", "", "test");
?>
<?php if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $edit  = "select * from status where id = '$id' ";
    $ok = mysqli_query($conn, $edit);
    $row = mysqli_fetch_assoc($ok);
    // print_r($row);
    // exit;
}
if (isset($_POST) && !empty($_POST)) {
    $name = $_POST['name'];
    $ss = "update status set name = '$name' where id ='$id' ";
    $okss = mysqli_query($conn, $ss);

    $old_name = $_REQUEST['old_name'];
    $date = date('Y-m-d');
    $old = "insert into doc_status(id, name , date) values ('$name' , '$date')";
    $okold = mysqli_query($conn, $old);
}
?>

<form action="" method="post">
    <input value="<?php echo $row['name']; ?>" name="name">
    <input id="" type="hidden" name="old_name" value="<?php echo $data2['name'] ?>">
    <button type="submit">แก้ไข</button>
</form>