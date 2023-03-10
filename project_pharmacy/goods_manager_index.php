<style>
.bgc {
    background-color: brown;
}

.borderstyle {
    border-style: solid;
    border-width: 5px;
    border-color: purple;
}
</style>

<?php $connect = mysqli_connect("localhost", "root", "akom2006", "project_new"); ?>

<?php  $sql ="SELECT * , 
CASE  
WHEN  a.good_status = 0 THEN 'รอรับสินค้า' 
WHEN  a.good_status = 1 THEN 'รับสินค้าเรียบร้อยแล้ว'
WHEN  a.good_status = 2 THEN 'ลงสต็อกแล้ว'

END AS status ,
count(a.good_RefNo) AS count 
FROM goods a 
INNER JOIN goods_detail b ON a.goods_id = b.good_id WHERE good_status <> '3'
GROUP BY  a.good_RefNo DESC";
      $result = mysqli_query($connect , $sql);
?>

<h2>จัดการใบรับสินค้า</h2>
<hr>

<div class="card shadow mb-4">
    <div class="card-body" id="container">
        <div class="table-responsive">
            <table class="display nowrap" style="width:100%" id="example">
                <thead>
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">วันที่ออกใบรับสินค้า</th>
                        <th scope="col">หมายเลขใบรับ</th>
                        <th scope="col">รายการสินค้า</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 1 ;
                        require 'functionDateThaiOnTime.php'; 
                        while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td scope="row"><?php echo $i++ ?></td>
                        <?php if($row['good_create'] == '' ){ ?>
                        <td scope="row"><?php echo 'ยังไม่ได้ทำการส่งใบ' ?></td>
                        <?php }else{ ?>
                        <td scope="row"><?php echo datethai($row['good_create']) ?></td>
                        <?php } ?>
                        <td scope="row"><?php echo $row['po_RefNo'] ; echo "<br>" ; echo $row['good_RefNo']?></td>
                        <td scope="row" class="col-4">
                            <?php $sql1 = "SELECT * FROM   goods_detail
                            WHERE good_id = '".$row['goods_id']."'";
                                $query1 = mysqli_query($connect , $sql1 );
                                $ii = 1 ;
                                while($result1 = mysqli_fetch_array($query1)){ ?>
                            <?php echo $ii++ ; echo "." ; echo  $result1['product_name'] ; echo '<br>' ?>
                            <?php } ?>
                        </td>
                        <td scope="row">
                            <?php $sql1 = "SELECT * FROM  goods_detail  WHERE good_id = '".$row['goods_id']."'";
                            $query1 = mysqli_query($connect , $sql1 );
                            $ii = 1 ;
                            while($result1 = mysqli_fetch_array($query1)){ ?>
                            <?php echo  $result1['product_quantity'] ; echo '<br>' ?>
                            <?php } ?>
                        </td>
                        <?php if ($row['good_status'] == 0) { ?>
                        <td class="col-1"><a class="text-danger"><br><?php echo  $row['status'] ?></a></td>
                        <td><a class="btn btn-primary btn-sm"
                                href="?page=<?= $_GET['page'] ?>&function=date&goods_id=<?= $row['goods_id'] ?>">ยืนยัน</a>
                                <a class="btn btn-danger btn-sm" id="dalete_goods" data-id="<?php echo $row['goods_id'] ; ?>">ส่งคืน</a>
                            <?php } else {  ?>
                        <td class="col-2"><a class="text-success"><?php echo  $row['status'] ?></a></td>
                        <td></td>
                        <?php } ?>
                    </tr> 
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    <script src="goods.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $.extend(true, $.fn.dataTable.defaults, {
        "language": {
            "sProcessing": "กำลังดำเนินการ...",
            "sLengthMenu": "แสดง_MENU_ แถว",
            "sZeroRecords": "ไม่พบข้อมูล",
            "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
            "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
            "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
            "sInfoPostFix": "",
            "sSearch": "ค้นหา:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "เริ่มต้น",
                "sPrevious": "ก่อนหน้า",
                "sNext": "ถัดไป",
                "sLast": "สุดท้าย"
            }
        }
    });
    $('#example').DataTable();

    $('#example')
        .removeClass('display')
        .addClass('table table-bordered');
});
</script>