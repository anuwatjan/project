<?php include('crud/show.php') ?>
<div class="pagetitle">
  <h1>ลูกค้า</h1>
  <nav>
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">ลูกค้า</li>
        </ol>
      </div>
      <div class="col-md-6">
        <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="?page=<?= $_GET['page'] ?>&function=insertcustomer">เพิ่มลูกค้า(ADD CUSTOMER)</a></button>
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
          <h5 class="card-title">ตารางลูกค้า</h5>
          <table class="table-hover" id="tableall">
            <thead>
              <tr>
                <th scope="col">รูปภาพ</th>
                <th scope="col">ชื่อลูกค้า</th>
                <th scope="col">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><img src="../user/customer/upload/customer/<?=$row['customer_img'];?>" width="100" height="100"></td>
                  <td><?php echo  $row['customer_name'] ?></td>
                  <td><a href="?page=<?= $_GET['page'] ?>&function=detailcustomer&customer_id=<?= $row['customer_id'] ?>" class="btn btn-sm btn-lg btn-primary">รายละเอียด</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
