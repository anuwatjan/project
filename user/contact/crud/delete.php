<?php
if (isset($_GET['contact_id']) && !empty($_GET['contact_id'])) {
    $contact_id = $_GET['contact_id'];
    $sql = "DELETE FROM contact WHERE contact_id = '$contact_id' "; 
            if (mysqli_query($connection, $sql)) {
                $alert = '<script type="text/javascript">';
                $alert .= 'alert("ลบข้อมูลสำเร็จ !!");';
                $alert .= 'window.location.href = "?page=contact";';
                $alert .= '</script>';
                echo $alert;
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }
            mysqli_close($connection);
}