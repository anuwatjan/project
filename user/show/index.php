<?php include('crud/show.php') ?>
<div class="pagetitle">
  <h1>แจ้งเตือนรายการสินค้า</h1>
  <nav>
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">แจ้งเตือนรายการสินค้า</li>
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
          <h5 class="card-title">ตารางแจ้งเตือนรายการสินค้า</h5>
          <table class="table ">
            <thead>
              <tr>
                <th scope="col">ชื่อสินค้า</th>
                <th scope="col">วันหมดอายุ</th>
                <th scope="col">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo  $row['product_name'] ?></td>
                  <td><?php echo  $row['po_date'] ?></td>
                  <td><a href="?page=<?= $_GET['page'] ?>&function=detailpo&po_id=<?= $row['po_id'] ?>" class="btn btn-sm btn-lg btn-primary">รายละเอียด</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
