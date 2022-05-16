<?php include 'function.php' ?>
<?php include('script.php') ?>
<div class="pagetitle">
    <h1>หน้าใบสั่งซื้อสินค้า</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
            <li class="breadcrumb-item">PO</li>
            <li class="breadcrumb-item active">เพิ่มใบสั่งซื้อสินค้า</li>
        </ol>
    </nav>
    <form method="POST" action="?page=PO&function=insertPO&fuction=update">
    <!-- <form action="test.php" method="POST"> -->
        <section class="section">
            <div class="justify-content-center">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="card-title">ข้อมูลสินค้า</h5>
                                    </div>
                                </div>
                                <table class="table table-hover text-center" id="">
                                    <tr>
                                        <td>รายการ</td>
                                        <td>จำนวน</td>
                                        <td>ราคา</td>
                                        <td>รวม(บาท)</td>
                                        <td>ลบรายการสินค้า</td>
                                    </tr>
                                    <?php
                                    // echo '<pre>'.print_r($_SESSION, 1).'</pre>';
                                    $po_total = 0;
                                    $total = 0;
                                    if (!empty($_SESSION['carting'])) {
                                        foreach ($_SESSION['carting'] as $product_id => $po_qty) {
                                            $sql = "SELECT * from product a JOIN doc_unit b ON a.product_id = b.product_id where a.product_id = '$product_id'";
                                            $query = mysqli_query($connection, $sql);
                                            $row = mysqli_fetch_array($query);
                                            $sum = $row['dunit_price'] * $po_qty;
                                            $total += $sum;
                                            $vat = 0.07 * $total;
                                            $po_total = $total + $vat;
                                            echo "<tr>";
                                            echo "<td >" . $row["product_name"] . "</td>";
                                            echo "<td >";
                                            echo "<input type='text' class='form-control' name='amount[$product_id]' value='$po_qty' size='2'/></td>";
                                            echo "<td >" . number_format($row["dunit_price"], 2) . "</td>";
                                            echo "<td>" . number_format($sum, 2) . "</td>";
                                            //remove product
                                            echo "<td><a href='?page=PO&function=insertPO&product_id=$product_id&fuction=remove' class='btn btn-danger'>ไม่เลือกรายการนี้</a></td>";
                                            echo "</tr>";
                                        }
                                        echo "<td colspan='3'><b>ราคารวม</b></td>";
                                        echo "<td>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
                                        echo "<td ></td>";
                                        echo "</tr>";
                                        echo "<td colspan='3'><b>ภาษี</b></td>";
                                        echo "<td>" . "<b>" . number_format($vat, 2) . "</b>" . "</td>";
                                        echo "<td ></td>";
                                        echo "</tr>";
                                        echo "<td colspan='3'><b>ราคารวม(รวมภาษี)</b></td>";
                                        echo "<td>" . "<b>" . number_format($po_total, 2) . "</b>" . "</td>";
                                        echo "<td ></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-danger text-center">
                                                <h1 class="font-light text-white">
                                                    <i class="mdi mdi-alert"></i>
                                                </h1>
                                                <input class="btn btn-sm-danger text-white" data-toggle="modal" data-target="#myModal" value="เลือกรายการสินค้า">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-warning text-center">
                                                <h1 class="font-light text-white">
                                                    <i class="mdi mdi-alert"></i>
                                                </h1>
                                                <input type="submit" class="btn btn-sm-info text-white" value="ปรับปรุงราคาใหม่"></input>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-lg-2 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="box bg-info text-center">
                                                <h1 class="font-light text-white">
                                                    <i class="mdi mdi-alert"></i>
                                                </h1>
                                                <input class="btn btn-sm-info text-white" value="เพิ่มใบสั่งซื้อสินค้า" onclick="window.location='?page=confirmPO';">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>
<?php include 'modal.php' ?>
<script src="../user/customer/assets/jquery.min.js"></script>
<script src="../user/customer/assets/script.js"></script>
<!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">เลือกรายการสินค้าจากฐานข้อมูล</button> -->