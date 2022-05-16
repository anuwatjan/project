<?php
if (isset($_POST) && !empty($_POST)) {
    $unit_name = $_POST['unit_name'];
    $sql = "INSERT INTO unit(unit_name) VALUES ('$unit_name')";
     if(mysqli_query($connection,$sql)){
          $alert = '<script type="text/javascript">';
          $alert .= 'alert("เพิ่มข้อมูลสำเร็จ !!");';
          $alert .= 'window.location.href = "?page=unit";';
          $alert .= '</script>';
          echo $alert;
          exit();
     } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);
     }
     mysqli_close($connection);
}
?>