<?php session_start() ; ?>
<?php require 'includedb/condb.php' ?>
<!DOCTYPE html>
<html lang="zxx">

<?php require 'head.php' ?>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
<style>
.input-icons i {
    position: absolute;
}

.input-icons {
    width: 100%;
    margin-bottom: 10px;
}

.icon {
    padding: 2px;
    min-width: 40px;
}

.input-field {
    width: 50%;
    padding: 3px;
    text-align: right;
}
</style>





<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <!-- <div class="humberger__menu__overlay"></div> -->


    <?php require 'header.php' ?>

    <!-- <section class="latest-product spad"> -->











    <div class="container">


   

        <center>

        <div id="showimage"></div>

        </center>



        <div class="section22 " id="boxzone">


            <div class="mx-5 ml-1 zoneidall HoverBorder1" id="showall">

                <img src="img/table1.png" width="80">

                <div class="fincenter mt-1">

                    All Zone

                </div>

            </div>

            <?php $sql ="select * from akksofttech_tablezone ORDER BY zone_id DESC" ; $que = mysqli_query($conn , $sql) ; while($res = mysqli_fetch_array($que)){ ; ?>

            <!-- เมื่อมีการคลิ๊ก ให้ใช้ฟังชั้นลง css hoveradye ไป -->

            <div class="ml-1 zoneid HoverBorder zone<?PHP echo $res['zone_id']; ?>"
                data-id="<?PHP echo $res['zone_id']; ?>" id="<?PHP echo $res['zone_name']; ?>">

                <img src="img/table1.png" width="80">

                <div class="fincenter mt-1">

                    <?php echo $res['zone_name'] ; ?>

                </div>

            </div>

            <?php } ?>

        </div>
        <!-- </div> -->



    </div>



    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="latest-product__text">
                        <h4>
                            <!-- <div class="show_name_table"></div> -->
                        </h4>
                    </div>



                    <div class="row featured__filter">

                        <div id="clickmodaltable" class="show_table  col-md-12 mb-5"></div>



                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->






    <center>

        <!-- <div id="show_tablename">0</div> -->

        <div class="modal mt-3 fade clickmodaltable" id="modal_table" aria-hidden="true" style="width:100%;">

            <div class="modal-dialog " style="margin:0px;">



                <form method="post" id="insert_tablereserve">

                    <div class="modal-content">

                        <p class="mt-3 modal-title" id="staticBackdropLabel">

                        <div class="text-center" style="font-size:28px;" id="tablename"></div>

                        <div class="text-center" style="font-size:22px;" id="zonename"></div>


                        </p>

                        <!-- รหัสร้านนนนนนน -->
                        <input type="text" style="display:none;" name="sto_id" id="show_sto_id">
                        <input type="text" style="display:none;" name="table_id" id="show_tableid">
                        <input type="text" style="display:none;" name="table_name" id="show_tablename">
                        <!-- <div type="text" name="res_person" id="show_qty_res"> -->




                        <div class="modal-body">

                            <div class="text-center" style="font-size:18px;">RES PERSON : </div>

                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <span id="show_molo_minus_table" class="show_molo_minus_table  qtybtn">-</span>
                                        <input type="text" name="res_person" id="show_quantity_table" value="1">
                                        <span id="show_molo_plus_table" class="show_molo_plus_table  qtybtn">+</span>
                                    </div>
                                </div>
                            </div>

                            <br>



                            <div class="container row">

                                <div class="col-md-6">

                                    <div class="text-center" style="font-size:18px;">NAME : </div>

                                    <input type="text" name="cus_name" class="form-control" required
                                        oninvalid="this.setCustomValidity('Please Name')"
                                        oninput="this.setCustomValidity('')" placeholder="Name" />

                                </div>

                                <div class="col-md-6">

                                    <div class="text-center" style="font-size:18px;">PHONE : </div>

                                    <input type="text" name="res_phone" class="form-control" required
                                        oninvalid="this.setCustomValidity('Please Phone')"
                                        oninput="this.setCustomValidity('')" placeholder="Phone" />

                                </div>

                            </div>

                            <br>


                            <div class="">
                                <div class="text-center" style="font-size:18px;">DATE : </div>

                                <div class="container  row">

                                    <div class="col-md-4 mt-1">
                                        Day
                                        <select id="datedrop" class="form-control" name="day">
                                        </select>

                                    </div>




                                    <div class="col-md-4 mt-1 ">
                                        Month
                                        <select id="monthdrop" class="form-control" name="month"></select>

                                    </div>

                                    <div class="col-md-4 mt-1">
                                        Year
                                        <select id="yeardrop" class="form-control" name="year"></select>
                                    </div>


                                </div>

                                <div class="container row mt-2">

                                    <div class="col-md-6">
                                        Hour

                                        <select id="hourdrop" class="form-control" name="hour">

                                        </select>



                                    </div>



                                    <div class="col-md-6 mt-1">
                                        Minute

                                        <select id="minutedrop" class="form-control" name="minute">

                                        </select>


                                    </div>



                                </div>

                            </div>







                            <br>

                            <div class="container row">

                                <div class="col-md-12">

                                    <div class="text-center" style="font-size:18px;">NOTE : </div>

                                    <input type="text" name="res_note" class="form-control" />

                                </div>

                            </div>




                            <br>


                            <div class="shoping__cart__total text-center">
                                <h4>
                                    <div id="prod_cart_id">
                                        <div id="show_price_qty1">
                                        </div>
                                    </div>
                                </h4>
                            </div>

                        </div>


                        <center>
                            <div class="modal-footer">
                                <div class="row mb-3 ">
                                    <div class="col">
                                        <div type="button" class="main-btn primary-btndet" data-dismiss="modal"
                                            style="font-size:15px;">EXIT</div>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="main-btn primary-btn"
                                            style="border:none;">SAVE</button>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>

                </form>

            </div>
        </div>



    </center>




    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    
    <script src="serve/function.js"></script>
    <script src="serve/menu.js"></script>

    <script src="serve/table.js"></script>
    <script src="serve/index.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script type="text/javascript">
    const yeardrop = $("#yeardrop");
    const monthdrop = $("#monthdrop");
    const datedrop = $("#datedrop");
    const hourdrop = $("#hourdrop");
    const minutedrop = $("#minutedrop");




    window.onload = function() {

        SetDateNow();

    };

    YearDropdown();
    MonthDropdown();
    DateDropdown();
    HourDropdown();
    MinuteDropdown();




    function SetDateNow() {

        const date = new Date();
        yeardrop.val(date.getFullYear());
        monthdrop.val(date.getMonth());
        datedrop.val(date.getDate());
        hourdrop.val(date.getHours());
        minutedrop.val(date.getMinutes());

    }

    function HourDropdown() {

        const currentHour = new Date().getHours();
        // document.getElementById("demo").innerHTML = currentHour;
        for (let i = 1; i <= 24; i++) {
            const option = document.createElement("OPTION");
            option.innerHTML = i + 3;
            option.value = i;
            hourdrop.append(option);
        }
    }

    function MinuteDropdown() {

        const currentMinute = new Date().getMinutes();
        // document.getElementById("demo").innerHTML = currentMinute;
        for (let i = 1; i <= 60; i++) {
            const option = document.createElement("OPTION");
            if (i >= 10) {
                option.innerHTML = i;
                option.value = i;
            } else {
                option.innerHTML = "0" + i;
                option.value = "0" + i;
            }
            minutedrop.append(option);
        }
    }

    function YearDropdown() {

        const currentYear = new Date().getFullYear();
        var yorigin = new Date();
        var year = yorigin.getYear();

        for (let i = currentYear; i <= 2030; i++) {
            const option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            yeardrop.append(option);
        }
    }

    function MonthDropdown() {
        const monthNames = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];

        for (let i = 0; i < monthNames.length; i++) {
            const option = document.createElement("OPTION");
            option.innerHTML = monthNames[i];
            option.value = i;
            monthdrop.append(option);
        }
    }

    function DateDropdown() {
        datedrop.empty();
        const year = yeardrop.val();
        const month = parseInt(monthdrop.val()) + 1;

        const days = new Date(year, month, 0).getDate();

        for (let d = 1; d <= days; d++) {
            const option = document.createElement("OPTION");
            option.innerHTML = d;
            option.value = d;
            datedrop.append(option);
        }
    }

    // function changeyearclick($event) {
    //     this.DateDropdown();
    // }
    </script>

</body>

</html>