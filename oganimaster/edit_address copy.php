<?php
    @session_start();

    require 'includedb/condb.php'; 

    $sql = " SELECT * FROM akksofttech_customer_address WHERE cusa_id = '".$_GET['cusa_id']."' " ; 

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

    <!-- Humberger Begin -->
    <!-- <div class="humberger__menu__overlay"></div> -->


    <div class="container">
        <div class="col-md-12">


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

                <div class="row">
                    
                <div class="col">
                        <button onclick="javascript.window.history.go(-1)" class="main-btn primary-btndet" style="border:none;" name="btn-update"
                            id="btn-update">Back</button>
                    </div>

                    <div class="col">
                        <button type="submit" class="primary-btn" name="btn-update" style="border:none;" id="btn-update">EDIT</button>
                    </div>
                  
                </div>

            </form>
        </div>

    </div>
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