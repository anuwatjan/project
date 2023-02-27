<?php include 'head.php' ; ?>

<link rel="stylesheet" href="css/styllist.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="serve/index.js"></script>


<?php require 'includedb/condb.php' ?>

<body>

    <?php include 'nav.php' ; ?>


    <!-- Header-->
    <div class="row">
        <div class="col-md-10">


            <header class="bg-dark py-5">
                <div class="container px-4 px-lg-5 my-5">
                    <div class="text-center text-white">
                        <h1 class="display-4 fw-bolder">Shop in style</h1>
                        <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                    </div>
                </div>
            </header>

            <div class="container-xxl">
                <div class="container">

                    <h1 class="mb-5 mt-4">ร้าน</h1>


                    <!-- รายการ -->



                    <div class="mb-5 fixed section22 box" id="Box_Category">
                        <?php $sql ="select * from akksofttech_category " ; $que = mysqli_query($conn , $sql) ; while($res = mysqli_fetch_array($que)){ ; ?>
                        <div class="affecttext ml-1 Category_id  category<?PHP echo $res['cat_id']; ?>"
                            data-id="<?PHP echo $res['cat_id']; ?>" id="<?PHP echo $res['cat_name']; ?>">
                            <ul class="horizontal-list">
                                <li>
                                    <?PHP echo $res['cat_name']; ?>
                                </li>
                            </ul>
                        </div>



                        <?php } ?>
                    </div>




                    <?php $sql ="select * from akksofttech_category " ; $que = mysqli_query($conn , $sql) ; while($res = mysqli_fetch_array($que)){ ; ?>
                    <h2 class="mb-3" id="category<?php echo $res['cat_id']; ?>"><?php echo $res['cat_name'] ; ?></h2>

                    <div class="row" id="box_product">

                        <?php $sql_p ="select * from akksofttech_product WHERE cat_id = '".$res['cat_id']."'" ; $que_p = mysqli_query($conn , $sql_p) ; while($res_p = mysqli_fetch_array($que_p)){ ; ?>
                        <div class="col-md-3 col-sm-6 mb-5" id="Product_Click"
                            data-id="<?php echo $res_p['prod_id'] ; ?>">
                            <div class="card h-100">
                                <img width="110px" height="160px" class="card-img-top"
                                    src="..\backend\getimg\prod\<?php echo $res_p['prod_image'] ; ?>" alt="..." />
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder"><?php echo $res_p['prod_name'] ; ?></h5>
                                        </div>
                                        <p style="font-size:12px" class="fw-bolder"><?php echo $res_p['prod_detail'] ; ?></p>

                                

                                </div>
                            </div>
                        </div>



                        <?php } ?>
                    </div>

                    <?php } ?>



                </div>
            </div>




        </div>


        <!-- 9ะกร้า -->


        <div class=" col-md-2 mt-5">


            <style>
            .double_line {
                text-decoration-line: underline;
                text-decoration-style: double;
            }
            </style>
            
            <div  id="show_add_product"></div>


          
            <h3 class=" text-center justify-content-center "><strong>Total Price</strong></h3>
            <h1 class=" text-center mb-3 toto_add_product double_line">สินค้าบริษัท </h1>




        </div>

    </div>


</body>

</html>