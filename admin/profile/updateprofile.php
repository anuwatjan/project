<?php
    $user = $_SESSION['user_login'];
    $sql = "SELECT * FROM user  WHERE username = '$user'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);

if (isset($_POST) && !empty($_POST)) {
    if(isset($_POST['profile'])){
    $user_name = $_POST["user_name"];
    $user_phone = $_POST["user_phone"];
    $user_date = $_POST["user_date"];
    $oldimage = $_POST["oldimage"];
    if (isset($_FILES['user_img']['name']) && !empty($_FILES['user_img']['name'])) {
      $extension = array("jpeg", "jpg", "png");
      $target = '../upload/user/';
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
      $filename = $oldimage;
 }
      $sql = "UPDATE user SET user_name='$user_name', user_phone= '$user_phone'  ,  user_date = '$user_date'  , user_img = '$filename'
        WHERE username = '$user'";
  if (mysqli_query($connection, $sql)) {
    $_SESSION['image_login'] = $filename;
      $alert = '<script type="text/javascript">';
      $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
      $alert .= 'window.location.href = "?page=profile";';
      $alert .= '</script>';
      echo $alert;
      exit();
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }
  mysqli_close($connection);
}
}
    if(isset($_POST['checkpassword'])){
      $oldpassword = sha1(md5($_POST['oldpassword']));
      $newpassword = $_POST['newpassword'];
      $confirmpassword = $_POST['confirmpassword'];
      if (isset($oldpassword) && !empty($oldpassword)){
        $sql_check = "SELECT * FROM user WHERE username = '$user' AND password = '$oldpassword' ";
        $query_check = mysqli_query($connection, $sql_check);
        $row_check = mysqli_num_rows($query_check);
    if($row_check == 1){
      $alert = '<script type="text/javascript">';
            $alert .= 'alert("รหัสผ่านเก่าไม่ถูกต้อง กรุณาแก้ไขใหม่ !!");';
            $alert .= 'window.location.href = "?page=profile";';
            $alert .= '</script>';
            echo $alert;
            exit(); 
    }else{
if($newpassword != $confirmpassword){
  $alert = '<script type="text/javascript">';
            $alert .= 'alert("ยืนยันรหัสผ่านไม่ถูกต้อง กรุณาแก้ไขใหม่ !!");';
            $alert .= 'window.location.href = "?page=profile";';
            $alert .= '</script>';
            echo $alert;
            exit(); 
}else{
  $sql ="UPDATE user SET password  = '$newpassword' WHERE username = '$user'";
  if (mysqli_query($connection, $sql)) {
        $_SESSION['image_login'] = $filename;
          $alert = '<script type="text/javascript">';
          $alert .= 'alert("เปลี่ยนแปลงรหัสผ่านสำเร็จ !!");';
          $alert .= 'window.location.href = "?page=profile";';
          $alert .= '</script>';
          echo $alert;
          exit();
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);
      }
      mysqli_close($connection);
    }
  }
}
  }
   
?>