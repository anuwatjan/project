<?php include 'functionn.php' ?>
<?php
if (isset($_GET['type_id']) & isset($_GET['type_name'])) {
  $type_id = $_GET['type_id'];
  $sql = "SELECT * FROM product a JOIN doc_unit b ON a.product_id = b.product_id 
  JOIN unit c ON c.unit_id = b.unit_id JOIN po d ON a.product_id = d.product_id WHERE a.product_type ='$type_id'  ";
  $query = mysqli_query($connection, $sql);
} else {
  $sql = "SELECT *  FROM product a JOIN doc_unit b  ON a.product_id = b.product_id 
  JOIN unit c ON c.unit_id = b.unit_id JOIN po d ON a.product_id = d.product_id ";
  $query = mysqli_query($connection, $sql);
}
$sql2 = "SELECT* FROM type";
$query2  = mysqli_query($connection, $sql2);
?>
<form method="POST" action="?page=store&functionn=update">
  <div class="pagetitle">
    <h1>ร้านค้า</h1>
    <nav>
      <div class="row">
        <div class="col-md-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          </ol>
        </div>
      </div>
    </nav>
  </div>
  
  <section class="section">
    <div class="col-md-12">
      <div class="card-body">
        <a href="?page=store" type="button" class="btn btn-primary">ทั้งหมด</a>
        <?php while ($row = mysqli_fetch_assoc($query2)) {  ?>
          <a href="?page=<?= $_GET['page'] ?>&type_id=<?= $row['type_id'] ?>&type_name=<?= $row['type_name']; ?>" type="button" class="btn btn-primary"><?= $row['type_name']; ?></a>
        <?php } ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">รายการหมวดหมู่สินค้า</h5>
            <hr>
            <div class="col-md-12">
              <div class="row">
                <?php
                //ถ้ามีการคลิกเลือกประเภทสินค้า 
                if (isset($_GET['type_name'])) {
                  echo '<h4 style="color:red"> หมวดสินค้า ' . $_GET['type_name'] . '</h4>';
                }
                //loop
                while ($row = mysqli_fetch_array($query))  {  ?>
                <?php 
                $date = date('Y-m-d H:i:s'); ?>
                  <div class="col-sm-4" style="margin-bottom:50px;">
                    <img src="../user/product/upload/product/<?= $row['product_img']; ?>" width="100" height="100">
                    <hr>
                    <?= $row['product_name']; ?> <br>
                    จำนวนสินค้า <?= $row['product_net']; ?> <?= $row['unit_name'] ?><br>
                    <!-- <a class="btn btn-primary text-white"><?= datethai($row['po_product_end']) ?></a> -->
                    
                    <?php
                    if ($row['product_net'] > 0 && $row['po_product_end'] < $date) { ?>
                      <!-- <a href='?page=<?= $_GET['page'] ?>&function=store&product_id=<?php echo $row['product_id'] ?>&functionn=addd' style="width:100%" class="btn btn-success btn-sm">เพิ่ม</a> -->
                      <a href="#" style="width:100%" class="btn btn-danger btn-sm disabled"> สินค้าเพียงพอ แต่หมดอายุ !!</a>
                      <?php } elseif($row['product_net'] > 0 && $row['po_product_end'] > $date) { ?>
                      <a href='?page=<?= $_GET['page'] ?>&function=store&product_id=<?php echo $row['product_id'] ?>&functionn=addd' style="width:100%" class="btn btn-success btn-sm">เพิ่ม</a>
                      <?php } elseif($row['product_net'] < 0 && $row['po_product_end'] < $date) {?>
                      <a href="#" style="width:100%" class="btn btn-danger btn-sm disabled"> สินค้าไม่เพียงพอ แต่ไม่หมดอายุ</a>
                      <?php } else { ?>
                      <a href="#" style="width:100%" class="btn btn-danger btn-sm disabled"> สินค้าหมด !!</a>
                    <?php } ?>
                    
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover text-center" id="">
              <tr>
                <td>รายการ</td>
                <td>จำนวน</td>
                <td>ราคา</td>
                <td>รวม(บาท)</td>
                <td>ลบรายการสินค้า</td>
              </tr>
              
              <?php
              // echo '<pre>'.print_r($_SESSION, 1).'</pre>';
              $po_total = 0;
              $total = 0;
              if (!empty($_SESSION['storeing'])) {
                foreach ($_SESSION['storeing'] as $product_id => $po_qty) {
                  $sql = "SELECT * from product a JOIN doc_unit b ON a.product_id = b.product_id JOIN po c ON a.product_id = c.product_id 
                  where a.product_id = '$product_id'";
                  $query = mysqli_query($connection, $sql);
                  $row = mysqli_fetch_array($query);
                  // echo '<pre>'.print_r($row['product_net'], 1).'</pre>';
                  // echo '<pre>'.print_r($_POST['amount'][$row['product_id']], 1).'</pre>';
                  // echo '<pre>'.print_r($row['product_id'], 1).'</pre>';
                  $sum = $row['dunit_price'] * $po_qty;
                  $total += $sum;
                  $vat = 0.07 * $total;
                  $po_total = $total + $vat;
                  echo "<tr>";
                  echo "<td >" . $row["product_name"] . "</td>";
                  echo "<td >";
                  $date2 = new DateTime($row['po_product_end']) ;
                  $date1 = new DateTime(date('Y-m-d'));
                  $difference = $date2->diff($date1);
                  if(@$_POST['amount'][@$row['product_id']] > @$row['product_net']) {
                    echo "<div class='text-danger'>จำนวนไม่เพียงพอ</div>";
                  }
                else{
                  echo "<div class='text-success'>สินค้าเพียงพอ</div>";
                }
                  // echo 'ใส่จำนวนสูงสุดแค่ '.$array_max.'.<br />';
                  echo "<input type='text' class='form-control' name='amount[$product_id]' value='$po_qty' size='2'/></td>";
                  echo "<td >" . number_format($row["dunit_price"], 2) . "</td>";
                  echo "<td>" . number_format($sum, 2) . "</td>";
                  //remove product
                  echo "<td><a href='?page=store&product_id=$product_id&functionn=remove' class='btn btn-danger'>ไม่เลือกรายการนี้</a></td>";
                  echo "</tr>";
                }
                echo "<td colspan='3'><b>ราคารวม</b></td>";
                echo "<td>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
                echo "<td ></td>";
                echo "</tr>";
                // echo "<td colspan='3'><b>ภาษี</b></td>";
                // echo "<td>" . "<b>" . number_format($vat, 2) . "</b>" . "</td>";
                // echo "<td ></td>";
                // echo "</tr>";
                // echo "<td colspan='3'><b>ราคารวม(รวมภาษี)</b></td>";
                // echo "<td>" . "<b>" . number_format($po_total, 2) . "</b>" . "</td>";
                // echo "<td ></td>";
                // echo "</tr>";
              }
              ?>
            </table>
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xlg-3">
                <div class="card card-hover">
                  <div class="box bg-warning text-center">
                    <h1 class="font-light text-white">
                      <i class="mdi mdi-alert"></i>
                    </h1>
                    <input type="submit" class="btn btn-sm-info text-white" value="ปรับปรุงราคาใหม่"></input>
                  </div>
                </div>
              </div>


              <div class="col-md-4 col-lg-12 col-xlg-3">
                <div class="card card-hover">
                  <div class="box bg-info text-center">
                    <h1 class="font-light text-white">
                      <i class="mdi mdi-alert"></i>
                    </h1>
                    <input class="btn btn-sm-info text-white" value="เพิ่มใบสั่งซื้อสินค้า" onclick="window.location='?page=confirmstore';">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          </div>
              </div>
      </div>
    </div>
</form>  
</section>