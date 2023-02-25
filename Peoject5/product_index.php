<div class="container" id="container">

    <h2>สต็อกสินค้า</h2>

    <a href="?page=product_insert" style="float:right" class="btn btn-primary"><i style="width:100%;"
            class=" fas fa-download fa-sm text-white-100"></i> เพิ่มข้อมูลสินค้า</a>


    <?php $connect = mysqli_connect("localhost", "root", "akom2006", "project_new"); ?>
    <?php $sql ="SELECT * FROM product where product_status =  0 ";
                      $result = mysqli_query($connect , $sql); ?>
    <table class="mt-5 table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>รหัสสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>จำนวน : หน่วย</th>
                <th>ราคาทุน</th>
                <th>ราคาขาย</th>
                <th>ซัพพลายเซน</th>
                <th>ข้อมูล</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                            $i = 1 ;
                            while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td scope="row"><?php echo $row['product_sku'];?></td>
                <td><img src=".\image\<?php echo $row['product_image']; ?>" width="40"
                        height="40"><br><?php echo  $row['product_name'] ?></td>
                <td><?php echo  $row['product_quantity'] ?> : <?php echo  $row['product_unit'] ?></td>
                <td scope="row" class="text-right"><?php echo  number_format($row['product_price'],2) ?></td>
                <td scope="row" class="text-right"><?php echo  number_format($row['product_sell'],2) ?></td>
                <td><?php echo  $row['product_suppiles'] ?></td>
                <td scope="row"><a
                        href="?page=<?= $_GET['page'] ?>&function=detail&product_id=<?php echo $row['product_id'] ?>"
                        class="btn btn-sm  btn-warning text-white">รายละเอียด</a></td>
                <td scope="row"><a
                        href="?page=<?= $_GET['page'] ?>&function=update&product_id=<?php echo $row['product_id'] ?>"
                        class="btn btn-sm  btn-secondary text-white">แก้ไขข้อมูล</a></td>
                <td><a class="btn  btn-danger btn-sm  text-white" id="delete"
                        data-id="<?php echo $row['product_id'] ; ?>">ลบข้อมูล</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>