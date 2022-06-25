<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <!---	<link rel="icon" href="../../favicon.ico">	-->

  <title>How to Use Two Dates in Search</title>

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
<div class="container">
  <div class="page-header">
    <form method="post" action="?page=<?= $_GET['page'] ?>&function=reportsalesearch" class="form-inline">
      <div class="form-group">
        <label for="Date_From">วันที่ต้องการค้นหา</label>
        <input type="date" name="date_from" value="<?php echo date('Y-m-d'); ?>" class="form-control" />
      </div>
      <div class="form-group">
        <label for="Date_To">ถึงวันที่</label>
        <input type="date" name="date_to" value="<?php echo date('Y-m-d'); ?>" class="form-control" />
      </div>
      <button type="submit" name="search" class="btn btn-primary">ค้นหา</button>
    </form>
    <br />
    <div class="table-responsive">
      <table class="table">
        <tr>
          <th>ชื่อสินค้า</th>
          <th>วันที่ผลิต</th>
          <th>วันหมดอายุ</th>
        </tr>
        <?php
        include('database.php');
        $result = $database->prepare("SELECT * FROM product a join po b ON a.product_id  = b.product_id order by a.product_id DESC");
        $result->execute();
        for ($count = 0; $row_member = $result->fetch(); $count++) {
          $id = $row_member['product_id'];
        ?>
          <tr>
            <td><?php echo $row_member['product_name']; ?></td>
            <td><?php echo datethai(($row_member['po_product_start'])); ?></td>
            <td><?php echo datethai(($row_member['po_product_end'])); ?></td>
          </tr>
        <?php  }  ?>
      </table>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
  window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')
</script>
<script src="dist/js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>