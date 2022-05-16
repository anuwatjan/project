<?php include('crud/insert.php') ?>
<div class="pagetitle">
    <h1>หน้าเพิ่มข้อมูลหมวดหมู่</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">หน้าหลัก</a></li>
            <li class="breadcrumb-item">หมวดหมู่</li>
            <li class="breadcrumb-item active">เพิ่มหมวดหมู่</li>
        </ol>
    </nav>
    <section class="section">
        <div class=" justify-content-center">
            <div class="row">
                <div class="col-lg-5">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ข้อมูลทั่วไป</h5>
                            <!-- General Form Elements -->
                            <form action="" method="post" enctype="multipart/form-data">

                                <label for="inputEmail" class="col-sm-5 col-form-label">ชื่อหมวดหมู่</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="category_name">
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-6 col-form-label">คำอธิบาย</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="category_detail">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">บันทึกข้อมูลหมวดหมู่</button>
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