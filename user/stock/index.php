<?php include('crud/show.php') ?>
<div class="pagetitle">
  <h1>รายงานการสต็อกสินค้า</h1>
  <nav>
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">รายงานการสต็อกสินค้า</li>
        </ol>
      </div>
    </div>
  </nav>
</div>
<section class="section">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">ตารางรายงานการสต็อกสินค้า</h5>
          <table class="table-hover" id="tableall">
            <thead>
              <tr>
                <th scope="col">หมายเลขสต็อกสินค้า</th>
                <th scope="col">วันที่นำเข้าสินค้า</th>
                <th scope="col">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo  $row['good_reference'] ?></td>
                  <td><?php echo  datethai($row['good_date']) ?></td>
                  <td><a href="?page=<?= $_GET['page'] ?>&function=detailgood&good_id=<?= $row['good_id'] ?>" class="btn btn-sm btn-lg btn-primary">รายละเอียด</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
