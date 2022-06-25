<?php
if (isset($_POST) && !empty($_POST)) {
    $user_name = $_POST['user_name'];
    $user_phone = $_POST['user_phone'];
    $user_date = $_POST['user_date'];
    $user_status = $_POST['user_status'];
    if (isset($_FILES['user_img']['name']) && !empty($_FILES['user_img']['name'])) {
        $extension = array("jpeg", "jpg", "png");
        $target = '../user/upload/user/';
        $filename = $_FILES['user_img']['name'];
        $filetmp = $_FILES['user_img']['tmp_name'];
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
    $sql = "INSERT INTO user(user_img,user_name,user_phone,user_date,user_status) 
    VALUES ('$filename','$user_name','$user_phone','$user_date','$user_status')";
     if(mysqli_query($connection,$sql)){
          $alert = '<script type="text/javascript">';
          $alert .= 'alert("เพิ่มข้อมูลสำเร็จ !!");';
          $alert .= 'window.location.href = "?page=user";';
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
$sqltype = "SELECT * FROM type_user";
$querytype = mysqli_query($connection,$sqltype);
?>