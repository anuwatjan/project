<?php require '../include_backend/head.php' ;

@session_start();
require_once '../include/condb.php';


if( $_GET['id'] != 0){
    
    $sql2 ="SELECT *
    FROM akksofttech_purchase_order 
    
    
    WHERE po_id = '".$_GET['id']."' " ;
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

<div id="show_po_id" style="display:none;"><?php echo $row['po_id'];?></div>

<style>
::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 0px;


}





.sc {
    height: 80vh;
    overflow-y: auto;
}

.tb {
    height: 34vh;
    overflow-y: auto;
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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">DELIVERING</span></h4>

                    <div class="row">

                        <div class="col-md-12">
                            <!-- Basic Layout -->
                            <div class="row">
                                
                                <div class="box-1">


                                    <div class="col-xl">
                                    
                                        <div class="card mb-4">
                                            
                                            <div class="card-body">
                                            
                                                <div class="mb-3" align="right">
                                                
                                                <a type="button"   href="index.php" class="btn btn-primary">BACK</a>  
                                                </div>

                                                <h5 class="card-header">Purchase Order Id # <?php echo $row['po_id'];?> | <?php 
                                        if($row['po_status'] == 1){
                                            
                                          echo "<span class='badge bg-label-danger me-1'>UNPAID</span>";
                                              
                                          }elseif($row['po_status'] == 2){
                                            
                                            echo "<span class='badge bg-label-primary me-1'>TO CONFIRM</span>";
                                             
                                          }elseif($row['po_status'] == 3){
                                            
                                            echo "<span class='badge bg-label-warning me-1'>TO SHIP</span>";
                                            
                                          }
                                          elseif($row['po_status'] == 4){
                                            
                                            echo "<span class='badge bg-label-info me-1'>DELIVERING</span>";
                                            
                                          }elseif($row['po_status'] == 5){
                                            
                                            echo "<span class='badge bg-label-success me-1'>COMPLETED</span>";
                                            
                                          }
                                       ?> <a type="button" class="btn btn-outline-info" id="completed" href="#">CONFIRM DELIVERING</a> | <font class="form-subhead">Time Of Order : <?php echo $newdate;?></font> </h5>
                                                
                            
                        <!-- Horizontal -->

                        <div class="row">
                                                    <div class="col-md">
                                                        <div class="card mb-3">
                                                            <div class="row g-0">

                                                                <div class="col-md-8">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Address</h5>
                                                                        
                                                                        <br>
                                                                        <p class="card-text">
                                                                            <label class="form-subhead1">NAME-SURNAME :
                                                                                <label class="form-input">
                                                                                    <?php echo $row['cus_name'];?>
                                                                                    <?php echo $row['cus_surname'];?>
                                                                                </label></label>
                                                                            <br>

                                                                            <label class="form-subhead1">PHONE : <label
                                                                                    class="form-input">
                                                                                    <?php echo $row['cus_phone'];?>
                                                                                </label>
                                                                            </label>

                                                                            <br>

                                                                            <label class="form-subhead1">ADDRESS :
                                                                                <label class="form-input">
                                                                                    <?php echo $row['cus_address'];?>
                                                                                </label>
                                                                            </label>

                                                                            <br>

                                                                            <label class="form-subhead1">PROVINCE :
                                                                                <label class="form-input">
                                                                                    <?php echo $row['cus_province'];?> |
                                                                                </label>
                                                                            </label>

                                                                            
                                                                            <label class="form-subhead1">ZIPCODE :
                                                                                <label class="form-input">
                                                                                    <?php echo $row['cus_zipcode'];?></label>
                                                                            </label>
                                                                            



                                                                        </p>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="card mb-3">
                                                            <div class="row g-0">
                                                                <div class="col-md-8">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title"> Payment Details
                                                                            <?php if($row['po_status'] == 1){ ?>
                                                                            <span class='badge bg-danger'>UNPAID</span>

                                                                            <?php }else if($row['po_status'] != 1 && $rowpay['pay_cus_id'] == 0){ ?>
                                                                            <small class="text-muted"><span
                                                                                    class='badge bg-warning'>Cash On
                                                                                    Delivery
                                                                                </span></small><br><br><br><br> <img
                                                                                src="../img/no-data.png" height="100px;"
                                                                                width="100px;" /> <br><br>


                                                                            <?php }else if($row['po_status'] != 1 && $rowpay['pay_cus_id'] != 0){ ?>
                                                                            <small class="text-muted">(TRANSFER
                                                                                MONEY)</small> <span type="button"
                                                                                class="badge bg-info" id="payment"
                                                                                pay_cus_id="<?php echo $rowpay['pay_cus_id']; ?>"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#backDropModal">VIEW
                                                                                SLIP</span>
                                                                        </h5>
                                                                        <br>
                                                                        <p class="card-text">

                                                                            <label class="form-subhead1">BANK NAME :
                                                                                <label class="form-input">
                                                                                    <?php echo $rowpay['bac_name'];?></label></label>
                                                                            <br>
                                                                            <label class="form-subhead1">ACCOUNT NAME :
                                                                                <label class="form-input">
                                                                                    <?php echo $rowpay['bac_account'];?>
                                                                                </label></label>
                                                                            <br>

                                                                            <label class="form-subhead1">ACCOUNT NUMBER
                                                                                : <label class="form-input">
                                                                                    <?php echo $rowpay['bac_number'];?>
                                                                                </label>
                                                                            </label><br>
                                                                            <label class="form-subhead1">AMOUNT : <label
                                                                                    class="form-input">
                                                                                    <?php echo number_format($rowpay['amount'],2,'.',','); ?> |
                                                                                </label>
                                                                            </label>

                                                                           
                                                                            <label class="form-subhead1">PAYMENT DATE
                                                                                : <label class="form-input">
                                                                                    <?php echo $newdatepay;?></label></label>


                                                                        </p>

                                                                        <?php } ?>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/ Horizontal -->


                                            <!-- ตาราง -->
                                                <div class="tb card">
                                                    <h5 class="card-header">Product Details</h5>
                                                    <div class="table-responsive text-nowrap">
                                                        <table class="table">

                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    
                                                                    <th>Price</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            
                                                            <tbody>
                                                                 <?php
                                       $totoprice = 0;
                                       $toto = 0 ;
                                                                            $pod ="SELECT *
                                                                            FROM akksofttech_phrchaes_order_detail 

                                                                            WHERE sto_id = '".$_SESSION['akksofttechsess_stoid']."'  AND po_id = '".$row['po_id']."' " ;
                                                                            $respod = mysqli_query($connect,$pod) or die ("error ".mysqli_error($connect));

                                                                            while ($row2 = mysqli_fetch_array($respod)) {

                                                                            $totoprice += $row2['prod_price'] * $row2['quantity']; 
                                                                            $toto = $row2['prod_price'] * $row2['quantity'];
                                                                                            
                                                                                        
                                                            ?>
                                                                <tr>
                                                                    <td>

                                                                    <div class="col-sm-10">

                                                                    <?php if($row2['sprod_id'] == 0 ){ ?>

                                                                    <label
                                                                        class="form-input"><?php echo $row2['prod_name'];?>
                                                                        |
                                                                        <a class="form-subhead">
                                                                            <?php echo number_format($row2['prod_price'],2,'.',',');?>  </a>

                                                                        
                                                                            <a class="form-input">
                                                                             x
                                                                            <?php echo $row2['quantity'];?></a>
                                                                            <br>
                                                                            <?php if($row2['message'] != "-"){?>
                                                                                <font color="red"><a class="form-input">( <?php echo $row2['message'];?> )</a></font>

                                                                                <?php }?>
                                                                            
                                                                    </label>

                                                                    <?php }else if($row2['sprod_id'] != 0  && $row2['sprodone_id'] == 0){ ?>

                                                                    <label
                                                                        class="form-input"><?php echo $row2['prod_name'];?>
                                                                        |


                                                                        <a class="form-subhead"><?php echo $row2['sprod_name'];?>
                                                                            <a class="form-subhead"> |
                                                                                <?php echo number_format($row2['prod_price'],2,'.',',');?>  </a>
                                                                           
                                                                                <a class="form-input"> x
                                                                                <?php echo $row2['quantity'];?></a>
                                                                                <br>
                                                                                <?php if($row2['message'] != "-"){?>
                                                                                <font color="red"><a class="form-input">( <?php echo $row2['message'];?> )</a></font>

                                                                                <?php }?>
                                                                                

                                                                    </label>

                                                                    <?php }else if($row2['sprod_id'] != 0 && $row2['sprodone_id'] != 0 ){ ?>

                                                                    <label
                                                                        class="form-input"><?php echo $row2['prod_name'];?>
                                                                        |

                                                                        <a class="form-subhead"><?php echo $row2['sprod_name'];?>
                                                                            | <?php echo $row2['sprodone_name'];?></a>
                                                                        <a class="form-subhead"> |
                                                                            <?php echo number_format($row2['prod_price'],2,'.',',');?> </a>
                                                                        
                                                                        
                                                                            <a class="form-input"> x
                                                                            <?php echo $row2['quantity'];?></a>
                                                                            <br>
                                                                            <?php if($row2['message'] != "-"){?>
                                                                                <font color="red"><a class="form-input">( <?php echo $row2['message'];?> )</a></font>

                                                                                <?php }?>
                                                                           
                                                                    </label>

                                                                    <?php } ?>
                                                                    </div>
                                                                    </td>
                                                                   
                                                                    <td><?php echo number_format($toto,2,'.',',');?></td>
                                                                  
                                                                </tr>



                                                                <?php } ?>
                                                                <tr class="table-primary">
                                                                    <td style="text-align:center;">TOTAL PRICE</td>
                                                              
                                                                <td><font color="red"><?php echo number_format($totoprice,2,'.',',');?></font></td>
                                                                </tr>





                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- END ตาราง -->




                                                <!-- Modal -->
                                                <div class="modal fade" id="backDropModal" data-bs-backdrop="static"
                                                    tabindex="-1">
                                                    <div class="modal-dialog  modal-lg">
                                                        <form class="modal-content">
                                                            <div class="modal-header">

                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="sc modal-body">
                                                                <div id="show_payment"> </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    CLOSE
                                                                </button>

                                                            </div>
                                                        </form>
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
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" 
    crossorigin="anonymous"></script>
    
   
     <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="completed.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>

<script type="text/javascript">

$(document).bind("contextmenu", function (event) {
  event.preventDefault(); // ห้ามคลิกขวา
});
$(document).bind("selectstart", function (event) {
  event.preventDefault(); // ห้ามลากคลุม
});

</script>

<script>
	
    $(document).ready(function(){

		$("#savettype_name").keyup(function(){
           
				var value = $(this).val().toLowerCase();
				$("#tran_type_id option").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});

		});

        $("#payment").on("click", function() {
        var pay_cus_id = $(this).attr('pay_cus_id');
        console.log(pay_cus_id);
        $.ajax({
            url: "slip.php",
            type: "post",
            data: {
                pay_cus_id: pay_cus_id
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                var html = "";
                $.each(data, function(key, val) {
                    html +=
                        '<center><img src="../getimg/slip/' + val['tranfer_image'] +
                        '" width="100%;"></center>';
                })
                $("#show_payment").html(html);
            }
        })
    });

	});

</script>
 
</body>

</html>