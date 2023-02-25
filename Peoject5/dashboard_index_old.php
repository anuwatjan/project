<?php $connect = mysqli_connect("localhost", "root", "akom2006", "project_new"); 
require 'functionDateThaiOnTime.php'; 
?>

<?php 

        if (isset($_GET['cate_id']) & isset($_GET['type_name'])) {
            $stmt = "SELECT* FROM category WHERE cate_id= '".$_GET['cate_id']."' ";
            $query = mysqli_query($connect , $stmt) ; 
        }else{
            $stmt = "SELECT * FROM product";
            $query = mysqli_query($connect , $stmt) ; 
        }
            $stmPrdType = "SELECT * FROM type";
            $stmPrdType= mysqli_query($connect , $stmPrdType) ;

        ?>


<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-primary" role="alert">
                    <b> รายการสินค้า :: แสดงสินค้าแยกตามหมวดหมู่-ประเภท </b>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="?page=dashboard_index" class="list-group-item list-group-item-action active"
                        aria-current="true">
                        หมวดสินค้า/ประเภทสินค้า
                    </a>
                    <?php while($rowPrdType = mysqli_fetch_array($stmPrdType)) {  ?>
                    <a href="?page=dashboard_index?type_id=<?= $rowPrdType['type_id'];?>&type_name=<?= $rowPrdType['type_name'];?>"
                        class="list-group-item list-group-item-action"> <?= $rowPrdType['type_name'];?></a>
                    <?php } ?>

                </div>
            </div>
            <div class="col-md-9">
                <div class="row">

                    <?php 
      //ถ้ามีการคลิกเลือกประเภทสินค้า 
      if(isset($_GET['cate_name'])){
        echo '<h4 style="color:red"> หมวดสินค้า ' .$_GET['cate_name'] .'</h4>';
      }
      //loop
      while($row = mysqli_fetch_array($query)) {  ?>

                    <div class="col-sm-3" style="margin-bottom:50px;">
                        <img src="image/<?= $row['product_image'];?>" width="100%" height="60%"><br><br>
                        ชื่อ: <?= $row['product_name'];?> <br>
                        จำนวนสินค้า : <?= $row['product_quantity'];?> <?= $row['product_unit'] ; ?> <br>
                        ราคา <?= number_format($row['product_price'],2);?> บาท <br>

                        <?php if($row['product_quantity'] > 0){
            echo '<a href="#" style="width:100%" class="btn btn-success btn-sm">สั่งซื้อ</a>';
           }else{
            echo '<a href="#" style="width:100%" class="btn btn-danger btn-sm disabled" > สินค้าหมด !!</a>';
           }
           ?>
                    </div> <!-- //col -->

                    <?php } ?>
                    <br><br>
                </div>
            </div>

        </div>
    </div>