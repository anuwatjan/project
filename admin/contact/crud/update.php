<?php
if (isset($_GET['contact_id']) && !empty($_GET['contact_id'])) {
    $contact_id = $_GET['contact_id'];
    $sql = "SELECT * FROM contact a left join provinces b on a.contact_province = b.id WHERE a.contact_id = '$contact_id'";
    $query = mysqli_query($connection, $sql);
    $result = mysqli_fetch_assoc($query);

    $sqlprovince = "SELECT * FROM provinces";
    $queryprovince = mysqli_query($connection , $sqlprovince);

    $sqlamphures = "SELECT * FROM amphures";
    $queryamphures = mysqli_query($connection , $sqlamphures);

    $sqlgeo = "SELECT * FROM districts";
    $querygeo = mysqli_query($connection , $sqlgeo);

}
if (isset($_POST) && !empty($_POST)) {
    $contact_name = $_POST["contact_name"];
    $contact_phone = $_POST["contact_phone"];
    $contact_email = $_POST["contact_email"];
    $contact_add = $_POST["contact_add"];
    $contact_province = $_POST["contact_province"];
    $contact_amphures = $_POST["contact_amphures"];
    $contact_geo = $_POST["contact_geo"];
    $oldimage = $_POST["oldimage"];
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
        $filename = $oldimage;
   }
    $sql = "UPDATE contact SET contact_geo='$contact_geo' , contact_amphures='$contact_amphures' , contact_province='$contact_province' ,contact_name='$contact_name',contact_phone='$contact_phone' , contact_img= '$filename' , 
    contact_email = '$contact_email' , contact_add = '$contact_add'   WHERE contact_id = '$contact_id'";
    if (mysqli_query($connection, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=contact";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
}
