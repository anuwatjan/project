<?php include('crud/showdetailproduct.php'); ?>
<center>
  <div class="col-md-12">
    <img src="../user/product/upload/product/<?= $result['product_img']; ?>" width="300" height="300">
    <a href="?page=<?= $_GET['page'] ?>&function=updateproduct&product_id=<?= $result['product_id'] ?>" style="float: right;" class="btn btn-warning text-white">แก้ไขข้อมูล</a>
    <a href="?page=<?= $_GET['page'] ?>&function=deleteproduct&product_id=<?= $result['product_id'] ?>  " style="float: right;" onclick="return confirm('คุณต้องการลบสินค้านี้ : <?= $result['product_name'] ?> หรือไม่ ??')" class="btn btn-danger">ลบข้อมูล</a>
  </div>
  <a style="font-size:larger;"><?= $result['product_name'] ?></a>

</center>

<hr>
<form action="" method="post">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-12">
        <form action="" method="post" id="registration">
          <nav>
            <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
              <a class="nav-link active" id="step1-tab" data-bs-toggle="tab" href="#step1">ข้อมูลทั่วไป</a>
              <a class="nav-link" id="step2-tab" data-bs-toggle="tab" href="#step2">หน่วยนับ</a>
              <a class="nav-link" id="step3-tab" data-bs-toggle="tab" href="#step3">สต๊อคสินค้า</a>
            </div>
          </nav>
          <div class="tab-content py-4">
            <div class="tab-pane fade show active" id="step1">
              <div class="mb-3">
                <div class="card">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-secondary">ประเภทสินค้า</td>
                        <td class="text-end"><a><?= $result['name_type'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">ชื่อสินค้า</td>
                        <td class="text-end"><a><?= $result['product_name'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">ชื่อสามัญทางยา</td>
                        <td class="text-end"><a><?= $result['product_generic'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">รายละเอียด</td>
                        <td class="text-end"><a><?= $result['product_detail'] ?></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="card">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="text-secondary">หมวดหมู่สินค้า</td>
                        <td class="text-end"><a><?= $result['name_category'] ?></a></td>
                      </tr>
                      <tr>
                        <td class="text-secondary">หมวดหมู่ยาแยกตามอาการที่รักษา</td>
                        <td class="text-end"><a><?= $result['name_symptom'] ?></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="step2">
              <div class="mb-3">
                <div class="card">
                  <table class="table  table-hover text-center">
                    <thead>
                      <tr>
                        <td>หน่วยนับ</td>
                        <td>จุดสั่งซื้อ</td>
                        <td>ต้นทุน</td>
                        <td>ราคาขาย(เริ่มต้น)</td>
                        <td><a href="?page=<?= $_GET['page'] ?>&function=updateunit&product_id=<?= $result['product_id'] ?>">แก้ไข</a></td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="text-center">
                        <td><?= $result1['dunit_id'] ?></td>
                        <?php if($result['product_net'] <= 30){?>
                          <td class="bg-danger text-white"><?= $result['product_net'] ?></td>
                        <?php } ?>
                        <td><?= $result1['dunit_price'] ?></td>
                        <td><?= $result1['dunit_sale'] ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="step3">
              <div class="mb-3">
                <div class="card">
                  <table class="table  table-hover text-center">
                    <thead>
                      <tr>
                        <td>นำเข้าเมื่อ</td>
                        <td>วันที่ผลิต</td>
                        <td>วันหมดอายุ</td>
                        <td>จำนวนที่นำเข้า</td>
                        <!-- <td>คงเหลือ</td> -->
                        <td>วันที่จะหมดอายุ</td>
                        <td>ต้นทุน</td>
                        <td>ราคาขาย</td>
                        <!-- <td><a href="?page=<?= $_GET['page'] ?>&function=updateunit&product_id=<?= $result['product_id'] ?>">แก้ไข</a></td> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php while( $result2 = mysqli_fetch_assoc($query2))  { ?>
                    <?php if($result2 == '' ){ ?>
                      <tr>
                        <td colspan="8" class="text-center text-danger">ไม่ได้ทำการจัดการสต็อกสินค้านี้เลย</td>
                      </tr>
                      <?php } ?>
                      <?php if($result2 != '' ){ ?>
                      <tr class=" text-center">
                        <td><?= datethai($result2['po_date']) ?></td>
                        <td><?= datethai($result2['po_product_start']) ?></td>
                        <td><?= datethai($result2['po_product_end']) ?></td>
                        <td><?= $result2['po_qty'] ?></td>
                        <?php
                           $date2 = new DateTime($result2['po_product_end']) ;
                          //  $date1 = new DateTime(date('Y-m-d'));
                           $date1 = new DateTime($result2['po_product_start']) ;
                           $difference = $date2->diff($date1);
                        ?>
                        <td class="bg-danger text-white"><?php echo $difference->days ?> วัน</td>
                        <td><?= $result1['dunit_price'] ?></td>
                        <td><?= $result1['dunit_sale'] ?></td>
                      </tr>
                      <?php } ?>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>



</form>