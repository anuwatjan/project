<?php
$month = 'July';
$sql = "SELECT * FROM store where date_format(storedate, '%M')='$month'";
$query = mysqli_query($connection , $sql);
$result = mysqli_fetch_assoc($query);
?>
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
<div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card bg-primary">
                        <div class="card-body text-white">
                            <h2 class="card-title text-white" style="font-size: 30px;">ยอดขายสินค้าวันนี้<span></h2>

                                    <div class="d-flex" style="font-size: 20px;">
                                        <?php 
                                       $date = date('Y-m-d , H:i:s');
                                            ?>
                                        <div class="ps-3">
                                    <p><?= datethai($date) ?></p>
                                            
                                            <!-- <span class="text-success small pt-1 fw-bold"><?php $day ?></span> -->

                                        </div>
                                    </div>
                        </div>
                    </div>
                <div class="card info-card sales-card bg-primary">
                        <div class="card-body text-white">
                            <h2 class="card-title text-white" style="font-size: 30px;">ยอดขายสินค้าสัปดาห์นี้<span></h2>

                                    <div class="d-flex" style="font-size: 20px;">
                                        <div class="ps-3">
                                    <p><?= datethai($date) ?></p>
                                            
                                            <!-- <span class="text-success small pt-1 fw-bold"><?php $day ?></span> -->

                                        </div>
                                    </div>
                        </div>
                    </div>
                </div><!-- End Reports -->
        

                <div class="card info-card sales-card bg-primary">
                        <div class="card-body text-white">
                            <h2 class="card-title text-white" style="font-size: 30px;">ยอดขายสินค้าเดือนนี้<span></h2>

                                    <div class="d-flex" style="font-size: 20px;">
                                
                                        <div class="ps-3">
                                    <p><?= datethai($result) ; ?></p>

                                        </div>
                                    </div>
                        </div>
                    </div>
                </div><!-- End Reports -->
        