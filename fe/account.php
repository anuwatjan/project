<?php
    @session_start();

    require 'includedb/condb.php'; 

    $sql = "SELECT * FROM akksofttech_customer WHERE  cus_id = '".$_SESSION['akksofttechsess_cusid']."'  ";

    $query = mysqli_query($conn , $sql);

    $result = mysqli_fetch_array($query); 

?>

<?php require 'includedb/condb.php' ?>
<!DOCTYPE html>
<html lang="zxx">


<?php require 'head.php' ?>

<style> 
@font-face
{ font-family: myFirstFont;
src: url('font/yikes_medium-webfont.ttf')
    ,url('font/yikes_medium-webfont.eot') }

body , strong , h5 , p , ul , li , span
{ font-family:myFirstFont; 
    font-weight:bold;}
    @media only screen and (max-width > 1200px) {
    .fixed{
        position: fixed;
        /* width: 100px; */
        right : 80px;
        /* height: 100px; */
        /* background: green; */
        /* margin: 5rem; */
    }
}
</style>



<style>
::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 0px;
}
</style>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <div class="col-lg-12 col-md-12 mt-5">

        <div class="card">
            <div class="card-header">
                My Profile
            </div>
            <div class="card-body">
                <form method='post' id='emp-UpdateForm' action="#">
                    <div class="row">
                        <div class="col-md-6" style="display:none;">
                            <div class="single-form form-default">

                                <label>ID Customer</label>
                                <div class="form-input">
                                    <input type="text" class="form-control" autocomplete="off" placeholder="Full Name" name="cus_id"
                                        id="cus_id" value='<?php echo   $_SESSION['akksofttechsess_cusid'] ; ?>'>
                                    <i class="mdi mdi-account"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">

                                <label>Full Name</label>
                                <div class="form-input">
                                    <input type="text" class="form-control"  autocomplete="off" placeholder="Full Name" name="cus_name"
                                        id="cus_name" value='<?php echo $result['cus_name'];?>'>
                                    <i class="mdi mdi-account"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>Last Name</label>
                                <div class="form-input">
                                    <input type="text" class="form-control"  autocomplete="off" placeholder="Sur Name" name="cus_surname"
                                        id="cus_surname" value='<?php echo $result['cus_surname'];?>'>
                                    <i class="mdi mdi-account"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2 ">
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>Email</label>
                                <div class="form-input">
                                    <input type="text" class="form-control"  autocomplete="off" placeholder="Email" name="cus_email"
                                        id="cus_email" value='<?php echo $result['cus_email'];?>'>
                                    <i class="mdi mdi-email"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-form form-default">
                                <label>Phone</label>
                                <div class="form-input">
                                    <input type="text" class="form-control"  autocomplete="off" placeholder="Phone" name="cus_phone"
                                        id="cus_phone" value='<?php echo $result['cus_phone'];?>'>
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>
                        </div>

                        <div class="single-form mt-5 mx-1">
                            <div href="javascript:history.back(1)" class="main-btn primary-btndet"
                                onclick="history.back()"> Back </div>
                            <button class="primary-btn" type="submit" style="border:none;" name="btn-update"
                                id="btn-update">SUBMIT</button>
                        </div>
                </form>
            </div>
        </div>


    </div>

    <!-- Blog Section End -->
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="serve/function.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>

</html>