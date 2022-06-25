<?php include('crud/showdetailcustomer.php'); ?>
<hr>
<form action="" method="post">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-12">
        <form action="" method="post" id="registration">
          <nav>
            <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
              <a class="nav-link active" id="step1-tab" data-bs-toggle="tab" href="#step1">ข้อมูลทั่วไป</a>
              <a class="nav-link" id="step2-tab" data-bs-toggle="tab" href="#step2">ประวัติการซื้อ</a>
            </div>
          </nav>
          <div class="tab-content py-4">
            <div class="tab-pane fade show active" id="step1">
              <div class="mb-3">
                <div class="card">

                  <center>
                    <img src="../user/customer/upload/customer/<?= $result['customer_img']; ?>" width="300" height="300" class="rounded-circle">
                    <P style="font-size:larger;">คุณ : <?= $result['customer_name'] ?></P>
    <a href="?page=<?= $_GET['page'] ?>&function=deletecustomer&customer_id=<?= $result['customer_id'] ?>" style="float: right;" onclick="return confirm('คุณต้องการลบสินค้านี้ : <?= $result['customer_name'] ?> หรือไม่ ??')" class="btn btn-danger">ลบข้อมูล</a>
    <a href="?page=<?= $_GET['page'] ?>&function=updatecustomer&customer_id=<?= $result['customer_id'] ?>" style="float: right;" class="btn btn-warning text-white">แก้ไขข้อมูล</a>             
  </center>
                  <hr>
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-secondary">ประเภทลูกค้า</td>
                        <td class="text-end"><a><?= $result['name_type'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">ชื่อ-นามสกุล ลูกค้า</td>
                        <td class="text-end"><a><?= $result['customer_name'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">เบอร์โทรศัพท์ลูกค้า</td>
                        <td class="text-end"><a><?= $result['customer_phone'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">อีเมล์ลูกค้า</td>
                        <td class="text-end"><a><?= $result['customer_email'] ?></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card">
                  <h5 class="card-title">ข้อมูลติดต่อ</h5>
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-secondary">ที่อยู่ปัจจุบัน</td>
                        <td class="text-end"><a><?= $result['customer_add'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">อำเภอ</td>
                        <td class="text-end"><a><?= $result['customer_amphures'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">ตำบล</td>
                        <td class="text-end"><a><?= $result['customer_amphures'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">จังหวัด</td>
                        <td class="text-end"><a><?= $result['customer_province'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">รหัสไปรษณีย์</td>
                        <td class="text-end"><a><?= $result['customer_zip'] ?></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="step2">
              <div class="mb-3">
                <div class="card">
                  <table class="table  table-hover">
                    <thead>
                      <tr>
                        <td>เวลา</td>
                        <td>รายละเอียด</td>
                        <td></td>
                        <td></td>
                        <td>ราคาขาย</td>
                        <td>จำนวน</td>
                        <td>มูลค่า</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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