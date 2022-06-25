<?php
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM product  WHERE product_id = '$product_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);
}
if (isset($_POST) && !empty($_POST)) {
    $product_name = $_POST["product_name"];
    $product_detail = $_POST["product_detail"];
    $product_generic = $_POST["product_generic"];
    $product_detail = $_POST["product_detail"];
    $oldimage = $_POST["oldimage"];
    if (isset($_FILES['product_img']['name']) && !empty($_FILES['product_img']['name'])) {
        $extension = array("jpeg", "jpg", "png");
        $target = './product/upload/product/';
        $filename = $_FILES['product_img']['name'];
        $filetmp = $_FILES['product_img']['tmp_name'];
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
    $sql = "UPDATE product SET product_name='$product_name',product_detail='$product_detail' , product_img= '$filename' , 
    product_generic = '$product_generic'   WHERE product_id = '$product_id'";
    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=product";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
