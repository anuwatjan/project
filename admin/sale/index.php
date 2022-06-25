<?php include('crud/show.php') ?>
<div class="pagetitle">
  <h1>รายงานการขาย</h1>
  <nav>
    <div class="row">
      <div class="col-md-12">
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
    <div class="col-md-9">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">ตารางรายงานการขาย</h5>
          <!-- <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="?page=<?= $_GET['page'] ?>&function=reportsale">รายงานการขาย(ADD PRODUCT)</a></button> -->
          <?php include 'report/index.php'; ?>
          <hr>
        </div>
      </div>
    </div>
  </div>
</section>