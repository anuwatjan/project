<?php include 'crud/sql.php' ?>
<div class="pagetitle">
  <h1>สินค้าขายดี 5 อันดับแรก</h1>
  <nav>
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">รายการสินค้า</li>
        </ol>
      </div>
      <div class="col-md-6">
        <!-- <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="?page=<?= $_GET['page'] ?>&function=insertGOOD">เพิ่มใบรับสินค้า(ADD GOOD)</a></button> -->
      </div>
    </div>
  </nav>
</div>
<div class="col-xxl-4 col-md-5">
  <div class="card info-card sales-card bg-primary">
    <div class="card-body text-white">
      <h2 class="card-title text-white" style="font-size: 30px;">ยอดขายสินค้าวันนี้<span></h2>
      <div class="row">
        <div class="col">
          <div class="d-flex" style="font-size: 20px;">
            <div class="ps-3">
              <p><?= datethai($datenow) ?></p>
            </div>
          </div>
        </div>
        <div class="col">
          <?php
          while ($row = mysqli_fetch_assoc($query)) { ?>
            <p><?= $row['count_product'] ?> รายการ</p>
            <p><?= number_format($row['count_price'], 2) ?> บาท</p>
          <?php } ?>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="col-xxl-4 col-md-5">
  <div class="card info-card sales-card bg-success">
    <div class="card-body text-white">
      <h2 class="card-title text-white" style="font-size: 30px;">ยอดขายสินค้าสัปดาห์นี้</h2>
      <p>สัปดาห์ที่ <?= $week1 ?> </p>
      <div class="row">
        <div class="col">
          <div class="d-flex" style="font-size: 20px;">
            <div class="ps-3">
              <p><?= datethai($start) . " - " . datethai($end) ?></p>
            </div>
          </div>
        </div>
      </div>

      <div class="col">
      <?php
          while ($row1 = mysqli_fetch_assoc($query1)) { ?>
          <p><?=$row1['count_product'] ?></p>
          <p><?= number_format($row1['count_price'], 2) ?> บาท</p>
          <?php } ?>
      </div>


    </div>
  </div>
</div>
</div><!-- End Reports -->