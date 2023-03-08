<?php session_start() ; ?>

<?php require 'includedb/condb.php' ?>


<?php 
$sql = "SELECT * FROM akksofttech_customer WHERE  cus_id = '".$_SESSION['akksofttechsess_cusid']."'  ";
$query = mysqli_query($conn , $sql);
$result = mysqli_fetch_array($query); 

?>

<?php include 'head.php' ; ?>
<link rel="stylesheet" href="style_index.css" type="text/css">
<link rel="stylesheet" href="css/styllist.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="css/radiostyle.css" type="text/css">
<link rel="stylesheet" href="css/radiostyle1.css" type="text/css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="serve/index.js"></script>
<script src="Mobile/cart.js"></script>
<script src="serve/login.js"></script>
<script src="serve/menu.js"></script>
<script src="serve/function.js"></script>
<script src="Mobile/profile.js"></script>


<body>


    <?php include 'nav.php' ; ?>



    <style>
    form {
        width: 100%;
    }
    </style>




    <div class="profile_web">


        <div class="mt-4 container" style="text-align: center;">

            <center>


                <p>My Profile</p>

                <div class="col-md-8">

                    <hr>

                    <form method='post' id='emp-UpdateForm' action="#">

                        <div class="col-md-6" style="display:none;">
                            <div class="single-form form-default">

                                <label>ID Customer</label>
                                <div class="form-input">
                                    <input type="text" class="form-control" autocomplete="off" placeholder="Full Name"
                                        name="cus_id" id="cus_id"
                                        value='<?php echo   $_SESSION['akksofttechsess_cusid'] ; ?>'>
                                    <i class="mdi mdi-account"></i>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group flex-nowrap">
                                    <input type="text" class="form-control" placeholder="Name" name="cus_name"
                                        id="cus_name" value='<?php echo $result['cus_name'];?>'
                                        aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="input-group flex-nowrap">
                                    <input type="text" class="form-control" placeholder="Lastname" name="cus_surname"
                                        id="cus_surname" value='<?php echo $result['cus_surname'];?>'
                                        aria-describedby="addon-wrapping">
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 input-group flex-nowrap">
                            <input type="text" class="form-control" placeholder="Phone" name="cus_phone" id="cus_phone"
                                value='<?php echo $result['cus_phone'];?>' aria-describedby="addon-wrapping">
                        </div>

                        <div class="mt-3 input-group flex-nowrap">
                            <input type="text" class="form-control" placeholder="Email" name="cus_email" id="cus_email"
                                value='<?php echo $result['cus_email'];?>' aria-describedby="addon-wrapping">
                        </div>

                        <button class="mt-3 btn primary-btn" type="submit" style="border:none;float:right"
                            name="btn-update" id="btn-update">SUBMIT</button>


                    </form>


                </div>




            </center>


            <center>


                <p class="mt-4 pt-5">Password</p>

                <div class="col-md-8">

                    <hr>

                    <form method='post' id='emp-SaveFormPassword'>


                        <input type="password" class="form-control"
                            oninvalid="this.setCustomValidity('Please Old Password')"
                            oninput="this.setCustomValidity('')" required placeholder="old password"
                            name="old_password">


                        <div class="mt-3 input-group flex-nowrap">
                            <input type="text" class="form-control" placeholder="New Password"
                                aria-describedby="addon-wrapping">
                        </div>


                        <div class="mt-3 input-group flex-nowrap">
                            <input type="text" class="form-control" placeholder="Confirm New Password"
                                aria-describedby="addon-wrapping">
                        </div>



                        <input type="hidden" name="checkpassword">
                        <button class="mt-3 btn primary-btn" type="submit" style="border:none;float:right"
                            name="change_password" id="change_password">SUBMIT</button>

                    </form>



                </div>




            </center>




            <center>


                <p class="mt-4 pt-5">Address</p>

                <div class="col-md-8">

                    <hr>


                    <div class="contact-style-1 mt-50">
                        <div class="row">
                            <div class="col-md-12">
                                <a style="float:right" class="main-btn primary-btn text-white" id="clickmodaladdress">+
                                    ADDRESS</a>
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
                                                                        class="bi bi-pencil-fill" aria-hidden="true"></i></a>


                                                                <a type="button"
                                                                    class="text-white main-btn primary-btndet clickdelete_addressid"
                                                                    data-id="<?php echo $res['cusa_id'] ; ?>"><i class="bi bi-x"></i></a>

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




            </center>









        </div>


    </div>


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

        

    <?php require 'Mobile/Profile.php' ?>

</body>

</html>