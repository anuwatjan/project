<?php 

   require '../include_backend/head.php' ;
   @session_start();
   require_once '../include/condb.php';
  
   

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
                           

                            <!-- Button with dropdowns & addons -->
                            <div class="row">
                                <div class="col">
                                    <div class="card mb-4">


                                        <div class="card-body demo-vertical-spacing demo-only-element">
                                            <?php
             
                  $poid = "SELECT COUNT(po_id) as poid_count FROM akksofttech_purchase_order 
                  WHERE sto_id = '".$_SESSION['akksofttechsess_stoid']."' " ;
                  $query = mysqli_query($connect,$poid);
                  $respoid = mysqli_fetch_array($query);
                
              ?>

                                            <h5 class="card-header"><?php echo $respoid['poid_count']; ?> Orders</h5>

                                            <hr class="my-5" />

                                            <!-- TABLE -->
                               
                                                <div class="card">
                
                                                    <div class="table-responsive text-nowrap">
                    
                                                        <table class="table table-borderless" id="myTable">
                                                        
                                                        <thead class="table-primary">
                                                            <tr>

                                                                <th style="text-align:center;">Order ID</th>

                                                                <th style="text-align:center;">Time Of Order</th>

                                                                <th style="text-align:center;">Total Price</th>

                                                                <th style="text-align:center;">Satatus</th>

                                                                <th style="text-align:center;">Actions</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody class="table-border-bottom-0">
                                                        <?php
                                                        $sql ="SELECT *
                                                        FROM akksofttech_purchase_order 
                                                        WHERE akksofttech_purchase_order.sto_id = '".$_SESSION['akksofttechsess_stoid']."' ORDER BY 	akksofttech_purchase_order.po_start_date " ;
                                                        $result = mysqli_query($connect,$sql) or die ("error ".mysqli_error($connect));
                                          

                                            
                                       


                                                        while ($row = mysqli_fetch_array($result)) {

                                                            $spay ="SELECT * FROM akksofttech_purchase_order  AS po
                                                            INNER JOIN akksofttech_payment AS pm ON po.po_id = pm.po_id
                                                            WHERE po.sto_id = '".$_SESSION['akksofttechsess_stoid']."'  AND po.po_id = '".$row['po_id']."' " ;
                                                            $rpay = mysqli_query($connect,$spay);
                                                            $rowpay = mysqli_fetch_array($rpay);
                                           
                                                            $newdate = date("d/m/Y H:i", strtotime($row['po_start_date']));
                    ?>

                                                            <tr>
                                                                <td style="text-align:center;">
                                                                # <?php echo $row['po_id']; ?>
                                                                
                                                                </td>
                                                                <td style="text-align:center;"><?php echo $newdate;?>



                                                                    <?php 

                                                $totoprice = 0 ; 

                                                $pod ="SELECT *
                                                FROM  akksofttech_phrchaes_order_detail 
                                                WHERE sto_id = '".$_SESSION['akksofttechsess_stoid']."'  AND po_id = '".$row['po_id']."' " ;
                                                $respod = mysqli_query($connect,$pod) or die ("error ".mysqli_error($connect));

                                                

                                                while ($row2 = mysqli_fetch_array($respod)) {
                                                

                                                $totoprice += $row2['prod_price'] * $row2['quantity'];
                                                 
                                                $toto = $row2['prod_price'] * $row2['quantity']; 
                                        ?>

                                                                



                                                                    <?php }   ?>

                                                                </td>

                                                                <td style="text-align:center;">
                                                                    <?php echo number_format($totoprice,2,'.',','); ?></td>

                                                                <td style="text-align:center;">
                                                                    <?php 
                                                                   
                                        if($row['po_status'] == 1){
                                            
                                          echo "<span class='badge bg-label-danger me-1'>UNPAID</span>";
                                              
                                          }elseif($row['po_status'] == 2){
                                            
                                            echo "<span class='badge bg-label-primary me-1'>Waiting For Confirm</span> 
                                             <span class='badge bg-success'>( Transfer Money )</span>";
                                             
                                          }elseif($row['po_status'] == 3 &&  $rowpay['pay_cus_id'] == 0){
                                            
                                            echo "<span class='badge bg-label-warning me-1'>Preparing Food </span>
                                            <span class='badge bg-warning'>( Cash on Delivery )</span>";
                                            
                                        }elseif($row['po_status'] == 3 &&  $rowpay['pay_cus_id'] != 0){

                                            echo "<span class='badge bg-label-warning me-1'>Preparing Food </span>  
                                            <span class='badge bg-success'>( Transfer Money )</span>";


                                        }elseif($row['po_status'] == 4 &&  $rowpay['pay_cus_id'] == 0){
                                            
                                            echo "<span class='badge bg-label-info me-1'>Delivering</span>
                                            <span class='badge bg-warning'>( Cash on Delivery )</span>";

                                        }elseif($row['po_status'] == 4 &&  $rowpay['pay_cus_id'] != 0){
                                            
                                            echo "<span class='badge bg-label-info me-1'>Delivering</span>
                                            <span class='badge bg-success'>( Transfer Money )</span>";
                                            
                                        }elseif($row['po_status'] == 5 &&  $rowpay['pay_cus_id'] == 0){
                                            
                                            echo "<span class='badge bg-label-success me-1'>Delivery Completed</span>
                                            <span class='badge bg-warning'>( Cash on Delivery )</span>";

                                        }elseif($row['po_status'] == 5 &&  $rowpay['pay_cus_id'] != 0){
                                            
                                            echo "<span class='badge bg-label-success me-1'>Delivery Completed</span>
                                            <span class='badge bg-success'>( Transfer Money )</span>";
                                        
                                        
                                        }elseif($row['po_status'] == 6 &&  $rowpay['pay_cus_id'] == 0){
                                            
                                            echo "<span class='badge bg-label-dark me-1'>CANCEL</span>
                                            <span class='badge bg-warning'>( Cash on Delivery )</span>";

                                        }elseif($row['po_status'] == 6 &&  $rowpay['pay_cus_id'] != 0){
                                            
                                            echo "<span class='badge bg-label-dark me-1'>CANCEL</span>
                                            <span class='badge bg-success'>( Transfer Money )</span>";


                                            
                                        }elseif($row['po_status'] == 7){
                                            
                                            echo "<span class='badge bg-label-primary me-1'>Waiting For Confirm</span> 
                                             <span class='badge bg-warning'>( Cash on Delivery ) </span>";
                                             
                                        }
                                          
                                          
                                       ?>
                                                                </td>

                                                                <td style="text-align:center;">

                                                                    <a type="button"
                                                                        href="add_form.php?id=<?php echo $row['po_id']; ?>"
                                                                        class="btn btn-outline-primary">VIEW</a>

                                                                </td>

                                                            </tr>
                                                            <?php } ?>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--/ END TABLE -->
















                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <?php require '../include_backend/script.php' ?>
        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            $("#btn-view").hide();
            $("#btn-add").click(function() {
                $(".content-loader").fadeOut('slow', function() {
                    $(".content-loader").fadeIn('slow');
                    $(".content-loader").load('add_form.php');
                    $("#btn-add").hide();
                    $("#btn-view").show();
                });
            });

            $("#btn-view").click(function() {
                $("body").fadeOut('slow', function() {
                    $("body").load('index.php');
                    $("body").fadeIn('slow');
                    window.location.href = "index.php";
                });
            });







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
</body>

</html>