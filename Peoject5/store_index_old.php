<?php
session_start(); 
?>
<!-- <link href="assets_store/css/ui.css" rel="stylesheet" type="text/css" /> -->
<link href="assets_store/fonts/fontawesome/css/fontawesome-all.min.css" type="text/css" rel="stylesheet" />
<link href="assets_store/css/OverlayScrollbars.css" type="text/css" rel="stylesheet" />
<!-- Font awesome 5 -->
<style>
       ::-webkit-scrollbar {
        -webkit-appearance: none;
        width: 0px;
    }
</style>
<?php
        require 'functionDateThaiOnTime.php';
    require 'store_order.php' ;
$con = mysqli_connect("localhost", "root", "akom2006", "project");
if (isset($_GET['cate_id']) & isset($_GET['cate_name'])) {
  $cate_id = $_GET['cate_id'];
  $sql = "SELECT DISTINCT(a.product_id) , a.product_img , b.product_price_sell as product_price_sell    , a.product_quantity AS product_quantity , a.product_name ,
   a.product_id , b.product_price_id , b.product_price_cost as product_price_cost  
  FROM product a join product_price b ON a.product_id = b.product_id
  JOIN product_quantity c ON a.product_id = c.product_id
  INNER JOIN product_date e ON a.product_id = e.product_id
   WHERE product_category ='$cate_id' AND c.status = '0' 
   AND e.product_end_date > CURDATE() '";
  $query = mysqli_query($con, $sql);
} else {
  $sql = "SELECT DISTINCT(a.product_id) , a.product_img , a.product_quantity AS product_quantity  , b.product_price_sell as product_price_sell ,  a.product_name ,
  a.product_id , b.product_price_id , b.product_price_cost as product_price_cost  
  FROM product a join product_price b ON a.product_id = b.product_id 
  JOIN product_quantity c ON a.product_id = c.product_id 
  INNER JOIN product_date e ON a.product_id = e.product_id
  WHERE  c.status = '0'  AND e.product_end_date > CURDATE() 
  ";
  $query = mysqli_query($con, $sql);
}

$sql2 = "SELECT * FROM category";
$query2  = mysqli_query($con, $sql2);
?>

<!-- ========================= SECTION CONTENT ========================= -->
<form method="POST" action="?page=store_index&act1=update">
    <ul class="nav bg radius nav-pills nav-fill mb-3 bg" role="tablist">
        <li class="nav-item">
            <a class="nav-link active show btn btn-sm" data-toggle="pill" href="?page=<?= $_GET['page'] ?>">
                <i class="fa fa-tags"></i> ทั้งหมด</a>
        </li>
        <?php while ($row = mysqli_fetch_assoc($query2)) {  ?>
        <li class="nav-item ">
            <a type="button" class="nav-link btn btn-sm" data-toggle="pill" href="#nav-tab-paypal"
                href="?page=<?= $_GET['page'] ?>&cate_id=<?= $row['cate_id'] ?>&cate_name=<?= $row['cate_name']; ?>">
                <?= $row['cate_name']; ?></a>
        </li>
        <?php } ?>
    </ul>
    <section class="section-content padding-y-sm bg-default">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5  padding-y-sm ">
                    <div style="margin:1px; width:100%; height:80%; overflow: auto;">
                        <span id="items">
                            <div class="row mt-2">
                                <?php  while ($row = mysqli_fetch_array($query)) {  ?>
                                <div class="col-md-6">
                                    <figure class=" card-product">
                                        <a class="text-center"
                                            href="?page=<?= $_GET['page'] ?>&product_id=<?php echo $row["product_id"];?>&act1=add">
                                            <span class="badge-new text-right">จำนวน :
                                                <?php  echo $row['product_quantity'];?></span>
                                            <div class="img-wrap">
                                                <img src="image\<?= $row['product_img']; ?>" style="width:30%;">

                                            </div>
                                            <figcaption class="info-wrap">
                                                <a href="#" class="title"><?= $row['product_name']; ?></a>
                                                <div class="action-wrap">

                                                    <div class="price-wrap ">
                                                        <span class="price-new">ราคา
                                                            :<?php echo $row['product_price_sell'];?></span>
                                                    </div> <!-- price-wrap.// -->
                                                </div> <!-- action-wrap -->
                                            </figcaption>
                                        </a>
                                    </figure> <!-- card // -->
                                </div> <!-- col // -->
                                <?php } ?>

                            </div> <!-- row.// -->
                        </span>
                    </div>
                </div>

                <div class="col-md-7">
                    <input type="text" id="show" name="sales_get" class="mt-2 form-control text-right text-red"
                        style="font-size:30px;">

                    <div class="card">
                        <span id="cart">
                            <table class="table table-hover shopping-cart-wrap">
                                <thead class="text-muted">
                                    <tr>
                                        <th scope="col">รายการ</th>
                                        <th scope="col">จำนวน</th>
                                        <th scope="col" width="120">ราคา</th>
                                        <th scope="col" width="120">ราคารวม</th>
                                        <th scope="col" class="text-right" width="200">ลบ</th>
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
                                          $sql = "select * from product inner join product_price on product.product_id = product_price.product_id 
                                          where product.product_id= '$product_id' ";
                                          $query = mysqli_query($con, $sql);
                                          $row = mysqli_fetch_array($query);
                                          $sum = $row['product_price_sell'] * $product_quantity;
                                          $total += $sum;
                                      //     echo "<tr>";
                                      //     echo "<td>" . $i++  . "</td>";
                                      // echo "<td width='350'>" . $row["product_name"] . "</td>";
                                      // echo "<td width='60' align='right'>" .number_format($row["product_price_cost"],2) . "</td>";
                                      // echo "<td width='60' align='right'>";  
                                      // echo "<input type='text' name='amount[$product_id]' value='$product_quantity' size='2' autpcomplete='off'/></td>";
                                      // echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
                                      // echo "<td width='120' align='center'><a class='btn btn-danger btn-sm' href='?page=store_index&product_id=$product_id&act1=remove'>ลบรายการ</a></td>";
                                      // echo "</tr>";
                                          ?>

                                    <tr>
                                        <td>
                                            <figure class="media">
                                                <div class="img-wrap">
                                                    <img src="image\<?= $row['product_img'];  ?>" width="50px;"
                                                        class="img-thumbnail img-xs" />

                                                </div>
                                                <figcaption class="media-body">
                                                    <h6 class="title text-truncate"><?php echo $row["product_name"] ; ?>
                                                    </h6>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td class="text-center">
                                            <div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group"
                                                aria-label="...">
                                                <?php
                                            echo "<input type='text' name='amount[$product_id]' value='$product_quantity' size='2' autpcomplete='off'/>";
                                            ?>
                                                <?php if( $product_quantity >  $row['product_quantity'] ){ ?>
                                                <var class="price text-danger"> ไม่พอ</var>
                                                <?php }else{  ?>
                                                <var class="price">เพียงพอ</var>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var
                                                    class="price"><?php echo number_format($row["product_price_sell"],2)  ; ?></var>
                                            </div>
                                            <!-- price-wrap .// -->
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="price"><?php echo number_format($sum,2)  ; ?></var>
                                            </div>
                                            <!-- price-wrap .// -->
                                        </td>
                                        <td class="text-right">
                                            <a href='?page=store_index&product_id=<?php echo $product_id ; ?>&act1=remove'
                                                class="btn btn-outline-danger">
                                                <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <?php  }
                            }
                            ?>

                                </tbody>

                            </table>



                        </span>

                        <table class="table table-hover shopping-cart-wrap">
                            <tr>
                                <td colspan="4" class="text-right">ราคาก่อนรวมภาษี</td>
                                <td class="text-right"><?php echo number_format($sum,2)  ; ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">ภาษี</td>
                                <td class="text-right"><?php echo number_format(7,2)   ; ?>%</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <td colspan="4" class="text-right">ราคาหลังรวมภาษี</td>
                            <td class="text-right"><?php echo number_format((($sum * 0.07) + $sum),2) ; ?></td>
                            <td></td>
                            <td></td>
                            <tr>

                            </tr>
                        </table>

                        <div class="row ">
                            <div class="col-md-2">
                                ลูกค้า :
                            </div>
                            <div class="col-md-9">
                                <select type="text" class="form-control" name="customer_id">
                                    <?php
                                                    $sqlcustomer = "SELECT * FROM customer";
                                                    $querycustomer = mysqli_query($con, $sqlcustomer);
                                                    foreach ($querycustomer as $datacustomer) : ?>
                                    <option value="<?= $datacustomer['customer_id'] ?>">
                                        <?= $datacustomer['customer_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


                        </div>


                    </div>





                    <nav class="navbar-light bg-light">


                        <center>
                            <div class="col-md-12">
                                <input class="btn btn-secondary mt-2 " style="width:20%;height:20%;font-size:20px;"
                                    type="button" id="txt" value="7" onclick="inputnum(this.value)">
                                <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                    type="button" id="txt" value="8" onclick="inputnum(this.value)">
                                <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                    type="button" id="txt" value="9" onclick="inputnum(this.value)">
                                <button class="btn mt-2 btn-danger" style="width:20%;height:20%;font-size:20px;"
                                    type="submit" name="button" id="button">ปรับปรุง</button>
                            </div>
                            <div class="col-md-12">
                                <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                    type="button" id="txt" value="4" onclick="inputnum(this.value)">
                                <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                    type="button" id="txt" value="5" onclick="inputnum(this.value)">
                                <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                    type="button" id="txt" value="6" onclick="inputnum(this.value)">
                                <a class="btn mt-2 btn-success" style="width:20%;height:20%;font-size:20px;"
                                    type="button"
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
                                    style="width:20%;height:20%;font-size:20px;" data-toggle="modal"
                                    data-target="#exampleModal" type="button">ใบเสร็จย่อ</button>


                            </div>
                            <div class="col-md-12">
                                <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                    type="button" id="txt" value="0" onclick="inputnum(this.value)">
                                <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                    type="button" id="txt" value="." onclick="inputnum(this.value)">
                                <input class="btn btn-secondary mt-2" style="width:20%;height:20%;font-size:20px;"
                                    type="button" id="txt" value="00" onclick="inputnum(this.value)">
                                <button type="submit" class="btn mt-2 btn-info" name="submit" value="submit"
                                    style="width:20%;height:20%;font-size:20px;">
                                    ขาย</button>
                                <!-- <a class="btn mt-2 btncolor" style="width:20%;height:20%;font-size:40px;"
                                        type="button"><img src="../images/money.png" style="width:50%;height:50%;"></a> -->
                            </div>
                        </center>

                    </nav>

                </div>

            </div>
        </div>

        <!-- container //  -->
    </section>
    </from>
    <!-- ========================= SECTION CONTENT END// ========================= -->
    <script src="assets_store/js/jquery-2.0.0.min.js" type="text/javascript"></script>
    <script src="assets_store/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets_store/js/OverlayScrollbars.js" type="text/javascript"></script>
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



    </body>

    </html>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ใบเสร็จรับเงิน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" enctype="multipart/form-data" method="POST"
                        action="store_insert_sql.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div>ร้านขายยาดาชัย์ By เจ๊แนน</div>
                                <div>เลขที่ 286/3 เขต มีนบุรี </div>
                                <div>เเขวง จังหวัด กรุงเทพมหานคร</div>
                            </div>
                            <div class="col-md-6">
                                ลูกค้า : <?php 
                                                    $sqll = "SELECT customer_name  FROM customer WHERE customer_id = '".$_POST['customer_id']."'" ; 
                                                    $qqq = mysqli_query($con , $sqll);
                                                    $rrr = mysqli_fetch_array($qqq);
                                                    echo $rrr['customer_name']?>
                            </div>
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
                                                                        $connect = mysqli_connect("localhost","root","akom2006","project");
                                                                        $i = 1;
                                                                        $product_total = 0;
                                                                        $total = 0;
                                                                        foreach ($_SESSION['cart1'] as $product_id => $product_quantity) {
                                                                        $sql  = "select * from product 
                                                                        INNER JOIN product_price on product.product_id = product_price.product_id 
                                                                        inner join suppiles on product.suppiles_id =  suppiles.suppiles_id
                                                                        where product.product_id = '$product_id'";
                                                                        $query  = mysqli_query($connect, $sql);
                                                                        $row  = mysqli_fetch_array($query);
                                                                        $sum  = $row['product_price_sell'] * $product_quantity;
                                                                        $total += $sum;
                                                                        $vat = 0.07 * $total;
                                                                        $product_total = $total + $vat;
                                                                        echo "<tr>";
                                                                        echo "<td>" . $i++ . "</td>";
                                                                        echo "<td>" . $row["suppiles_name"] . "</td>";
                                                                        echo "<td>" . $row["product_name"] . "</td>";
                                                                        echo "<td>" . $product_quantity . "</td>";
                                                                        echo "<td class='text-end'>" . number_format($row['product_price_sell'], 2) . "</td>";
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <input type="submit" name="submit" class="btn btn-success text-white buttonr m-2"
                                value="ยืนยันการสั่งซื้อสินค้า" />
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>