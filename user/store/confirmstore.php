<div class="pagetitle">
  <h1>รายการขายสินค้า</h1>
  <nav>
    <div class="row">
      <div class="col-md-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">รายการขายสินค้า</li>
        </ol>
      </div>
    </div>
    <form method="post" name="frm" action="?page=savestore">
      <section class="section">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">ยืนยันการขาย / เพิ่มข้อมูลลูกค้า</h5>
                <?php
                $po_total = 0;
                $total = 0;
                foreach ($_SESSION['storeing'] as $product_id => $po_qty) {
                  $sql  = "select * from product a JOIN doc_unit b ON a.product_id = b.product_id where a.product_id= '$product_id'";
                  $query  = mysqli_query($connection, $sql);
                  $row  = mysqli_fetch_array($query);
                  $sum  = $row['dunit_price'] * $po_qty;
                  $total += $sum;
                  $vat = 0.07 * $total;
                  $po_total = $total + $vat;
                }
                echo "<div class='row'>";
                echo "<div class='col-md-4'>";
                echo "<div class='card bg-info text-white'>";
                echo "<div class='card-body'>";
                echo "<b>ยอดที่ต้องชำระ</b>";
                echo "<hr>";
                echo "<b>" . number_format($total, 2) . "</b>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                ?>
                <?php
                if (isset($_POST['total'])) {
                  $total = $_POST['total'];
                }
                ?>
                 <input type="text" name="store_total" style="display: none;" onKeyUp="chk()" value="<?php echo $total?>">

                <div class='col-md-4'>
                  <div class='card bg-warning text-white'>
                    <div class='card-body'>
                      <b>รับเงินมา</b>
                      <hr>
                      <input type="text" name="store_get" style="width:150px;" onKeyUp="chk()" class="form-control">
                    </div>
                  </div>
                </div>
                <div class='col-md-4'>
                  <div class='card bg-danger text-white'>
                    <div class='card-body'>
                      <b>เงินทอน</b>
                      <hr>
                      <input type="text" name="store_change" style="width:150px;" class="form-control">
                    </div>
                  </div>
                </div>
                <div class='col-md-4'>
                  <div class='card bg-secondary text-white'>
                    <div class='card-body'>
                      <b>ข้อมูลลูกค้า</b>
                      <hr>
                      <select class="form-control" name="store_customer" style="border:white;">
                        <option value="" selected disabled>เลือกลูกค้า</option>
                        <?php
                        $sqlc = "select * from customer";
                        $queryc = mysqli_query($connection, $sqlc);
                        foreach ($queryc as $data12) : ?>
                          <option value="<?= $data12['customer_id'] ?>"><?= $data12['customer_name'] ?></option>
                        <?php endforeach; ?>
                      </select>
                      <hr>
                      <a href="?page=customer&function=insertcustomer" class="btn btn-success text-white">เพิ่มลูกค้าใหม่</a>
                    </div>
                  </div>
                </div>
                <center>
                  <div class="row">
                    <div class="">
                      <input type="submit" name="Submit2" class="btn btn-info text-white" value="ยืนยันการขาย" />
                    </div>
                  </div>
                </center>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
</div>
</nav>
</div>
<script language="JavaScript">
function chk(){
var a1=parseFloat(document.frm.store_total.value);
var a2=parseFloat(document.frm.store_get.value);
document.frm.store_change.value=a1-a2; //---- เปลี่ยนเอาจะ + - * /

}
</script>