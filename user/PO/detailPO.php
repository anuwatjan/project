<?php include('crud/showdetailpo.php'); ?>
<hr>
<form method="post" id="registration">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 col-lg-10">
        <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
          <a class="nav-link active" id="step1-tab" data-bs-toggle="tab" href="#step1">ข้อมูลทั่วไป</a>
        </div>
        </nav>
        <div class="tab-content py-4">
          <div class="tab-pane fade show active" id="step1">
            <div class="mb-3">
              <div class="card">
                <div class="col-md-6 ">
                  <a href="?page=<?= $_GET['page'] ?>&function=reportPO&po_reference=<?= $result['po_reference'] ?>">พิมพ์เอกสาร</a>
                  <!-- <a href="PO/report/index.php?po_reference=<?= $result['po_reference'] ?>">รายละเอียด</a> -->
                </div>
                <center>
                  <P style="font-size:larger;">หมายเลขใบสั่งซื้อ : <?= $result['po_reference'] ?></P>
                </center>
                <hr>
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="text-secondary">วันที่ออกเอกสาร</td>
                      <td class="text-end"><a><?= $result['po_date'] ?></a></td>
                    </tr>
                    <tr>
                      <td class="text-secondary">ผู้สั่งซื้อสินค้า</td>
                      <td class="text-end"><a><?= $result['po_contact_order'] ?></a></td>
                    </tr>
                    <tr>
                      <td class="text-secondary">ผู้ขายสินค้า</td>
                      <td class="text-end"><a><?= $result['po_contact_sale'] ?></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="card">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="text-secondary">ราคาเฉพาะสินค้า</td>
                      <td class="text-end"><a><?= $result['po_product_total'] ?></a></td>
                    </tr>
                    <tr>
                      <td class="text-secondary">VAT</td>
                      <td class="text-end"><a><?= $result['po_vat'] ?></a></td>
                    </tr>
                    <tr>
                      <td class="text-secondary">สรุปยอด</td>
                      <td class="text-end"><a><?= $result['po_total'] ?></a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="card">
                <table class="table  table-hover table-bordered">
                  <thead class="bg-info text-white">
                    <tr>
                      <td>รายละเอียดสินค้า</td>
                      <td>วันที่ผลิต</td>
                      <td>วันหมดอายุ</td>
                      <td>ต้นทุน</td>
                      <td>จำนวน</td>
                      <td>ราคา/หน่วย</td>
                      <td>ราคาทั้งหมด</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sqlshow = "SELECT * , a.product_id,b.product_id,b.product_name AS name_product 
                    FROM po a JOIN product b ON a.product_id = b.product_id JOIN doc_unit c ON b.product_id = c.product_id WHERE a.po_reference = '$po_reference'";
                    $queryshow = mysqli_query($connection, $sqlshow);
                    ?>
                    <?php while ($roww = mysqli_fetch_assoc($queryshow)) { ?>
                      <tr>
                        <td><?= $roww['name_product'] ?></td>
                        <td><?= $roww['po_product_start'] ?></td>
                        <td><?= $roww['po_product_end'] ?></td>
                        <td><?= number_format($roww['dunit_price'], 2) ?></td>
                        <td><?= $roww['po_qty'] ?></td>
                        <td><?= number_format($roww['dunit_price'], 2) ?></td>
                        <td><?= number_format($roww['po_sum'], 2) ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <center>
            <div class="row mb-3">
              <div class="col-sm-10">
                <!-- <button  type="submit" class="btn btn-primary">เพิ่มในใบรับสินค้า</button> -->
                <!-- <a href="?page=<?= $_GET['page'] ?>&function=insertGOOD&po_reference=<?= $result['po_reference'] ?>">เพิ่มในใบรับสินค้า</a> -->
                <div class="col-md-12 col-lg-12 col-xlg-12">
                  <div class="card card-hover">
                    <div class="box bg-primary text-center">
                      <h1 class="font-light text-white">
                        <i class="mdi mdi-alert"></i>
                      </h1>
                      <input class="btn btn-sm-primary text-white" value="เพิ่มลงใบรับสินค้า" onclick="window.location='?page=<?= $_GET['page'] ?>&function=insertGOOD&po_reference=<?= $result['po_reference'] ?>'">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>

</form>