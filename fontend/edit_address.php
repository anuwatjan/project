<?php session_start() ; ?>

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

<?php require 'includedb/condb.php' ?>

<body>

    <?php include 'Mobile/nav_profile.php' ; ?>


    <?php

$sql = " SELECT * FROM akksofttech_customer_address WHERE cusa_id = '".$_GET['cusa_id']."' " ; 

$query = mysqli_query($conn , $sql);

$result = mysqli_fetch_array($query); 
?>





    <style>
    form {
        width: 100%;
    }
    </style>





    <center>

        <div class="col-lg-8 col-md-8 mt-5">

            <h4 class="mb-4">This is how we'll address you</h4>

            <form method="post" id="edit_address">


                <input type="text" name="cusa_id" style="display:none;" id="cusa_id"
                    value="<?php echo $_GET['cusa_id'] ; ?>">

                <div id="dis" class="mt-2">
                </div>
                <div class="modal-body">

                    <div class="row mb-2">
                        <div class="col-md-6 ">
                            Name

                            <div class="single-form form-default">
                                <div class="form-input">
                                    <input type="text" class="update_cusa_name form-control" name="cusa_name"
                                        id="cusa_name" value="<?php echo $result['cusa_name'] ; ?>">
                                    <i class="mdi mdi-account"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            SurName

                            <div class="single-form form-default">
                                <div class="form-input">
                                    <input type="text" placeholder="Sur Name" class="update_cusa_surname form-control"
                                        value="<?php echo $result['cusa_surname'] ; ?>" name="cusa_surname"
                                        id="cusa_surname">
                                    <i class="mdi mdi-account"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-8">
                            Address

                            <div class="single-form form-default">
                                <div class="form-input">
                                    <input type="text" placeholder="Address" class="update_cusa_address form-control"
                                        value="<?php echo $result['cusa_address'] ; ?>" name="cusa_address"
                                        id="cusa_address"></input>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            Telephone

                            <div class="single-form form-default">
                                <div class="form-input">
                                    <input type="text" placeholder="Phone" class="update_cusa_phone form-control"
                                        name="cusa_phone" value="<?php echo $result['cusa_phone'] ; ?>" id="cusa_phone">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            Province

                            <div class="single-form form-default">
                                <div class="form-input">
                                    <input type="text" placeholder="Province" class="update_cusa_province form-control"
                                        value="<?php echo $result['cusa_province'] ; ?>" name="cusa_province"
                                        id="cusa_province">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            Zipcode

                            <div class="single-form form-default">
                                <div class="form-input">
                                    <input type="text" placeholder="Zip code" class="update_cusa_zipcode form-control"
                                        value="<?php echo $result['cusa_zipcode'] ; ?>" name="cusa_zipcode"
                                        id="cusa_zipcode">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            Note

                            <div class="single-form form-default">
                                <div class="form-input">
                                    <input type="text" placeholder="Note" class="update_cusa_note form-control"
                                        name="cusa_note" value="<?php echo $result['cusa_note'] ; ?>"
                                        id="cusa_note"></input>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <center>
                    <div class="iBannerFix">
                        <button type="submit" style="border:none;width:100%;height:50px;" name="btn-update"
                            id="btn-update" class="primary-btn">SUBMIT</button>
                    </div>
                </center>
            </form>

        </div>

    </center>






</body>

</html>