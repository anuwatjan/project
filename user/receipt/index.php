<?php include('crud/show.php') ?>
<div class="pagetitle">
  <h1>ใบเสร็จรับเงิน</h1>
  <nav>
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">ใบเสร็จรับเงิน</li>
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
          <h5 class="card-title">ตารางใบเสร็จรับเงิน</h5>
          <table class="table ">
            <thead>
              <tr>
                <th scope="col">ชื่อใบเสร็จรับเงิน</th>
                <th scope="col">วันที่ขาย</th>
                <th scope="col">มูลค่า</th>
                <th scope="col">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo  $row['store_number'] ?></td>
                  <td><?php echo  $row['store_date'] ?></td>
                  <td><?php echo  number_format($row['store_total'],2) ?></td>
                  <td><a href="?page=<?= $_GET['page'] ?>&function=reportreceipt&store_number=<?= $row['store_number'] ?>" class="btn btn-sm btn-lg btn-primary">รายละเอียด</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
