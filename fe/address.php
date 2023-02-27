<?php
    @session_start();
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
    font-weight:bold;
    font-size:20px;}
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
/* @media only screen and (min-width <  400px) {
    .mediafont {
        font-size:28px;
    }
} */
</style>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <!-- <div class="humberger__menu__overlay"></div> -->




    <div class="contact-style-1 mt-50">
        <div class="row">
            <div class="col-md-6">
                <h4>Address</h4>
            </div>
            <div class="col-md-6">
                <a class="main-btn primary-btn text-white" id="clickmodaladdress">+ ADDRESS</a>
            </div>
        </div>

        <div id="container">
            <div class="contact-form">
                <form method='post' id='emp-SaveForm' action="#">


                    <?php 

                                                $sql = "SELECT * FROM akksofttech_customer_address WHERE cus_id  = '".$_SESSION['akksofttechsess_cusid']."'" ;

                                                $que  = mysqli_query($conn  , $sql ) ;

                                                while($res = mysqli_fetch_array($que)){ ; 

                                                ?>

                    <div class="row">

                        <div class="col-md-12">

                            <div class="single-form form-default">

                                <div class="card">

                                    <div class="card-body">

                                        <div class="row">


                                            <div class="col-md-8">
                                                <p><?php echo $res['cusa_name'] ; echo "         "  ; echo $res['cusa_surname'] ;  ?>
                                                    | <?php echo $res['cusa_phone'] ; ?> </p>
                                                <p class="m-2"><?php echo $res['cusa_address']  ; ?></p>
                                                <p class="m-2"><?php echo $res['cusa_province']  ; ?> ,
                                                    <?php echo $res['cusa_zipcode']  ; ?></p>

                                            </div>


                                            <div class="col-md-4">





                                                <!-- <a class="main-btn primary-btn clickedit_address"  data-id='<?php echo $res['cusa_id'] ; ?>'>EDIT</a> -->


                                                <a class="main-btn primary-btn"
                                                    href="edit_address.php?cusa_id=<?php echo $res['cusa_id'] ; ?>"
                                                    data-id='<?php echo $res['cusa_id'] ; ?>'><i class="fa fa-pencil"
                                                        aria-hidden="true"></i></a>


                                                <a type="button"
                                                    class="text-white main-btn primary-btndet clickdelete_addressid"
                                                    data-id="<?php echo $res['cusa_id'] ; ?>"><i class="fa fa-times"
                                                        aria-hidden="true"></i></a>






                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <?php } ?>
                </form>
            </div>
        </div>
    </div>

    <div href="javascript:history.back(1)" class="main-btn primary-btndet" onclick="history.back()"> Back </div>


    <!-- Modal -->
    <div class="modal mt-3 fade clickmodaladdress" id="modal_address" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> NEW ADDRESS </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="insert_address" class="mediafont">
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="single-form form-default">
                                    <div class="form-input">
                                        Name
                                        <input type="text" class="form-control"
                                            oninvalid="this.setCustomValidity('Please Name')"
                                            oninput="this.setCustomValidity('')" required placeholder="Full Name"
                                            name="cusa_name" id="cusa_name">
                                        <i class="mdi mdi-account"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="single-form form-default">
                                    <div class="form-input">
                                    Sur Name
                                        <input type="text" class="form-control"
                                            oninvalid="this.setCustomValidity('Please Surname')"
                                            oninput="this.setCustomValidity('')" required placeholder="Sur Name"
                                            name="cusa_surname" id="cusa_surname">
                                        <i class="mdi mdi-account"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12 mt-2">
                                <div class="single-form form-default">
                                    <div class="form-input">
                                    Address
                                        <input type="text" class="form-control"
                                            oninvalid="this.setCustomValidity('Please Address')"
                                            oninput="this.setCustomValidity('')" required placeholder="Address"
                                            name="cusa_address" id="cusa_address"></input>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12 mt-2">
                                <div class="single-form form-default">
                                    <div class="form-input">
                                    Phone
                                        <input type="text" class="form-control"
                                            oninvalid="this.setCustomValidity('Please Phone')"
                                            oninput="this.setCustomValidity('')" required placeholder="Phone"
                                            name="cusa_phone" id="cusa_phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6 mt-2">
                                <div class="single-form form-default">
                                    <div class="form-input">
                                    Province
                                        <input type="text" class="form-control"
                                            oninvalid="this.setCustomValidity('Please Province')"
                                            oninput="this.setCustomValidity('')" required placeholder="Province"
                                            name="cusa_province" id="cusa_province">

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="single-form form-default">
                                    <div class="form-input">
                                    Zip code
                                        <input type="text" class="form-control"
                                            oninvalid="this.setCustomValidity('Please Zipcode')"
                                            oninput="this.setCustomValidity('')" required placeholder="Zip code"
                                            name="cusa_zipcode" id="cusa_zipcode">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12 mt-2">
                                <div class="single-form form-default">
                                    <div class="form-input">
                                        Note
                                        <input type="text" class="form-control" placeholder="Note" name="cusa_note"
                                            id="cusa_note">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col">
                                <div type="button" class="main-btn primary-btndet" data-dismiss="modal">EXIT</div>
                            </div>
                            <div class="col">
                                <button type="submit" class="main-btn primary-btn" style="border:none;" name="insert"
                                    id="insert" value="Insert">SAVE</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="serve/function.js"></script>
    <!-- <script src="serve/detail.js"></script> -->
    <script src="serve/index.js"></script>
    <script src="serve/checkout.js"></script>
    <script src="serve/bank.js"></script>




</body>

</html>