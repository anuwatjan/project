<?php include('crud/showdetailcategory.php'); ?>
<center>
  <a style="font-size:larger;"><?= $result['category_name'] ?></a>
  <a href="?page=<?= $_GET['page'] ?>&function=updatecategory&category_id=<?= $result['category_id'] ?>" style="float: right;" class="btn btn-warning text-white">แก้ไขข้อมูล</a>
</center>
<hr>
<form action="" method="post">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-8">
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
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-secondary">ชื่อหมวดหมู่</td>
                        <td class="text-end"><a class="text-secondary"><?= $result['category_name'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">คำอธิบาย</td>
                        <td class="text-end"><a class="text-secondary"><?= $result['category_detail'] ?></a></td>
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