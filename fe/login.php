<?php
@session_start();
?>
<?php require 'includedb/condb.php' ?>
<!DOCTYPE html>
<html lang="zxx">
<?php require 'head.php' ?>


<style>
body {
    overflow-x: hidden;
}
</style>

<body>

    <div id="preloder">
        <div class="loader"></div>
    </div>


    <?php require 'header.php' ?>

    <div class="card mx-auto mt-4">
        <div class="contact-form spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact__form__title">
                            <h2>Welcome!</h2>
                            <span>Sign up or log in to continue</span>
                        </div>
                    </div>
                </div>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <input type="text" id="cus_username" placeholder="Username">
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <input class="cus_password" type="password" placeholder="Password">
                        </div>
                        <div class="col-lg-12 text-center">

                            <button type="submit" id="ok_login" class="site-btn">LOG IN </button>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="register.php" class="primary-btn site-btn">Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require 'script.php' ?>
    <script src="serve/login.js"></script>
    <script src="serve/menu.js"></script>

    
</body>

</html>