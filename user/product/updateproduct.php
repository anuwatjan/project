<?php include 'crud/update.php' ?>
<section class="section">
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ข้อมูลทั่วไป</h5>
                            <!-- General Form Elements -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label class="col-sm-5 col-form-label">รูปภาพสินค้า</label>
                                    <div class="col-sm-12 mb-3">
                                        <div class="col-sm-12 mb-3">
                                        <img id="preview" width="250" height="250" src="./product/upload/product/<?= $result['product_img'] ?>">
                                            <hr>
                                            <input type="file" class="form-control" name="product_img" id="product_img">
                                    <input type="hidden" name="oldimage" value="<?= $result['product_img'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <label for="inputText" class="col-sm-3 col-form-label">ประเภทสินค้า</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                    <select class="form-control" name="product_type" style="height: unset !important;">
                                    <option value="" selected disabled>ประเภทสินค้า</option>
                                   <?php while($row = mysqli_fetch_assoc($querytype)){?>
                                    <option value="<?=$row['type_id']?>" <?=$result['product_type'] == $row['type_id'] ? 'selected' : '' ?>>
                                        <?=$row['type_name']?></option>
                             <?php } ?> 
                              </select>
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $result['product_name'] ?>" name="product_name">
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">ชื่อสามัญทางยา</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $result['product_generic'] ?>" name="product_generic">
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">รายละเอียดสินค้า</label>
                                <div class="row mb-3">

                                    <div class="col-sm-10">
                                        <a>
                                            <textarea placeholder="<?= $result['product_detail'] ?>" class="form-control" style="height: 100px" value="<?= $result['product_detail'] ?>" name="product_detail"></textarea>
                                        </a>
                                        </div>
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