<?php
if (isset($_GET['symptom_id']) && !empty($_GET['symptom_id'])) {
    $symptom_id = $_GET['symptom_id'];
    $sql = "DELETE FROM symptom WHERE symptom_id = '$symptom_id' "; 
            if (mysqli_query($connection, $sql)) {
                $alert = '<script type="text/javascript">';
                $alert .= 'alert("ลบข้อมูลสำเร็จ !!");';
                $alert .= 'window.location.href = "?page=symp";';
                $alert .= '</script>';
                echo $alert;
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
            }
            mysqli_close($connection);
}