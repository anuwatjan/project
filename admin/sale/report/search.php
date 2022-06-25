<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Bootstrap core CSS -->
  <link href="dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="dist/css/sticky-footer-navbar.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="assets/js/ie-emulation-modes-warning.js"></script>
</head>
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
<center>
  <section class="section">
    <div class="row">
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">ตารางรายงานการขาย</h5>
            <!DOCTYPE html>
            <html lang="en">
            <form method="post" action="search.php" class="form-inline">
              <!-- <div class="form-group">
                <label for="Date_From">วันที่ต้องการค้นหา</label>
                <input type="date" name="date_from" value="<?php echo (isset($_POST['date_from'])) ? $_POST['date_from'] : ''; ?>" class="form-control" />
              </div>
              <div class="form-group">
                <label for="Date_To">ถึงวันที่</label>
                <input type="date" name="date_to" value="<?php echo (isset($_POST['date_to'])) ? $_POST['date_to'] : ''; ?>" class="form-control" />
              </div>
              <button type="submit" name="search" class="btn btn-primary">ค้นหา</button> -->
            </form>
            <div class="table-responsive table-hover">
              <table class="table">
                <thead>
                  <tr>
                    <th>ชื่อสินค้า</th>
                    <th>วันที่ผลิต</th>
                    <th>วันหมดอายุ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  include('database.php');
                  $result = $database->prepare("SELECT * FROM product a join po b ON a.product_id = b.product_id where (b.po_product_end BETWEEN '" . $_POST['date_from'] . " 00:00:01' and '" . $_POST['date_to'] . " 23:59:59') order by a.product_id DESC");
                  $result->execute();
                  for ($count = 0; $row_member = $result->fetch(); $count++) {
                    $product_id = $row_member['product_id'];
                  ?>
                    <tr>
                      <td><?php echo $row_member['product_name']; ?></td>
                      <td><?php echo datethai(($row_member['po_product_start'])); ?></td>
                      <td><?php echo datethai(($row_member['po_product_end'])); ?></td>
                    </tr>
                  <?php  }  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
          window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')
        </script>
        <script src="dist/js/bootstrap.min.js"></script>
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
      </div>
    </div>
  </section>
</center>