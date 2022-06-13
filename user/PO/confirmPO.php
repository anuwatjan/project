<section class="section">
    <div class="justify-content-center">
        <div class="row">
            <div class="col-lg-12">
<?php 
  $date = date('Y-m-d');
?>
                <div class="card">
                    <div class="card-body">
                        <form id="frmcart" name="frmcart" method="post" action="?page=savePO">
                            <h5 class="card-title">ข้อมูลทั่วไป</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">เลขที่อ้างอิง</label>
                                        <div class="row mb-3">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="po_reference" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="col-sm-3 col-form-label">วันที่ออกเอกสาร</label>
                                        <div class="row mb-3">
                                            <div class="col-sm-12">
                                                <input type="text" id="date1" class="form-control" name="po_date" placeholder="<?= datethai($date) ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto">
                                        <label class="col-form-label">ผู้สั่งซื้อสินค้า</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="po_contact_order" style="border:white;">
                                            <option value="" selected disabled>เลือกผู้สั่งซื้อสินค้าจากฐานข้อมูล</option>
                                            <?php
                                            $sqlc = "select * from contact";
                                            $queryc = mysqli_query($connection , $sqlc);
                                            foreach ($queryc as $data12) : ?>
                                                <option value="<?= $data12['contact_id'] ?>"><?= $data12['contact_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <label class="col-form-label">ผู้ขายสินค้า</label>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-control" name="po_contact_sale" style="border:white;">
                                            <option value="" selected disabled>เลือกผู้สั่งขายสินค้าจากฐานข้อมูล</option>
                                            <?php
                                            foreach ($queryc as $data12) : ?>
                                                <option value="<?= $data12['contact_id'] ?>"><?= $data12['contact_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <table class="table table-hover text-center" id="">
                                    <tr>
                                        <td colspan="6" style="background-color:lightgreen;"> 
                                            <strong>ใบสั่งซื้อ</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>รายการ</td>
                                        <td>วันที่ผลิต</td>
                                        <td>วันที่หมดอายุ</td>
                                        <td>จำนวน</td>
                                        <td>ราคา</td>
                                        <td>รวม(บาท)</td>
                                    </tr>
                                    <?php
                                    $po_total = 0;
                                    $total = 0;
                                    foreach ($_SESSION['carting'] as $product_id => $po_qty) {
                                        $sql  = "select * from product a JOIN doc_unit b ON a.product_id = b.product_id where a.product_id= '$product_id'";
                                        $query  = mysqli_query($connection, $sql);
                                        $row  = mysqli_fetch_array($query);
                                        $sum  = $row['dunit_price'] * $po_qty;
                                        $total += $sum;
                                        $vat = 0.07 * $total;
                                        $po_total = $total + $vat;
                                        echo "<tr>";
                                        echo "<td>" . $row["product_name"] . "</td>";
                                        echo "<td >";
                                        echo "<input type='text' id='date2' class='form-control' name='po_product_start[$product_id]' /></td>";
                                        echo "<td >";
                                        echo "<input type='text' id='date3' class='form-control' name='po_product_end[$product_id]'/></td>";
                                        echo "<td>" . $po_qty . "</td>";
                                        echo "<td>" . number_format($row['dunit_price'], 2) . "</td>";
                                        echo "<td>" . number_format($sum, 2) . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "<td colspan='5'><b>ราคารวม</b></td>";
                                    echo "<td>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
                                    echo "<td ></td>";
                                    echo "</tr>";
                                    echo "<td colspan='5'><b>ภาษี</b></td>";
                                    echo "<td>" . "<b>" . number_format($vat, 2) . "</b>" . "</td>";
                                    echo "<td ></td>";
                                    echo "</tr>";
                                    echo "<td colspan='5'><b>ราคารวมภาษี</b></td>";
                                    echo "<td>" . "<b>" . number_format($po_total, 2) . "</b>" . "</td>";
                                    echo "<td ></td>";
                                    echo "</tr>";
                                    ?>
                                </table>
                                <center>
                                    <div class="row">
                                        <div class="">
                                            <input type="submit" name="Submit2" class="btn btn-info text-white" value="ยืนยันใบสั่งซื้อสินค้า" />
                                        </div>
                                    </div>
                                </center>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- date -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://รับเขียนโปรแกรม.net/picker_date/picker_date.js"></script>
<script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
<script>
    picker_date(document.getElementById("date1"), {
        year_range: "-12:+10"
    });
    picker_date(document.getElementById("date3"), {
        year_range: "-12:+10"
    });
    picker_date(document.getElementById("date2"), {
        year_range: "-12:+10"
    });
</script>
<!-- date -->