<?php include 'crud/update.php' ?>
<section class="section">
        <div class=" justify-content-center">
            <div class="row">
                <div class="col-lg-5">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ข้อมูลทั่วไป(แก้ไข)</h5>
                            <!-- General Form Elements -->
                            <form action="" method="post" enctype="multipart/form-data">

                                <label for="inputEmail" class="col-sm-5 col-form-label">ชื่อหมวดหมู่</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $result['category_name']?>" name="category_name">
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-6 col-form-label">คำอธิบาย</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $result['category_detail']?>" name="category_detail">
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