<?php session_start() ; ?>

<?php require 'includedb/condb.php'  ; 

$sql = "SELECT * FROM akksofttech_customer WHERE  cus_id = '".$_SESSION['akksofttechsess_cusid']."'  ";
$query = mysqli_query($conn , $sql);
$result = mysqli_fetch_array($query); 
?>


<!DOCTYPE html>
<html lang="zxx">
    

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="icons/icon-128x128.png" type="image/png">

    <title>AKK Softtech</title>

    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet"> -->

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/radiostyle.css" type="text/css">
    <link rel="stylesheet" href="css/radiostyle1.css" type="text/css">

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
    

    <script src="Mobile/profile.js"></script>

<script src="serve/function.js"></script>

<script src="serve/index.js"></script>

<script src="serve/menu.js"></script>


</head>








<style>
@font-face {
    font-family: myFirstFont;
    src: url('font/yikes_medium-webfont.ttf'), url('font/yikes_medium-webfont.eot')
}

body,
strong,
h5,
p,
ul,
li,
span {
    font-family: myFirstFont;
    font-weight: bold;
}

.profile_mobile {
    display: none;
}

@media only screen and (max-width > 1200px) {
    .fixed {
        position: fixed;
        right: 80px;
    }
}

@media only screen and (max-width: 480px) {
    .profile_web {
        display: none;
    }

    .profile_mobile {
        display: inline;
        font-size:24px;
    }
}

@media only screen and (max-width: 770px) {
    .profile_web {
        display: none;
    }

    .profile_mobile {
        display: inline;
             font-size:24px;
    }
}
</style>


<body>

    <div class="preloder">
        <div class="loader"></div>
    </div>

    <?php require 'header.php' ?>


    <div class="profile_web">
        <section class="hero mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 mt-3">
                        <!-- accoubnt -->
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
                                                    <input type="text" class="form-control" autocomplete="off"
                                                        placeholder="Full Name" name="cus_id" id="cus_id"
                                                        value='<?php echo   $_SESSION['akksofttechsess_cusid'] ; ?>'>
                                                    <i class="mdi mdi-account"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">

                                                <label>Full Name</label>
                                                <div class="form-input">
                                                    <input type="text" class="form-control" autocomplete="off"
                                                        placeholder="Full Name" name="cus_name" id="cus_name"
                                                        value='<?php echo $result['cus_name'];?>'>
                                                    <i class="mdi mdi-account"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Last Name</label>
                                                <div class="form-input">
                                                    <input type="text" class="form-control" autocomplete="off"
                                                        placeholder="Sur Name" name="cus_surname" id="cus_surname"
                                                        value='<?php echo $result['cus_surname'];?>'>
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
                                                    <input type="text" class="form-control" autocomplete="off"
                                                        placeholder="Email" name="cus_email" id="cus_email"
                                                        value='<?php echo $result['cus_email'];?>'>
                                                    <i class="mdi mdi-email"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Phone</label>
                                                <div class="form-input">
                                                    <input type="text" class="form-control" autocomplete="off"
                                                        placeholder="Phone" name="cus_phone" id="cus_phone"
                                                        value='<?php echo $result['cus_phone'];?>'>
                                                    <i class="mdi mdi-phone"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-form mt-3 mx-1">
                                            <!-- <div href="javascript:history.back(1)" class="main-btn primary-btndet"
                                                onclick="history.back()"> Back </div> -->
                                            <button class="primary-btn" type="submit" style="border:none;"
                                                name="btn-update" id="btn-update">SUBMIT</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <!-- accoubnt -->
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 mt-3">
                    <!-- password -->
                    <div class="card">
                        <div class="card-header">
                            PASSWORD
                        </div>
                        <div class="card-body">
                            <div class="contact-style-1 mt-50">


                                <form method='post' id='emp-SaveFormPassword'>

                                    <input type="text" style="display:none;" name="cus_id"
                                        value="<?php echo  $_SESSION['akksofttechsess_cusid'] ; ?>"></input>


                                    <div class="row">
                                        <div class="col-md-4 mt-4">
                                            <div class="single-form form-default">

                                                <label>OLD PASSWORD</label>
                                                <div class="form-input">
                                                    <input type="password" class="form-control"
                                                        oninvalid="this.setCustomValidity('Please Old Password')"
                                                        oninput="this.setCustomValidity('')" required
                                                        placeholder="old password" name="old_password">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-4 mt-4">
                                            <div class="single-form form-default">
                                                <label>NEW PASSWORD</label>
                                                <div class="form-input">
                                                    <input type="password" class="form-control"
                                                        oninvalid="this.setCustomValidity('Please New Password')"
                                                        oninput="this.setCustomValidity('')" required
                                                        placeholder="new password" name="new_password">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-4">
                                            <div class="single-form form-default">
                                                <label>CONFIRM NEW PASSWORD</label>
                                                <div class="form-input">
                                                    <input type="password" class="form-control"
                                                        oninvalid="this.setCustomValidity('Please Confirm New Password')"
                                                        oninput="this.setCustomValidity('')" required
                                                        placeholder="confirm new password" name="con_newpassword">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-form mt-4">

                                        <!-- <div href="javascript:history.back(1)" class="main-btn primary-btndet"
                                            onclick="history.back()"> Back </div> -->


                                        <input type="hidden" name="checkpassword">
                                        <button style="border:none;" class="primary-btn primary-btn" type="submit"
                                            name="change_password" id="change_password">SUBMIT</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- password -->
                </div>

                <div class="col-lg-12 col-md-12 mt-3">
                    <!-- addresss -->
                    <div class="card">
                        <div class="card-header">
                            ADDRESS
                        </div>
                        <div class="card-body">
                            <div class="contact-style-1 mt-50">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a style="float:right" class="main-btn primary-btn text-white"
                                            id="clickmodaladdress">+ ADDRESS</a>
                                    </div>
                                </div>

                                <div id="container">
                                    <div class="contact-form">
                                        <form method='post' id='emp-SaveForm' action="#" class="     font-size:24px;">

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
                                                                        <p class="m-2">
                                                                            <?php echo $res['cusa_address']  ; ?>
                                                                 
                                                                            <?php echo $res['cusa_province']  ; ?> ,
                                                                            <?php echo $res['cusa_zipcode']  ; ?></p>

                                                                    </div>


                                                                    <div class="col-md-4" style="float:right">


                                                                        <a class="main-btn primary-btn"
                                                                            href="edit_address.php?cusa_id=<?php echo $res['cusa_id'] ; ?>"
                                                                            data-id='<?php echo $res['cusa_id'] ; ?>'><i
                                                                                class="fa fa-pencil"
                                                                                aria-hidden="true"></i></a>


                                                                        <a type="button"
                                                                            class="text-white main-btn primary-btndet clickdelete_addressid"
                                                                            data-id="<?php echo $res['cusa_id'] ; ?>"><i
                                                                                class="fa fa-times"
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
                        </div>
                    </div>
                    <!-- addresss -->
                </div>








            </div>
        </section>



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
                                    <button type="submit" class="main-btn primary-btn" style="border:none;"
                                        name="insert" id="insert" value="Insert">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <?php require 'Mobile/Profile.php' ?>

</body>

</html>