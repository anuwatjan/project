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

<div class="row">

  <div class="col-xxl-4 col-md-6">
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

  <div class="col-xxl-4 col-md-6">
    <div class="card info-card sales-card bg-success">
      <div class="card-body text-white">
        <div class="row">
          <div class="col-md-12">
            <h5 class="card-title text-white" style="font-size: 30px;">ยอดขายสินค้าสัปดาห์นี้</h5>
            <p>สัปดาห์ที่ <?= $week1 ?> <?= datethai($start) . " - " . datethai($end) ?></p> 
          </div>

          <div class="col">
            <div class="d-flex" style="font-size: 20px;">
            </div>
          </div>
        </div>
        <div class="col">
          <?php
          while ($row = mysqli_fetch_assoc($query1)) { ?>
            <p><?= $row['count_product'] ?> รายการ</p>
            <p><?= number_format($row['count_price'], 2) ?> บาท</p>
          <?php } ?>
        </div>
      </div>
    </div>

  </div>

  <div class="row">
    <div class="card info-card sales-card bg-danger">
      <div class="card-body text-white">
        <h2 class="card-title text-white" style="font-size: 30px;">รายการสินค้าขายดี 5 อันดับแรก<span></h2>
        <div class="row">
          <div class="col">
            <table class="table text-white" >
              <tr>
                <th>ชื่อสินค้า</th>
                <th>จำนวน</th>
                <th>ราคา</th>
              </tr>
            <?php
            while ($row3 = mysqli_fetch_assoc($query2)) { ?>
            <tr>
              <td><?php echo $row3['nameproduct']?></td>
              <td><?php echo $row3['store_qty']?></td>
              <td><?php echo $row3['store_product_total']?></td>
            </tr>
            <?php } ?>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>




  <h2 class="card-title text-center" style="font-size: 30px;">ยอดขายสินค้ารายเดือนของปี <?php echo DateYear($year) ?> </h2>
  <?php include 'chart.php' ?>



  <div class="row">

    <div class="col-xxl-4 col-md-6">
      <div class="card info-card sales-card bg-primary">
        <div class="card-body text-white">
          <h2 class="card-title text-white" style="font-size: 30px;">สินค้าหมดสต็อก<span></h2>
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

    <div class="col-xxl-4 col-md-6">
      <div class="card info-card sales-card bg-danger">
        <div class="card-body text-white">
          <h2 class="card-title text-white" style="font-size: 30px;">สินค้าใกล้หมดอายุ<span></h2>
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
  </div>