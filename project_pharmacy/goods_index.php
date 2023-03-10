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

<?php 

$sql = "SELECT DISTINCT(b.po_RefNo) , a.good_create , a.good_RefNo , a.goods_id , 
CASE 
WHEN
    a.good_status  = 0 THEN 'ยังไม่ได้จัดเตรียมสินค้า' 
 WHEN   a.good_status  = 1  THEN 'จัดเตรียมสินค้าแล้ว'
   END AS msgstatus
FROM goods a JOIN goods_detail b ON a.goods_id = b.good_id WHERE good_status = 1 ";
$result = mysqli_query($connect , $sql);
?>

<h2>รายการใบรับสินค้า</h2>
<hr>
<div class="card shadow mb-5">
    <div class="card-body">
        <div class="table-responsive">
        <table class="display nowrap" style="width:100%" id="example">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>หมายเลขใบสั่งซื้อ</th>
                        <th>วันที่ออกใบรับ</th>
                        <th>รายการ</th>
                        <th>จำนวน</th>
                        <th>สถานะของใบรับสินค้า</th>
                        <th>รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    require 'functionDateThaiOnTime.php';
                    $no = 1 ;
                    while ($row = mysqli_fetch_array($result)) {
                        ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td style="text-align:center;"><?php echo $row['po_RefNo'] ; echo "<br>" ; echo $row['good_RefNo'] ?></td>
                        <td><?php echo DateThai($row['good_create']); ?></td>
                        <td class="col-4">
                            <?php 
                               $sqlproduct = "SELECT  * FROM  goods_detail  WHERE good_id = '".$row['goods_id']."'";
                                $queryproduct = mysqli_query($connect , $sqlproduct); 
                                $i = 1 ;
                                while ($rowproduct = mysqli_fetch_array($queryproduct)) { ?>
                                <?php echo $i++ ; echo "." ; echo $rowproduct['product_name'];  echo '<br>'; ?>
                                <?php  } ?>
                        </td>
                        <td style="align:right;">
                            <?php 
                                    $sqlproduct = "SELECT  *  FROM  goods_detail 
                                    WHERE good_id = '".$row['goods_id']."'";
                                    $queryproduct = mysqli_query($connect , $sqlproduct); 
                                    while ($rowproduct = mysqli_fetch_array($queryproduct)) { ?>
                                    <?php echo $rowproduct['product_quantity']; echo "" ; echo $rowproduct['product_unit'] ;  echo '<br>'; ?>
                                    <?php  } ?>
                        </td>
                       
                        <?php if($row['msgstatus'] == 'ยังไม่ได้จัดเตรียมสินค้า') { ?>
                        <td class="text-danger"> <?php echo $row['msgstatus'] ; ?> </td>
                        <?php }else{ ?>
                        <td class="text-success"> <?php echo $row['msgstatus'] ; ?> </td>
                        <?php } ?>
                        <td> <a href="?page=<?= $_GET['page'] ?>&function=detail&goods_id=<?= $row['goods_id'] ?>"
                                class="btn btn-primary btn-sm">ข้อมูล</a> </td>
                    </tr>



                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
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