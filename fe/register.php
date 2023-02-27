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

    <div class="card mx-auto mt-2">
    <div class="contact-form spad">
        <div class="container">
    
                    <div class="contact__form__title">
                        <h2>Register</h2>
                    </div>
              
            <form method='post' id='emp-SaveRegister' action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    First Name
                        <input placeholder="First Name" name="cus_name"
                                                    autocomplete="off" required
                                                    oninvalid="this.setCustomValidity('Please Name')"
                                                    oninput="this.setCustomValidity('')" id="cus_name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    Last Name
                        <input type="text" placeholder="Last Name" name="cus_surname"
                                                    autocomplete="off" required
                                                    oninvalid="this.setCustomValidity('Please Surname')"
                                                    oninput="this.setCustomValidity('')" id="cus_surname">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    Username
                        <input  type="text" placeholder="Username" name="cus_username"
                                            autocomplete="off" required
                                            oninvalid="this.setCustomValidity('Please Username')"
                                            oninput="this.setCustomValidity('')" id="cus_username">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    Password
                        <input id="password-3" type="password" placeholder="Password"
                                            name="cus_password" id="cus_password" autocomplete="off" required
                                            oninvalid="this.setCustomValidity('Please Password')"
                                            oninput="this.setCustomValidity('')" name="cus_password" id="cus_password">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    Email
                        <input type="email" placeholder="user@email.com" name="cus_email"
                                                    autocomplete="off" required
                                                    oninvalid="this.setCustomValidity('Please Email')"
                                                    oninput="this.setCustomValidity('')" id="cus_email">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    Telephone
                        <input type="number" placeholder="Phone" name="cus_phone" id="cus_phone"
                                                    autocomplete="off" required
                                                    oninvalid="this.setCustomValidity('Please Phone')"
                                                    oninput="this.setCustomValidity('')" id="cus_phone">
                    </div>

                    <div class="col-lg-12 text-center">
              
                        <button type="submit" name="ok_register" id="ok_register" class="site-btn">Register</button>
                        <!-- <a  href="login.php" style="float:left" class="site-btn">LOGIN</a>         -->
                    </div>
                </div>
                <br>
                <br> 
            </form>      
        </div>
    </div>
    </div>
    <br>
    <br>
                <br>
    <?php require 'script.php' ?>
    <script src="serve/login.js"></script>
    <script src="serve/menu.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    });
</script>
</body>
</html>