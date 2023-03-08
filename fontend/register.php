<?php include 'head.php' ; ?>
<link rel="stylesheet" href="style_index.css" type="text/css">
<link rel="stylesheet" href="css/styllist.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="css/radiostyle.css" type="text/css">
<link rel="stylesheet" href="css/radiostyle1.css" type="text/css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="serve/index.js"></script>


<?php require 'includedb/condb.php' ?>


<style>
.button5 {

    width: 100%;

    background-color: #663399;

    border: none;


    color: white;


}


.button6 {

    width: 100%;

    border: 2px solid #663399;
    /* Green */

    color: black;

    background-color: #fff;
}



.button6:hover {

    width: 100%;

    border: 2px solid #fff;
    /* Green */

    color: black;

    background-color: #fff;
}

body {
    overflow-x: hidden;
}






.button {
    /* Green */
    padding: 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

}
</style>


<body>

    <?php include 'nav_login.php' ; ?>


    <div class="card mx-auto mt-4">


        <div class="container">



            <div class="row mt-2 pt-3 ">


                <div class="col-md-12">




                    <h2><Strong>Welcome !</Strong></h2>

                    <a>Register </a>


                    <br>






                 <form method='post' id='emp-SaveRegister' action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    First Name
                        <input placeholder="First Name" name="cus_name"
                                                    autocomplete="off" required
                                                   class="form-control mt-3" oninvalid="this.setCustomValidity('Please Name')"
                                                    oninput="this.setCustomValidity('')" id="cus_name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    Last Name
                        <input type="text" placeholder="Last Name" name="cus_surname"
                                                    autocomplete="off" required
                                                   class="form-control mt-3" oninvalid="this.setCustomValidity('Please Surname')"
                                                    oninput="this.setCustomValidity('')" id="cus_surname">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    Username
                        <input  type="text" placeholder="Username" name="cus_username"
                                            autocomplete="off" required
                                           class="form-control mt-3" oninvalid="this.setCustomValidity('Please Username')"
                                            oninput="this.setCustomValidity('')" id="cus_username">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    Password
                        <input id="password-3" type="password" placeholder="Password"
                                            name="cus_password" id="cus_password" autocomplete="off" required
                                           class="form-control mt-3" oninvalid="this.setCustomValidity('Please Password')"
                                            oninput="this.setCustomValidity('')" name="cus_password" id="cus_password">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    Email
                        <input type="email" placeholder="user@email.com" name="cus_email"
                                                    autocomplete="off" required
                                                   class="form-control mt-3" oninvalid="this.setCustomValidity('Please Email')"
                                                    oninput="this.setCustomValidity('')" id="cus_email">
                    </div>
                    <div class="col-lg-6 col-md-6">
                    Telephone
                        <input type="number" placeholder="Phone" name="cus_phone" id="cus_phone"
                                                    autocomplete="off" required
                                                   class="form-control mt-3" oninvalid="this.setCustomValidity('Please Phone')"
                                                    oninput="this.setCustomValidity('')" id="cus_phone">
                    </div>


                           <button type="submit" id="ok_register" class="mt-3 button button5">REGISTER</button>


                        <div id="mylogin" class="mt-3 mb-3 button button6">GO TO LOGIN</div>

            
                </div>
                <br>
                <br> 
            </form>   



                </div>


            </div>






        </div>



    </div>



    <script src="serve/login.js"></script>
    <script src="serve/menu.js"></script>




</body>

</html>