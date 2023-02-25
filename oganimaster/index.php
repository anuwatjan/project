<?php session_start() ; ?>

<?php require 'includedb/condb.php' ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="icons/icon-128x128.png" type="image/png">

    <title>AKK Softtech</title>

    <!-- Google Font -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet"> -->

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/radiostyle.css" type="text/css">
    <link rel="stylesheet" href="css/radiostyle1.css" type="text/css">


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script src="Mobile/cart.js"></script>

    <script src="serve/index.js"></script>

    <script src="serve/menu.js"></script>

    <script>
    $(document).ready(function() {
        $(".text_for_radio").click(function() {
            console.log("radiooo");
            $(this).prev("input[name='sprod_id']").attr("checked", "checked");
            $(this).prev("input[name='sprodone_id']").attr("checked", "checked");
        });
    });
    </script>

</head>

<style>
@font-face {
    font-family: myFirstFont;
    src: url('font/yikes_medium-webfont.ttf'), url('font/yikes_medium-webfont.eot')
}

body {
    font-family: myFirstFont;
    font-weight: bold;
}
</style>






<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php require 'header.php' ?>

    <Style>
    /* .scroll_demo {

        height: 25%;
        overflow: auto;
        } */

    ::-webkit-scrollbar {
        -webkit-appearance: none;
        width: 0px;
    }

    .btn {
        flex: 1 1 auto;
        /* margin: 10px; */
        /* padding: 30px; */
        text-align: center;
        text-transform: uppercase;
        transition: 0.5s;
        background-size: 200% auto;
        color: white;
        box-shadow: 0 0 20px #eee;
        /* border-radius: 10px; */
    }

    .btn:hover {
        background-position: right center;
    }

    .btn-2 {
        background-image: linear-gradient(to right, #8A2BE2 0%, #DA70D6 51%, #DDA0DD 100%);
    }

    .modal-dialog1 {
        position: fixed;
        width: inherit;
        width: 100%;
        max-width: inherit;
        bottom: 0;
    }

    .text_for_radio {
        cursor: pointer;
    }
    </Style>

    <link rel="stylesheet" href="style_index.css" type="text/css">

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




    <div class="container-fluid">

        <div class="row ">
            <div class="col-md-8">
                <div class="container">
                    <div class="mt-3 row">
                        <!-- <label style="font-size:22px;" class="col-2 col-sm-1 col-form-label d-none d-sm-block">Serach</label> -->
                        <div class="col-8 col-sm-10">
                            <input type="text" name="itemname" id="itemname" class="form-control"
                                style=" font-size:24px; height:50px;" placeholder="Search Product" autocomplete="off">
                        </div>
                        <div class="col-2 col-sm-1">
                            <button type="button" class="main-btn primary-btn2" style="border:none;" id="btnSearch">
                                <span class="glyphicon glyphicon-search"></span>
                                Search
                            </button>
                        </div>
                        <!-- <div class="mx-3 col-2 col-sm-1">
                            <a id="btnreset" class="text-white btn btn-warning">Reset</a>
                        </div> -->
                    </div>
                    <div class="section22 " id="Box_Category">
                        <?php $sql ="select * from akksofttech_category " ; $que = mysqli_query($conn , $sql) ; while($res = mysqli_fetch_array($que)){ ; ?>
                        <div class="ml-1 Category_id HoverBorder category<?PHP echo $res['cat_id']; ?>"
                            data-id="<?PHP echo $res['cat_id']; ?>" id="<?PHP echo $res['cat_name']; ?>">
                            <img src="..\backend\getimg\cate\<?php echo $res['cat_img'] ; ?>">
                            <div class="fincenter mt-1">
                                <?php echo $res['cat_name'] ; ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <section class="latest-product spad">

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="latest-product__text">
                                    <h4>
                                        <div class="Category_Name"></div>
                                    </h4>
                                </div>
                                <div class="row featured__filter">
                                    <div id="msgerror"></div>
                                    <div class="Product_Show col-md-12 mb-5 pb-5"></div>
                                </div>
                            </div>
                        </div>

                    </section>
                </div>
            </div>



            <?php
            $prod_price_simple = 0 ;
            $sql = "SELECT COUNT(cart_id) As cart_id , SUM(prod_price_simple * quantity ) AS prod_price_simple
            FROM akksofttech_cart WHERE cus_id = '".$_SESSION['akksofttechsess_cusid']."'" ;
            $query = mysqli_query($conn , $sql) ; 
            $num = mysqli_num_rows($query) ;    
            $result1 = mysqli_fetch_array($query) ;
            $prod_price_simple = $result1['prod_price_simple'];
            $prod_price_simple = $result1['prod_price_simple'];
            $cart_id = $result1['cart_id'];
            ?>



            <div class="col-md-4 my-button fixed" id="scroll_demo">
                <div class="container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="shoping__product text-center text-red text-danger">MY CART <i
                                        class="fa fa-shopping-cart" aria-hidden="true"></i> </th>
                            </tr>
                            <tr>
                                <th class="text-center shoping__product text-white bg-secondary" rowspan="3">ALL
                                    PRODUCTS AVALIBLE :
                                    [
                                    <a id="Cart_Total_Num"><?php echo $cart_id ; ?></a> ]
                                    <div id="delete_all" style="float:right;"><i style=" font-size:24px;color:red"
                                            class="fa fa-trash " aria-hidden="true"></i></div>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <div class="container" id="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shoping__cart__table">


                                <!-- <tr><div id="Message" style="font-size:24px;color:red" class="text-center"></div></tr> -->
                                <table class="table table-hover">
                                    <thead>

                                    </thead>
                                    <tbody id="Product_To_Table">
                                        <?php
                                    $totall = 0 ; 
                                    $pricee = 0 ;
                                
                                    $prod_price_simple = $result1['prod_price_simple'];
                                    $sql222 = "SELECT *  FROM akksofttech_cart WHERE cus_id = '".$_SESSION['akksofttechsess_cusid']."'" ;
                                    $query222 = mysqli_query($conn , $sql222) ; 
                                    $num222 = mysqli_num_rows($query222) ; 
                                    while($result = mysqli_fetch_array($query222)){
                                    $pricee +=  $result['prod_price_simple'] * $result['quantity']  ; 
                                    $totall +=  $result['quantity']  ; 
                                    ?>

                                        <tr valign="middle" align="center"
                                            class="delete_mem<?php echo $result['cart_id'] ; ?> ">
                                            <td class="shoping__cart__item">

                                                <div id="prod_cart_id" data-id="<?php echo $result['cart_id'] ; ?>">

                                                    <div class="prod_name text-rebacca">
                                                        <div class="row">
                                                            <img src="../backend/getimg/prod/<?php echo $result['prod_image'] ; ?>"
                                                                alt="">

                                                            <?php echo $result['prod_name'] ; ?>
                                                            <br>
                                                            <?php if(($result['sprod_name'] != "-") && $result['sprodone_name'] == "-"){ ?>
                                                            - <?php echo $result['sprod_name'] ; ?>
                                                            <br>
                                                            <?php }else if(($result['sprodone_name'] != "-" && $result['sprod_name'] != "-" )){  ?>
                                                            - <?php echo $result['sprod_name'] ; ?>
                                                            <br>
                                                            - <?php echo $result['sprodone_name'] ; ?>
                                                            <?php }else{ echo "" ; } ?>
                                                            <?php if(($result['message'] != "-")){ ?>
                                                            <br>

                                                            NOTE : <?php echo $result['message'] ; ?>
                                                            <br>
                                                            <?php }else{ echo "" ; } ?>

                                                            <?php echo $result['quantity'] ; ?> x £
                                                            <?php echo $result['prod_price_simple'] ; ?>



                                                            <!-- ดึงราคาตั้งต้น -->
                                                            <div id="prod_price_simple_start" style="display:none;">
                                                                <?php echo $result['prod_price_simple'] ; ?></div>
                                                            <!-- ดึงรหัสตั้งต้น -->
                                                            <div id="prod_price_simple_start_id" style="display:none;">
                                                                <?php echo $result['cart_id'] ; ?></div>


                                                        </div>
                                                    </div>

                                                    <!-- <div id="show_price111" class=" mx-3">
                                                        <?php echo $result['quantity'] ; ?>
                                                        </div>  x <div id="show_price1<?php echo $result['cart_id']?>" class="price mx-3">
                                                    <?php echo $result['prod_price_simple'] ; ?>
                                                    </div> 
                                                </div> -->

                                                </div>

                                            </td>
                                            <td class="shoping__cart__total" style="vertical-align: middle;">
                                                <div id="prod_cart_id" data-id="<?php echo $result['cart_id'] ; ?>">
                                                    <div id="show_price_qty<?php echo $result['cart_id'] ; ?>">
                                                        £<?php echo  number_format($result['prod_price_simple'] * $result['quantity'],2,'.',',') ; ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total"
                                                style="vertical-align: middle;width: 30px;">
                                                <div class="Cart_Delete" data-id='<?php echo $result['cart_id'] ; ?>'>
                                                    <a><i class="fa fa-trash-o" aria-hidden="true"
                                                            style="color:red"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="shoping__checkout bg-danger text-white">
                        <h5 class="mx-2 text-white">TOTAL PRICE <a style="float:right" id="Product_To_Table_Total"> £
                                <?php echo number_format($prod_price_simple,2,'.',',') ; ?> </a> </h5>
                        <div id="checkout" class="primary-btn">GO TO CHECKOUT</div>
                    </div>
                </div>

            </div>


            <div class="my-cart " id="my-cart">
                <button type="button" data-toggle="modal" class="btn btn-2" data-target="#Cart_Detail_Mobile"
                    style="border:none;width:100%;height:80px;">
                    <div style="float:left"> <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        <a id="Cart_Total_Num_Mobile"><?php echo $cart_id ; ?></a>
                    </div>
                    <a style="float:center"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>CART</a>
                    <div style="float:right">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        <a id="Cart_Total_Price_Mobile"><?php echo number_format($prod_price_simple,2,'.',',') ; ?></a>
                    </div>
                </button>
            </div>


          

            <!-- แสดงจำนวนสินค้าในตะกร้าเมื่อคลิก -->
            <!-- <center>

                     <?php //require 'Mobile/cart.php' ?> //ผิดหน้านี้
                      //ไม่รู้ผิดอะไร หาเอง
                    

        
            </center> -->

            <!-- Modal ส่วนของการเพิ่มสินค้าลงตะกร้า -->
            <div class="modal fade" id="Product_Detail" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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
                                <a id="ok_insert_close" class="text-center main-btn primary-btndet text-white"
                                    style="bottom: 0;left: 0;right: 0;width: 50%;"> <i class="fa fa-arrow-left"
                                        aria-hidden="true"></i> Close </a>
                                <a id="ok_inset_cart" class="text-center main-btn primary-btn text-white"
                                    style="bottom: 0;left: 0;right: 0;width: 50%;">Add To Cart<div
                                        id="show_price_simple_total_in_button"> 0</div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

       <center>
                       
                <div class="modal" id="Cart_Table_Number" style="width:100%;">
                    <div class="modal-dialog modal-dialog1 " style="margin:0px;">
                        <div class="modal-content">
                            <div class="modal-header ">

                            </div>
                            <div class="modal-body">
                                <div class="Box_Cart_Number_Product">
                                    <div style="font-size:34px;" id="prodname"></div>
                                    <div style="font-size:34px;" id="sprodname"></div>
                                    <div style="font-size:34px;" id="sprodonename"></div>
                                    <form>
                                        <div class="value-button1 text-white" id="decreaseValue1"
                                            value="Decrease Value">-
                                        </div>
                                        <input type="number1" id="number1" min="1" readonly
                                            class="Cart_Table_Number_Product" value="1" />
                                        <div class="value-button1 text-white" id="increaseValue1"
                                            value="Increase Value">+
                                        </div>
                                    </form>
                                </div>

                                <div class="shoping__cart__total text-center">
                                    <h4>
                                        <div id="prod_cart_id">
                                            <div id="Cart_Table_Number_Product_Qty">
                                            </div>
                                        </div>
                                    </h4>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <div class="row mb-3 ">
                                    <div class="col">
                                        <div type="button" class="main-btn primary-btndet" data-dismiss="modal"
                                            style="font-size:15px;">EXIT</div>
                                    </div>
                                    <div class="col">
                                        <div type="submit" class="main-btn primary-btn" style="font-size:15px;"
                                            name="update_number" id="update_number" value="Insert">SAVE</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

       
            </center>


                 <?php require 'Mobile/Cart.php' ?>



        </div>

    </div>




   

</body>




</html>