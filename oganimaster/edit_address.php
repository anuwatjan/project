<?php session_start() ; ?>

<?php

require 'includedb/condb.php'; 
$sql = " SELECT * FROM akksofttech_customer_address WHERE cusa_id = '".$_GET['cusa_id']."' " ; 

$query = mysqli_query($conn , $sql);

$result = mysqli_fetch_array($query); 
?>

<!DOCTYPE html>
<html lang="zxx">

<?php require 'head.php' ?>

<style>
@font-face {
    font-family: myFirstFont;
    src: url('font/yikes_medium-webfont.ttf'), url('font/yikes_medium-webfont.eot')
}


body,
strong,
h5,
h4,
p,
ul,
li,
span {
    font-family: myFirstFont;
    font-weight: bold;
}




@media only screen and (max-width: 480px) {
   
}

@media only screen and (max-width: 770px) {

    .iBannerFix {
        height: 50px;
        position: fixed;
        bottom: 0px;
        width: 100%;
        color: white;
        left: 0px;
        z-index: 99;
    }

   
}
</style>


<body>


    <style>
    ::-webkit-scrollbar {
        -webkit-appearance: none;
        width: 0px;
    }

   
    </style>

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-1 headermenucol9">
                    <div class="header__logo">
                        <a href="./index.php"><img src="../backend/assets/img/icons/AKK/logoAKK2.png" alt=""
                                width="100px;"></a>
                    </div>
                </div>

                <div class="col-md-11 col-sm-12">
                    <nav class="header__menu">
                        <ul>

                            <li id="myindex11"> <i class="fa fa-arrow-left" aria-hidden="true"></i><a
                                    id="myindex11">BACK</a></li>

                            <li>
                                <p class="text-white" style="font-size:24px;">ADDRESS</p>
                            </li>

                            <!-- <li style="float:right"><i  class="fa fa-check" aria-hidden="true"></i></li> -->
                        </ul>

                    </nav>
                </div>

            </div>
        </div>

    </header>

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
                    <button type="submit" style="border:none;width:100%;height:50px;" name="btn-update" id="btn-update"
                        class="primary-btn">SUBMIT</button>
                </div>
                </center>
            </form>

    </div>

    </center>





    <?php require 'script.php' ?>

    <script src="Mobile/profile.js"></script>

    <script src="serve/function.js"></script>

    <script src="serve/index.js"></script>

    <script src="serve/menu.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>