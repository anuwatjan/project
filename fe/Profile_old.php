<?php session_start() ; ?>

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
    font-weight:bold;}
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


<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php require 'header.php' ?>

  <!-- Hero Section Begin -->
  <section class="hero mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All      MENU</span>
                        </div>
                        <ul>
                            <li><a href="account.php" class="menu-link" target="myiframe"><i class="fa fa-user-o m-3" aria-hidden="true"></i>My account to me</a></li>
                            <li><a href="address.php" class="menu-link" target="myiframe"><i class="fa fa-address-card-o m-3" aria-hidden="true"></i>Address</a></li>
                            <li><a href="password.php" class="menu-link" target="myiframe"><i class="fa fa-key m-3" aria-hidden="true"></i>Password</a></li>
                            <li><a href="myorder_all.php" class="menu-link" target="myiframe"><i class="fa fa-product-hunt m-3" aria-hidden="true"></i>My Order</a></li>
                            <li><a href="myreserve.php" class="menu-link" target="myiframe"><i class="fa fa-book m-3" aria-hidden="true"></i>Reserve</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="pcoded-content">
                        <div class="page-wrapper">
                            <iframe src="myorder_all.php" class="screen col-md-12"
                                name="myiframe" id="framelayout" frameborder="0" style="height: 800px;width:100%;padding:10px 0 0 0;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->



<?php require 'script.php' ?>

<script src="serve/index.js"></script>

<script src="serve/menu.js"></script>


</body>

</html>
