<?php include('crud/showdetailcontact.php'); ?>
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
                    <img src="../user/contact/upload/contact/<?= $result['contact_img']; ?>" width="300" height="300" class="rounded-circle">
                    <P style="font-size:larger;">คุณ : <?= $result['contact_name'] ?></P>
                    <a href="?page=<?= $_GET['page'] ?>&function=deletecontact&contact_id=<?= $result['contact_id'] ?>" style="float: right;" onclick="return confirm('คุณต้องการลบสินค้านี้ : <?= $result['contact_name'] ?> หรือไม่ ??')" class="btn btn-danger">ลบข้อมูล</a>
                    <a href="?page=<?= $_GET['page'] ?>&function=updatecontact&contact_id=<?= $result['contact_id'] ?>" style="float: right;" class="btn btn-warning text-white">แก้ไขข้อมูล</a>   
                  </center>
                  <hr>
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-secondary">ชื่อ/บริษัท/ร้านค้า</td>
                        <td class="text-end"><a><?= $result['contact_name'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">เบอร์โทรศัพท์ผู้ติดต่อ</td>
                        <td class="text-end"><a><?= $result['contact_phone'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">อีเมล์ผู้ติดต่อ</td>
                        <td class="text-end"><a><?= $result['contact_email'] ?></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card">
                  <h5 class="card-title">ข้อมูลติดต่อ</h5>
                  <table class="table">
                    <tbody>
                    <tr>
                        <td class="text-secondary">เลขประจำตัวผู้เสียภาษี</td>
                        <td class="text-end"><a><?= $result['contact_number'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">ที่อยู่ปัจจุบัน</td>
                        <td class="text-end"><a><?= $result['contact_add'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">อำเภอ</td>
                        <td class="text-end"><a><?= $result['contact_amphures'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">ตำบล</td>
                        <td class="text-end"><a><?= $result['contact_amphures'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">จังหวัด</td>
                        <td class="text-end"><a><?= $result['contact_province'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">รหัสไปรษณีย์</td>
                        <td class="text-end"><a><?= $result['contact_zip'] ?></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>



</form>