<?php include('crud/insert.php') ?>
<div class="pagetitle">
    <h1>หน้าเพิ่มข้อมูลผู้ใช้งานระบบ</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">หน้าหลัก</a></li>
            <li class="breadcrumb-item">ผู้ใช้งานระบบ</li>
            <li class="breadcrumb-item active">เพิ่มผู้ใช้งานระบบ</li>
        </ol>
    </nav>
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
                                            <img id="preview" width="150" height="150">
                                            <hr>
                                            <input type="file" class="form-control " id="user_img" name="user_img" />
                                        </div>
                                    </div>
                                </div>

                                <label for="inputEmail" class="col-sm-3 col-form-label">ชื่อ-นามสกุล ผู้ใช้งานระบบ</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="user_name">
                                    </div>
                                </div>

                                <label for="inputEmail" class="col-sm-3 col-form-label">วันเดือนปีเกิด</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="user_date">
                                    </div>
                                </div>

                                <label for="inputEmail" class="col-sm-3 col-form-label">เบอร์โทรศัพท์ผู้ใช้งานระบบ</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="user_phone">
                                    </div>
                                </div>

                                <label for="inputEmail" class="col-sm-3 col-form-label">ประเภทผู้ใช้งานระบบ</label>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                    <select class="form-select" name="user_status" aria-label="Default select example">
                                    <option selected>เลือกประเภท</option>
                                    <option value="เภสัชกร">เภสัชกร</option>
                                    <option value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
                                    <option value="เจ้าของกิจการ">เจ้าของกิจการ</option>
</select>  
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">บันทึกข้อมูลผู้ใช้งานระบบ</button>
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
    $("#user_img").change(function() {
        ReadURL(this);
    });
</script>
<script src="../user/user/assets/jquery.min.js"></script>
<script src="../user/user/assets/script.js"></script>