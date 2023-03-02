<div class="profile_mobile">
    <section class="hero mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div id="profile">
                                Profile <i style="float:right;color:rebeccapurple;" class="bi bi-pencil-fill"
                                    aria-hidden="true"></i>
                                <h5><?php echo $result['cus_name'] ; ?> <?php echo $result['cus_surname'] ; ?> </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div id="email">
                                Email <i style="float:right;color:rebeccapurple;" class="bi bi-pencil-fill"
                                    aria-hidden="true"></i>
                                <h5><?php echo $result['cus_email'] ; ?> </h5>
                            </div>
                        </div>

                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div id="password">
                                Password <i style="float:right;color:rebeccapurple;" class="bi bi-pencil-fill"
                                    aria-hidden="true"></i>
                                <h5> </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <div id="phone">
                                Mobile Number <i style="float:right;color:rebeccapurple;" class="bi bi-pencil-fill"
                                    aria-hidden="true"></i>
                                <h5><?php echo $result['cus_phone'] ; ?> </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">

                            Address <a style="float:right" class="main-btn primary-btn text-white"
                                id="clickmodaladdress1">NEW ADDRESS</a>

                            <div class="contact-style-1">


                                <div id="container">

                                    <form method='post' id='emp-SaveForm' action="#">


                                        <?php 

                                                $sql = "SELECT * FROM akksofttech_customer_address WHERE cus_id  = '".$_SESSION['akksofttechsess_cusid']."'" ;

                                                $que  = mysqli_query($conn  , $sql ) ;

                                                while($res = mysqli_fetch_array($que)){ ; 

                                                ?>

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="single-form form-default">


                                                    <br>

                                                    <div class="row">


                                                        <div class="col-md-12">
                                                            <p><?php echo $res['cusa_name'] ; echo "         "  ; echo $res['cusa_surname'] ;  ?>|
                                                                <?php echo $res['cusa_phone'] ; ?> </p>
                                                            <p class="m-2"><?php echo $res['cusa_address']  ; ?>

                                                                <?php echo $res['cusa_province']  ; ?> ,
                                                                <?php echo $res['cusa_zipcode']  ; ?></p>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <div class="row">

                                                                <!-- <a class="main-btn primary-btn clickedit_address"  data-id='<?php echo $res['cusa_id'] ; ?>'>EDIT</a> -->


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

                                        <?php } ?>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>




<!-- Modal -->
<div class="modal mt-3 fade clickmodaladdress" id="modal_address1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"> NEW ADDRESS </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="insert_address1" class="mediafont " style="font-size:20px;">
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