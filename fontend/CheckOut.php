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





    <?php $sql11 = "SELECT * FROM akksofttech_cart  INNER JOIN akksofttech_member_store ON akksofttech_cart.sto_id = akksofttech_member_store.sto_id  WHERE cus_id = '".$_SESSION['akksofttechsess_cusid']."'" ; $query11 = mysqli_query($conn , $sql11) ; $num11 = mysqli_num_rows($query11) ;  $reuslt11 = mysqli_fetch_array($query11) ; ?>
    <!-- รับค่ารหัสร้านค้ามา -->
    <div id="show_sto_id" style="display:none;"><?php echo $reuslt11['sto_id']  ; ?></div>
    <!-- รับค่าจำนวนสินค้าในตะกร้ามา -->
    <div id="show_sto_id" style="display:none;"><?php echo $num11  ; ?></div>

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

    @media only screen and (max-width > 1200px) {
        .fixed {
            position: fixed;
            /* width: 100px; */
            right: 80px;
            /* height: 100px; */
            /* background: green; */
            /* margin: 5rem; */
        }
    }

    .scoollbar {
        width: 100%;
        height: 80%;
        overflow-y: scroll;
    }
    </style>

    <body>

        <?php $sql_add = "SELECT * FROM akksofttech_customer_address WHERE cus_id = '".$_SESSION['akksofttechsess_cusid']."'" ; $query_add = mysqli_query($conn , $sql_add )  ; $num_add = mysqli_num_rows($query_add); if(!$num_add){ ?>
        <div id="noaddress" style="display:none;">0</div> <?php }else{ ?> <div id="noaddress" style="display:none;">1
        </div>
        <?php  }?>

        <div id="preloder">
            <div class="loader"></div>
        </div>

        <?php include 'nav.php' ; ?>



        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="container mt-5" id="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="shoping__checkout">
                                    <h5 class="mx-2"><a class="btn text-white" style="background:#663399">1</a> Delivery
                                        Details</h5>
                                    <ul style=" border-style:   solid;border-color:rebeccapurple" id="Checkout_Address">
                                        <li>
                                            <div id="show_address_select_id" style="display:none;">0</div>
                                            <div id="show_address_id" style="display:none;">0</div>
                                            <div class="mx-2" id="show_address_select"></div>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="col-lg-6">
                            </div>
                        </div>
                    </div>



                    <!-- รับค่าว่าใช้อะไร -->
                    <div id="show_payment_id" style="display:none;">0</div>


                    <div class="container" id="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="shoping__checkout">
                                    <h5 class="mx-2"><a class="btn text-white" style="background:#663399">2</a> Payment
                                        Method</h5>
                                    <div class="container">

                                        <div class="demo-inline-spacing mt-3 mx-3">
                                            <div class="list-group">
                                                <label class="listgroupitem2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="paymentradio"
                                                            id="specifyColor" value="1">
                                                        <p class="form-check-label mx-2"> TRANFER </p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>


                                        <!-- เพิ่มข้อมูลบัญชีการชำระเงิน -->
                                        <div id="showbank">
                                            <form method="post" enctype='multipart/form-data'>
                                                <div class="container">
                                                    <div class=" mt-2 row">
                                                        <div class="col-lg-6 col-md-6">
                                                            Attach Slip!
                                                            <div class="show_view_img"></div>
                                                            <input type="file" name="fileprod_picture" id="imagebroswer"
                                                                class='form-control  btn-upload' autocomplete="off"
                                                                required
                                                                oninvalid="this.setCustomValidity('Please fill in')"
                                                                oninput="this.setCustomValidity('')" />
                                                            <textarea name="logo_img64" id="logo_img64"
                                                                class="form-control" style="display:none;"></textarea>
                                                        </div>
                                                        <?php 
                                                    $date = date("Y-m-d H:i") ; ?>
                                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                                            Transfer Date
                                                            <input type="datetime-local" value="<?php echo $date ; ?>"
                                                                oninvalid="this.setCustomValidity('Please Transfer Date')"
                                                                class="form-control" placeholder="Transfer Date"
                                                                name="tranfer_date" oninput="this.setCustomValidity('')"
                                                                id="tranfer_date"></input>
                                                        </div>
                                                    </div>
                                                    <div class=" mt-2 row">
                                                        <div class=" col-lg-6 col-md-6 ">
                                                            Transfer amount
                                                            <input required type="text" autocomplete="off" name="amount"
                                                                class="form-control" placeholder="Transfer amount"
                                                                oninvalid="this.setCustomValidity('Please Transfer amount')"
                                                                oninput="this.setCustomValidity('')"
                                                                OnKeyPress="return chkNumber(this)" id="amount"></input>
                                                        </div>
                                                        <style>
                                                        .select {
                                                            width: 100%;
                                                            border-radius: 5px;
                                                            border: 1px solid rebeccapurple;
                                                            font-size: 12px;
                                                        }

                                                        .select option {
                                                            font-size: 16px;
                                                        }
                                                        </style>



                                                        <div class="mt-2 col-lg-12 col-md-12">

                                                            Bank of origin
                                                            <?php   $sqlbank = "SELECT * FROM akksofttech_bank" ;
                                                                    $querybank = mysqli_query($conn , $sqlbank);?>
                                                            <select name="bac_name" id="bac_name" required
                                                                class="select form-control">
                                                                <option tabindex='-1'
                                                                    value="<?php echo $rowbank['bak_id']?>">
                                                                    Choss</option>
                                                                <?php 
                                                                                while ($row3 = mysqli_fetch_array($querybank))
                                                                                {
                                                                                    echo "<option value=".$row3['bak_name'].">".$row3['bak_name']."</option>";
                                                                                }
                                                                                ?>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class=" mt-2 row">
                                                        <div class=" col-lg-6 col-md-6">
                                                            Bank Name Account
                                                            <input required type="text" autocomplete="off" required
                                                                name="bac_account" class="form-control"
                                                                placeholder="Bank Name Account"
                                                                oninvalid="this.setCustomValidity('Please Transfer Bank Name Account')"
                                                                oninput="this.setCustomValidity('')"
                                                                id="bac_account"></input>
                                                        </div>
                                                        <div class="mt-2 col-lg-6 col-md-6">
                                                            Bank Number Account
                                                            <input required type="text" autocomplete="off" required
                                                                name="bac_number" class="form-control"
                                                                placeholder="Bank Number Account"
                                                                oninvalid="this.setCustomValidity('Please Transfer Bank Number')"
                                                                oninput="this.setCustomValidity('')"
                                                                id="bac_number"></input>
                                                        </div>
                                                    </div>
                                                    <div id="bac_id" style="display:none;">0</div>
                                                    <div class=" mt-2 row">
                                                        Select Destination Bank
                                                        <div class="row mb-5">
                                                            <?php  $sql = "SELECT * FROM akksofttech_bank_account INNER JOIN akksofttech_bank ON akksofttech_bank.bak_id = akksofttech_bank_account.bak_id
                                                        WHERE akksofttech_bank_account.sto_id = '".$reuslt11['sto_id']."' " ;
                                                        $query = mysqli_query($conn , $sql) ; 
                                                        while($result = mysqli_fetch_array($query)){ ?>
                                                            <div class="col-md-6 col-sm-6">
                                                                <div class="boxed-check-group boxed-check-success">
                                                                    <label class="boxed-check">
                                                                        <input required class="boxed-check-input"
                                                                            type="radio"
                                                                            value="<?php echo $result['bac_id'] ; ?>"
                                                                            name="bac_id">
                                                                        <div class="text-center boxed-check-label">
                                                                            <img src="..\backend\getimg\logobank\<?php echo $result['bak_image'] ; ?>"
                                                                                class="mt-1" width="90px;">
                                                                            <br>
                                                                            <!-- <br>
                                                                        Bank Name : <?php echo $result['bac_name'] ; ?> -->
                                                                            <br>
                                                                            Bank Number :
                                                                            <?php echo $result['bac_number_mem'] ; ?>
                                                                            <br>
                                                                            Bank Name :
                                                                            <?php echo $result['bac_mem_name'] ; ?>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <?php  } ;   ?>
                                                        </div>
                                                    </div>
                                                    <div class=" mt-2 row">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- เพิ่มข้อมูลบัญชีการชำระเงิน -->



                                        <div class="demo-inline-spacing mt-3 mx-3">
                                            <div class="list-group">
                                                <label class="listgroupitem2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="paymentradio"
                                                            id="specifyColor" value="2">
                                                        <p class="form-check-label mx-2"> DELIVERY </p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                        <!-- เพิ่มข้อมูลบัญชีการชำระเงิน -->
                                        <div id="showcash">
                                        </div>
                                        <!-- เพิ่มข้อมูลบัญชีการชำระเงิน -->

                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="container my-button22" id="container">
                        <h5 class="mx-2"><a class="btn text-white" style="background:#663399">3</a> CONFIRM ORDER </h5>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="shoping__checkout">
                                    <a onclick="history.back()" class="text-white btn btn-danger m-2"><i
                                            class="fa fa-arrow-left" aria-hidden="true"></i> BACK </a>
                                    <a id="insert_to_purchase" class="text-white btn btn-primary m-2"> <i
                                            class="fa fa-check" aria-hidden="true"></i>
                                        CONFIRM ORDER</btr></a>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="shoping__checkout">

                                </div>
                            </div>

                        </div>
                    </div>

                    <style>
                    .my-cart22 {
                        position: fixed;
                        bottom: 0;
                        left: 0;
                        right: 0;
                        width: 100%
                    }

                    .my-cart22 {
                        display: none;
                    }

                    @media only screen and (max-width: 480px) {
                        .my-cart22 {
                            position: fixed;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            width: 100%;
                            z-index: 1;
                        }

                        .my-button22 {
                            display: none;
                        }

                        .my-cart22 {
                            display: inline;
                            z-index: 1;
                        }
                    }

                    @media only screen and (max-width: 830px) {
                        .my-cart22 {
                            position: fixed;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            width: 100%;

                            z-index: 1;
                        }

                        .my-button22 {
                            display: none;
                        }

                        .my-cart22 {
                            display: inline;
                            z-index: 1;

                        }
                    }
                    </style>

                    <div class="my-cart22" id="my-cart22">
                        <div class="row">
                            <a onclick="history.back()" class="text-center text-white main-btn primary-btndet"
                                style="bottom: 0;left: 0;right: 0;width: 50%;"> BACK </a>

                            <a id="insert_to_purchase22" class="text-center text-white main-btn primary-btnpri"
                                style="bottom: 0;left: 0;right: 0;width: 50%;">
                                CONFIRM ORDER</btr></a>
                        </div>
                    </div>





                </div>



                <div class="col-md-5">
                    <h4 class="text-center mt-5">YOUR ORDER </h4>
                    <br>
                    <div class="container mt-1 scoollbar" id="container">


                        <div id="show_add_product"></div>





                        <h3 class="text-center justify-content-center "><strong>Total Price</strong></h3>
                        <h1 class="text-center mb-3 toto_add_product double_line">สินค้าบริษัท </h1>

                    </div>


                </div>




            </div>





            <hr>


        </div>
        </div>
        </div>
        </div>



        <!-- กดปุ่มแล้วที่อยู่จะขึ้นมา -->
        <div class="modal mt-5 fade clickshowselectmodaladdress" id="select_modal_address" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header" align="right">
                        <h5 class="modal-title" id="staticBackdropLabel"> <i class="fa fa-location-arrow"
                                aria-hidden="true"></i> <STRONG> ADDRESS </STRONG> </h5>
                        <a href="#" id="clickmodaladdress2" class="primary-btn">NEW ADDRESS</a>
                    </div>
                    <form method="post" class="form">
                        <div class="modal-body">
                            <div id="boxselectaddress">
                                <?php $sql = "SELECT * FROM akksofttech_customer_address WHERE cus_id = '".$_SESSION['akksofttechsess_cusid']."'" ; 
                           $query = mysqli_query($conn , $sql )  ;         
                           while($result = mysqli_fetch_array($query)){ ?>
                                <p>
                                <div class="selectaddress" data-id='<?php echo $result['cusa_id'] ; ?>' class="m-2">
                                    <?php echo $result['cusa_name'] ; ?> |
                                    <?php echo $result['cusa_phone'] ; ?></p>
                                    <p><?php echo $result['cusa_address'] ; ?> ,
                                        <?php echo $result['cusa_province'] ; ?> ,
                                        <?php echo $result['cusa_zipcode'] ; ?>
                                    </p>
                                </div>
                                <hr>
                                <?php  } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ที่อยู่เริ่มต้น กรณีไม่มีที่อยู่เลย -->
        <div class="modal mt-2 fade clickmodaladdress" id="modal_address1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"> <i class="fa fa-location-arrow"
                                aria-hidden="true"></i> <STRONG>NEW ADDRESS START</STRONG> </h5>
                    </div>
                    <form method="post" id="insert_address1">
                        <div class="modal-body">
                            <div class="row mb-3 mb-3">
                                <div class="col-md-6 col-sm-6">
                                    Name
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" autocomplete="off" required
                                                oninvalid="this.setCustomValidity('Please Name')"
                                                oninput="this.setCustomValidity('')" class="form-control"
                                                placeholder="Full Name" name="cusa_name" id="cusa_name">
                                            <i class="mdi mdi-account"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    Sur Name
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" class="form-control" autocomplete="off" required
                                                oninvalid="this.setCustomValidity('Please   Sur Name')"
                                                oninput="this.setCustomValidity('')" placeholder="Sur Name"
                                                name="cusa_surname" id="cusa_surname">
                                            <i class="mdi mdi-account"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 col-sm-12">
                                    Address
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" class="form-control" autocomplete="off" required
                                                oninvalid="this.setCustomValidity('Please Address')"
                                                oninput="this.setCustomValidity('')" placeholder="Address"
                                                name="cusa_address" id="cusa_address"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 col-sm-12">
                                    Phone
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" class="form-control" autocomplete="off" required
                                                oninvalid="this.setCustomValidity('Please Phone')"
                                                oninput="this.setCustomValidity('')" placeholder="Phone"
                                                name="cusa_phone" id="cusa_phone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-6">
                                    Province
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" class="form-control" autocomplete="off" required
                                                oninvalid="this.setCustomValidity('Please Province')"
                                                oninput="this.setCustomValidity('')" placeholder="Province"
                                                name="cusa_province" id="cusa_province">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    Zip code
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" class="form-control" autocomplete="off" required
                                                oninvalid="this.setCustomValidity('Please Zip code')"
                                                oninput="this.setCustomValidity('')" placeholder="Zip code"
                                                name="cusa_zipcode" id="cusa_zipcode">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 col-sm-12">
                                    Note
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" class="form-control" autocomplete="off"
                                                placeholder="Note" name="cusa_note" id="cusa_note">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row mb-3">
                                <div class="col">
                                    <div type="button" class="main-btn primary-btndet" onclick="history.back()">EXIT
                                    </div>
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

        <!-- เพิ่มที่อยู่ใหม่เอง -->
        <div class="modal mt-3 fade clickmodaladdress2" id="modal_address2" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"> <i class="fa fa-location-arrow"
                                aria-hidden="true"></i> <STRONG>NEW ADDRESS START</STRONG> </h5>
                    </div>
                    <form method="post" id="insert_address2">
                        <div class="modal-body">
                            <div class="row mb-3 mb-3">
                                <div class="col-md-6 col-sm-6">
                                    Name
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" autocomplete="off" required
                                                oninvalid="this.setCustomValidity('Please Name')"
                                                oninput="this.setCustomValidity('')" class="form-control"
                                                placeholder="Full Name" name="cusa_name" id="cusa_name">
                                            <i class="mdi mdi-account"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    Sur Name
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" class="form-control" autocomplete="off" required
                                                oninvalid="this.setCustomValidity('Please   Sur Name')"
                                                oninput="this.setCustomValidity('')" placeholder="Sur Name"
                                                name="cusa_surname" id="cusa_surname">
                                            <i class="mdi mdi-account"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 col-sm-12">
                                    Address
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" class="form-control" autocomplete="off" required
                                                oninvalid="this.setCustomValidity('Please Address')"
                                                oninput="this.setCustomValidity('')" placeholder="Address"
                                                name="cusa_address" id="cusa_address"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 col-sm-12">
                                    Phone
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" class="form-control" autocomplete="off" required
                                                oninvalid="this.setCustomValidity('Please Phone')"
                                                oninput="this.setCustomValidity('')" placeholder="Phone"
                                                name="cusa_phone" id="cusa_phone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6 col-sm-6">
                                    Province
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" class="form-control" autocomplete="off" required
                                                oninvalid="this.setCustomValidity('Please Province')"
                                                oninput="this.setCustomValidity('')" placeholder="Province"
                                                name="cusa_province" id="cusa_province">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    Zip code
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" class="form-control" autocomplete="off" required
                                                oninvalid="this.setCustomValidity('Please Zip code')"
                                                oninput="this.setCustomValidity('')" placeholder="Zip code"
                                                name="cusa_zipcode" id="cusa_zipcode">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12 col-sm-12">
                                    Note
                                    <div class="single-form form-default">
                                        <div class="form-input">
                                            <input type="text" class="form-control" autocomplete="off"
                                                placeholder="Note" name="cusa_note" id="cusa_note">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="row mb-3">
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

        <script src="serve/checkout.js"></script>

        <script src="serve/menu.js"></script>


        <!-- รูปภาพล้วนๆๆๆๆๆๆ -->
        <script type="text/javascript">
        function chkNumber(ele) {
            {
                var vchar = String.fromCharCode(event.keyCode);
                if ((vchar < '0' || vchar > '9') && (vchar != '.')) return false;
                ele.onKeyPress = vchar;
            }
        }
        $(document).ready(function() {});
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
            }
        });
        $('#imagebroswer').on('change', function() {
            resizeImages(this.files[0], function(dataUrl) {
                // console.log(dataUrl);
                $("#logo_img64").val(dataUrl);
                //   inset_img(dataUrl);
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
            var perferedWidth = 1024;
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
        <!-- รูปภาพล้วนๆๆๆๆๆๆ -->


    </body>

    </html>