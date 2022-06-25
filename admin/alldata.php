<?php

$query_cate = "SELECT DISTINCT(COUNT(category_id)) as count_number FROM category a ORDER BY category_id DESC";
$query_cate = mysqli_query($connection, $query_cate);
$result_cate = mysqli_fetch_assoc($query_cate);

$query_type = "SELECT DISTINCT(COUNT(type_id)) as count_number FROM type a ORDER BY type_id DESC";
$query_type = mysqli_query($connection, $query_type);
$result_type = mysqli_fetch_assoc($query_type);

$query_symp = "SELECT DISTINCT(COUNT(symptom_id)) as count_number FROM symptom a ORDER BY symptom_id DESC";
$query_symp = mysqli_query($connection, $query_symp);
$result_symp = mysqli_fetch_assoc($query_symp);
?>
<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4" onclick="location.href='?page=category'">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">CATEGORY <span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>หมวดหมู่ของสินค้า</h6>
                                    <span class="text-success small pt-1 fw-bold"><?=$result_cate['count_number']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Sales Card -->


                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4" onclick="location.href='?page=typeproduct'">

                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">TYPE PRODUCT <span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>ประเภทของสินค้า</h6>
                                    <span class="text-success small pt-1 fw-bold"><?=$result_type['count_number']?></span>

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
                <div class="col-xxl-4 col-md-4" onclick="location.href='?page=symp'">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">SYMTOMS<span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>หมวดหมู่ของแยกตามอาการ</h6>
                                    <span class="text-success small pt-1 fw-bold"><?=$result_symp['count_number']?></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Reports -->
         
            </div>
        </div><!-- End Revenue Card -->

        <!-- Reports -->

        <!-- Reports -->


    </div>
    </div><!-- End Left side columns -->


    </div>
</section>