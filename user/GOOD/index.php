<?php include('crud/show.php') ?>
<div class="pagetitle">
  <h1>ใบรับสินค้า</h1>
  <nav>
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">ใบรับสินค้า</li>
        </ol>
      </div>
      <div class="col-md-6">
        <!-- <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="?page=<?= $_GET['page'] ?>&function=insertGOOD">เพิ่มใบรับสินค้า(ADD GOOD)</a></button> -->
      </div>
    </div>
  </nav>
</div>  
<section class="section">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">ตารางใบรับสินค้า</h5>
          <table class="table-hover" id="tableall">
            <thead>
              <tr>
                <th scope="col">วันที่รับสินค้า</th>
                <th scope="col">หมายเลขใบรับสินค้า</th>
                <th scope="col">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                <td><?php echo  $row['good_date'] ?></td>
                  <td><?php echo  $row['good_reference'] ?></td>
                  <td><a href="?page=<?= $_GET['page'] ?>&function=detailGOOD&good_reference=<?= $row['good_reference'] ?>" class="btn btn-sm btn-lg btn-primary">รายละเอียด</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
