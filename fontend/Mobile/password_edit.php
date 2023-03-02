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

<h4 class="mb-4">You can change your password.</h4>


<form method='post' id='emp-SaveFormPassword'>

<input type="text" style="display:none;" name="cus_id"
    value="<?php echo  $_SESSION['akksofttechsess_cusid'] ; ?>"></input>


<div class="row">
    <div class="col-md-6 mt-4">
        <div class="single-form form-default">

            <label>OLD PASSWORD</label>
            <div class="form-input">
                <input type="password" class="form-control"
                    oninvalid="this.setCustomValidity('Please Old Password')"
                    oninput="this.setCustomValidity('')" required placeholder="old password"
                    name="old_password">
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-6 mt-4">
        <div class="single-form form-default">
            <label>NEW PASSWORD</label>
            <div class="form-input">
                <input type="password" class="form-control"
                    oninvalid="this.setCustomValidity('Please New Password')"
                    oninput="this.setCustomValidity('')" required placeholder="new password"
                    name="new_password">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mt-4">
        <div class="single-form form-default">
            <label>CONFIRM NEW PASSWORD</label>
            <div class="form-input">
                <input type="password" class="form-control"
                    oninvalid="this.setCustomValidity('Please Confirm New Password')"
                    oninput="this.setCustomValidity('')" required placeholder="confirm new password"
                    name="con_newpassword">
            </div>
        </div>
    </div>
</div>

<div class="single-form mt-4">




<input type="hidden" name="checkpassword">
<button style="border:none;" class="primary-btn primary-btn iBannerFix" type="submit" name="change_password" id="change_password">SUBMIT</button>
</div>
</form>



</div>
</div>





</body>

</html>