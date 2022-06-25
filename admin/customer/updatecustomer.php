<?php include 'crud/update.php' ?>
<section class="section">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ข้อมูลทั่วไป</h5>
                            <!-- General Form Elements -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">รูปภาพ</label>
                                    <div class="col-sm-12 mb-3">
                                        <div class="col-sm-12 mb-3">
                                        <img id="preview" width="250" height="250" src="./customer/upload/customer/<?= $result['customer_img'] ?>">
                                            <hr>
                                            <input type="file" class="form-control" name="customer_img" id="customer_img">
                                    <input type="hidden" name="oldimage" value="<?= $result['customer_img'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <label for="inputText" class="col-sm-3 col-form-label">ประเภทลูกค้า</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                    <select class="form-control" name="customer_type" style="height: unset !important;">
                                    <option value="" selected disabled>ประเภทลูกค้า</option>
                                   <?php while($row = mysqli_fetch_assoc($querytype)){?>
                                    <option value="<?=$row['typec_id']?>" <?=$result['customer_type'] == $row['typec_id'] ? 'selected' : '' ?>>
                                        <?=$row['typec_name']?></option>
                             <?php } ?> 
                              </select>
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">ชื่อ-นามสกุล ลูกค้า</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $result['customer_name']?>" name="customer_name">
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">เบอร์โทรศัพท์ลูกค้า</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $result['customer_phone']?>" name="customer_phone">
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">อีเมล์ลูกค้า</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $result['customer_email']?>" name="customer_email">
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลอื่นๆ</h5>
                                <label for="inputEmail" class="col-sm-3 col-form-label">ที่อยู่ปัจจุบัน</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $result['customer_add']?>" name="customer_add">
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">จังหวัด</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                    <select class="form-control" name="customer_province" style="height: unset !important;">
                                    <option value="" selected disabled>จังหวัด</option>
                                   <?php while($row = mysqli_fetch_assoc($queryprovince)){?>
                                    <option value="<?=$row['id']?>" <?=$result['customer_province'] == $row['id'] ? 'selected' : '' ?>>
                                        <?=$row['name_th']?></option>
                             <?php } ?> 
                              </select>
                                </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">อำเภอ</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                    <select class="form-control" name="customer_amphures" style="height: unset !important;">
                                    <option value="" selected disabled>อำเภอ</option>
                                   <?php while($row = mysqli_fetch_assoc($queryamphures)){?>
                                    <option value="<?=$row['id']?>" <?=$result['customer_amphures'] == $row['id'] ? 'selected' : '' ?>>
                                        <?=$row['name_th']?></option>
                             <?php } ?> 
                              </select>
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">ตำบล</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                    <select class="form-control" name="customer_geo" style="height: unset !important;">
                                    <option value="" selected disabled>ตำบล</option>
                                   <?php while($row = mysqli_fetch_assoc($querygeo)){?>
                                    <option value="<?=$row['id']?>" <?=$result['customer_geo'] == $row['id'] ? 'selected' : '' ?>>
                                        <?=$row['name_th']?></option>
                             <?php } ?> 
                              </select>
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">รหัสไปรษณีย์</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?= $result['customer_zip']?>" name="customer_zip">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">บันทึกข้อมูลลูกค้า</button>
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
    $("#customer_img").change(function() {
        ReadURL(this);
    });
</script>