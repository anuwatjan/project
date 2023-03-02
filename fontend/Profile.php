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






        </div>


    </div>


    <?php require 'Mobile/Profile.php' ?>

</body>

</html>