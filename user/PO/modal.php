<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog"  style="max-width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
               
                <h4 class="modal-title">รายการสินค้า</h4>
            </div>
            <div class="modal-body">
                <?php 
                $sql = "SELECT * , b.unit_id,c.unit_id,c.unit_name AS name_unit , a.product_type,d.type_id,d.type_name AS name_type FROM product a 
                JOIN doc_unit b ON a.product_id = b.product_id JOIN unit c ON  c.unit_id = b.unit_id
                JOIN type d ON a.product_type = d.type_id  order by a.product_id ";
                $result = mysqli_query($connection, $sql);
                ?>
                <table class="table table-hover" id="tableall">
                    <thead>
                    <tr>
                    <th>รายการสินค้า</th>
                    <th>หน่วยนับ</th>
                    <th>ประเภทสินค้า</th>
                    <th>คงเหลือ</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_array($result)) : ?>
                    <tr>
                        <td><?php echo $row['product_name']?></td>
                        <td><?php echo $row['name_unit']?></td>
                        <td><?php echo $row['name_type']?></td>
                        <td><?php echo $row['product_net']?></td>
                        <td><a href='?page=<?= $_GET['page'] ?>&function=insertPO&product_id=<?php echo $row['product_id'] ?>&fuction=add'> เพิ่มลงใบสั่งซื้อ </a></td>
                    </tr>
                    <?php endwhile ; ?>
                    
                </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่างนี้</button>
            </div>
        </div>

    </div>
</div>
<script>
  $(document).ready(function() {
    $('#tableall').DataTable();
  });
</script>