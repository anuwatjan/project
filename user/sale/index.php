<?php include('crud/show.php') ?>
<div class="pagetitle">
  <h1>รายงานการขาย</h1>
  <nav>
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">รายงานการขาย</li>
        </ol>
      </div>
    </div>
  </nav>
</div>
<section class="section">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">ตารางรายงานการขาย</h5>
          <table class="table-hover" id="tableall">
            <thead>
              <tr>
                <th scope="col">ชื่อรายงานการขาย</th>
                <th scope="col">วันที่ขาย</th>
                <th scope="col">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo  $row['store_number'] ?></td>
                  <td><?php echo  $row['store_date'] ?></td>
                  <td><a href="?page=<?= $_GET['page'] ?>&function=detailstore&store_id=<?= $row['store_id'] ?>" class="btn btn-sm btn-lg btn-primary">รายละเอียด</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
