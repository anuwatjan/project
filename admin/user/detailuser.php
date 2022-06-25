<?php include('crud/showdetailuser.php'); ?>
<hr>
<form action="" method="post">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-12">
        <form action="" method="post" id="registration">
          <nav>
            <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
              <a class="nav-link active" id="step1-tab" data-bs-toggle="tab" href="#step1">ข้อมูลทั่วไป</a>   
            </div>
          </nav>
          <div class="tab-content py-4">
            <div class="tab-pane fade show active" id="step1">
              <div class="mb-3">
                <div class="card">

                  <center>
                    <img src="../user/upload/user/<?= $result['user_img']; ?>" width="300" height="300" class="rounded-circle">
                    <P style="font-size:larger;">คุณ : <?= $result['user_name'] ?></P>
    <a href="?page=<?= $_GET['page'] ?>&function=deleteuser&user_id=<?= $result['user_id'] ?>" style="float: right;" onclick="return confirm('คุณต้องการลบสินค้านี้ : <?= $result['user_name'] ?> หรือไม่ ??')" class="btn btn-danger">ลบข้อมูล</a>
    <!-- <a href="?page=<?= $_GET['page'] ?>&function=updateuser&user_id=<?= $result['user_id'] ?>" style="float: right;" class="btn btn-warning text-white">แก้ไขข้อมูล</a>              -->
  </center>
                  <hr>
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-secondary">ประเภทผู้ใช้งานระบบ</td>
                        <td class="text-end"><a><?= $result['user_status'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">ชื่อ-นามสกุล ลูกค้า</td>
                        <td class="text-end"><a><?= $result['user_name'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">เบอร์โทรศัพท์ลูกค้า</td>
                        <td class="text-end"><a><?= $result['user_phone'] ?></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
         
          
          </div>

        </form>
      </div>
    </div>
  </div>



</form>