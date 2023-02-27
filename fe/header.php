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
<!-- Header Section Begin -->
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
                        <!-- /// เปลี่ยนหน้าผ่าน jquery //// -->
                        <li id="myindex"> <i class="fa fa-home"></i> <a id="myindex">Home</a></li>
                        <?php if($_SESSION['akksofttechsess_cususername'] != ""){ ?>
                        <li id="myaccount"> <i class="fa fa-user"></i> <a id="myaccount">Profile</a></li>
                        <!-- <li id="myorder"><i class="fa fa-product-hunt"></i> <a id="myorder">Order & reordering</a></li> -->
                        <li id="myorder"> <i class="fa fa-product-hunt"></i> <a id="myorder">Order</a></li>
                        <li id="myreserve"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i><a id="myreserve">Reserve</a></li>
                        <li id="mycart"> <i class="fa fa-cart-arrow-down"></i> <a id="mycart">My Cart</a></li>
                        <li id="mytable"> <i class="fa fa-table" aria-hidden="true"></i></i> <a id="mytable">My
                                Reservation</a></li>
                        <li id="mylogout"> <i class="fa fa-sign-out"></i> <a id="mylogout">Log out</a> </li>
                            <!-- logiื แล้วออกจากระบบ -->
         
                            <li ><div class="text-white"><?php echo $_SESSION['akksofttechsess_cusname'] ;?></div>
                        </li>
                        <?php }else{ ?>
                        <li id="mylogin"> <i class="fa fa-sign-in"></i> <a id="mylogin">Login</a> </li>
                        <li id="myregister"> <i class="fa fa-registered"></i> <a id="myregister">Register</a> </li>
                        <?php } ?>
                    </ul>
                    <!-- <center> -->
                    <!-- <style>
                    .aa {
                        font-size: 24px;
                        color: #252525;
                        text-transform: uppercase;
                        font-weight: 700;
                        letter-spacing: 2px;
                        -webkit-transition: all, 0.3s;
                        -moz-transition: all, 0.3s;
                        -ms-transition: all, 0.3s;
                        -o-transition: all, 0.3s;
                        transition: all, 0.3s;
                        padding: 5px 0;
                        display: block;
                    }
                    </style> -->
                    <!-- <a class="text-white"><?php echo $_SESSION['akksofttechsess_cusname'] ;?></a> -->
                    <!-- </center> -->

                </nav>
            </div>

        </div>
    </div>

</header>
<!-- Header Section End -->