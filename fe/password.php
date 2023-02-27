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
/* .section22 {
        display: flex;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        box-shadow: 0 3px 10px 0 rgba(#000, 0.1);
        -webkit-overflow-scrolling: touch;
        scroll-padding: 2rem;
        border-radius: 6px;
        font-size: 25px;
        margin-top: 30px;
    } */

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




    <div class="contact-style-1 mt-50">
        <h4 class="heading-4 font-weight-500 title">SYSTEM PASSWORD </h4>

        <form method='post' id='emp-SaveFormPassword'>

            <input type="text" style="display:none;" name="cus_id"
                value="<?php echo  $_SESSION['akksofttechsess_cusid'] ; ?>"></input>


            <div class="row">
                <div class="col-md-6 mt-4">
                    <div class="single-form form-default">

                        <label>OLD PASSWORD</label>
                        <div class="form-input">
                            <input type="password" class="form-control"
                                oninvalid="this.setCustomValidity('Please Old Password')"
                                oninput="this.setCustomValidity('')" required placeholder="old password"
                                name="old_password">
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 mt-4">
                    <div class="single-form form-default">
                        <label>NEW PASSWORD</label>
                        <div class="form-input">
                            <input type="password" class="form-control"
                                oninvalid="this.setCustomValidity('Please New Password')"
                                oninput="this.setCustomValidity('')" required placeholder="new password"
                                name="new_password">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-4">
                    <div class="single-form form-default">
                        <label>CONFIRM NEW PASSWORD</label>
                        <div class="form-input">
                            <input type="password" class="form-control"
                                oninvalid="this.setCustomValidity('Please Confirm New Password')"
                                oninput="this.setCustomValidity('')" required placeholder="confirm new password"
                                name="con_newpassword">
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-form mt-4">

            <div href="javascript:history.back(1)" class="main-btn primary-btndet" onclick="history.back()"> Back </div>
       

            <input type="hidden" name="checkpassword">
            <button style="border:none;" class="primary-btn primary-btn" type="submit" name="change_password" id="change_password">SUBMIT</button>
            </div>
        </form>

    </div>


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