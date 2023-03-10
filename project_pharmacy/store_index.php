<style>
.section22 {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    box-shadow: 0 3px 10px 0 rgba(#000, 0.1);
    -webkit-overflow-scrolling: touch;
    scroll-padding: 0rem;
    border-radius: 6px;
    font-size: 15px;
    margin-top: 10px;
}

.fincenter {
    text-align: center;
}

.HoverBorder {
    border: 1px solid #cac9c9;
    text-align: center;
    padding: 5px 5px;
    border-radius: 6px;
}
</style>


<style type="text/css">
.iBannerFix {
    height: 210px;
    position: fixed;
    right: 0px;
    bottom: 0px;
    background-color: #000000;
    width: 50%;
    color: white;
    z-index: 99;
}
.clicks {
  pointer-events: none;
}
</style>


<?php     require 'functionDateThaiOnTime.php';
          require 'store_order.php' ;

    ?>

<form method="POST" action="?page=store_index&act1=update">

    <div class="row">


        <div class="col-md-12">


            <div class="container">


                <?php

                $_SESSION['sales_get'] = $_POST['sales_get'];

                // $_SESSION['customer_id'] = $_POST['customer_id'];

                echo $_SESSION['customer_name'] ;


                // echo print_r($_SESSION);
    
                $connect = mysqli_connect("localhost","root","akom2006","project_new");
                if (isset($_GET['type_name']) & isset($_GET['type_name'])) {
                    //คิวรี่ข้อมูลสินค้าตามประเภท
                    $stmt = "SELECT* FROM product WHERE product_type = '".$_GET['type_name']."'";
                    $stmtt = mysqli_query($connect , $stmt);
                    // $result = mysqli_fetch_array($stmtt);
                }else{
                    //คิวรี่ข้อมูลสินค้าทุกรายการ
                    $stmt = "SELECT* FROM product";
                    $stmtt = mysqli_query($connect , $stmt);
                    // $result = mysqli_fetch_array($stmtt);
                }
                    //คิวรี่ข้อมูลประเภทสินค้า
                    $stmPrdType = "SELECT * FROM type ";
                    $stmPrdType = mysqli_query($connect , $stmPrdType);
                    // $resultPrdType = mysqli_fetch_array($stmPrdType);
        
            ?>



                <div class="section22 mb-5">

                    <?php while($resultPrdType = mysqli_fetch_array($stmPrdType)) {  ?>

                    <div class="fincenter ">



                        <a href="?page=store_index&type_name=<?php echo $resultPrdType['type_name'];?>"
                            class="btn btn-outline-primary list-group-item-action">
                            <?php echo $resultPrdType['type_name'];?></a>


                    </div>


                    <?php } ?>


                </div>


                <div class="row">

                    <div class="col-sm-6">


                        <div class="row">

                            <?php 
                        //ถ้ามีการคลิกเลือกประเภทสินค้า 
                        if(isset($_GET['type_name'])){
                            echo '<h4 style="color:black"> หมวดสินค้า : ' .$_GET['type_name'] .'</h4>';
                        }
                        //loop
                        while($row = mysqli_fetch_array($stmtt)) {  ?>

                            <div class="col-sm-6">

                                <a class="text-center btn btn-outline-primary"
                                    href="?page=<?= $_GET['page'] ?>&product_id=<?php echo $row["product_id"];?>&act1=add">
                                    <h5 class="card-title"> <img src="image/<?= $row['product_image'];?>"
                                            width="40%"><br></h5>
                                    <p class="card-text"> จำนวน : <?= $row['product_quantity'];?>
                                        <?php echo $row['product_unit'] ; ?> <br>
                                        ราคา : <?= number_format($row['product_price'],2);?> บาท <br>
                                    </p>
                                </a>

                            </div>

                            <?php } ?>

                        </div>



                    </div>


                    <div class="col-md-6 ">
                        <input type="text" id="show" name="sales_get" value='<?php echo $_SESSION['sales_get'] ; ?>'
                            class="priceget form-control text-end text-red" style="font-size:24px;">

                        <div class="card border-dark">
                            <span id="cart">
                                <table class="table table-hover text-center">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">รายการ</th>
                                            <th scope="col" width="120">จำนวน</th>
                                            <th scope="col" width="150">ราคา/ราคารวม</th>
                                            <th scope="col">ลบ</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                      $total=0;
                                      if(!empty($_SESSION['cart1']))
                                      {
                                          $i = 1 ;
                                        foreach($_SESSION['cart1'] as $product_id=>$product_quantity)
                                        {
                                          $sql = "select * from product where product_id= '$product_id' ";
                                          $query = mysqli_query($connect, $sql);
                                          $row = mysqli_fetch_array($query);
                                          $sum = $row['product_sell'] * $product_quantity;
                                          $total += $sum;
                                          $vat = 0.07 * $total;
                                          ?>

                                       

                                        <tr>
                                            <td>
                                                <figure class="media">
                                                    <div class="img-wrap">
                                                        <img src="image\<?= $row['product_image'];  ?>" width="50px;"
                                                            class="img-thumbnail img-xs" />

                                                    </div>
                                                    <figcaption class="media-body">
                                                        <var
                                                            class="showproduct_name text-danger"><?php echo $row["product_name"] ; ?></var>
                                                        <h6 class="title text-truncate">
                                                            <?php echo $row["product_name"] ; ?>
                                                        </h6>
                                                    </figcaption>
                                                </figure>
                                            </td>
                                            <td class="text-center">
                                                <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group"
                                                    aria-label="...">
                                                    <?php
                                            echo "<input type='text' class='text-center checkvaluenum form-control' name='amount[$product_id]' value='$product_quantity' size='2' autpcomplete='off'/>";
                                            ?>

                                                    <?php if( $product_quantity >  $row['product_quantity'] ){ ?>
                                                    <var class="price text-danger">ไม่พอ</var>

                                                    <?php }else{  ?>
                                                    <var class="price">เพียงพอ</var>

                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="price-wrap">
                                                    <var class="price">ราคา :
                                                        <?php echo number_format($row["product_sell"],2)  ; ?>
                                                        <br> รวม : <?php echo number_format($sum,2)  ; ?></var>
                                                </div>

                                            </td>
                                            <td class="text-right">
                                                <a href='?page=store_index&product_id=<?php echo $product_id ; ?>&act1=remove'
                                                    class="btn btn-outline-danger">
                                                    ลบ</a>
                                            </td>
                                        </tr>

                                    

                                        <?php  } }   ?>

                                    </tbody>

                                </table>



                            </span>

                            <table class="table table-hover shopping-cart-wrap">
                                <tr>
                                    <td colspan="3" class="text-end">ราคาก่อนรวมภาษี</td>
                                    <td class="text-end"><?php echo number_format($total,2)  ; ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-end">ภาษี 7 %</td>
                                    <td class="text-end"><?php echo number_format($vat,2)   ; ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <td colspan="3" class="text-end">ราคาหลังรวมภาษี</td>
                                <td class="text-end"><a id="pricetotal"
                                        value="<?php echo number_format((($total * 0.07) + $total),2) ; ?>"><?php echo number_format((($total * 0.07) + $total),2) ; ?></a>
                                </td>
                                <td></td>
                                <td></td>
                                <tr>

                                </tr>
                            </table>

                            <div class="row ">
                                <div class="col-md-3 mx-2">
                                    ลูกค้า :
                                </div>
                                <div class="col-md-8 mb-2" id="container">
                                    <select type="text" class="form-control" id="customer_name" name="customer_name">
                                        <?php
                                                    $sqlcustomer = "SELECT * FROM customer";
                                                    $querycustomer = mysqli_query($connect, $sqlcustomer);
                                                    foreach ($querycustomer as $datacustomer) : ?>
                                        <option value="<?php echo $datacustomer['customer_name']?>"
                                            <?php echo $_SESSION['customer_name'] ==  $datacustomer['customer_name'] ? ' selected' : ''; ?>>
                                            <?= $datacustomer['customer_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>

                            <?php if((($total * 0.07) + $total) > $_SESSION['sales_get']) { ?>
                            <var class="get" style="display:none;">น้อย</var>
                            <?php } ?>


                        </div>

                        <br>
                        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>


                        <nav class="navbar-light bg-light iBannerFix ">


                            <center>
                                <div class="col-md-12">
                                    <input class="btn btn-secondary mt-2 " style="width:20%;height:20%;font-size:20px;"
                                        type="button" id="txt" value="7" onclick="inputnum(this.value)">
                                    <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                        type="button" id="txt" value="8" onclick="inputnum(this.value)">
                                    <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                        type="button" id="txt" value="9" onclick="inputnum(this.value)">
                                    <button type="submit" class="btn mt-2 btn-secondary" name="submit" value="submit"
                                        style="width:20%;height:20%;font-size:20px;"
                                        onclick="document.getElementById('selectform').reset(); document.getElementById('from').value = null; return false;">
                                        C</button>
                                </div>
                                <div class="col-md-12">
                                    <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                        type="button" id="txt" value="4" onclick="inputnum(this.value)">
                                    <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                        type="button" id="txt" value="5" onclick="inputnum(this.value)">
                                    <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                        type="button" id="txt" value="6" onclick="inputnum(this.value)">
                                    <a class="btn mt-2 btn-success" id="buttonclick_print"
                                        style="width:20%;height:20%;font-size:20px;" type="button"
                                        onclick="window.location='?page=store_index&function=insert1';">ใบเสร็จเต็ม</a>
                                </div>
                                <div class="col-md-12">
                                    <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                        type="button" id="txt" value="1" onclick="inputnum(this.value)">
                                    <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                        type="button" id="txt" value="2" onclick="inputnum(this.value)">
                                    <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                        type="button" id="txt" value="3" onclick="inputnum(this.value)">
                                    <button type="button" class="btn mt-2 btn-primary"
                                        style="width:20%;height:20%;font-size:20px;" id="clickshowinvoice"
                                        type="button">ใบเสร็จย่อ</button>


                                </div>
                                <div class="col-md-12">
                                    <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                        type="button" id="txt" value="0" onclick="inputnum(this.value)">
                                    <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                        type="button" id="txt" value="." onclick="inputnum(this.value)">
                                    <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                        type="button" id="txt" value="00" onclick="inputnum(this.value)">
                                    <button class="btn mt-2 btn-danger" style="width:20%;height:20%;font-size:20px;"
                                        type="submit" name="button" id="buttonclick">ปรับปรุง</button>

                                </div>
                            </center>

                        </nav>

                    </div>



                </div>





            </div>
        </div>


    </div>



    </div>

    </div>



    </div>

</form>

<script src="store.js"></script>


<script>
$(function() {



    //The passed argument has to be at least a empty object or a object with your desired options
    //$("body").overlayScrollbars({ });
    $("#items").height(552);
    $("#items").overlayScrollbars({
        overflowBehavior: {
            x: "hidden",
            y: "scroll"
        }
    });
    $("#cart").height(445);
    $("#cart").overlayScrollbars({});
});
</script>

<script type="text/javascript">
function inputnum(a) {
    document.getElementById("show").value += a;
}
</script>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ใบเสร็จรับเงินแบบย่อ</h5>
            </div>
            <div class="modal-body">
                <form class="forms-sample" enctype="multipart/form-data" method="POST" action="store_insert_sql.php">

                    <div class="row">
                        <div class="col-md-6">
                            <div>ร้านขายยาดาชัย์ By เจ๊แนน</div>
                            <div>เลขที่ 286/3 เขต มีนบุรี </div>
                            <div>เเขวง จังหวัด กรุงเทพมหานคร</div>
                        </div>
                        <!-- <div class="col-md-6">
                            ลูกค้า :
                        </div> -->
                    </div>
                    <p>วันที่ : <?php echo DateThai(date("Y-m-d H:i:s")) ?></p>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <tr>
                            <td colspan="7" class="text-center">
                                <strong>ใบเสร็จรับเงิน</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>ลำดับ</td>
                            <td>ซัพพลายเซน</td>
                            <td>รายการ</td>
                            <td>จำนวน</td>
                            <td class='text-end'>ราคา</td>
                            <td class='text-end'>รวม(บาท)</td>
                        </tr>
                        <?php
                                                                        $connect = mysqli_connect("localhost","root","akom2006","project_new");
                                                                        $i = 1;
                                                                        $product_total = 0;
                                                                        $total = 0;
                                                                        foreach ($_SESSION['cart1'] as $product_id => $product_quantity) {
                                                                        $sql  = "select * from product where product.product_id = '$product_id'";
                                                                        $query  = mysqli_query($connect, $sql);
                                                                        $row  = mysqli_fetch_array($query);
                                                                        $sum  = $row['product_sell'] * $product_quantity;
                                                                        $total += $sum;
                                                                        $vat = 0.07 * $total;
                                                                        $product_total = $total + $vat;
                                                                        echo "<tr>";
                                                                        echo "<td>" . $i++ . "</td>";
                                                                        echo "<td>" . $row["product_suppiles"] . "</td>";
                                                                        echo "<td>" . $row["product_name"] . "</td>";
                                                                        echo "<td>" . $product_quantity . "</td>";
                                                                        echo "<td class='text-end'>" . number_format($row['product_sell'], 2) . "</td>";
                                                                        echo "<td class='text-end'>" . number_format($sum, 2) . "</td>";
                                                                        echo "</tr>";
                                                                    }
                                                                    echo "<td colspan='5'><b>ราคารวม</b></td>";
                                                                    echo "<td class='text-end'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";

                                                                    echo "</tr>";
                                                                    echo "<td colspan='5'><b>ภาษี(7%)</b></td>";
                                                                    echo "<td class='text-end'>" . "<b>" . number_format($vat, 2) . "</b>" . "</td>";

                                                                    echo "</tr>";
                                                                    echo "<td colspan='5'><b>ราคารวมภาษี</b></td>";
                                                                    echo "<td class='text-end'>" . "<b>" . number_format($product_total, 2) . "</b>" . "</td>";

                                                                    echo "</tr>";
                                                                            ?>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="closemodal">ปิด</button>
                        <input type="submit" name="submit" class="btn btn-success text-white buttonr m-2"
                            value="ยืนยันการสั่งซื้อสินค้า" />
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>