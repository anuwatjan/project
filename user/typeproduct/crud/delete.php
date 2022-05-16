<?php
if (isset($_GET['type_id']) && !empty($_GET['type_id'])) {
    $type_id = $_GET['type_id'];
    $sql = "DELETE FROM type WHERE type_id = '$type_id' "; 
            if (mysqli_query($connection, $sql)) {
                $alert = '<script type="text/javascript">';
                $alert .= 'alert("ลบข้อมูลสำเร็จ !!");';
                $alert .= 'window.location.href = "?page=typeproduct";';
                $alert .= '</script>';
                echo $alert;
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }
            mysqli_close($connection);
}