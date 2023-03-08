<?php session_start() ; ?>

<?php require 'includedb/condb.php'  ; 


?>
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

    <?php 

$strKeyword = null;

if(isset($_POST["txtKeyword"]))
{
    $strKeyword = $_POST["txtKeyword"];
}

    $sql = "SELECT * FROM akksofttech_customer WHERE  cus_id = '".$_SESSION['akksofttechsess_cusid']."'  ";
    
    $query = mysqli_query($conn , $sql);
    
    $result = mysqli_fetch_array($query); 

    $poid = " SELECT COUNT(akksofttech_purchase_order.po_id) as poid_count FROM akksofttech_purchase_order
    WHERE akksofttech_purchase_order.cus_id = '".$_SESSION['akksofttechsess_cusid']."' " ;
    $query = mysqli_query($conn,$poid);
    $respoid = mysqli_fetch_array($query); 


    ?>


    <section class="hero mt-3">
        <div class="container">


            <?php               
        $totoprice = 0 ;
         $sss = "SELECT * FROM akksofttech_purchase_order  
        WHERE cus_id = '".$_SESSION['akksofttechsess_cusid']."'  ORDER BY po_start_date DESC" ; 
        $qqq = mysqli_query($conn , $sss) ; 


        $poid_pay = " SELECT * FROM akksofttech_payment INNER JOIN akksofttech_purchase_order ON akksofttech_payment.po_id = akksofttech_purchase_order.po_id
        WHERE akksofttech_purchase_order.cus_id = '".$_SESSION['akksofttechsess_cusid']."' " ;
         $query_pay = mysqli_query($conn,$poid_pay);
         $respoid_pay = mysqli_fetch_array($query_pay); 

        while($row = mysqli_fetch_array($qqq)){  ;       

            $newDate = date("d/m/Y H:i", strtotime($row['po_start_date']));
    ?>

            <div class="card mt-4" id="container">

                <div class="card-header">

                    <div class="row">

                        <div class="col-md-8">
                            Order ID : # <?php echo $row['po_id'] ; ?>
                        </div>

                        <div class="col-md-4">
                            Date : <?php echo  $newDate ; ?>
                        </div>

                    </div>


                    <?php 

            $totoprice = 0 ; 

           $pod ="SELECT *
            FROM  akksofttech_phrchaes_order_detail 
            WHERE cus_id = '".$_SESSION['akksofttechsess_cusid']."'  AND po_id = '".$row['po_id']."' " ;
            $respod = mysqli_query($conn,$pod) or die ("error ".mysqli_error($conn));

          while ($row2 = mysqli_fetch_array($respod)) {

          $totoprice += $row2['prod_price'] * $row2['quantity'];
           
          $toto = $row2['prod_price'] * $row2['quantity']; 

            ?>

                    <?php }   ?>


                    <!-- <div class="row mt-3"> -->

                    <div style="float:left;">
                        Price : <?php echo number_format($totoprice,2,'.',','); ?>
                    </div>

                    <div style="float:right;">


                        <?php 
                                        if($row['po_status'] == 1){
                                            
                                          echo "<span class='btn primary-btndet1'>UNPAID</span>";
                                              
                                          }elseif($row['po_status'] == 2){
                                            
                                            echo "<span class='btn primary-btncon1 text-white'>Wait for Confirm</span>";
                                             
                                          }elseif($row['po_status'] == 3){
                                            
                                            echo "<span class='btn primary-btnship1'>Preparing Food</span>";
                                            
                                          }
                                          elseif($row['po_status'] == 4){
                                            
                                            echo "<span class='btn primary-btnshipp1'>Delivering</span>";
                                            
                                          }elseif($row['po_status'] == 5){
                                            
                                            echo "<span class='btn primary-btncom1'>Delivery Completed</span>";
                                            
                                        }elseif($row['po_status'] == 7){
                                            
                                            echo "<span class='btn primary-btncon1 text-white'>Wait for Confirm</span>";
                                            
                                          }else{

                                            echo "<span class='btn primary-btndet1'>CANCEL</span>";

                                          }
                                       ?>
                    </div>

                    <!-- </div> -->




                </div>


                <div class="" style="padding:0px 15px;">

                    <!-- <style>
</style> -->


                    <?php  if($row['po_status'] == 1){ ?>
                    <a class="mt-2" style="float:left;">Cash of Delivery</a>
                    <seme style="float:right;">
                        <a type="button" href="bank_profile.php?po_id=<?php echo $row['po_id']; ?>"
                            class=" m-1 btn primary-btndet">pay</a>
                        <a type="button" class="m-1 btn primary-btndet text-white cancel_po text-white"
                            data-id='<?php echo $row['po_id'] ; ?>'>cancel</a>
                        <a type="button" href="detail_po.php?po_id=<?php echo $row['po_id']; ?>"
                            class="m-1 btn primary-btnshipp">View</a>
                    </seme>




                    <?php  }else if($row['po_status'] == 7){ ?>
                    <a class="mt-2" style="float:left;">Cash of Delivery</a>
                    <seme style="float:right;">
                        <a type="button" href="detail_po.php?po_id=<?php echo $row['po_id']; ?>"
                            class="m-1 btn primary-btnshipp">View</a>
                    </seme>




                    <?php  }else if($row['po_status'] == 2 && $respoid_pay['pay_cus_id'] != 0 ){ ?>
                    <a class="mt-2" style="float:left;">Tranfer Money </a>
                    <seme style="float:right;">
                        <a type="button" href="detail_po.php?po_id=<?php echo $row['po_id']; ?>"
                            class="m-1 btn primary-btnshipp">View</a>
                    </seme>




                    <?php  }else if($row['po_status'] == 3 && $respoid_pay['pay_cus_id'] == 0 ){ ?>
                    <a class="mt-2" style="float:left;">Cash of Delivery</a>
                    <seme style="float:right;">

                        <a type="button" href="detail_po.php?po_id=<?php echo $row['po_id']; ?>"
                            class="m-1 btn primary-btnshipp">View</a>
                    </seme>




                    <?php  }else if($row['po_status'] == 3 && $respoid_pay['pay_cus_id'] != 0 ){ ?>
                    <a class="mt-2" style="float:left;">Tranfer Money </a>
                    <seme style="float:right;">

                        <a type="button" href="detail_po.php?po_id=<?php echo $row['po_id']; ?>"
                            class="m-1 btn primary-btnshipp">View</a>
                    </seme>




                    <?php }else if($row['po_status'] == 4 && $respoid_pay['pay_cus_id'] == 0 ){ ?>
                    <a class="mt-2" style="float:left;">Cash of Delivery</a>
                    <seme style="float:right;">
                        <a type="button" class="btn primary-btnwar receive_po text-white"
                            data-id='<?php echo $row['po_id'] ; ?>'>received</a>
                        <a type="button" href="detail_po.php?po_id=<?php echo $row['po_id']; ?>"
                            class="btn primary-btnshipp">View</a>
                    </seme>




                    <?php }else if($row['po_status'] == 4 && $respoid_pay['pay_cus_id'] != 0 ){ ?>
                    <a class="mt-2" style="float:left;">Tranfer Money </a>
                    <seme style="float:right;">
                        <a type="button" class="btn primary-btnwar receive_po text-white"
                            data-id='<?php echo $row['po_id'] ; ?>'>received</a>
                        <a type="button" href="detail_po.php?po_id=<?php echo $row['po_id']; ?>"
                            class="btn primary-btnshipp">View</a>
                    </seme>




                    <?php  }else if($row['po_status'] == 5 && $respoid_pay['pay_cus_id'] == 0 ){ ?>
                    <a class="mt-2" style="float:left;">Cash of Delivery</a>
                    <seme style="float:right;">
                        <a type="button" href="detail_po.php?po_id=<?php echo $row['po_id']; ?>"
                            class="m-1 btn primary-btnshipp">View</a>
                    </seme>




                    <?php  }else if($row['po_status'] == 5 && $respoid_pay['pay_cus_id'] != 0 ){ ?>
                    <a class="mt-2" style="float:left;">Tranfer Money </a>
                    <seme style="float:right;">
                        <a type="button" href="detail_po.php?po_id=<?php echo $row['po_id']; ?>"
                            class="m-1 btn primary-btnshipp">View</a>
                    </seme>


                    <?php  }else if($row['po_status'] == 6 && $respoid_pay['pay_cus_id'] == 0 ){ ?>
                    <a class="mt-2" style="float:left;">Cash of Delivery</a>
                    <seme style="float:right;">
                        <a type="button" href="detail_po.php?po_id=<?php echo $row['po_id']; ?>"
                            class="m-1 btn primary-btnshipp">View</a>
                    </seme>



                    <?php  }else if($row['po_status'] == 6 && $respoid_pay['pay_cus_id'] != 0 ){ ?>
                    <a class="mt-2" style="float:left;">Tranfer Money </a>
                    <seme style="float:right;">
                        <a type="button" href="detail_po.php?po_id=<?php echo $row['po_id']; ?>"
                            class="m-1 btn primary-btnshipp">View</a>
                    </seme>

                    <?php } ?>



                </div>




            </div>



            <?php }   ?>









        </div>
    </section>




</body>

</html>