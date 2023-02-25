<style>
.bgc {
    background-color: brown;
}

.borderstyle {
    border-style: solid;
    border-width: 5px;
    border-color: purple;
}

div.dataTables_wrapper {
    width: 100%;
    margin: 0 auto;
}
</style>

<?php $connect = mysqli_connect("localhost", "root", "akom2006", "project_new"); 
require 'functionDateThaiOnTime.php'; 
?>

<?php $sql ="SELECT * FROM po ORDER BY po_create DESC ";
      $result = mysqli_query($connect , $sql);
?>

<h2>รายการใบสั่งซื้อสินค้า</h2>
<hr>
<a type="button" href="?page=<?= $_GET['page'] ?>&function=insert" class="btn btn-primary ">เพิ่มใบสั่งซื้อ</a>
<hr>
<div class="card shadow mb-4">
    <div class="card-body" id="container">
        <div class="table-responsive">
            <table class="display nowrap" style="width:100%" id="example">
                <thead>
                    <tr>
                        <th>หมายเลขใบสั่งซื้อ</th>
                        <th scope="col-2">วันที่ออกเอกสารใบสั่งซื้อ</th>
                        <th scope="col">รายการสินค้า</th>
                        <th scope="col">จำนวน</th>
                        <th scope="col">ชื่อผู้สั่งซื้อ</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 1 ;
                        while ($row = mysqli_fetch_array($result)) { 
                            ?>
                    <tr>
                        <td><?php echo  $row['po_RefNo'] ?></td>
                        <td class="col-2"><?php echo  datethai($row['po_create']) ?></td>
                        <td class="col-5">
                            <?php   $sql1 = "SELECT * FROM po_detail WHERE po_id = '".$row['po_id']."'";
                                    $query1 = mysqli_query($connect , $sql1);
                                    $iii = 1 ;
                                    while($row1 = mysqli_fetch_array($query1)){
                                    echo $iii++ ; echo "." ; echo $row1['product_name'] ; echo '</br>';
                            } ?>
                        </td>
                        <td class="col-1">
                            <?php   $sql1 = "SELECT * FROM po_detail WHERE po_id = '".$row['po_id']."'";
                                    $query1 = mysqli_query($connect , $sql1);
                                    $iii = 1 ;
                                    while($row1 = mysqli_fetch_array($query1)){
                                    echo $row1['product_quantity'] ; echo "   " ; echo $row1['product_unit'] ;  echo '</br>';
                            } ?>
                        </td>
                        <td class="col-1"><?php echo  $row['po_buyer'] ?></td>
                        <?php if($row['po_status'] == 'สั่งแล้ว'){ ?>
                        <td class="text-success"> <?php  echo  $row['po_status'] ; ?></td>
                        <?php  }else if($row['po_status'] == 'รับสินค้าแล้ว'){ ?>
                        <td class="text-primary"> <?php  echo  $row['po_status'] ; ?></td>
                        <?php }else if($row['po_status'] == 'ยกเลิก'){ ?>
                        <td class="text-danger"> <?php  echo  $row['po_status'] ; ?></td>
                        <?php }else{ ?>
                        <td class="text-info"> <?php  echo  $row['po_status'] ; ?></td>
                        <?php }?>
                        <td scope="row">
                            <a href="?page=<?= $_GET['page'] ?>&function=detail&po_id=<?= $row['po_id'] ?>"
                                class="btn btn-primary btn-sm">ข้อมูล</a>
                            <?php if($row['po_status'] == 'ยกเลิก' ){?>
                            <?php }else if ($row['po_status'] == 'สั่งแล้ว' ){ ?>
                            <?php }else if ($row['po_status'] == 'รับสินค้าแล้ว' ){ ?>
                            <?php }else{ ?>
                                <a class="btn btn-success btn-sm" id="updatepo" data-id="<?php echo $row['po_id']; ?>">ยืนยันการสั่งซื้อ</a>
                            <?php } ?>
                            <?php if($row['po_status'] != 'สั่งแล้ว' &&  $row['po_status'] != 'รับสินค้าแล้ว' &&  $row['po_status'] != 'ยกเลิก' ) { ?>
                            <a class="btn btn-danger btn-sm" id="deletepo" data-id="<?php echo $row['po_id']; ?>">ยกเลิกใบสั่งซื้อ</a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="phase.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    $('#example').DataTable({
        scrollX: true,
    });

    $('#example')
        .removeClass('display')
        .addClass('table table-bordered');
});
</script>