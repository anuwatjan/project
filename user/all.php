<?php
$sql_cus = "SELECT COUNT(customer_id) as count_cus FROM customer";
$query_cus = mysqli_query($connection,$sql_cus);
$result_cus = mysqli_fetch_assoc($query_cus);

$sql_con = "SELECT COUNT(contact_id) as count_con FROM contact";
$query_con = mysqli_query($connection,$sql_con);
$result_con = mysqli_fetch_assoc($query_con);

$sql_po = "SELECT COUNT(DISTINCT(po_reference)) as count_po FROM po";
$query_po = mysqli_query($connection,$sql_po);
$result_po = mysqli_fetch_assoc($query_po);

$sql_good = "SELECT COUNT(DISTINCT(good_reference)) as count_good FROM good";
$query_good = mysqli_query($connection,$sql_good);
$result_good = mysqli_fetch_assoc($query_good);

$query_store = "SELECT DISTINCT(COUNT(store_number)) as count_number FROM store a ORDER BY store_id DESC";
$query_store = mysqli_query($connection, $query_store);
$result_store = mysqli_fetch_assoc($query_store);

$query_pro = "SELECT DISTINCT(COUNT(product_id)) as count_number FROM product a ORDER BY product_id DESC";
$query_pro = mysqli_query($connection, $query_pro);
$result_pro = mysqli_fetch_assoc($query_pro);


?>
<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4" onclick="location.href='?page=customer'">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">CUSTOMER <span>| Customer</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h8>ลูกค้า</h8>
                                    <span class="text-success small pt-1 fw-bold"><?=$result_cus['count_cus']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Sales Card -->


                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4" onclick="location.href='?page=contact'">

                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">CONTACT <span>| Contact</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h8>ผู้ติดต่อ</h8>
                                    <span class="text-success small pt-1 fw-bold"><?=$result_con['count_con']?></span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
            </div>
        </div><!-- End Reports -->

        <div class="col-lg-12">
            <div class="row">
                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-4" onclick="location.href='?page=PO'">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">PO <span>| Purchase Order</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h8>ใบสั่งซื้อสินค้า</h8>
                                    <span class="text-success small pt-1 fw-bold"><?=$result_po['count_po']?></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Reports -->
                <div class="col-xxl-4 col-md-4" onclick="location.href='?page=GOOD'">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">GOODS <span>| Goods Receipt</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h8>ใบรับสินค้า</h8>
                                    <span class="text-success small pt-1 fw-bold"><?=$result_good['count_good']?></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Reports -->
                <div class="col-xxl-4 col-md-4" onclick="location.href='?page=receipt'">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">RCT <span>| Receipt</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h8>ใบเสร็จรับเงิน</h8>
                                    <span class="text-success small pt-1 fw-bold"><?=$result_store['count_number']?></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Reports -->
            </div>
        </div><!-- End Revenue Card -->

        <!-- Reports -->

        <div class="col-lg-12">
            <div class="row">
                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-3" onclick="location.href='?page=sale'">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">SALES REPORT</h5>


                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h8>รายงานการขาย</h8>
                                        <span class="text-success small pt-1 fw-bold">8%</span>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div><!-- End Reports -->
                <!-- <div class="col-xxl-4 col-md-3" onclick="location.href='?page=reportgood'">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">GOODS RECRIPT<span></h5>


                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h8>รายงานรับสินค้า</h8>
                                            <span class="text-success small pt-1 fw-bold">8%</span>

                                        </div>
                                    </div>
                        </div>
                    </div> 
                </div> -->
                <div class="col-xxl-4 col-md-3" onclick="location.href='?page=stock'">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">INVENTORY REPORT <span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h8>รายงานสต็อกสินค้า</h8>
                                            <span class="text-success small pt-1 fw-bold"><?=$result_pro['count_number']?></span>

                                        </div>
                                    </div>
                        </div>
                    </div>
                </div><!-- End Reports -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">SALE PRICE REPORT <span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h8>รายงานราคาขาย</h8>
                                            <span class="text-success small pt-1 fw-bold">8%</span>

                                        </div>
                                    </div>
                        </div>
                    </div>
                </div><!-- End Reports -->
            </div>
        </div><!-- End Revenue Card -->

        <!-- Reports -->


    </div>
    </div><!-- End Left side columns -->


    </div>
</section>