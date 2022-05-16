<?php
if (isset($_POST) && !empty($_POST)) {
    $contact_name = $_POST['contact_name'];
    $contact_phone = $_POST['contact_phone'];
    $contact_email = $_POST['contact_email'];
    $contact_add = $_POST['contact_add'];
    $contact_province = $_POST['contact_province'];
    $contact_amphures = $_POST['contact_amphures'];
    $contact_geo = $_POST['contact_geo'];
    $contact_zip = $_POST['contact_zip'];
    $contact_number = $_POST['contact_number'];
    if (isset($_FILES['contact_img']['name']) && !empty($_FILES['contact_img']['name'])) {
        $extension = array("jpeg", "jpg", "png");
        $target = './contact/upload/contact/';
        $filename = $_FILES['contact_img']['name'];
        $filetmp = $_FILES['contact_img']['tmp_name'];
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
    $sql = "INSERT INTO contact(contact_number,contact_img,contact_name,contact_phone,contact_email,contact_add,contact_province,contact_geo,contact_amphures,contact_zip) 
    VALUES ('$contact_number','$filename','$contact_name','$contact_phone','$contact_email','$contact_add','$contact_province','$contact_geo','$contact_amphures','$contact_zip')";
     if(mysqli_query($connection,$sql)){
          $alert = '<script type="text/javascript">';
          $alert .= 'alert("เพิ่มข้อมูลสำเร็จ !!");';
          $alert .= 'window.location.href = "?page=contact";';
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
$sqltype = "SELECT * FROM type_contact";
$querytype = mysqli_query($connection,$sqltype);
?>