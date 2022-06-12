<?php include 'updateprofile.php' ;?>
<div class="pagetitle">
  <h1>ข้อมูลส่วนตัว</h1>
  <nav> 
    <div class="row">
      <div class="col-md-6">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">หน้าหลัก</a></li>
          <li class="breadcrumb-item active">ข้อมูลส่วนตัว</li>
        </ol>
      </div>
    </div>
  </nav>
</div>
<section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../upload/user/<?=$_SESSION['image_login']?>"  class="rounded-circle">
              <h2><?=$_SESSION['user_login']?></h2>
              <h2><?=$_SESSION['posit_login']?></h2>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

<div class="card">
  <div class="card-body pt-3">
    <ul class="nav nav-tabs nav-tabs-bordered">
      <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">แก้ไขโปรไฟล์</button>
      </li>

      <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">เปลี่ยนรหัสผ่าน</button>
                </li>
    </ul>

    <div class="tab-content pt-2">
      <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
        <form action="" method="post" enctype="multipart/form-data">
      
        <div class="row mb-3">
                                    <label class="col-sm-5 col-form-label">รูปภาพสินค้า</label>
                                    <div class="col-sm-12 mb-3">
                                        <div class="col-sm-12 mb-3">
                                        <img id="preview" width="250" height="250" src="../upload/user/<?= $result['user_img'] ?>">
                                            <hr>
                                            <input type="file" class="form-control" name="user_img" id="user_img">
                                    <input type="hidden" name="oldimage" value="<?= $result['user_img'] ?>">
                                        </div>
                                    </div>
                                </div>
          <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">ชื่อผู้ใช้งานระบบ</label>
            <div class="col-md-8 col-lg-9">
              <input  type="text" class="form-control" name="user_name" value="<?=$result['user_name']?>">
            </div>
          </div>



          <div class="row mb-3">
            <label for="company" class="col-md-4 col-lg-3 col-form-label">เบอร์โทรศัพท์มือถือ</label>
            <div class="col-md-8 col-lg-9">
              <input  type="text" class="form-control" name="user_phone" value="<?=$result['user_phone']?>">
            </div>
          </div>


          <div class="row mb-3">
            <label for="Country" class="col-md-4 col-lg-3 col-form-label">วันเดือนปีเกิด</label>
            <div class="col-md-8 col-lg-9">
              <input  type="text" class="form-control" name="user_date" value="<?=$result['user_date']?>">
            </div>
          </div>

          <div class="text-center">
            <input type="hidden" name="profile">
            <button type="submit" class="btn btn-primary">บันทึกข้อมูลการเปลี่ยนแปลง</button>
          </div>
        </form>
  </div>

      <div class="tab-pane fade pt-3" id="profile-change-password">              
        <form action="" method="post" enctype="multipart/form-data">
      

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">รหัสผ่านเดิม</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" name="oldpassword" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">รหัสผ่านใหม่</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" name="newpassword" >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">ยืนยันรหัสผ่านใหม่</label>
                      <div class="col-md-8 col-lg-9">
                        <input  type="password" class="form-control" name="confirmpassword" >
                      </div>
                    </div>

                    <div class="text-center">
                    <input type="hidden" name="checkpassword">
                      <input type="submit" class="btn btn-primary" value='ยืนยันการเปลี่ยนรหัสผ่าน' />
                    </div>
                  </form>

               </div>



    </div>

  </div>
</div>

</div>

</div>
     
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
    $("#user_img").change(function() {
        ReadURL(this);
    });
</script>