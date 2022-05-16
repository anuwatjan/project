<?php
if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $sql = "SELECT * FROM category  WHERE category_id = '$category_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST) && !empty($_POST)) {
    $category_name = $_POST["category_name"];
    $category_detail = $_POST["category_detail"];
    $sql = "UPDATE category SET category_name='$category_name',category_detail='$category_detail'   WHERE category_id = '$category_id'";
    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=category";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
