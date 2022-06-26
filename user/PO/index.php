<?php include('crud/show.php') ?>
<div class="pagetitle">
  <h1>ใบสั่งซื้อสินค้า</h1>
  <nav>
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">ใบสั่งซื้อสินค้า</li>
        </ol>
      </div>
      <div class="col-md-6">
        <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="?page=<?= $_GET['page'] ?>&function=insertPO">เพิ่มใบสั่งซื้อสินค้า(ADD PO)</a></button>
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
          <h5 class="card-title">ตารางใบสั่งซื้อสินค้า</h5>
          <table class="table-hover" id="tableall">
            <thead>
              <tr>
                <th scope="col">วันที่สั่งซื้อ</th>
                <th scope="col">หมายเลขใบสั่งซื้อ</th>
                <th scope="col">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo  datethai($row['po_date']) ?></td>
                  <td><?php echo  $row['po_reference'] ?></td>
                  <td><a href="?page=<?= $_GET['page'] ?>&function=detailPO&po_reference=<?= $row['po_reference'] ?>" class="btn btn-sm btn-lg btn-primary">รายละเอียด</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
