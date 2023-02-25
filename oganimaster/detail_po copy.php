<?php
   @session_start();
   
   require 'includedb/condb.php'; 
   
   
   if( $_GET['po_id'] != 0){
   
       
   $sql = "SELECT * FROM akksofttech_purchase_order 
   WHERE  po_id = '".$_GET['po_id']."' AND cus_id = '".$_SESSION['akksofttechsess_cusid']."'  ";
   
   $query = mysqli_query($conn , $sql);
   
   $result = mysqli_fetch_array($query); 
   
   }
   
   ?>
<style>
   @font-face {
   font-family: myFirstFont;
   src: url('font/yikes_medium-webfont.ttf'), url('font/yikes_medium-webfont.eot')
   }
   body,
   strong,
   h5,
   p,
   ul,
   li,
   span,
   h1,
   h2,
   h3,
   h4,
   table,
   tr,
   td {
   font-family: myFirstFont;
   font-weight: bold;
   }
.modal-dialog {
    -webkit-transform: translate(0,-50%);
    -o-transform: translate(0,-50%);
    transform: translate(0,-50%);
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
<?php require 'head.php' ?>
<style>
   ::-webkit-scrollbar {
   -webkit-appearance: none;
   width: 0px;
   }
   .dash {
   border-left: 1px dotted #000;
   padding-left: 30px;
   }
</style>
<input type="text" name="po_id" id="po_id" style="display:none;" value="<?php echo $_GET['po_id'] ; ?>">
<input type="text" name="sto_id" id="sto_id" style="display:none;" value="<?php echo $result['sto_id'] ; ?>">
<section class="checkout-wrapper pt-10">
   <div class="container">
   <div class="row text-center">
      <table class="">
         <thead>
            <tr>
               <th scope="col">ORDER : </th>
               <th class="dash" scope="col">DATE : </th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <th scope="row" style="font-size:24px;"> # <?php echo $_GET['po_id'] ; ?></th>
               <td class="dash"> <?php echo $newDate ; ?></td>
            </tr>
            <tr>
               <td colspan="2" class=" pt-2">
                  <?php if($result['po_status'] == 1){ ?>
                  <p class="text-white main-btn primary-btncon">UNPAID</p>
                  / Cash of Delivery
                  <?php }else if  ($result['po_status'] == 2 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
                  <p class="text-white main-btn primary-btncon">Wait for Confirm</p>
                  / TRANFER MONEY
                  <?php }else if  ($result['po_status'] == 7){ ?>
                  <p class="text-white main-btn primary-btncon">Wait for Confirm</p>
                  / Cash of Delivery
                  <?php }else if  ($result['po_status'] == 3 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
                  <p class="text-white main-btn primary-btncon">Preparing Food</p>
                  / TRANFER MONEY
                  <?php }else if  ($result['po_status'] == 3 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
                  <p class="text-white main-btn primary-btncon">Preparing Food</p>
                  / Cash of Delivery
                  <?php }else if  ($result['po_status'] == 4 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
                  <p class="text-white main-btn primary-btncon">Delivering</p>
                  / TRANFER MONEY
                  <?php }else if  ($result['po_status'] == 4 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
                  <p class="text-white main-btn primary-btncon">Delivering</p>
                  / Cash of Delivery
                  <?php }else if  ($result['po_status'] == 5 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
                  <p class="text-white main-btn primary-btncon"> Delivery Completed</p>
                  / TRANFER MONEY
                  <?php }else if  ($result['po_status'] == 5 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
                  <p class="text-white main-btn primary-btncon"> Delivery Completed</p>
                  / Cash of Delivery
                  <?php }else if  ($result['po_status'] == 7 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
                  <p class="text-white main-btn primary-btncon">Wait for Confirm</p>
                  / TRANFER MONEY
                  <?php }else if  ($result['po_status'] == 7 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
                  <p class="text-white main-btn primary-btncon">Wait for Confirm</p>
                  / Cash of Delivery
                  <?php }else if  ($result['po_status'] == 6 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
                  <p class="text-white main-btn primary-btncon">Cancel</p>
                  / TRANFER MONEY
                  <?php }else if  ($result['po_status'] == 6 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
                  <p class="text-white main-btn primary-btncon">Cancel</p>
                  / Cash of Delivery
                  <?php }?>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
   <br>
   <div class="row">
      <?php if($result['po_status'] == "7" || $result['po_status'] == "1" || $result['po_status'] == "6"  ){ ?>
      <div class="col-sm-12">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">ACCOUNT</h5>
               <p>User Name : <?php echo $result['cus_name'] ; ?></p>
               <p>Sur Name  : <?php echo $result['cus_surname'] ; ?></p>
               <p>Phone Number :<?php echo $result['cus_phone'] ; ?></p>
               <p>Address : <?php echo $result['cus_address'] ; ?>  <?php echo $result['cus_province'] ; ?>    <?php echo $result['cus_zipcode'] ; ?></p>
            </div>
         </div>
      </div>
      <?php }else{ ?>
      <div class="col-sm-6">
         <div class="card">
            <div class="card-body">
               <h5 class="card-title">ACCOUNT</h5>
               <p>User Name : <?php echo $result['cus_name'] ; ?></p>
               <p>Sur Name  : <?php echo $result['cus_surname'] ; ?></p>
               <p>Phone Number :<?php echo $result['cus_phone'] ; ?></p>
               <p>Address : <?php echo $result['cus_address'] ; ?>  <?php echo $result['cus_province'] ; ?>    <?php echo $result['cus_zipcode'] ; ?></p>
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
               <p>Amount : <?php   echo  number_format($row3['amount'],2,'.',',') ;  ?> | Date : <?php  echo date("d/m/Y H:i", strtotime($row3['tranfer_date'])) ; ?></p>
            </div>
         </div>
      </div>
      <?php } ?>
   </div>
   <br>
   <h4> ORDER DETAILS <?php if($result['po_status'] == "7" || $result['po_status'] == "1" || $result['po_status'] == "6"  ){ ?>
      <?php }else{ ?>
         <button id="paymentslip" data-id="<?php echo $row3['po_id']; ?>" style="border:none;" class="main-btn primary-btn2">VIEW SLIP</button></h4>
         <?php } ?>
   <div class="row justify-content-center mt-3">
      <div class="col-lg-6">
         <div class="checkout-sidebar-accordion mt-50">
            <div class="row">
               <!-- <div class="col-md-4">
                  <div class="card-body">
                     <div class="checkout-sidebar-details">
                        <div class="single-details">
                           <?php if($result['po_status'] == 1  ){ ?>
                           <?php }else if($result['po_status'] ==  7 ){ ?>
                           <?php }else{ ?>
                           <center>
                              <img src="../backend/getimg/slip/<?php echo $row3['tranfer_image']; ?>"
                                 width="200px;">
                           </center>
                           <?php }
                     ?>
                        </div>
                     </div>
                  </div>
                  </div> -->
               <?php if($result['po_status'] == 1  ){ ?>
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
                           <td class="text-right"><?php echo number_format($totoprice,2,'.',',');?></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <?php }else if($result['po_status'] ==  7 ){ ?>
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
                           <td class="text-right"><?php echo number_format($totoprice,2,'.',',');?></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <?php       }else if ($result['po_status'] == "6" ){  ?>
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
                           <td class="text-right"><?php echo number_format($totoprice,2,'.',',');?></td>
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
                           <td class="text-right"><?php echo number_format($totoprice,2,'.',',');?></td>
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
   <div href="javascript:history.back(1)" class="main-btn primary-btndet" onclick="history.back()"> Back </div>
</section>
<!-- Modal -->
<div class="modal fade" id="backDropModal" data-bs-backdrop="static"
   tabindex="-1">
   <div class="modal-dialog  modal-lg">
      <form class="modal-content">
        
         <div class="modal-body">
            <div id="show_payment"> </div>
         </div>
         <div class="modal-footer">
            <button type="button" id="close_modal" class="btn btn-outline-secondary"
               data-bs-dismiss="modal">
            CLOSE
            </button>
         </div>
      </form>
   </div>
</div>
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
<script src="serve/bank.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
   $(document).ready(function() {
   
   });
</script>
<?php require_once 'funcimage.php' ; ?>
</body>
</html>