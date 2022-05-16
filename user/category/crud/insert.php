<?php
if (isset($_POST) && !empty($_POST)) {
    $category_name = $_POST['category_name'];
    $category_detail = $_POST['category_detail'];
    
    $sql = "INSERT INTO category(category_name,category_detail)
    VALUES ('$category_name','$category_detail')";
     if(mysqli_query($connection,$sql)){
          $alert = '<script type="text/javascript">';
          $alert .= 'alert("เพิ่มข้อมูลสำเร็จ !!");';
          $alert .= 'window.location.href = "?page=category";';
          $alert .= '</script>';
          echo $alert;
          exit();
     } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);
     }
     mysqli_close($connection);
}
?>
