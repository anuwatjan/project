<?php
if (isset($_GET['customer_id']) && !empty($_GET['customer_id'])) {
     $customer_id = $_GET['customer_id'];
     $sql = "SELECT * , a.customer_id,b.typec_id,b.typec_name AS name_type FROM customer a JOIN type_customer b ON a.customer_type = b.typec_id
  WHERE customer_id = '$customer_id'";
     $query = mysqli_query($connection, $sql);
     $result = mysqli_fetch_assoc($query);
     
     $sqltype = "SELECT * FROM type_customer";
     $querytype = mysqli_query($connection , $sqltype);

     $sqlprovince = "SELECT * FROM provinces";
     $queryprovince = mysqli_query($connection , $sqlprovince);

     $sqlamphures = "SELECT * FROM amphures";
     $queryamphures = mysqli_query($connection , $sqlamphures);

     $sqlgeo = "SELECT * FROM districts";
     $querygeo = mysqli_query($connection , $sqlgeo);
}
if (isset($_POST) && !empty($_POST)) {
     $customer_name = $_POST["customer_name"];
     $customer_phone = $_POST["customer_phone"];
     $customer_email = $_POST["customer_email"];
     $customer_add = $_POST["customer_add"];
     $customer_type = $_POST["customer_type"];
     $customer_province = $_POST["customer_province"];
     $customer_amphures = $_POST["customer_amphures"];
     $customer_geo = $_POST["customer_geo"];
     $oldimage = $_POST["oldimage"];
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
          $filename = $oldimage;
     }
     $sql = "UPDATE customer SET customer_geo='$customer_geo' , customer_amphures='$customer_amphures' , customer_province='$customer_province' , customer_type='$customer_type' , customer_name='$customer_name',customer_phone='$customer_phone' , customer_img= '$filename' , 
    customer_email = '$customer_email' , customer_add = '$customer_add'   WHERE customer_id = '$customer_id'";
     if (mysqli_query($connection, $sql)) {
          $alert = '<script type="text/javascript">';
          $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
          $alert .= 'window.location.href = "?page=customer";';
          $alert .= '</script>';
          echo $alert;
          exit();
     } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);
     }
     mysqli_close($connection);
}
