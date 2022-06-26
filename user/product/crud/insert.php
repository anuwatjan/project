<?php
 function getName($n){
     $n = 10;
     $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"; //ตัวอักษรที่สามารถสุ่มได้
     $randomstring = "";
     for($i = 0; $i < $n; $i++) {
         $index = rand(0 , strlen($characters) - 1);
         $randomstring.= $characters[$index];  
     }
     return $randomstring;
 
 }
?>
<?php
if (isset($_POST) && !empty($_POST)) {
    $product_id = getName($n);
    $product_name = $_POST['product_name'];
    $product_generic = $_POST['product_generic'];
    $product_detail = $_POST['product_detail'];
    $product_type = $_POST['product_type'];
    $product_category = $_POST['product_category'];
    $product_symptom = $_POST['product_symptom'];
//     $product_vat = $_POST['product_vat'];
    $product_net = $_POST['product_net'];
//     $product_reorder = $_POST['product_reorder'];
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
        $filename = '';
   }
    $sql = "INSERT INTO product(product_id,product_net,product_img,product_symptom,product_category,product_type,product_name,product_generic,product_detail) 
    VALUES ('$product_id','0','$filename','$product_symptom','$product_category','$product_type','$product_name','$product_generic','$product_detail')";
     $query = mysqli_query($connection, $sql);

     // $sqlse = "SELECT * FROM product  LAST_INSERT_ID()";
     $new_id_unit = mysqli_insert_id($connection);

     $unit_id = $_POST['unit_id'];
     $dunit_price = $_POST['dunit_price'];
     $dunit_sale = $_POST['dunit_sale'];
     $sqlunit = "INSERT INTO doc_unit (unit_id,product_id,dunit_price,dunit_sale) VALUES('$unit_id','$new_id_unit','$dunit_price','$dunit_sale')";
     // exit;
     if(mysqli_query($connection,$sqlunit)){
          $alert = '<script type="text/javascript">';
          $alert .= 'alert("เพิ่มข้อมูลสำเร็จ !!");';
          $alert .= 'window.location.href = "?page=product";';
          $alert .= '</script>';
          echo $alert;
          exit();
     } else {
          echo "Error: " . $query . "<br>" . mysqli_error($connection);
     }
     mysqli_close($connection);
}
     // $unitquery = mysqli_query($connection, $sqlunit);
?>

<!-- แสดง type -->

<?php
$sqltype = "SELECT * FROM type";
$querytype = mysqli_query($connection,$sqltype);
?>
<?php
$sqlcat = "SELECT * FROM category";
$querycat = mysqli_query($connection,$sqlcat);
?>
<?php
$sqlsym = "SELECT * FROM symptom";
$querysym = mysqli_query($connection,$sqlsym);
?>
<?php
$sqlunit = "SELECT * FROM unit";
$queryunit = mysqli_query($connection,$sqlunit);
?>
