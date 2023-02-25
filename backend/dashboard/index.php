<?php 

require '../include_backend/head.php' ;

@session_start();
require_once '../include/condb.php';


$sql = "SELECT * FROM akksofttech_member_store 
WHERE mem_id = '".$_SESSION['akksofttechsess_memid']."'";
$query = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($query);
$_SESSION['akksofttechsess_stoid'] = $row['sto_id'];
$_SESSION['akksofttechsess_stoname'] = $row['sto_name'];
?>
                   
<body>

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">



                        <div class="card-body">
                            <h4 class="card-title text-primary">Data Analysis Chart</h4>
                            <br>

                            <div class="row">

                                <div class="col-md-6 col-xl-3">
                                    <?php
                                    //  $date = date('Y-m-d  00:00:00');
                                    //  $date1 = date('Y-m-d  23:59:59');

                                    //  $dated = date("d");
                                    //  $datem = date("m");
                                    //  $dateY = date("Y");
                                    $dateeshow = date("Y-m-d");
                                    
                                   
                                    $sa ="SELECT SUM(od.prod_price*od.quantity) as price_sum   
                                    FROM  akksofttech_purchase_order AS po 
                                    INNER JOIN akksofttech_phrchaes_order_detail AS od ON po.po_id = od.po_id
                                    WHERE po.sto_id = '".$_SESSION['akksofttechsess_stoid']."' 
                                    AND po.po_status = '5' 
                                    AND date(od.pod_create) = '".$dateeshow."'
                                    ";
                                   
                                    $resa = mysqli_query($connect,$sa);
                                    $row_sa = mysqli_fetch_array($resa);
                                ?>
                                    <div class="card bg-primary text-white mb-3">
                                        <div class="card-header"><i class='bx bx-wallet'></i> SALES</div>
                                        <div class="card-body" align="right">
                                            <h4 class="card-title text-white">£ <span>
                                                    <?php if($row_sa['price_sum'] != ""){
                                                        echo number_format($row_sa['price_sum'],2,'.',',');
                                                     }else{
                                                        echo "0.00";
                                                     }
                                                      ?></span></h4>

                                        </div>
                                    </div>
                                </div>

                                <?php
                                    //  $date = date('Y-m-d  00:00:00');
                                    //  $date1 = date('Y-m-d  23:59:59');
                                    //  $dated = date("d");
                                    //  $datem = date("m");
                                    //  $dateY = date("Y");

                                     $dateeshow = date("Y-m-d");
                                   
                                    $od ="SELECT COUNT(po_id) as poid_count FROM  akksofttech_purchase_order
                                    WHERE sto_id = '".$_SESSION['akksofttechsess_stoid']."' 
                                    AND date(po_start_date) = '".$dateeshow."'
                                    
                                    ";
                                   
                                    $reod = mysqli_query($connect,$od);
                                    $row_od = mysqli_fetch_array($reod);
                                ?>

                                <div class="col-md-6 col-xl-3">
                                    <div class="card bg-info text-white mb-3">
                                        <div class="card-header"><i class='bx bx-clipboard'></i> ALL ORDERS</div>
                                        <div class="card-body" align="right">
                                            <h4 class="card-title text-white"><span>
                                                    <?php if($row_od['poid_count'] != ""){
                                                        echo $row_od['poid_count']." Orders";
                                                     }else{
                                                        echo "0 Order";
                                                     }
                                                      ?></span></h4>

                                        </div>
                                    </div>
                                </div>

                                <?php
                                    //  $date = date('Y-m-d  00:00:00');
                                    //  $date1 = date('Y-m-d  23:59:59');

                                    // $dated = date("d");
                                    // $datem = date("m");
                                    // $dateY = date("Y");

                                    $dateeshow = date("Y-m-d");

                                    $odcf ="SELECT COUNT(po_id) as poidconf_count FROM  
                                    akksofttech_purchase_order
                                    WHERE sto_id = '".$_SESSION['akksofttechsess_stoid']."'
                                    AND po_status = '2' OR po_status = '7'
                                    AND date(po_start_date) = '".$dateeshow."'  ";
                                   
                                    $reodcf= mysqli_query($connect,$odcf);
                                    $row_odcf = mysqli_fetch_array($reodcf);
                                ?>

                                <div class="col-md-6 col-xl-3">
                                    <div class="card bg-warning text-white mb-3">
                                        <div class="card-header"><i class='bx bx-task'></i> ORDERS TO CONFIRM</div>
                                        <div class="card-body" align="right">
                                            <h4 class="card-title text-white"><span>
                                                    <?php if($row_odcf['poidconf_count'] != ""){
                                                        echo $row_odcf['poidconf_count']." Orders";
                                                     }else{
                                                        echo "0 Order";
                                                     }
                                                      ?></span></h4>

                                        </div>
                                    </div>
                                </div>

                                <?php
                                    //  $date = date('Y-m-d  00:00:00');
                                    //  $date1 = date('Y-m-d  23:59:59');

                                   

                                    $dateeshow = date("Y-m-d");  
                                   
                                    $res ="SELECT COUNT(res_id) as resid_count FROM  akksofttech_tabledreserve
                                    WHERE sto_id = '".$_SESSION['akksofttechsess_stoid']."'
                                    AND date(res_date) = '".$dateeshow."'
                                    
                                   ";
                                   
                                    $reres= mysqli_query($connect,$res);
                                    $row_res = mysqli_fetch_array($reres);
                                ?>

                                <div class="col-md-6 col-xl-3">
                                    <div class="card bg-success text-white mb-3">
                                        <div class="card-header"><i class='bx bx-calendar'></i> BOOKING</div>
                                        <div class="card-body" align="right">

                                            <h4 class="card-title text-white"><span class=""><span>
                                                        <?php if($row_res['resid_count'] != ""){
                                                        echo $row_res['resid_count']." Orders";
                                                     }else{
                                                        echo "0 Order";
                                                     }
                                                      ?></span></span></h4>

                                        </div>
                                    </div>
                                </div>




                            </div>


                            <div class="card mb-4">

                                <div class="card">
                                      
                                    
                                    
                                        <div id="showchag_v2"></div>

                                    

                                </div>
                            </div>

                            <div class="card mb-4">

                                <div class="card">

                                    
                                        <div id="showchag_v3"></div>

                                    

                                </div>
                            </div>

                            <!-- <div class="card mb-4">

                                <div class="card">

                                    
                                        <div id="container"></div>

                                    

                                </div>
                            </div> -->








                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- END Content -->
    </div>
    <!-- END Content wrapper -->


    <?php require '../include_backend/script.php' ?>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


    <script src="js/scripts.js?v=1001"></script>
    <script src="demo/indexJSdaily.js?v=1001"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js?v=1001" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js?v=1001" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js?v=1001" crossorigin="anonymous">
    </script>



<script type="text/javascript">

$(document).bind("contextmenu", function (event) {
  event.preventDefault(); // ห้ามคลิกขวา
});
$(document).bind("selectstart", function (event) {
  event.preventDefault(); // ห้ามลากคลุม
});

</script>

<script type="text/javascript">




</script>
</body>

</html>