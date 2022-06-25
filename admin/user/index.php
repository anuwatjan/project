<?php include('crud/show.php') ?>
<div class="pagetitle">
  <h1>ผู้ใช้งานระบบ</h1>
  <nav>
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">ผู้ใช้งานระบบ</li>
        </ol>
      </div>
      <div class="col-md-6">
        <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="?page=<?= $_GET['page'] ?>&function=insertuser">เพิ่มผู้ใช้งานระบบ(ADD user)</a></button>
        <button type="button" class="btn btn-danger rounded-pill"><a href="javascript:history.back(1)" class="text-white">ย้อนกลับ</a> </button>
      </div>
    </div>
  </nav>
</div>
<section class="section">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">ตารางผู้ใช้งานระบบ</h5>
          <table class="table-hover" id="tableall">
            <thead>
              <tr>
                <th scope="col">รูปภาพ</th>
                <th scope="col">ชื่อผู้ใช้งานระบบ</th>
                <th scope="col">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><img src="../user/upload/user/<?=$row['user_img'];?>" width="100" height="100"></td>
                  <td><?php echo  $row['user_name'] ?></td>
                  <td><a href="?page=<?= $_GET['page'] ?>&function=detailuser&user_id=<?= $row['user_id'] ?>" class="btn btn-sm btn-lg btn-primary">รายละเอียด</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
