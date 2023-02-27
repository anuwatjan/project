<?php session_start() ; ?>

<?php

require '../includedb/condb.php'; 
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

    <link rel="shortcut icon" href="../icons/icon-128x128.png" type="image/png">

    <title>AKK Softtech</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/radiostyle.css" type="text/css">
    <link rel="stylesheet" href="../css/radiostyle1.css" type="text/css">


</head>


<style>
@font-face {
    font-family: myFirstFont;
    src: url('../font/yikes_medium-webfont.ttf'), url('../font/yikes_medium-webfont.eot')
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
    font-size:24px;
}



</style>


<body>


<style>


::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 0px;
}
.iBannerFix{
    height:50px;
    position:fixed;
    bottom:0px;
    width:100%;
    color:white;
    left:0px;
    z-index: 99;
}
</style>

<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-1 headermenucol9">
                <div class="header__logo">
                    <a href="./index.php"><img src="../../backend/assets/img/icons/AKK/logoAKK2.png" alt=""
                            width="100px;"></a>
                </div>
            </div>

            <div class="col-md-11 col-sm-12">
                <nav class="header__menu">
                    <ul>

                        <li id="myindex"> <i class="fa fa-arrow-left" aria-hidden="true"></i><a id="myindex">BACK</a></li>
                       
                        <li ><p  class="text-white" style="font-size:24px;">PHONE</p></li>
                    
                        <!-- <li style="float:right"><i  class="fa fa-check" aria-hidden="true"></i></li> -->
                    </ul>
              
                </nav>
            </div>

        </div>
    </div>

</header>


<div class="col-lg-12 col-md-12 mt-5">

<h4 class="mb-4">You can change your mobile phone number. </h4>


        <form method='post' id='emp-UpdateForm_phone' action="#">
       
                <div class="col-md-6" style="display:none;">
                    <div class="single-form form-default">

                        <label>ID Customer</label>
                        <div class="form-input">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Full Name" name="cus_id"
                                id="cus_id" value='<?php echo   $_SESSION['akksofttechsess_cusid'] ; ?>'>
                            <i class="mdi mdi-account"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-2" style="display:none;">
                <div class="single-form form-default">

                    <label>Full Name</label>
                    <div class="form-input">
                        <input type="text" class="form-control" autocomplete="off" placeholder="Full Name"
                            name="cus_name" id="cus_name" value='<?php echo $result['cus_name'];?>'>
                        <i class="mdi mdi-account"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-2" style="display:none;">
                <div class="single-form form-default">
                    <label>Last Name</label>
                    <div class="form-input">
                        <input type="text" class="form-control" autocomplete="off" placeholder="Sur Name"
                            name="cus_surname" id="cus_surname" value='<?php echo $result['cus_surname'];?>'>
                        <i class="mdi mdi-account"></i>
                    </div>
                </div>
            </div>
      
                <div class="col-md-6" style="display:none;">
                    <div class="single-form form-default">
                        <label>Email</label>
                        <div class="form-input">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Email"
                                name="cus_email" id="cus_email" value='<?php echo $result['cus_email'];?>'>
                            <i class="mdi mdi-email"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" >
                    <div class="single-form form-default">
                        <label>Phone</label>
                        <div class="form-input">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Phone" required
                                name="cus_phone" id="cus_phone" value='<?php echo $result['cus_phone'];?>'>
                            <i class="mdi mdi-phone"></i>
                        </div>
                    </div>
                </div>



                <div class="iBannerFix">
                    <button type="submit" style="border:none;width:100%;height:50px;" name="btn-update"
                        id="btn-update" class="primary-btn">SUBMIT</button>
                </div>
        </form>


</div>





 
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="profile.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

</body>

</html>