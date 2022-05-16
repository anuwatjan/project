<?php include('crud/show.php') ?>
<div class="pagetitle">
  <h1>หน่วยนับ</h1>
  <nav>
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">หน่วยนับ</li>
        </ol>
      </div>
      <div class="col-md-6">
        <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="?page=<?= $_GET['page'] ?>&function=insertunit">เพิ่มหน่วยนับ(ADD type)</a></button>
      </div>
    </div>
  </nav>
</div>
<section class="section">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">ตารางหน่วยนับ</h5>
          <table class="table-hover" id="tableall">
            <thead>
              <tr>
                <th scope="col">ชื่อหน่วยนับ</th>
                <th scope="col">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo  $row['unit_name'] ?></td>
                  <td><a href="?page=<?= $_GET['page'] ?>&function=detailunit&unit_id=<?= $row['unit_id'] ?>" class="btn btn-sm btn-lg btn-primary">รายละเอียด</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
