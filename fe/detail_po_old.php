<?php
        @session_start();
        
        require 'includedb/condb.php'; 
        

        if( $_GET['po_id'] != 0){
        
        // $sql = "SELECT * FROM akksofttech_purchase_order 
        // INNER JOIN akksofttech_po_status ON akksofttech_purchase_order.po_status = akksofttech_po_status.po_status_id
        //  WHERE  po_id = '".$_GET['po_id']."' AND cus_id = '".$_SESSION['akksofttechsess_cusid']."'  ";

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
</style>

<?php


$sql2 ="SELECT *

FROM akksofttech_purchase_order  AS po WHERE po.po_id = '".$_GET['po_id']."' " ;
$result2 = mysqli_query($conn,$sql2) or die ("error ".mysqli_error($conn));
$row = mysqli_fetch_array($result2);


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
</style>



<input type="text" name="po_id" id="po_id" style="display:none;" value="<?php echo $_GET['po_id'] ; ?>">

<input type="text" name="sto_id" id="sto_id" style="display:none;" value="<?php echo $result['sto_id'] ; ?>">


<section class="checkout-wrapper pt-10">
    <div class="container">


        <div class="row text-center">

            <h1 class="mt-1 mb-2   primary-btn col-sm-3">Order : # <?php echo $_GET['po_id'] ; ?></h1>

            <?php if($result['po_status'] == 1){ ?>

            <h1 class="mt-1 mb-2 main-btn primary-btndet col-sm-3">UNPAID</h1>
            <h1 class="mt-1  mb-2  text-white main-btn primary-btn3 col-sm-3">Cash of Delivery</h1>

            <?php }else if  ($result['po_status'] == 2 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
            <h1 class="mt-1 mb-2  text-white main-btn primary-btncon col-sm-3">Wait for Confirm</h1>
            <h1 class="mt-1  mb-2  text-white main-btn primary-btn3 col-sm-3">TRANFER MONEY</h1>
            <?php }else if  ($result['po_status'] == 7){ ?>
            <h1 class="mt-1 mb-2  text-white main-btn primary-btncon col-sm-3">WAIT FOR CONFIRM</h1>
            <h1 class="mt-1  mb-2  text-white main-btn primary-btn3 col-sm-3">Cash of Delivery</h1>

            <?php }else if  ($result['po_status'] == 3 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
            <h1 class="mt-1 mb-2  text-white main-btn primary-btnship col-sm-3">Preparing Food</h1>
            <h1 class="mt-1  mb-2  text-white main-btn primary-btn3 col-sm-3">TRANFER MONEY</h1>
            <?php }else if  ($result['po_status'] == 3 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
            <h1 class="mt-1 mb-2  text-white main-btn primary-btnship col-sm-3">Preparing Food</h1>
            <h1 class="mt-1  mb-2  text-white main-btn primary-btn3 col-sm-3">Cash of Delivery</h1>

            <?php }else if  ($result['po_status'] == 4 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
            <h1 class="mt-1 mb-2  text-white main-btn primary-btnshipp col-sm-3">Delivering</h1>
            <h1 class="mt-1  mb-2  text-white main-btn primary-btn3 col-sm-3">TRANFER MONEY</h1>
            <?php }else if  ($result['po_status'] == 4 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
            <h1 class="mt-1 mb-2  text-white main-btn primary-btnshipp1">Delivering</h1>
            <h1 class="mt-1  mb-2  text-white main-btn primary-btn3">Cash of Delivery</h1>

            <?php }else if  ($result['po_status'] == 5 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
            <h1 class="mt-1 mb-2  text-white main-btn primary-btncom col-sm-3">Delivery Completed</h1>
            <h1 class="mt-1  mb-2  text-white main-btn primary-btn3 col-sm-3">TRANFER MONEY</h1>
            <?php }else if  ($result['po_status'] == 5 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
            <h1 class="mt-1 mb-2  text-white main-btn primary-btncom col-sm-3">Delivery Completed</h1>
            <h1 class="mt-1  mb-2  text-white main-btn primary-btn3 col-sm-3">Cash of Delivery</h1>

            <?php }else if  ($result['po_status'] == 7 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
            <h1 class="mt-1 mb-2  text-white main-btn primary-btncon col-sm-3">Wait for Confirm</h1>
            <h1 class="mt-1  mb-2  text-white main-btn primary-btn3 col-sm-3">TRANFER MONEY</h1>
            <?php }else if  ($result['po_status'] == 7 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
            <h1 class="mt-1 mb-2  text-white main-btn primary-btncon col-sm-3">Wait for Confirm</h1>
            <h1 class="mt-1  mb-2  text-white main-btn primary-btn3 col-sm-3">Cash of Delivery</h1>

            <?php }else if  ($result['po_status'] == 6 &&  $respoid_pay['pay_cus_id'] != 0 ){ ?>
            <h1 class="mt-1 mb-2  text-white main-btn primary-btndet col-sm-3">Cancel</h1>
            <h1 class="mt-1  mb-2  text-white main-btn primary-btn3 col-sm-3">TRANFER MONEY</h1>
            <?php }else if  ($result['po_status'] == 6 &&  $respoid_pay['pay_cus_id'] == 0 ){ ?>
            <h1 class="mt-1 mb-2  text-white main-btn primary-btndet col-sm-3">Cancel</h1>
            <h1 class="mt-1  mb-2  text-white main-btn primary-btn3 col-sm-3">Cash of Delivery</h1>


            <?php }?>




        </div>




        <div class="row justify-content-center">

            <?php if($result['po_status'] == "7"  ){ ?>
                <div class="col-md-12">

<table class="table table-bordered " style="border:none;">

    <tr>

        <td colspan="2">Account Info</td>



    </tr>


    <tr>

        <td>User Name : </td>

        <td> <?php echo $result['cus_name'] ; ?></td>

    </tr>

    <tr>

        <td>Sur Name : </td>

        <td> <?php echo $result['cus_surname'] ; ?></td>

    </tr>

    <!-- <tr>

            <td>Email : <?php echo $result['cus_email'] ; ?></td>

            <td> <?php echo $result['cus_email'] ; ?></td>

        </tr> -->

    <tr>

        <td>Phone Number : </td>

        <td><?php echo $result['cus_phone'] ; ?> </td>

    </tr>

    <tr>

        <td>Address : </td>

        <td> <?php echo $result['cus_address'] ; ?>
        </td>

    </tr>

    <tr>

        <td>City : </td>

        <td><?php echo $result['cus_province'] ; ?></td>

    </tr>

    <tr>

        <td>Post Code : </td>

        <td><?php echo $result['cus_zipcode'] ; ?></td>

    </tr>

</table>


</div>

<?php }else if ($result['po_status'] == "1" ){  ?>

<div class="col-md-12">

<table class="table table-bordered " style="border:none;">

    <tr>

        <td colspan="2">Account Info</td>



    </tr>


    <tr>

        <td>User Name : </td>

        <td> <?php echo $result['cus_name'] ; ?></td>

    </tr>

    <tr>

        <td>Sur Name : </td>

        <td> <?php echo $result['cus_surname'] ; ?></td>

    </tr>

    <!-- <tr>

            <td>Email : <?php echo $result['cus_email'] ; ?></td>

            <td> <?php echo $result['cus_email'] ; ?></td>

        </tr> -->

    <tr>

        <td>Phone Number : </td>

        <td><?php echo $result['cus_phone'] ; ?> </td>

    </tr>

    <tr>

        <td>Address : </td>

        <td> <?php echo $result['cus_address'] ; ?>
        </td>

    </tr>

    <tr>

        <td>City : </td>

        <td><?php echo $result['cus_province'] ; ?></td>

    </tr>

    <tr>

        <td>Post Code : </td>

        <td><?php echo $result['cus_zipcode'] ; ?></td>

    </tr>

</table>


</div>
<?php }else if ($result['po_status'] == "6" ){  ?>


<div class="col-md-12">

<table class="table table-bordered " style="border:none;">

    <tr>

        <td colspan="2">Account Info</td>



    </tr>


    <tr>

        <td>User Name : </td>

        <td> <?php echo $result['cus_name'] ; ?></td>

    </tr>

    <tr>

        <td>Sur Name : </td>

        <td> <?php echo $result['cus_surname'] ; ?></td>

    </tr>

    <!-- <tr>

            <td>Email : <?php echo $result['cus_email'] ; ?></td>

            <td> <?php echo $result['cus_email'] ; ?></td>

        </tr> -->

    <tr>

        <td>Phone Number : </td>

        <td><?php echo $result['cus_phone'] ; ?> </td>

    </tr>

    <tr>

        <td>Address : </td>

        <td> <?php echo $result['cus_address'] ; ?>
        </td>

    </tr>

    <tr>

        <td>City : </td>

        <td><?php echo $result['cus_province'] ; ?></td>

    </tr>

    <tr>

        <td>Post Code : </td>

        <td><?php echo $result['cus_zipcode'] ; ?></td>

    </tr>

</table>


</div>



            <?php }else{ ?>


            <div class="col-md-6">

                <table class="table table-bordered " style="border:none;">

                    <tr>

                        <td colspan="2">Account Info</td>



                    </tr>


                    <tr>

                        <td>User Name : </td>

                        <td> <?php echo $result['cus_name'] ; ?></td>

                    </tr>

                    <tr>

                        <td>Sur Name : </td>

                        <td> <?php echo $result['cus_surname'] ; ?></td>

                    </tr>

                    <!-- <tr>

                            <td>Email : <?php echo $result['cus_email'] ; ?></td>

                            <td> <?php echo $result['cus_email'] ; ?></td>

                        </tr> -->

                    <tr>

                        <td>Phone Number : </td>

                        <td><?php echo $result['cus_phone'] ; ?> </td>

                    </tr>

                    <tr>

                        <td>Address : </td>

                        <td> <?php echo $result['cus_address'] ; ?>
                        </td>

                    </tr>

                    <tr>

                        <td>City : </td>

                        <td><?php echo $result['cus_province'] ; ?></td>

                    </tr>

                    <tr>

                        <td>Post Code : </td>

                        <td><?php echo $result['cus_zipcode'] ; ?></td>

                    </tr>

                </table>


            </div>


            <?php } ?>



            <?php if($result['po_status'] == "7"  ){


                    }else if ($result['po_status'] == "1" ){ 


                    }else if ($result['po_status'] == "6" ){  ?>






            <?php }else{ ?>



            <div class="col-md-6">


                <table class="table table-bordered " style="border:none;">

                    <tr>

                        <td colspan="2">Payment Info</td>


                    </tr>



                    <tr>

                        <td>Account Name :</td>

                        <td> <?php  echo $row3['bac_name'] ;  ?>
                        </td>

                    </tr>

                    <tr>

                        <td>Bank Name :</td>

                        <td> <?php echo $row3['bac_account'] ; ?>
                        </td>

                    </tr>



                    <tr>

                        <td>Account Num : </td>

                        <td> <?php  echo $row3['bac_number'] ;  ?>
                        </td>

                    </tr>

                    <tr>

                        <td>Amount : </td>

                        <td> <?php   echo  number_format($row3['amount'],2,'.',',') ;  ?>
                        </td>

                    </tr>

                    <tr>

                        <td>Date : </td>

                        <td> <?php  echo date("d/m/Y H:i", strtotime($row3['tranfer_date'])) ; ?>
                        </td>

                    </tr>



                </table>


                <?php } ?>


            </div>




        </div>



        <div class="row justify-content-center">


            <div class="col-lg-6">
                <div class="checkout-sidebar-accordion mt-50">

                    <div class="row">

                        <div class="col-md-4">

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
                        </div>


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
                                            <?php echo number_format($row2['prod_price'],2,'.',',');?></td>
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
                                            <?php echo number_format($row2['prod_price'],2,'.',',');?></td>
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
                                            <?php echo number_format($row2['prod_price'],2,'.',',');?></td>
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


                        <div class="col-md-8">

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
                                            <?php echo number_format($row2['prod_price'],2,'.',',');?></td>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script type="text/javascript">
$(document).ready(function() {

});
</script>

<?php require_once 'funcimage.php' ; ?>



</body>

</html>