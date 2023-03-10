<?php $con = mysqli_connect("localhost", "root", "akom2006", "project_new"); ?>


<div class="container">

    <h2>เพิ่มข้อมูลสินค้า</h2>

    <form class="user mb-3" id="emp-insert_product" method="POST" enctype="multipart/form-data">
        <br>
        <div class="form-group row mb-2">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <img id="preview" width="150" height="150">
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        เลือกรูป
                        <input type="file" class="form-control form-control-user" id="product_image"
                            name="product_image" required />
                    </div>
                    <div class="col-md-3">
                        SKU
                        <input type="text" class="form-control form-control-user" placeholder="SKU" name="product_sku"
                            required>
                    </div>
                    <!-- <div class="col-md-5">
                            ซัพพลายเซน
                            <select type="text" class="form-control " name="product_suppiles">
                                <?php
                                    $scat = "SELECT * FROM suppiles";
                                    $qcat = mysqli_query($con, $scat);
                                    foreach ($qcat as $dacat) : ?>
                                <option value="<?= $dacat['suppiles_name'] ?>"><?= $dacat['suppiles_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div> -->
                </div>
            </div>
        </div>
        <div class="form-group row mb-2">
            <div class="col-sm-6 mb-3 mb-sm-0">
                ชื่อสินค้า
                <input type="text" class="form-control form-control-user" placeholder="ชื่อสินค้า" name="product_name"
                    required>
            </div>
            <div class="col-sm-2">
                ราคาทุน
                <input type="text" OnKeyPress="return chkNumber(this)" class=" form-control form-control-user"
                    placeholder="กำหนดราคาต้นทุน" name="product_price" required>
            </div>
            <div class="col-sm-2">
                ราคาขาย
                <input type="text" OnKeyPress="return chkNumber(this)" class=" form-control form-control-user"
                    placeholder="กำหนดราคาขาย" name="product_sell" required>
            </div>
            <div class="col-sm-2">
                จุดสั่งซื้อ
                <input type="text" OnKeyPress="return chkNumber(this)" class=" form-control form-control-user"
                    placeholder="กำหนดจุดสั่งซื้อ" name="product_point" required>
            </div>
        </div>
        <div class="form-group row mb-2">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <p>หน่วยนับ</p>
                <select type="text" class="form-control" name="product_unit">
                    <?php
                $sqlunit = "SELECT * FROM unit";
                $queryunit = mysqli_query($con, $sqlunit);
                 foreach ($queryunit as $dataunit) : ?>
                    <option value="<?= $dataunit['unit_name'] ?>"><?= $dataunit['unit_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-4">
                <p>หมวดหมู่ของสินค้า</p>
                <select type="text" class="form-control" name="product_cate">
                    <?php
                $scat = "SELECT * FROM category";
                $qcat = mysqli_query($con, $scat);
                foreach ($qcat as $dacat) : ?>
                    <option value="<?= $dacat['cate_name'] ?>"><?= $dacat['cate_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-4">
                <p>ซัพพลายเซน</p>
                <select type="text" class="form-control" name="product_suppiles">
                    <?php
                $scat = "SELECT * FROM suppiles";
                $qcat = mysqli_query($con, $scat);
                foreach ($qcat as $dacat) : ?>
                    <option value="<?= $dacat['suppiles_name'] ?>"><?= $dacat['suppiles_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group row mb-2">
            <div class="col-sm-6">
                <p>หมวดหมู่แยกตามอาการ</p>
                <select type="text" class="form-control" name="product_symp">
                    <?php
                $ssymp = "SELECT * FROM symptons";
                $qsymp = mysqli_query($con, $ssymp);
                foreach ($qsymp as $rows) : ?>
                    <option value="<?= $rows['symp_name'] ?>"><?= $rows['symp_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-sm-6">
                <p>ประเภทสินค้า</p>
                <select type="text" class="form-control" name="product_type">
                    <?php
                $sqltype = "SELECT * FROM type ";
                $querytype = mysqli_query($con, $sqltype);
                 foreach ($querytype as $datatype) : ?>
                    <option value="<?= $datatype['type_name'] ?>"><?= $datatype['type_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <a href="?page=product" class="btn btn-danger btn-user " style="width:50%;">ย้อนกลับ</a>
            <button type="submit" style="width:50%;" class="btn btn-primary btn-user " id="button">บันทึกข้อมูล</button>
        </div>

    </form>
</div>




<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script>
function chkNumber(ele) {
    {
        var vchar = String.fromCharCode(event.keyCode);
        if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
        ele.onKeyPress = vchar;
    }
}
</script>
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
$("#product_image").change(function() {
    ReadURL(this);
});
</script>