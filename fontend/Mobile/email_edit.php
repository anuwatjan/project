<?php session_start() ; ?>

<?php

require '../includedb/condb.php'; 
$sql = "SELECT * FROM akksofttech_customer WHERE  cus_id = '".$_SESSION['akksofttechsess_cusid']."'  ";
$query = mysqli_query($conn , $sql);
$result = mysqli_fetch_array($query); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage - Start Bootstrap Template</title>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/scripts.js"></script>
    <link rel="stylesheet" href="../style_index.css" type="text/css">
    <link rel="stylesheet" href="../css/styllist.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="../css/radiostyle.css" type="text/css">
    <link rel="stylesheet" href="../css/radiostyle1.css" type="text/css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>


<body>


    <?php include 'nav_profile.php' ; ?>
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
        font-size: 24px;
    }
    </style>

    <style>
    form {
        width: 100%;
        max-width: 100%;

    }
    </style>

    <style>
    ::-webkit-scrollbar {
        -webkit-appearance: none;
        width: 0px;
    }

    .iBannerFix {
        height: 50px;
        position: fixed;
        bottom: 0px;
        width: 100%;
        color: white;
        left: 0px;
        z-index: 99;
    }
    </style>


        <div class="container">


<div class="col-lg-12 col-md-12 mt-5">

<h4 class="mb-4">Make sure we can reach you at your new email</h4>


        <form method='post' id='emp-UpdateForm_email' action="#">
       
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
      
                <div class="col-md-6" >
                    <div class="single-form form-default">
                        <label>Email</label>
                        <div class="form-input">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Email" required
                                name="cus_email" id="cus_email" value='<?php echo $result['cus_email'];?>'> 
                            <i class="mdi mdi-email"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="display:none;">
                    <div class="single-form form-default">
                        <label>Phone</label>
                        <div class="form-input">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Phone"
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

</div>





</body>

</html>