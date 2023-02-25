<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 

$connect = mysqli_connect("localhost","root","akom2006","project_new");

$sql = "SELECT * FROM employee WHERE employee_id = '".$_GET['employee_id']."'" ; 

$query = mysqli_query($connect , $sql ) ; 

$result = mysqli_fetch_array($query) ; 

if (isset($_POST) && !empty($_POST)) {
    $employee_name = $_POST['employee_name'];
    $employee_phone = $_POST['employee_phone'];
    $employee_email = $_POST['employee_email'];
   
    $sql = "UPDATE employee SET employee_name='$employee_name',employee_phone='$employee_phone' ,employee_email='$employee_email'
    WHERE employee_id = '".$_GET['employee_id']."'";
           
   if(mysqli_query($connect,$sql)){
       echo "<script type='text/javascript'>";
       echo "Swal.fire({
           position: 'center',
           icon: 'success',
           title: 'แก้ไขเรียบร้อย',
           showConfirmButton: false,
           timer: 2000
         });";
       echo "window.location.href='?page=store_index'";
       echo "</script>";
  } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($connect);
  }
  mysqli_close($connect);
  
}

?>

<form role="form" class="m-5" method="post" enctype="multipart/form-data">

    <div class="form-group row mb-2">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <p>ชื่อผู้ใช้งาน</p>
            <input type="text" class="form-control form-control-user" placeholder="ชื่อผู้ใช้งาน" name="employee_name"
                value="<?php echo $result['employee_name'];?>" required>
        </div>
        <div class="col-sm-6">
            <p>เบอร์โทรศัพท์</p>
            <input type="text" class="form-control form-control-user" placeholder="เบอร์โทรศัพท์"
                value="<?php echo $result['employee_phone'];?>" name="employee_phone" required>
        </div>

    </div>

    <div class="form-group row mb-2">

        <div class="col-sm-6">
            <p>อีเมล์</p>
            <input type="text" class="form-control form-control-user" placeholder="อีเมล์"
                value="<?php echo $result['employee_email'];?>" name="employee_email" required>
        </div>
        <div class="col-sm-6">
            <p>ตำแหน่ง</p>
            <input type="text" class="form-control form-control-user" placeholder="ตำแหน่ง" name="employee_role"
                value="<?php echo $result['employee_role'];?>" disabled>
        </div>
    </div>
    <center>
        <div class="row">
            <a href="?page=product" class="btn btn-danger btn-user " style="width:50%;">ย้อนกลับ</a>
            <button type="submit" class="btn btn-primary btn-user " style="width:50%;" id="button">แก้ไขข้อมูล</button>
        </div>
    </center>
</form>


