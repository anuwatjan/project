<?php
if (isset($_POST) && !empty($_POST)) {
    $symptom_name = $_POST['symptom_name'];
    $sql = "INSERT INTO symptom(symptom_name) VALUES ('$symptom_name')";
     if(mysqli_query($connection,$sql)){
          $alert = '<script type="text/javascript">';
          $alert .= 'alert("เพิ่มข้อมูลสำเร็จ !!");';
          $alert .= 'window.location.href = "?page=symp";';
          $alert .= '</script>';
          echo $alert;
          exit();
     } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);
     }
     mysqli_close($connection);
}
?>