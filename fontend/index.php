<?php session_start() ; ?>

<?php include 'head.php' ; ?>
<link rel="stylesheet" href="style_index.css" type="text/css">
<link rel="stylesheet" href="css/styllist.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="css/radiostyle.css" type="text/css">
<link rel="stylesheet" href="css/radiostyle1.css" type="text/css">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="serve/index.js"></script>
<script src="Mobile/cart.js"></script>
<script src="serve/login.js"></script>
<script src="serve/menu.js"></script>

<?php require 'includedb/condb.php' ?>

<body>

    <?php include 'nav.php' ; ?>

    <style>

    </style>



    <!-- ผู้ใช้งาน -->
    <div id="show_cus_id" style="display:none;"><?php echo $_SESSION['akksofttechsess_cusid'] ;  ?></div>
    <!-- รหัสร้านค้า -->
    <div id="show_sto_id" style="display:none;">0</div>
    <!-- รหัสสินค้า -->
    <div id="show_prod_id" style="display:none;">0</div>
    <!-- รหัสสินค้่าย้อย -->
    <div id="show_sub_prod_id" style="display:none;">0</div>
    <!-- รหัสสินค้่าย้อย 1-->
    <div id="show_sub_prodone_id" style="display:none;">0</div>
    <!-- ดึงค่าราคาปัจจุบันมา -->
    <div id="show_price_simple" style="display:none;">0</div>
    <div id="show_price_simple_sub" style="display:none;">0</div>
    <div id="show_price_simple_sub_one" style="display:none;">0</div>
    <!-- หมวดหมู่ -->
    <div id="show_category" style="display:none;">0</div>
    <!-- ดึงค่าหมวดหมู่ย่อย -->
    <div id="show_sub_category" style="display:none;">0</div>
    <!-- ดึงค่าจำนวน -->
    <div id="show_quantity_de" style="display:none;">1</div>

    <div id="show_price_simple_total" style="display:none;">0</div>

    <!-- Header-->

    <div class="row">
        <div class="col-md-9">


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

                    <?php $sql_s ="select * from akksofttech_member_store LIMIT 1 " ; $que_s = mysqli_query($conn , $sql_s) ; $res_s = mysqli_fetch_array($que_s) ; ?>

                    <div class="row" id="review_info" data-id="<?php echo $res_s['sto_id'] ; ?>">


                        <div class="col-md-9">



                            <h1 class="mb-5 mt-4"><?php echo $res_s['sto_name'] ; ?><a id="reviewcssicon"
                                    style="float:right"><i class="bi bi-exclamation-circle"
                                        style="color:#663399;"></i></a> </h1>


                        </div>

                        <div class="col-md-3" id="reviewcss">

                            <h3 class="mb-5 mt-4" style="color:#663399">More Info</h3>


                        </div>


                    </div>







                </div>





            </div>





            <!-- รายการ -->





            <div class="mb-5 fixed section22 box  text-white" id="Box_Category">
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


            <div class="container-xxl">

                <div class="container">


                    <?php $sql ="select * from akksofttech_category " ; $que = mysqli_query($conn , $sql) ; while($res = mysqli_fetch_array($que)){ ; ?>


                    <h2 class="mb-3" id="category<?php echo $res['cat_id']; ?>"><?php echo $res['cat_name'] ; ?></h2>


                    <div class="row" id="box_product">

                        <?php $sql_p ="select * from akksofttech_product WHERE cat_id = '".$res['cat_id']."'" ; 
                              $que_p = mysqli_query($conn , $sql_p) ; 
                              while($res_p = mysqli_fetch_array($que_p)){ 


                                  // เช็คว่ามีย่อยไหมจะได้ดึงราคาเริ่มต้น
                                    $sql4 = "SELECT * FROM `akksofttech_subproduct` WHERE   prod_id = '".$res_p['prod_id']."'  ORDER BY sprod_price ASC  " ;
                                    $query4 = mysqli_query($conn ,$sql4);
                                    $num4 = mysqli_num_rows($query4);
                                    $data4 = mysqli_fetch_array($query4,MYSQLI_BOTH);



                                // echo print_r($res_p['prod_id']) ; 
                                ?>

                      
                        <div class="col-md-4 col-lg-3 col-sm-6 mb-5" id="Product_Click"
                            data-id="<?php echo $res_p['prod_id'] ; ?>">
                            <div class="card h-100">
                                <img width="110px" height="160px" class="card-img-top zoom"
                                    src="..\backend\getimg\prod\<?php echo $res_p['prod_image'] ; ?>" alt="..." />
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder"><?php echo $res_p['prod_name'] ; ?></h5>
                                    </div>
                                    <p style="font-size:12px" class="fw-bolder"><?php echo $res_p['prod_detail'] ; ?>
                                    </p>

                                    <br>

                                    <div class=" bg-transparent border-success"
                                        style=" height:30px; font-size:20px;  position:absolute; bottom:0;">

                                        <?php if($num4 > 0 ){ 
                                         echo  "START PRICE : " . $data4['sprod_price'] ; 
                                      }else{ 
                                         echo "PRICE : " . $res_p['prod_price'] ; 
                                      } ?>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <?php } ?>

                    </div>

                    <?php } ?>



                    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="bi bi-arrow-up-short " style="font-size:20px"></i></button>




                </div>
            </div>




        </div>




        <!-- 9ะกร้า -->


        <div class="my-button col-md-3 mt-5">

            <div class="fixedcart">

                <!-- เลือกการจัดส่ง -->

                <!-- <div class="text-center">
                    Delivery<label class="mx-2 switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>Tranfer
                </div> -->


                <!-- <div class="show_num_cart"></div> -->

                <P class="mt-5 mb-5 text-center">Your order from <?php echo $res_s['sto_name'] ; ?></P>

                <div class="scollbar">

                    <div id="show_add_product"></div>

                </div>


                <hr>

                <h3 class="text-center justify-content-center "><strong>Total Price</strong></h3>
                <h1 class="text-center mb-3 toto_add_product double_line">สินค้าบริษัท </h1>


                <div class="container">


                    <div class="d-grid">

                        <button id="checkout" class="btn btn-primary" type="button">GO TO CHECKOUT</button>

                        <a href="destroyer.php" class="btn btn-danger" type="button">DESTROYER</a>


                    </div>


                </div>


            </div>

        </div>

    </div>



    <!-- ส่วนโมบาย ตะกร้า -->

    <div class="my-cart " id="my-cart">
        <button type="button" data-toggle="modal" class="btn btn-2" data-target="#Cart_Detail_Mobile"
            style="border:none;width:100%;height:80px;">
            <div style="float:left"> <i class="bi bi-bag-check-fill"></i>
                <a id="Cart_Total_Num_Mobile"><?php echo $cart_id ; ?></a>
            </div>
            <a style="float:center"><i class="bi bi-cart-check-fill"></i>CART</a>
            <div style="float:right">
                <i class="bi bi-currency-dollar"></i>
                <a id="Cart_Total_Price_Mobile"><?php echo number_format($prod_price_simple,2,'.',',') ; ?></a>
            </div>
        </button>
    </div>




    <!-- Modal ส่วนของการเพิ่มสินค้าลงตะกร้า -->
    <div class="modal fade" id="Product_Detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="padding:0rem 0rem; ">
                    <div class="col-md-12" style="padding-right:0px;     padding-left: 0px;">
                        <div id="Product_Show_Detail_Images"></div>
                    </div>
                </div>
                <div class="modal-body">

                    <div id="Product_Show_Detail_"></div>
                    <hr>
                    <div class="container mt-2">
                        <h4> CHOOSE - SUBPRODUCT</h4>
                        <p> SELECT 1 </p>
                        <div id="box_sub_prod" class="m-2">
                            <div class="Product_Show_Detail_Sub"></div>
                        </div>
                    </div>

                    <div class="container mt-2">
                        <div class="mb-2" id="box_sub_prodone_name"></div>
                        <div id="box_sub_prodone">
                            <div class="Product_Show_Detail_Sub_One"></div>
                        </div>
                    </div>
                    <div class="container mt-2">
                        <h4> NOTE </h4>
                        <textarea type="text" class="form-control" id="message"></textarea>
                    </div>

                </div>


                <form>
                    <div class="value-button text-white" id="decreaseValue" value="Decrease Value">-</div>
                    <input type="number" id="number" readonly value="1" />
                    <div class="value-button text-white" id="increaseValue" value="Increase Value">+</div>
                </form>

                <br>

                <div class="container">
                    <div class="row">
                        <a id="ok_insert_close" class="text-center btn btn-danger text-white"
                            style="bottom: 0;left: 0;right: 0;width: 50%;"> <i class="fa fa-arrow-left"
                                aria-hidden="true"></i> Close </a>
                        <a id="ok_inset_cart" class="text-center btn btn-primary text-white"
                            style="bottom: 0;left: 0;right: 0;width: 50%;">Add To Cart<div
                                id="show_price_simple_total_in_button"> 0</div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- modal ส่วนของรีวิว -->

    <div class="modal fade" id="Review_Detail<?php echo $res_s['sto_id'] ; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="padding:0rem 0rem; ">
                    <div class="col-md-12" style="padding-right:0px;     padding-left: 0px;">
                        <div id="Review_Show_Detail_Images"></div>
                    </div>
                </div>
                <div class="modal-body">

                    <div class="container">


                        <div id="Review_Show_Detail_Name"></div>


                    </div>



                </div>

            </div>
        </div>
    </div>


    <?php require 'Mobile/Cart.php' ?>


    <!-- ตะกร้าโมบาย -->

    <script>
    // Get the button
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>





</body>

</html>