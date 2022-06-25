<?php include('crud/update.php');?>
<section class="section">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ข้อมูลทั่วไป</h5>
                            <form action="" method="post" enctype="multipart/form-data">
                                <label for="inputEmail" class="col-sm-3 col-form-label">ชื่อประเภทสินค้า</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $result['type_name']?>" name="type_name">
                                    </div>
                                </div>
                             
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">บันทึกข้อมูลผู้ติดต่อ</button>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>