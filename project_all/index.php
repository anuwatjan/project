<?php require 'head.php' ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="index.js"></script>


<body>
    <?php require 'condb.php' ?>
    <?php require 'left.php' ?>

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>

        <?php require 'top.php' ?>


        <!-- card -->
        <div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                 
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                                <h4 class="text-left text-uppercase"><b>จำนวนโปรเจ็ค</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="col-xs-3 mar-bot-15 text-left">
                                        <label class="label bg-green">30% <i class="fa fa-level-up"
                                                aria-hidden="true"></i></label>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <h2 class="text-right no-margin">10,000</h2>
                                    </div>
                                </div>
                                <div class="progress progress-mini">
                                    <div style="width: 78%;" class="progress-bar bg-green"></div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>

            </div>



        </div>


        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid" >
                <div class="row">
                    <?php $sql = "SELECT * FROM project " ; $query = mysqli_query($conn , $sql )  ; while($row = mysqli_fetch_array($query)){ ?> 
                    <div class="col-lg-3 col-md-3 col-sm-3 project_click col-xs-12" data-id="<?php echo $row['Project_Path'] ; ?>">
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-t-30">
                            <h3 class="box-title"><?php echo $row['Project_Name'] ; ?></h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>


        



        <!-- card -->



    </div>
    <?php require 'script.php' ?>
</body>

</html>