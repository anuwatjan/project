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
.row {
    width: AUTO;
    height: AUTO;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-top: -100px;
    margin-left: -100px;
}

.button5 {

    width:100% ; 
    
    background-color: #663399;

    border: none;


    color: white;


}


.button6 {

    width:100% ; 

      border: 2px solid #663399; /* Green */

     color: black;

    background-color: #fff;
}



.button6:hover  {

    width:100% ; 

      border: 2px solid #fff; /* Green */

     color: black;

    background-color: #fff;
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



    <div class="container">



        <div class="row">


            <div class="col-md-12">




                <h2><Strong>Welcome !</Strong></h2>

                <a>Register or login to continue.</a>


                <br>




                <a  id="mylogin" class="mt-3 button button5">LOGIN</a>




                <button class="mt-3 button button6">REFISTER</button>




            </div>





        </div>



    </div>


</body>

</html>