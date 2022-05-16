<?php
if (isset($_POST) && !empty($_POST)) {
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_email = $_POST['customer_email'];
    $customer_type = $_POST['customer_type'];
    $customer_add = $_POST['customer_add'];
    $customer_province = $_POST['customer_province'];
    $customer_amphures = $_POST['customer_amphures'];
    $customer_geo = $_POST['customer_geo'];
    $customer_zip = $_POST['customer_zip'];
    if (isset($_FILES['customer_img']['name']) && !empty($_FILES['customer_img']['name'])) {
        $extension = array("jpeg", "jpg", "png");
        $target = './customer/upload/customer/';
        $filename = $_FILES['customer_img']['name'];
        $filetmp = $_FILES['customer_img']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array($ext, $extension)) {
             if (!file_exists($target . $filename)) {
                  if (move_uploaded_file($filetmp, $target . $filename)) {
                       $filename = $filename;
                  } else {
                       echo 'เพิ่มไม่สำเร็จ';
                  }
             } else {
                  $newfilename = time() . $filename;
                  if (move_uploaded_file($filetmp, $target . $newfilename)) {
                       $filename = $newfilename;
                  } else {
                       echo 'เพิ่มเข้าไม่ได้';
                  }
             }
        } else {
             echo 'ประเภทไม่ถูกต้อง';
        }
   } else {
        $filename = '';
   }
    $sql = "INSERT INTO customer(customer_img,customer_type,customer_name,customer_phone,customer_email,customer_add,customer_province,customer_geo,customer_amphures,customer_zip) 
    VALUES ('$filename','$customer_type','$customer_name','$customer_phone','$customer_email','$customer_add','$customer_province','$customer_geo','$customer_amphures','$customer_zip')";
     if(mysqli_query($connection,$sql)){
          $alert = '<script type="text/javascript">';
          $alert .= 'alert("เพิ่มข้อมูลสำเร็จ !!");';
          $alert .= 'window.location.href = "?page=customer";';
          $alert .= '</script>';
          echo $alert;
          exit();
     } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);
     }
     mysqli_close($connection);
}
?>

<?php
$sqltype = "SELECT * FROM type_customer";
$querytype = mysqli_query($connection,$sqltype);
?>