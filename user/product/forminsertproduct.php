<?php include('crud/insert.php') ?>
<div class="pagetitle">
    <h1>หน้าเพิ่มข้อมูลสินค้า</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">หน้าหลัก</a></li>
            <li class="breadcrumb-item">สินค้า</li>
            <li class="breadcrumb-item active">เพิ่มสินค้า</li>
        </ol>
    </nav>
    <section class="section">
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ข้อมูลทั่วไป</h5>
                            <!-- General Form Elements -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">รูปภาพ</label>
                                    <div class="col-sm-12 mb-3">
                                        <div class="col-sm-12 mb-3">
                                            <img id="preview" width="300" height="300">
                                            <hr>
                                            <input type="file" class="form-control " id="product_img" name="product_img" />
                                        </div>
                                    </div>
                                </div>
                                <label for="inputText" class="col-sm-3 col-form-label">ประเภทสินค้า</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <select class="form-control" name="product_type">
                                            <option value="" selected disabled>ประเภทสินค้า</option>
                                            <?php
                                            foreach ($querytype as $data12) : ?>
                                                <option value="<?= $data12['type_id'] ?>"><?= $data12['type_name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_name" require>
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">ชื่อสามัญทางยา</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_generic">
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">รายละเอียดสินค้า</label>
                                <div class="row mb-3">

                                    <div class="col-sm-10">
                                        <textarea class="form-control" style="height: 100px" name="product_detail"></textarea>
                                    </div>
                                </div>
                                <!-- <label for="inputEmail" class="col-sm-3 col-form-label">อัตราภาษีมูลค่าเพิ่ม</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <select class="ui-choose" id="uc_02" name="product_vat">                                       
                                            <option value="0">ไม่มี VAT</option>
                                            <option value="0.00">VAT 0%</option>
                                            <option value="0.07">VAT 7%</option>
                                        </select>
                                    </div>
                                </div> -->
                                <!-- <label for="inputEmail" class="col-sm-6 col-form-label">แจ้งเตือนก่อนหมดอายุ(จุดสั่งซื้อ)</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_reorder">
                                    </div>
                                </div> -->

                                <h5 class="card-title">หน่วยนับ</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a>ราคาขายต่อหน่วย(ค่าเริ่มต้น)</a>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="dunit_sale">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <a>หน่วยนับ(ค่าเริ่มต้น)</a>
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
                                            <input type="text" class="form-control" name="dunit_price">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title">หมวดหมู่</h5>
                                <fieldset class="row mb-3">
                                    <h5 class="col-form-label col-sm-2 pt-0"></h5>
                                    <div class="col-sm-10">
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <?php foreach ($querycat as $row) { ?>
                                                    <div class="col-md-6">
                                                        <input type="radio" name="product_category" value="<?= $row['category_id'] ?>" checked>
                                                        <label><?= $row['category_name'] ?></label>
                                                        <hr>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <h5 class="card-title">หมวดหมู่แยกตามอาการที่รักษา</h5>
                                <fieldset class="row mb-3">
                                    <h5 class="col-form-label col-sm-2 pt-0"></h5>
                                    <div class="col-sm-10">
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <?php foreach ($querysym as $row1) { ?>
                                                    <div class="col-md-6">
                                                        <input type="radio" name="product_symptom" value="<?= $row1['symptom_id'] ?>" checked>
                                                        <label><?= $row1['symptom_name'] ?></label>
                                                        <hr>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">บันทึกข้อมูลสินค้า</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</section>
</div>
<script type="text/javascript">
    function ReadURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#product_img").change(function() {
        ReadURL(this);
    });
</script>