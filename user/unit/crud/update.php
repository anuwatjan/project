<?php
if (isset($_GET['unit_id']) && !empty($_GET['unit_id'])) {
    $unit_id = $_GET['unit_id'];
    $sql = "SELECT * FROM unit  WHERE unit_id = '$unit_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST) && !empty($_POST)) {
    $unit_name = $_POST["unit_name"];
    $sql = "UPDATE unit SET unit_name='$unit_name' WHERE unit_id = '$unit_id'";
    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=unit";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
