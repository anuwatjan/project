<?php include('crud/show.php') ?>
<?php
include "src/BarcodeGenerator.php";
include "src/BarcodeGeneratorHTML.php";

$code = "000001";//รหัส Barcode ที่ต้องการสร้าง
function Barcode($code){
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
$border = 2;//กำหนดความหน้าของเส้น Barcode
$height = 50;//กำหนดความสูงของ Barcode

return $generator->getBarcode($code , $generator::TYPE_CODE_128,$border,$height);
}

?>

<div class="pagetitle">
  <h1>สินค้า</h1>
  <nav>
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">สินค้า</li>
        </ol>
        <button type="button" class="btn btn-primary rounded-pill"><a class="text-white" href="?page=<?= $_GET['page'] ?>&function=insertproduct">เพิ่มสินค้า(ADD PRODUCT)</a></button>
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
          <h5 class="card-title">ตารางสินค้า</h5>
          <table class="table table-hover" id="tableall">
            <thead>
              <tr>
                <th scope="col">รหัสบาร์โค้ด</th>
                <th scope="col">รูปภาพ</th>
                <th scope="col">บาร์โค้ด</th>
                <th scope="col">ชื่อสินค้า</th>
                <th scope="col">รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $i =1 ;
              while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                  <td><?php echo Barcode($row['product_id'])?><?php echo $row['product_id']?></td>
                  <td><img src="../user/product/upload/product/<?= $row['product_img']; ?>" width="100" height="100"></td>
                  <td><?php echo  barcode($row['product_barcode'])  ?></td>
                  <td><?php echo  $row['product_name'] ?></td>
                  <td><a href="?page=<?= $_GET['page'] ?>&function=detailproduct&product_id=<?= $row['product_id'] ?>" class="btn btn-sm btn-lg btn-primary">รายละเอียด</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
</section>
