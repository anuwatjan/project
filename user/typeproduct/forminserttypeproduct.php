<?php include('crud/insert.php') ?>
<div class="pagetitle">
    <h1>หน้าเพิ่มข้อมูลประเภทสินค้า</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">หน้าหลัก</a></li>
            <li class="breadcrumb-item">ประเภทสินค้า</li>
            <li class="breadcrumb-item active">เพิ่มประเภทสินค้า</li>
        </ol>
    </nav>
    <section class="section">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ข้อมูลทั่วไป</h5>
                            <!-- General Form Elements -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <label for="inputEmail" class="col-sm-3 col-form-label">ชื่อประเภทสินค้า</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="type_name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">บันทึกข้อมูลประเภทสินค้า</button>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
