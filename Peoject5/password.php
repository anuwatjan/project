<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 

$connect = mysqli_connect("localhost","root","akom2006","project_new");

$sql = "SELECT * FROM employee WHERE employee_id = '".$_GET['employee_id']."'" ; 

$query = mysqli_query($connect , $sql ) ; 

$result = mysqli_fetch_array($query) ; 

if (isset($_POST) && !empty($_POST)) {
	$password  = $_POST["password"];
	$new_password  = $_POST["new_password"];
	$confirm_password  = $_POST["confirm_password"];

    if($new_password != $confirm_password ){
        echo "<script type='text/javascript'>";
        echo "Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'รหัสผ่านไม่ตรงกัน',
            showConfirmButton: false,
            timer: 2000
          });";
        echo "</script>";
    }else if($password != $result['password']){
        echo "<script type='text/javascript'>";
        echo "Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'รหัสผ่านผิด',
            showConfirmButton: false,
            timer: 2000
          });";
        echo "</script>";
    }else{
    $sql = "UPDATE employee SET password ='$confirm_password'
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
}

?>
<center>
    <form role="form" class="m-5" method="post" enctype="multipart/form-data">

        <div class="form-group row mb-2">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <p>รหัสผ่านเดิม</p>
                <input type="password" class="form-control form-control-user" placeholder="รหัสผ่านเดิม" name="password"
                    required>
            </div>


        </div>

        <div class="form-group row mb-2">
            <div class="col-sm-6">
                <p>รหัสผ่านใหม่</p>
                <input type="password" class="form-control form-control-user" placeholder="รหัสผ่านใหม่"
                    name="new_password" required>
            </div>
        </div>
        <div class="form-group row mb-2">

            <div class="col-sm-6">
                <p>ยืนยันรหัสผ่านใหม่</p>
                <input type="password" class="form-control form-control-user" placeholder="ยืนยันรหัสผ่านใหม่"
                    name="confirm_password" required>
            </div>

        </div>

        <div class="row">
            <input type="hidden" name="employee_id" value="<?php echo $_GET['employee_id'];?>">
            <a href="?page=product" class="btn btn-danger btn-user " style="width:25%;">ย้อนกลับ</a>
            <button type="submit" class="btn btn-primary btn-user " style="width:25%;" id="button">แก้ไขข้อมูล</button>
        </div>

    </form>
</center>