<?php include('crud/show.php') ?>
<div class="pagetitle">
  <h1>หมวดหมู่แยกตามอาการ</h1>
  <nav>
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">หมวดหมู่แยกตามอาการ</li>
        </ol>
      </div>
      <div class="col-md-6">
        <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="?page=<?= $_GET['page'] ?>&function=insertsymp">เพิ่มหมวดหมู่แยกตามอาการ(ADD SYMP)</a></button>
        <button type="button" class="btn btn-danger rounded-pill"><a href="javascript:history.back(1)" class="text-white">ย้อนกลับ</a> </button>
      </div>
    </div>
  </nav>
</div>
<section class="section">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">ตารางหมวดหมู่แยกตามอาการ</h5>
          <table class="table-hover" id="tableall">
            <thead>
              <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">ชื่อหมวดหมู่แยกตามอาการ</th>
                <th scope="col">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i = 1;
              while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo $i++?></td>
                  <td><?php echo  $row['symptom_name'] ?></td>
                  <td><a href="?page=<?= $_GET['page'] ?>&function=detailsymp&symptom_id=<?= $row['symptom_id'] ?>" class="btn btn-sm btn-lg btn-primary">รายละเอียด</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
