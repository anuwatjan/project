<?php
if (isset($_GET['symptom_id']) && !empty($_GET['symptom_id'])) {
    $symptom_id = $_GET['symptom_id'];
    $sql = "SELECT * FROM symptom  WHERE symptom_id = '$symptom_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST) && !empty($_POST)) {
    $symptom_name = $_POST["symptom_name"];
    $sql = "UPDATE symptom SET symptom_name='$symptom_name' WHERE symptom_id = '$symptom_id'";
    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=symp";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
