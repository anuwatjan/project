<?php require '../include_backend/head.php' ;

@session_start();
require_once '../include/condb.php';
$schart ="SELECT * FROM akksofttech_tablechart WHERE sto_id = '".$_SESSION['akksofttechsess_stoid']."'" ;
$rchart = mysqli_query($connect,$schart);
$row = mysqli_fetch_array($rchart);

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

                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">MY BOOKING</span></h4>


                    <div class="row">
                        <div class="col-md-12">

                            <!-- Basic Layout -->
                            <div class="row">
                                
                                <div class="col-xl">

                                    <div class="card mb-4">

                                        <div class="card-body">
                                
                     
                                        <div class="mb-3 row">
                                
                                        <label class="col-md-3 col-form-label">Search by date time</label>


<div class="col-md-1">


    <a type="button" class="btn">START</a>

</div>

<div class="col-md-2">

    <input class="form-control" id="stasdate" type="datetime-local"
        value="<?php echo $_GET['stasdate'];?>" />

</div>
<div class="col-md-1">


    <a type="button" class="btn">TO</a>

</div>
<div class="col-md-2">

    <input class="form-control" id="stopdate" type="datetime-local"
        value="<?php echo $_GET['stopdate'];?>" />

</div>
<div class="col-md-3">


    <a type="button" class="btn btn-primary text-white"
        id="search">SEARCH</a> <a type="button" class="btn btn-danger"
        href="index.php">CLEAR</a>

</div>

                               
                            
                    </div> 
                               

                    <div class="col">
                      
                      <div class="demo-inline-spacing mt-3">
                        <div class="list-group list-group-horizontal-md text-md-center">
                          <a
                            class="list-group-item list-group-item-action "
                            
                            href="index.php"
                            >BOOKED</a
                          >
                          <a
                            class="list-group-item list-group-item-action active"
                            
                            href="form_checkin.php"
                            >CHECK IN</a
                          >
                          <a
                            class="list-group-item list-group-item-action "
                            
                            href="form_checkout.php"
                            >CHECK OUT</a
                          >
                          <a
                            class="list-group-item list-group-item-action"
                           
                            href="form_cancel.php"
                            >CANCEL</a
                          >
                          
                        </div>





                        
                        <div class="tab-content px-0 mt-0">

                          <div class="tab-pane fade show active">
                                              
  
  <!-- TABLE -->
                               
  <div class="card">
                
                <div class="table-responsive text-nowrap">

                    <table class="table table-borderless" id="myTable">
                    
                    <thead class="table-primary">
                        <tr>

                            <th style="text-align:center;">ID</th>

                            <th style="text-align:center;">date time</th>
                            <th style="text-align:center;">table</th>
                            <th style="text-align:center;">pax</th>

                            <th style="text-align:center;">customer name</th>

                            <th style="text-align:center;">phone</th>

                            <th style="text-align:center;">Note</th>

                            <th style="text-align:center;">action</th>
                        </tr>
                    </thead>

                    <tbody class="table-border-bottom-0" id="mysfutton">
                    <?php


                        

                    if($_GET['stasdate'] != ""){
                    $sql ="SELECT * FROM akksofttech_tabledreserve 
                    WHERE sto_id = '".$_SESSION['akksofttechsess_stoid']."' AND res_datereserve BETWEEN '".$_GET['stasdate']."'  AND '".$_GET['stopdate']."'   
                    AND res_status = 'checkin'  ORDER BY res_datereserve DESC  " ; 
                    }else{
                    $sql ="SELECT * FROM akksofttech_tabledreserve 
                    WHERE sto_id = '".$_SESSION['akksofttechsess_stoid']."'  
                    AND res_status = 'checkin'  ORDER BY res_datereserve DESC  " ; 
                    }

                    
                    $result = mysqli_query($connect,$sql) or die ("error ".mysqli_error($connect));
                    while ($row = mysqli_fetch_array($result)) {
                    $newdate = date("d/m/Y H:i", strtotime($row['res_datereserve']));
                   

                    
                    
                    ?>

                        <tr>
                            
                            <td style="text-align:center;" ><?php echo $row['res_id']; ?></td>
                            <td style="text-align:center;"><?php echo $newdate;?></td>
                            <td style="text-align:center;"><?php echo $row['table_name'];?></td>
                            <td style="text-align:center;"><?php echo $row['res_person'];?></td>
                            <td style="text-align:center;"><?php echo $row['cus_name'];?></td>
                            <td style="text-align:center;"><?php echo $row['res_phone'];?></td>
                            <td style="text-align:center;"><?php echo $row['res_note'];?></td>
                            <td style="text-align:center;"><a type="button" href="#" id="<?php echo $row['res_id']; ?>" class="checkout btn btn-outline-success" >CHECK OUT</a> 
                            
                        
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require '../include_backend/script.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        
        <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="checkin.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    
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