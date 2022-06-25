<?php include('crud/update.php'); ?>
<section class="section">
    <div class="justify-content-center">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ข้อมูลทั่วไป</h5>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">รูปภาพ</label>
                                <div class="col-sm-12 mb-3">
                                    <div class="col-sm-12 mb-3">
                                        <img id="preview" width="250" height="250" src="./contact/upload/contact/<?= $result['contact_img'] ?>">
                                        <hr>
                                        <input type="file" class="form-control" name="contact_img" id="contact_img">
                                        <input type="hidden" name="oldimage" value="<?= $result['contact_img'] ?>">
                                    </div>
                                </div>
                            </div>

                            <label for="inputEmail" class="col-sm-3 col-form-label">ชื่อ/บริษัท/ร้านค้า</label>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $result['contact_name'] ?>" name="contact_name">
                                </div>
                            </div>
                            <label for="inputEmail" class="col-sm-3 col-form-label">เบอร์โทรศัพท์ผู้ติดต่อ</label>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $result['contact_phone'] ?>" name="contact_phone">
                                </div>
                            </div>
                            <label for="inputEmail" class="col-sm-3 col-form-label">อีเมล์ผู้ติดต่อ</label>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $result['contact_email'] ?>" name="contact_email">
                                </div>
                            </div>
                            <h5 class="card-title">ข้อมูลอื่นๆ</h5>
                            <label for="inputEmail" class="col-sm-3 col-form-label">เลขประจำตัวผู้เสียภาษี</label>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $result['contact_number'] ?>" name="contact_number">
                                </div>
                            </div>
                            <label for="inputEmail" class="col-sm-3 col-form-label">ที่อยู่ปัจจุบัน</label>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $result['contact_add'] ?>" name="contact_add">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">จังหวัด</label>
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                            <select class="form-control" name="contact_province" id="province" style="height: unset !important;">
                                                <option value="" selected disabled>จังหวัด</option>
                                                <?php while ($row = mysqli_fetch_assoc($queryprovince)) { ?>
                                                    <option value="<?= $row['id'] ?>" <?= $result['contact_province'] == $row['id'] ? 'selected' : '' ?>>
                                                        <?= $row['name_th'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">อำเภอ</label>
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                            <select class="form-control" name="contact_amphures" id="amphure" style="height: unset !important;">
                                                <option value="" selected disabled>อำเภอ</option>
                                                <?php while ($row = mysqli_fetch_assoc($queryamphures)) { ?>
                                                    <option value="<?= $row['id'] ?>" <?= $result['contact_amphures'] == $row['id'] ? 'selected' : '' ?>>
                                                        <?= $row['name_th'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="inputEmail" class="col-sm-3 col-form-label">ตำบล</label>
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                            <select class="form-control" name="contact_geo" id="district" style="height: unset !important;">
                                                <option value="" selected disabled>ตำบล</option>
                                                <?php while ($row = mysqli_fetch_assoc($querygeo)) { ?>
                                                    <option value="<?= $row['id'] ?>" <?= $result['contact_geo'] == $row['id'] ? 'selected' : '' ?>>
                                                        <?= $row['name_th'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label for="inputEmail" class="col-sm-3 col-form-label">รหัสไปรษณีย์</label>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?= $result['contact_zip'] ?>" name="contact_zip">
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
    $("#contact_img").change(function() {
        ReadURL(this);
    });
</script>
<script src="../user/customer/assets/jquery.min.js"></script>
<script src="../user/customer/assets/script.js"></script>