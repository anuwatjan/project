<?php include('crud/showdetailunit.php'); ?>
<hr>
<form action="" method="post">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-8">
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
                    <a href="?page=<?= $_GET['page'] ?>&function=deleteunit&unit_id=<?= $result['unit_id'] ?>" style="float: right;" onclick="return confirm('คุณต้องการลบประเภทสินค้านี้ : <?= $result['unit_name'] ?> หรือไม่ ??')" class="btn btn-danger">ลบข้อมูล</a>
                    <a href="?page=<?= $_GET['page'] ?>&function=updateunit&unit_id=<?= $result['unit_id'] ?>" style="float: right;" class="btn btn-warning text-white">แก้ไขข้อมูล</a>   
                  </center>
                  <hr>
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-secondary">ชื่อหน่วยนับ</td>
                        <td class="text-end"><a><?= $result['unit_name'] ?></a></td>
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