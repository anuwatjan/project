<?php
if (isset($_GET['unit_id']) && !empty($_GET['unit_id'])) {
    $unit_id = $_GET['unit_id'];
    $sql = "DELETE FROM unit WHERE unit_id = '$unit_id' "; 
            if (mysqli_query($connection, $sql)) {
                $alert = '<script type="text/javascript">';
                $alert .= 'alert("ลบข้อมูลสำเร็จ !!");';
                $alert .= 'window.location.href = "?page=unit";';
                $alert .= '</script>';
                echo $alert;
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }
            mysqli_close($connection);
}