<?php require '../include_backend/head.php' ;

@session_start();
require_once '../include/condb.php';

if( $_GET['id'] != 0){
    
    $sql2 ="SELECT *
    FROM akksofttech_purchase_order  
    WHERE po_id = '".$_GET['id']."'" ;
    $result2 = mysqli_query($connect,$sql2);
    $row = mysqli_fetch_array($result2);


    
    $spay ="SELECT *
    FROM akksofttech_purchase_order  AS po
    INNER JOIN akksofttech_payment AS pm ON po.po_id = pm.po_id
    WHERE po.po_id = '".$_GET['id']."' " ;
    $rpay = mysqli_query($connect,$spay);
    $rowpay = mysqli_fetch_array($rpay);
}

 
 
$newdate = date("d/m/Y H:i", strtotime($row['po_start_date']));
$newdatepay = date("d/m/Y H:i", strtotime($rowpay['tranfer_date']));

?>
<style>
::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 0px;
}
</style>

<body>



    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">MY ORDERS</span></h4>

                    <div class="row">

                        <div class="col-md-12">
                            <!-- Basic Layout -->
                            <div class="row">

                                <div class="box-1">


                                    <div class="col-xl">


                                        <div class="card mb-4">

                                            <div class="card-body">

                                                <div class="mb-3" align="right">
                                                    <a type="button" href="index.php" class="btn btn-primary">BACK</a>
                                                </div>

                                                <h3 class="card-header">Order Details # <?php echo $row['po_id'];?> | <?php 
                                        if($row['po_status'] == 1){
                                            
                                          echo "<span class='badge bg-label-danger me-1'>UNPAID</span>";
                                              
                                          }elseif($row['po_status'] == 2){
                                            
                                            echo "<span class='badge bg-label-primary me-1'>Waiting For Confirm</span> | 
                                            <span class='badge bg-success'>Transfer Money</span>";
                                             
                                          }elseif($row['po_status'] == 3){
                                            
                                            echo "<span class='badge bg-label-warning me-1'>Preparing Food</span>";
                                            
                                          }
                                          elseif($row['po_status'] == 4){
                                            
                                            echo "<span class='badge bg-label-info me-1'>Delivering</span>";
                                            
                                          }elseif($row['po_status'] == 5){
                                            
                                            echo "<span class='badge bg-label-success me-1'>Delivery Completed</span>";
                                            
                                          }
                                          elseif($row['po_status'] == 6){
                                            
                                            echo "<span class='badge bg-label-dark me-1'>CANCEL</span>";
                                            
                                          }elseif($row['po_status'] == 7){
                                            
                                            echo "<span class='badge bg-label-primary me-1'>Waiting For Confirm</span> |
                                            <span class='badge bg-warning'>Cash on Delivery</span>";
                                             
                                          }
                                          
                                       ?> | <font class="form-subhead">Time Of Order : <?php echo $newdate;?></font>
                                                </h3>


                                                  


                                                

                                                <?php if($row['po_status'] == 1){ ?>


                                                <div class="card mb-4">

                                                    <div class="card-body">

                                                        <div class="mb-3">
                                                            <h4 class="card-header">Payment Methods : <span
                                                                    class='badge bg-danger'>UNPAID</span></h4>



                                                        </div>
                                                    </div>
                                                </div>

                                                <?php }else if($row['po_status'] != 1 && $rowpay['pay_cus_id'] == 0){ ?>
                                                <div class="card mb-4">

                                                    <div class="card-body">
                                                        <div class="mb-3">
                                                            <h4 class="card-header">Payment Methods : <span
                                                                    class='badge bg-warning'>Cash On Delivery</span>
                                                            </h4>



                                                        </div>
                                                    </div>
                                                </div>

                                                <?php }else if($row['po_status'] != 1 && $rowpay['pay_cus_id'] != 0){ ?>
                                                <div class="card mb-4">

                                                    <div class="card-body">
                                                        <div class="mb-3">

                                                            <h4 class="card-header">Payment Methods : <span
                                                                    class='badge bg-success'>Transfer Money</span> </h4>




                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card mb-4">

                                                    <div class="card-body">




                                                        <h4 class="card-header">Payment Details
                                                            <hr />
                                                        </h4>

                                                        <div class="mb-3">

                                                            <label class="form-subhead1">Bank Name : </label>
                                                            <label class="form-input">
                                                                <?php echo $rowpay['bac_name'];?></label>
                                                            <br>
                                                            <label class="form-subhead1">Account Name : </label>
                                                            <label class="form-input">
                                                                <?php echo $rowpay['bac_account'];?> </label>
                                                            <br>
                                                            <label class="form-subhead1">Amount : </label>
                                                            <label class="form-input">
                                                                <?php echo number_format($rowpay['amount'],2,'.',','); ?>
                                                            </label>
                                                            <br>
                                                            <label class="form-subhead1">Payment Date :</label>
                                                            <label class="form-input"> <?php echo $newdatepay;?></label>

                                                        </div>



                                                    </div>
                                                </div>

                                                <?php } ?>

                                                <div class="card mb-4">
                                                    <div class="card-body">

                                                        <h4 class="card-header">Product Details
                                                            <hr />
                                                        </h4>

                                                        <?php
                                        $totoprice = 0 ; 
                                        $pod ="SELECT *
                                        FROM akksofttech_phrchaes_order_detail 

                                        WHERE sto_id = '".$_SESSION['akksofttechsess_stoid']."'  AND po_id = '".$row['po_id']."' " ;
                                        $respod = mysqli_query($connect,$pod) or die ("error ".mysqli_error($connect));

                                        while ($row2 = mysqli_fetch_array($respod)) {

                                        $totoprice += $row2['prod_price'] * $row2['quantity']; 
                                        $toto = $row2['prod_price'] * $row2['quantity']; 
                                        ?>

                                                        <div class="row mb-3">



                                                            <div class="col-sm-10">

                                                                <?php if($row2['sprod_id'] == 0 ){ ?>

                                                                <label
                                                                    class="form-input4"><?php echo $row2['prod_name'];?>
                                                                    |
                                                                    <a class="form-subhead">
                                                                        <?php echo number_format($row2['prod_price'],2,'.',',');?></a>

                                                                    <br><a class="form-input">
                                                                        <font color="red">
                                                                            <?php echo number_format($toto,2,'.',',');?>
                                                                        </font>
                                                                    </a>
                                                                    <a class="form-input">| x
                                                                        <?php echo $row2['quantity'];?></a>
                                                                </label>

                                                                <?php }else if($row2['sprod_id'] != 0  && $row2['sprodone_id'] == 0){ ?>

                                                                <label
                                                                    class="form-input4"><?php echo $row2['prod_name'];?>
                                                                    |


                                                                    <a class="form-subhead"><?php echo $row2['sprod_name'];?>
                                                                        <a class="form-subhead"> |
                                                                            <?php echo number_format($row2['prod_price'],2,'.',',');?></a>
                                                                        <br>
                                                                        <a class="form-input">
                                                                            <font color="red">
                                                                                <?php echo number_format($toto);?>
                                                                            </font>
                                                                        </a>
                                                                        <a class="form-input">| x
                                                                            <?php echo $row2['quantity'];?></a>

                                                                </label>

                                                                <?php }else if($row2['sprod_id'] != 0 && $row2['sprodone_id'] != 0 ){ ?>

                                                                <label
                                                                    class="form-input4"><?php echo $row2['prod_name'];?>
                                                                    |

                                                                    <a class="form-subhead"><?php echo $row2['sprod_name'];?>
                                                                        | <?php echo $row2['sprodone_name'];?></a>
                                                                    <a class="form-subhead"> |
                                                                        <?php echo number_format($row2['prod_price'],2,'.',',');?></a>
                                                                    <br>
                                                                    <a class="form-input">
                                                                        <font color="red">
                                                                            <?php echo number_format($toto,2,'.',',');?>
                                                                        </font>
                                                                    </a>
                                                                    <a class="form-input">| x
                                                                        <?php echo $row2['quantity'];?></a>
                                                                </label>

                                                                <?php } ?>


                                                            </div>

                                                        </div>

                                                        <hr class="my-5" />

                                                        <?php }   ?>
                                                        <div class="md-3" align="right">
                                                            <a class="form-input">TOTAL PRICE : </a>
                                                            <a class="form-input4"> £
                                                                <?php echo number_format($totoprice,2,'.',','); ?></a>
                                                        </div>
                                                    </div>
                                                </div>









                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <?php require '../include_backend/script.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript">
    $(document).bind("contextmenu", function(event) {
        event.preventDefault(); // ห้ามคลิกขวา
    });
    $(document).bind("selectstart", function(event) {
        event.preventDefault(); // ห้ามลากคลุม
    });
    </script>


</body>

</html>