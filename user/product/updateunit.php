<?php include 'crud/updateunit.php' ?>
<section class="section">
    <div class="d-flex justify-content-center">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">แก้ไข 'หน่วยนับ'</h5>
                    <hr>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <a>ราคาขายต่อหน่วย</a>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="<?= $result['dunit_sale'] ?>" name="dunit_sale">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a>ชื่อหน่วยนับ</a>
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="unit_id">
                                            <option value="" selected disabled>หน่วยนับ</option>
                                            <?php
                                            foreach ($queryunit as $data12) : ?>
                                                <option value="<?= $data12['unit_id'] ?>"><?= $data12['unit_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a>ต้นทุนต่อหน่วย</a>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="<?= $result['dunit_price'] ?>" name="dunit_price">
                                    </div>  
                                </div>
                                <!-- <div class="col-md-6">
                                    <a>จุดสั่งซื้อ</a>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="<?= $result['product_reorder'] ?>" name="product_reorder">
                                    </div>
                                </div> -->
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
