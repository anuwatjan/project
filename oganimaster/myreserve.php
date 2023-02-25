<?php
        @session_start();
        
    require 'includedb/condb.php'; 
        
    $strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}


        ?>

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
::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 0px;
}
</style>

<body>




    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
<!-- 

      <div class="col-lg-12 col-md-12">
        <div class="hero__search">
            <div class="hero__search__form">
                <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" name="frmSearch" method="post">

                    <div class="hero__search__categories">
                        Order ID
                       
                    </div>
                    <input type="text" name="txtKeyword" id="txtKeyword" placeholder="What do yo u need?">
                    <button type="submit" class="site-btn">SEARCH</button>
                </form>
            </div>
        </div>
    </div> -->






    <?php               
        $totoprice = 0 ;
        $sss = "SELECT * FROM akksofttech_tabledreserve   INNER JOIN akksofttech_tabledinning ON akksofttech_tabledreserve.table_id = akksofttech_tabledinning.table_id
        INNER JOIN akksofttech_tablezone ON akksofttech_tablezone.zone_id = akksofttech_tabledinning.zone_id
        WHERE cus_id = '".$_SESSION['akksofttechsess_cusid']."'     ORDER BY res_datereserve DESC" ; 
        $qqq = mysqli_query($conn , $sss) ;  
        // $rowqqq = mysqli_fetch_array($qqq) ; 


        while($row = mysqli_fetch_array($qqq)){  ;       


            
            
            $newDate = date("d/m/Y H:i", strtotime($row['res_datereserve']));
    ?>

    <div class="card mt-4" id="container">


        <div class="card-header">

            <div class="row">

            <div class="col-md-2">
                    Res ID : # <?php echo $row['res_id'] ; ?>
                </div>

             

                <div class="col-md-3">
                    Table Name :  <?php echo $row['table_name'] ; ?>
                </div>

                <div class="col-md-4">
                    Zone Name :  <?php echo $row['zone_name'] ; ?>
                </div>

                <div class="col-md-3">
                    Date : <?php echo  $newDate ; ?>
                </div>

            </div>
            <div style="float:left;">
                Res Person : <?php echo $row['res_person'] ; ?>
            </div>

            <div style="float:right;">




                <?php 
                                        if($row['res_status'] == "booked"){
                                            
                                          echo "<span class='main-btn primary-btndet1'>booked</span>";
                                              
                                          }elseif($row['res_status'] == "checkin"){
                                            
                                            echo "<span class='main-btn primary-btncon1 text-white'>checkin</span>";
                                             
                                          }elseif($row['res_status'] == "checkout"){
                                            
                                            echo "<span class='main-btn primary-btnship1'>checkout</span>";
                                        
                                        }elseif($row['res_status'] == "cancel"){

                                            echo "<span class='main-btn primary-btndet1'>cancel</span>";

                                          }
                                       ?>




            </div>



        </div>

        <div class="" style="padding:0px 15px;">

            <?php if($row['res_status'] == "booked" ){?>
            <seme style="float:right;">
                <a type="button" class="m-1 main-btn primary-btndet text-white cancel_table text-white"
                    data-id='<?php echo $row['res_id'] ; ?>'>cancel</a>
            </seme>
            <?php } ?>

        </div>




    </div>



    <?php }   ?>










    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="serve/function.js"></script>
    <script src="serve/table.js"></script>
    <script src="serve/bank.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>