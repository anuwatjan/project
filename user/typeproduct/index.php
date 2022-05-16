<?php include('crud/show.php') ?>
<div class="pagetitle">
  <h1>ประเภทสินค้า</h1>
  <nav>
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">ประเภทสินค้า</li>
        </ol>
      </div>
      <div class="col-md-6">
        <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="?page=<?= $_GET['page'] ?>&function=inserttypeproduct">เพิ่มประเภทสินค้า(ADD type)</a></button>
      </div>
    </div>
  </nav>
</div>
<section class="section">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">ตารางประเภทสินค้า</h5>
          <table class="table-hover" id="tableall">
            <thead>
              <tr>
                <th scope="col">ชื่อประเภทสินค้า</th>
                <th scope="col">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo  $row['type_name'] ?></td>
                  <td><a href="?page=<?= $_GET['page'] ?>&function=detailtypeproduct&type_id=<?= $row['type_id'] ?>" class="btn btn-sm btn-lg btn-primary">รายละเอียด</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
