<?php include('crud/insert.php') ?>
<?php
$sql = "SELECT * FROM provinces";
$query = mysqli_query($connection, $sql);
?>
<div class="pagetitle">
    <h1>หน้าเพิ่มข้อมูลผู้ติดต่อ</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">หน้าหลัก</a></li>
            <li class="breadcrumb-item">ผู้ติดต่อ</li>
            <li class="breadcrumb-item active">เพิ่มผู้ติดต่อ</li>
        </ol>
    </nav>
    <section class="section">
        <div class="justify-content-center">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ข้อมูลทั่วไป</h5>
                            <!-- General Form Elements -->
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">รูปภาพ</label>
                                    <div class="col-sm-12 mb-3">
                                        <div class="col-sm-12 mb-3">
                                            <img id="preview" width="150" height="150">
                                            <hr>
                                            <div class="col-sm-10">
                                            <input type="file" class="form-control " id="contact_img" name="contact_img" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <label for="inputEmail" class="col-sm-3 col-form-label">ชื่อ/บริษัท/ร้านค้า</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="contact_name">
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">เบอร์โทรศัพท์ผู้ติดต่อ</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="contact_phone">
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">อีเมล์ผู้ติดต่อ</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="contact_email">
                                    </div>
                                </div>
                                <h5 class="card-title">ข้อมูลอื่นๆ</h5>
                                <label for="inputEmail" class="col-sm-3 col-form-label">เลขประจำตัวผู้เสียภาษี</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="contact_number">
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">ที่อยู่ปัจจุบัน</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="contact_add">
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">จังหวัด</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <select name="contact_province" id="province" class="form-control">
                                            <option value="">เลือกจังหวัด</option>
                                            <?php while ($result = mysqli_fetch_assoc($query)) : ?>
                                                <option value="<?= $result['id'] ?>"><?= $result['name_th'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">อำเภอ</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <select name="contact_amphures" id="amphure" class="form-control">
                                            <option value="">เลือกอำเภอ</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">ตำบล</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <select name="contact_geo" id="district" class="form-control">
                                            <option value="">เลือกตำบล</option>
                                        </select>
                                    </div>
                                </div>
                                <label for="inputEmail" class="col-sm-3 col-form-label">รหัสไปรษณีย์</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="contact_zip">
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
</div>
<?php include('script.php'); ?>
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