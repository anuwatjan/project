<?php
$conn = mysqli_connect("localhost", "root", "", "test");
?>
<?php 
if (isset($_POST) && !empty($_POST)) {
    $name = $_POST['name'];
    $ss = "update status set name = '$name' where id ='$id' ";
    if (mysqli_query($conn, $ss)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "index.php";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $ss . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>