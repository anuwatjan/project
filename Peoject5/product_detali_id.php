
<h2>ข้อมูลทั่วไปของสินค้า</h2>
<hr>
<form role="form" class="m-5" method="post" enctype="multipart/form-data">
        <div class="form-group row mb-2">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <img id="preview" width="250" height="250" src="./image/<?php echo $result['product_image'] ?>">
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        เลือกไฟล์
                        <input type="file" class="form-control" name="product_image" id="product_image">
                        <input type="hidden" name="oldimage" value="<?php echo  $result['product_image'] ?>" disabled>
                    </div>
                    <div class="col-md-3">
                        SKU
                        <input type="text" class="form-control form-control-user" placeholder="SKU" name="product_name"
                            value="<?php echo $result['product_sku'];?>" required disabled>
                    </div>
                    <div class="col-md-5">
                        ซัพพลายเซน
                        <select type="text" class="form-control" id="exampleInputUsername1" name="product_suppiles" disabled>
                            <?php
                                         $sqlsuppiles = "SELECT * FROM suppiles";
                                         $querysuppiles = mysqli_query($con, $sqlsuppiles);
                                        while ($row = mysqli_fetch_assoc($querysuppiles)) { ?>
                            <option value="<?= $row['suppiles_name'] ?>"
                                <?= $result['product_suppiles'] == $row['suppiles_name'] ? 'selected' : '' ?>>
                                <?= $row['suppiles_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row mb-2">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <p>ชื่อสินค้า</p>
                <input type="text" class="form-control form-control-user" placeholder="ชื่อสินค้า" name="product_name" disabled
                    value="<?php echo $result['product_name'];?>" required>
            </div>
            <div class="col-sm-2">
                <p>ราคาต้นทุน</p>
                <input type="text" class="form-control form-control-user" placeholder="ราคาต้นทุน" disabled
                    value="<?php echo $result['product_price'];?>" name="product_price" required>
            </div>
            <div class="col-sm-2">
                <p>ราคาขาย</p>
                <input type="text" class="form-control form-control-user" placeholder="ราคาขาย" disabled
                    value="<?php echo $result['product_sell'];?>" name="product_sell" required>
            </div>
            <div class="col-sm-2">
                <p>จุดสั่งซื้อ</p>
                <input type="text" class="form-control form-control-user" placeholder="จุดสั่งซื้อ" name="product_point" disabled
                    value="<?php echo $result['product_point'];?>" required>
            </div>
        </div>
        <div class="form-group row mb-2">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <p>หน่วยนับ</p>
                <select type="text" class="form-control" id="exampleInputUsername1" name="product_unit" disabled>
                    <?php
                                         $sqlunit = "SELECT * FROM unit";
                                         $queryunit = mysqli_query($con, $sqlunit);
                                        while ($row = mysqli_fetch_assoc($queryunit)) { ?>
                    <option value="<?= $row['unit_name'] ?>"
                        <?= $result['product_unit'] == $row['unit_name'] ? 'selected' : '' ?>>
                        <?= $row['unit_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
                <p>หมวดหมู่ของสินค้า</p>
                <select type="text" class="form-control" id="exampleInputUsername1" name="product_cate" disabled>
                    <?php
                                         $sqlunit = "SELECT * FROM category";
                                         $queryunit = mysqli_query($con, $sqlunit);
                                        while ($row = mysqli_fetch_assoc($queryunit)) { ?>
                    <option value="<?= $row['cate_name'] ?>"
                        <?= $result['product_cate'] == $row['cate_name'] ? 'selected' : '' ?>>
                        <?= $row['cate_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row mb-2">
            <div class="col-sm-6">
                <p>หมวดหมู่แยกตามอาการ</p>
                <select type="text" class="form-control" id="exampleInputUsername1" name="product_symp" disabled>
                    <?php
                                         $sqlunit = "SELECT * FROM symptons";
                                         $queryunit = mysqli_query($con, $sqlunit);
                                        while ($row = mysqli_fetch_assoc($queryunit)) { ?>
                    <option value="<?= $row['symp_name'] ?>"
                        <?= $result['product_symp'] == $row['symp_name'] ? 'selected' : '' ?>>
                        <?= $row['symp_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
                <p>ประเภทสินค้า</p>
                <select type="text" class="form-control" id="exampleInputUsername1" name="product_type" disabled>
                    <?php
                                         $sqlunit = "SELECT * FROM type";
                                         $queryunit = mysqli_query($con, $sqlunit);
                                        while ($row = mysqli_fetch_assoc($queryunit)) { ?>
                    <option value="<?= $row['type_name'] ?>"
                        <?= $result['product_type'] == $row['type_name'] ? 'selected' : '' ?>>
                        <?= $row['type_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </form>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
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