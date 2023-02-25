<?php
session_start();
require 'store_order.php' ;
$connect = mysqli_connect("localhost","root","akom2006","project_new");
$s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 12);
$date = date("Y-m-d H:i:s") ;
$_SESSION['sales_get']  ; 
$_SESSION['customer_name']  ; 

?>
<style>
.buttonr {
    float: right;
}
</style>

<form class="forms-sample" enctype="multipart/form-data" method="POST" action="store_insert_sql.php">
    <div class="row">
        <div class="col-md-12">
            <h2>ใบเสร็จรับเงินแบบเต็ม</h2>
        </div>
    </div>
    <hr />
    <div class="col-md-12">
        <?php require 'functionDateThai.php' ?>
        <div class="row">
            <div class="col-md-6">
                <div>ร้านขายยาดาชัย์ By เจ๊แนน</div>
                <div>เลขที่ 286/3 เขต มีนบุรี </div>
                <div>เเขวง จังหวัด กรุงเทพมหานคร</div>
            </div>
            <!-- <div class="col-md-6">
                ลูกค้า : <?php echo $_SESSION['customer_name']  ;  ?>
            </div> -->
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                วันที่ออกเอกสาร
                <p><?php echo datethai11($date) ?></p>
            </div>
            <!-- <div class="col-md-6">
                ซัพพลายเซน
                <select type="text" class="form-control" name="po_saler">
                    <?php
                    $sql = "SELECT * FROM suppiles ";
                    $query =  mysqli_query($connect, $sql);
                    foreach ($query as $data)  : ?>
                    <option value="<?= $data['suppiles_id'] ?>"><?= $data['suppiles_name']?></option>
                    <?php endforeach; ?>
                </select>

            </div> -->



        </div>
        <br>
        <table class="table table-striped table-bordered text-center table-hover" id="dataTables-example">
            <tr>
                <td colspan="7 ">
                    <strong>ใบเสร้จรับเงิน</strong>
                </td>
            </tr>
            <tr>
                <td>ลำดับ</td>
                <td>ซัพพลายเซน</td>
                <td>รหัสสินค้า / รายละเอียด</td>
                <td>จำนวน</td>
                <td class='text-end'>ราคา</td>
                <td class='text-end'>รวม(บาท)</td>
            </tr>
            <?php
            if(isset($_POST)){
                $customer_id = $_POST['customer_id'] ;     
            }
            $i = 1;
            $product_total = 0;
            $total = 0;
            foreach ($_SESSION['cart1'] as $product_id => $product_quantity) {
            $sql  = "select * from product where product_id = '$product_id'";
            $query  = mysqli_query($connect, $sql);
            $row  = mysqli_fetch_array($query);
            $sum  = $row['product_sell'] * $product_quantity;
            $total += $sum;
            $vat = 0.07 * $total;
            $product_total = $total + $vat;
            echo "<tr>";
            echo "<td class='text-center'>" . $i++ . "</td>";
            echo "<td>" . $row["product_suppiles"] . "</td>";
            echo "<td>" . $row["product_name"] . "</td>";
            echo "<td class='text-center'>" . $product_quantity . "</td>";
            echo "<td class='text-end'>" . number_format($row['product_sell'], 2) . "</td>";
            echo "<td class='text-end'>" . number_format($sum, 2) . "</td>";
            echo "</tr>";
        }
        echo "<td colspan='5' class='text-end'><b>ราคารวม</b></td>";
        echo "<td class='text-end'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";

        echo "</tr>";
        echo "<td colspan='5' class='text-end'><b>ภาษี(7%)</b></td>";
        echo "<td class='text-end'>" . "<b>" . number_format($vat, 2) . "</b>" . "</td>";

        echo "</tr>";
        echo "<td colspan='5' class='text-end'><b>ราคารวมภาษี</b></td>";
        echo "<td class='text-end'>" . "<b>" . number_format($product_total, 2) . "</b>" . "</td>";

        echo "</tr>";
        ?>
        </table>
        <a class="btn btn-danger" href="?page=store_index">ย้อนกลับ</a>
        <input type="submit" name="submit" class="btn btn-success text-white buttonr m-2"
            value="ยืนยันการสั่งซื้อสินค้า" />
</form>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="store.js"></script>