<?php
if (isset($_GET['type_id']) && !empty($_GET['type_id'])) {
    $type_id = $_GET['type_id'];
    $sql = "SELECT * FROM type  WHERE type_id = '$type_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
    // print_r($result);
    // exit;
}
if (isset($_POST) && !empty($_POST)) {
    $type_name = $_POST["type_name"];
    $sql = "UPDATE type SET type_name='$type_name' WHERE type_id = '$type_id'";
    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=typeproduct";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>