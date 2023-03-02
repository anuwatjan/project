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
<script src="serve/bank.js"></script>
<script src="serve/function.js"></script>

<?php require 'includedb/condb.php' ?>

<?php

if( $_GET['po_id'] != 0){
   
       
   $sql = "SELECT * FROM akksofttech_purchase_order 
   WHERE  po_id = '".$_GET['po_id']."' AND cus_id = '".$_SESSION['akksofttechsess_cusid']."'  ";
   
   $query = mysqli_query($conn , $sql);
   
   $result = mysqli_fetch_array($query); 
   
   }
   
   ?>

<body>

    <?php include 'nav.php' ; ?>

    <style>
.modal-dialog {
    -webkit-transform: translate(0, -50%);
    -o-transform: translate(0, -50%);
    transform: translate(0, -50%);
    top: 30%;
    margin: 0 auto;
}
    </style>


    <?php
   $sql2 ="SELECT *
   
   FROM akksofttech_purchase_order  AS po WHERE po.po_id = '".$_GET['po_id']."' " ;
   $result2 = mysqli_query($conn,$sql2) or die ("error ".mysqli_error($conn));
   $row = mysqli_fetch_array($result2);
   $newDate = date("d/m/Y H:i", strtotime($row['po_start_date']));
   
   $sql3 ="SELECT *
   FROM akksofttech_payment WHERE akksofttech_payment.po_id = '".$_GET['po_id']."' " ;
   $result3 = mysqli_query($conn,$sql3) or die ("error ".mysqli_error($conn));
   $row3 = mysqli_fetch_array($result3);
   
   
   
   
   $poid_pay = " SELECT * FROM akksofttech_payment INNER JOIN akksofttech_purchase_order ON akksofttech_payment.po_id = akksofttech_purchase_order.po_id
   WHERE akksofttech_purchase_order.cus_id = '".$_SESSION['akksofttechsess_cusid']."' " ;
   $query_pay = mysqli_query($conn,$poid_pay);
   $respoid_pay = mysqli_fetch_array($query_pay); 
   
   ?>


    <input type="text" name="po_id" id="po_id" style="display:none;" value="<?php echo $_GET['po_id'] ; ?>">
    <input type="text" name="sto_id" id="sto_id" style="display:none;" value="<?php echo $result['sto_id'] ; ?>">



    <section class="hero mt-3">

        <div class="container">




            <div class="row text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ORDER : </th>
                            <th scope="col">DATE : </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" style="font-size:24px;"> # <?php echo $_GET['po_id'] ; ?></th>
                            <td> <?php echo $newDate ; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="pt-2">
                                <?php if($result['po_status'] == 1){ ?>
                                <p class="text-white main-btn primary-btncon">UNPAID</p>
                                / Cash of Delivery
                                <?php }else if  ($result['po_status'] == 2 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
                                <p class="text-white main-btn primary-btncon1">Wait for Confirm</p>
                                / TRANFER MONEY
                                <?php }else if  ($result['po_status'] == 7){ ?>
                                <p class="text-white main-btn primary-btncon">Wait for Confirm</p>
                                / Cash of Delivery
                                <?php }else if  ($result['po_status'] == 3 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
                                <p class="text-white main-btn primary-btnship1">Preparing Food</p>
                                / TRANFER MONEY
                                <?php }else if  ($result['po_status'] == 3 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
                                <p class="text-white main-btn primary-btnship1">Preparing Food</p>
                                / Cash of Delivery
                                <?php }else if  ($result['po_status'] == 4 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
                                <p class="text-white main-btn primary-btnshipp1">Delivering</p>
                                / TRANFER MONEY
                                <?php }else if  ($result['po_status'] == 4 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
                                <p class="text-white main-btn primary-btnshipp1">Delivering</p>
                                / Cash of Delivery
                                <?php }else if  ($result['po_status'] == 5 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
                                <p class="text-white main-btn primary-btncom1"> Delivery Completed</p>
                                / TRANFER MONEY
                                <?php }else if  ($result['po_status'] == 5 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
                                <p class="text-white main-btn primary-btncom1"> Delivery Completed</p>
                                / Cash of Delivery
                                <?php }else if  ($result['po_status'] == 7 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
                                <p class="text-white main-btn primary-btncon1">Wait for Confirm</p>
                                / TRANFER MONEY
                                <?php }else if  ($result['po_status'] == 7 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
                                <p class="text-white main-btn primary-btncon1">Wait for Confirm</p>
                                / Cash of Delivery
                                <?php }else if  ($result['po_status'] == 6 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
                                <p class="text-white main-btn primary-btndet1">Cancel</p>
                                / TRANFER MONEY
                                <?php }else if  ($result['po_status'] == 6 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
                                <p class="text-white main-btn primary-btndet1">Cancel</p>
                                / Cash of Delivery
                                <?php }?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <?php if($result['po_status'] == "7" || $result['po_status'] == "1" || $result['po_status'] == "6"  ){ ?>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ACCOUNT</h5>
                            <p>User Name : <?php echo $result['cus_name'] ; ?></p>
                            <p>Sur Name : <?php echo $result['cus_surname'] ; ?></p>
                            <p>Phone Number :<?php echo $result['cus_phone'] ; ?></p>
                            <p>Address : <?php echo $result['cus_address'] ; ?> <?php echo $result['cus_province'] ; ?>
                                <?php echo $result['cus_zipcode'] ; ?></p>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ACCOUNT</h5>
                            <p>User Name : <?php echo $result['cus_name'] ; ?></p>
                            <p>Sur Name : <?php echo $result['cus_surname'] ; ?></p>
                            <p>Phone Number :<?php echo $result['cus_phone'] ; ?></p>
                            <p>Address : <?php echo $result['cus_address'] ; ?> <?php echo $result['cus_province'] ; ?>
                                <?php echo $result['cus_zipcode'] ; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if($result['po_status'] == "7" || $result['po_status'] == "1" || $result['po_status'] == "6"  ){ ?>
                <?php }else{ ?>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">PAYMENT</h5>
                            <p>Account Name : <?php  echo $row3['bac_name'] ;  ?></p>
                            <p>Bank Name : <?php echo $row3['bac_account'] ; ?> </p>
                            <p>Account Num : <?php  echo $row3['bac_number'] ;  ?></p>
                            <p>Amount : <?php   echo  number_format($row3['amount'],2,'.',',') ;  ?> | Date :
                                <?php  echo date("d/m/Y H:i", strtotime($row3['tranfer_date'])) ; ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <br>
            <h4> ORDER DETAILS
                <?php if($result['po_status'] == "7" || $result['po_status'] == "1" || $result['po_status'] == "6"  ){ ?>
                <?php }else{ ?>
                <button id="paymentslip" data-id="<?php echo $row3['po_id']; ?>" style="border:none;"
                    class="main-btn primary-btn2">VIEW SLIP</button>
                <?php } ?>
            </h4>

            <div class="row justify-content-center mt-3">
                <div class="col-lg-12">
                    <div class="checkout-sidebar-accordion mt-50">
                        <div class="row">
                            <?php if($result['po_status'] == "7" || $result['po_status'] == "1" || $result['po_status'] == "6"  ){ ?>
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">#</th>
                                            <th class="text-center" colspan="2" scope="col">Product</th>
                                            <th class="text-center" scope="col">Qty</th>
                                            <th class="text-center" scope="col">Price</th>
                                            <th class="text-center" scope="col">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                           $i = 1; 
                           $totoprice = 0 ; 
                           $pod ="SELECT *
                           FROM akksofttech_phrchaes_order_detail 
                           
                           WHERE cus_id = '".$_SESSION['akksofttechsess_cusid']."'  AND po_id = '".$_GET['po_id']."' " ;
                           $respod = mysqli_query($conn,$pod) or die ("error ".mysqli_error($conn));
                           
                           while ($row2 = mysqli_fetch_array($respod)) {
                           
                           $totoprice += $row2['prod_price'] * $row2['quantity']; 
                           $toto = $row2['prod_price'] * $row2['quantity'];                
                           ?>
                                        <tr>
                                            <th class="text-center" scope="row"><?php echo $i++ ?></th>
                                            <!-- <td colspan="2">  
                              <?php if($row2['sprod_id'] == 0 ){ ?>
                              <img src="../backend/getimg/prod/<?php echo $row2['prod_image'];?>"
                                  height="80px;" width="80px;">
                              <?php }else if($row2['sprod_id'] != 0  && $row2['sprodone_id'] == 0){ ?>
                              <img src="../backend/getimg/sprod/<?php echo $row2['prod_image'];?>"
                                  height="80px;" width="80px;">
                              <?php }else if($row2['sprod_id'] != 0 && $row2['sprodone_id'] != 0 ){ ?>
                              <img src="../backend/getimg/sprodone/<?php echo $row2['prod_image'];?>"
                                  height="80px;" width="80px;">
                              <?php } ?></td> -->
                                            <td colspan="2">
                                                <?php if($row2['sprod_id'] == 0 ){ ?>
                                                <?php echo $row2['prod_name'];?>
                                                <?php }else if($row2['sprod_id'] != 0  && $row2['sprodone_id'] == 0){ ?>
                                                <?php echo $row2['prod_name'];?>
                                                <br>
                                                - <?php echo $row2['sprod_name'];?>
                                                <?php }else if($row2['sprod_id'] != 0 && $row2['sprodone_id'] != 0 ){ ?>
                                                <?php echo $row2['prod_name'];?>
                                                <br>
                                                - <?php echo $row2['sprod_name'];?>
                                                <br>
                                                - <?php echo $row2['sprodone_name'];?>
                                                <?php } ?>
                                                <?php if(($row2['message'] != "-")){ ?>
                                                <br>
                                                NOTE : <?php echo $row2['message'] ; ?>
                                                <?php }else{ echo "" ; } ?>
                                                <br>
                                            </td>
                                            <td class="text-center"><?php echo $row2['quantity'];?></td>
                                            <td class="text-right">
                                                <?php echo number_format($row2['prod_price'],2,'.',',');?>
                                            </td>
                                            <td class="text-right"><?php echo number_format($toto,2,'.',',');?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr class="bg-danger text-white">
                                            <td colspan="5" class="text-center">Total Price All</td>
                                            <td class="text-right"><?php echo number_format($totoprice,2,'.',',');?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php }else{ ?>
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">#</th>
                                            <th class="text-center" colspan="2" scope="col">Product</th>
                                            <th class="text-center" scope="col">Qty</th>
                                            <th class="text-center" scope="col">Price</th>
                                            <th class="text-center" scope="col">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                           $i = 1; 
                           $totoprice = 0 ; 
                           $pod ="SELECT *
                           FROM akksofttech_phrchaes_order_detail 
                           
                           WHERE cus_id = '".$_SESSION['akksofttechsess_cusid']."'  AND po_id = '".$_GET['po_id']."' " ;
                           $respod = mysqli_query($conn,$pod) or die ("error ".mysqli_error($conn));
                           
                           while ($row2 = mysqli_fetch_array($respod)) {
                           
                           $totoprice += $row2['prod_price'] * $row2['quantity']; 
                           $toto = $row2['prod_price'] * $row2['quantity'];                
                           ?>
                                        <tr>
                                            <th class="text-center" scope="row"><?php echo $i++ ?></th>
                                            <!-- <td colspan="2">  
                              <?php if($row2['sprod_id'] == 0 ){ ?>
                              <img src="../backend/getimg/prod/<?php echo $row2['prod_image'];?>"
                                  height="80px;" width="80px;">
                              <?php }else if($row2['sprod_id'] != 0  && $row2['sprodone_id'] == 0){ ?>
                              <img src="../backend/getimg/sprod/<?php echo $row2['prod_image'];?>"
                                  height="80px;" width="80px;">
                              <?php }else if($row2['sprod_id'] != 0 && $row2['sprodone_id'] != 0 ){ ?>
                              <img src="../backend/getimg/sprodone/<?php echo $row2['prod_image'];?>"
                                  height="80px;" width="80px;">
                              <?php } ?></td> -->
                                            <td colspan="2">
                                                <?php if($row2['sprod_id'] == 0 ){ ?>
                                                <?php echo $row2['prod_name'];?>
                                                <?php }else if($row2['sprod_id'] != 0  && $row2['sprodone_id'] == 0){ ?>
                                                <?php echo $row2['prod_name'];?>
                                                <br>
                                                - <?php echo $row2['sprod_name'];?>
                                                <?php }else if($row2['sprod_id'] != 0 && $row2['sprodone_id'] != 0 ){ ?>
                                                <?php echo $row2['prod_name'];?>
                                                <br>
                                                - <?php echo $row2['sprod_name'];?>
                                                <br>
                                                - <?php echo $row2['sprodone_name'];?>
                                                <?php } ?>
                                                <?php if(($row2['message'] != "-")){ ?>
                                                <br>
                                                NOTE : <?php echo $row2['message'] ; ?>
                                                <?php }else{ echo "" ; } ?>
                                                <br>
                                            </td>
                                            <td class="text-center"><?php echo $row2['quantity'];?></td>
                                            <td class="text-right">
                                                <?php echo number_format($row2['prod_price'],2,'.',',');?>
                                            </td>
                                            <td class="text-right"><?php echo number_format($toto,2,'.',',');?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr class="bg-danger text-white">
                                            <td colspan="5" class="text-center">Total Price All</td>
                                            <td class="text-right"><?php echo number_format($totoprice,2,'.',',');?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php }
                  ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>



    <!-- Modal -->
    <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog  modal-lg">
            <form class="modal-content">

                <div class="modal-body">
                    <div id="show_payment"> </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close_modal" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        CLOSE
                    </button>
                </div>
            </form>
        </div>
    </div>




</body>

</html>