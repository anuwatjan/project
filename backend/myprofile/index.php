<?php require '../include_backend/head.php' ;

@session_start();
require_once '../include/condb.php';

 


?>
<style>
::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 0px;
}
</style>
<body>



    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
     

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">MY PROFILE</span></h4>

                   
                    <div class="row">
                        <div class="col-md-12">

                            <!-- Basic Layout -->
                            <div class="row">
                                <div class="col-xl">
                                    <div class="card mb-4">

                                        <div class="card-body">
                                        <div id="dis">
                                         <!-- here message will be displayed -->
	                                      </div>
                                          <?php 
							                       

                                                    $sql = "SELECT * FROM akksofttech_member 
                                                    WHERE mem_id = '".$_SESSION['akksofttechsess_memid']."'";
                                                    $query = mysqli_query($connect,$sql);
                                                    $row = mysqli_fetch_assoc($query);
                                                   
                                                    
                                                   
                                                    
                                        ?>   
                                                  
                                            <form method='post' id='emp-SaveForm1'>

                                            <div class="row mb-3" style="display:none;">
                                                    <label class="col-sm-2 form-label" for="basic-default-fullname">ID</label>
                                                
                                                <div class="col-sm-10">      
                                                    <input type="text" class="form-control"  name="mem_id"
                                                    readonly="readonly" 
                                                    value='<?php echo $row['mem_id'];?>' />
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                    <label class="col-sm-2 form-label" for="basic-default-fullname">Username</label>
                                                
                                                <div class="col-sm-10">      
                                                    <input type="text" class="form-control"  name="mem_username"
                                                    readonly="readonly" 
                                                    value='<?php echo $row['mem_username'];?>' />
                                                </div>

                                               

                                            </div>

                                            <div class="row mb-3">

                                                    <label class="col-sm-2 form-label" >Name</label>
                                                
                                                <div class="col-sm-10">      
                                                    <input type="text" class="form-control" name="mem_name"
                                                        
                                                    value='<?php echo $row['mem_name'];?>' />
                                                </div>
                                               
                                                <!-- <div class="col-sm-5">      
                                                    <input type="text" class="form-control" name="mem_surname"
                                                        
                                                    value='<?php echo $row['mem_surname'];?>' />
                                                </div> -->

                                            </div>
                                             <div class="row mb-3">

                                                    <label class="col-sm-2 form-label" >Surname</label>
                                                
                                                <!-- <div class="col-sm-10">      
                                                    <input type="text" class="form-control" name="mem_name"
                                                        
                                                    value='<?php echo $row['mem_name'];?>' />
                                                </div> -->
                                               
                                                <div class="col-sm-10">      
                                                    <input type="text" class="form-control" name="mem_surname"
                                                        
                                                    value='<?php echo $row['mem_surname'];?>' />
                                                </div>

                                            </div>

                                            <div class="row mb-3">

                                                    <label class="col-sm-2 form-label">Email</label>
                                                    <!-- `mem_name``mem_surname``mem_email``mem_phone` -->
                                                <div class="col-sm-10">      
                                                    <input type="text" class="form-control" name="mem_email"
                                                        
                                                    value='<?php echo $row['mem_email'];?>' />
                                                </div>
                                            
                                            </div> 

                                            <div class="row mb-3">
                                                
                                                <label class="col-sm-2 form-label" for="basic-default-fullname">Phone</label>
                                                <div class="col-sm-10">  
                                                
                                                  
                                                
                                                
                                                <input type="text" class="form-control" name="mem_phone"
                                                        
                                                    value='<?php echo $row['mem_phone'];?>' />
                                                </div>
                                            
                                            </div>
                                            

                                            
                                            <div class="row justify-content-end">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary" name="btn-save"
                                                     id="btn-save">SAVE</button>
</div>
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
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <?php require '../include_backend/script.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <script type="text/javascript">

$(document).bind("contextmenu", function (event) {
  event.preventDefault(); // ห้ามคลิกขวา
});
$(document).bind("selectstart", function (event) {
  event.preventDefault(); // ห้ามลากคลุม
});

</script>
<script type="text/javascript">
    $(document).ready(function() {

    });
    // เมื่อคลิกที่ปุ่มเลือกไฟล์
    $(".btn-upload").on("click", function() {
        //ให้ input file เกิด event click
        $(this).prev("input:file").trigger("click");
        console.log('input:file');
    });


    // ถ้ามีการเปลี่ยนไฟล์ที่อัพโหลด
    $(".file-up").on("change", function() {
        var fileLength = $(this)[0].files.length; // เลือกไฟล์หรือไม่
        if (fileLength != 0) { // ถ้าเลือกไฟล์




        } else { // ถ้าไม่ได้เลือกไฟล์
            // $(this).next(".btn-upload").html("<img class='d-block mx-auto mb-1' src='img/imgcamera.svg' alt='' width='50' height='50'>");
            // $(this).nextAll(".btn-remove-file").hide();

        }
    });








    $('#imagebroswer').on('change', function() {
        resizeImages(this.files[0], function(dataUrl) {


            // console.log(dataUrl);


            $("#logo_img64").val(dataUrl);
            //   inset_img(dataUrl);


            //   var this_length= $("#logo_img64").val().length; // หาจำนวนตัวอักษรที่เหลือ
            //   $("#now_length").html(this_length+" ตัวอักษร"); 

            $(".show_view_img").html('<img   class=" "   src="' + dataUrl +
                '"  style="height: 100%;"   >');



        });
    });

    function resizeImages(file, complete) {
        // read file as dataUrl
        ////////  2. Read the file as a data Url
        var reader = new FileReader();
        // file read
        reader.onload = function(e) {
            // create img to store data url
            ////// 3 - 1 Create image object for canvas to use
            var img = new Image();
            img.onload = function() {
                /////////// 3-2 send image object to function for manipulation
                complete(resizeInCanvas(img));


                // console.log(complete(resizeInCanvas(img)));
            };
            img.src = e.target.result;
        }
        // read file
        reader.readAsDataURL(file);

    }


    function resizeInCanvas(img) {
        /////////  3-3 manipulate image
        var perferedWidth = 200;
        var ratio = perferedWidth / img.width;
        var canvas = $("<canvas>")[0];
        canvas.width = img.width * ratio;
        canvas.height = img.height * ratio;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
        //////////4. export as dataUrl
        return canvas.toDataURL();
    }
    </script>

    <script type="text/javascript" src="ineset.js"></script>

</body>

</html>