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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">TABLE</span></h4>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                <li class="nav-item">
                                    <a type="button" class="btn btn-success" id="btn-add" href="add_form.php"><i
                                            class="bx bx-plus"></i> ADD TABLE</a>
                                </li>
                                <li class="nav-item">
                                    <a type="button" class="btn btn-primary" id="btn-view" href="#"><i
                                            class="bx bx-show-alt"></i> VIEW TABLE</a>
                                </li>
                            </ul>




                            <div class="card mb-4">
                                <h5 class="card-header">TABLE LIST</h5>
                                <hr class="my-0" /><br>
                                <!-- Table -->
                                <div class="table-responsive text-nowrap">
                                    <div class="content-loader">
                                        <table class="table table-borderless" style="align-ce" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:center;">ID TABLE</th>
                                                    <th style="text-align:center;">NAME</th>
                                                    <th style="text-align:center;">amount of seats</th>
                                                    <th style="text-align:center;">ZONE</th>
                                                    <!-- <th 
                                                    >STATUS</th> -->
                                                    <th style="text-align:center;">ACTIONS</th>

                                                </tr>
                                            </thead>
                                            <tbody id="mysfutton">
                                                <?php
                                       
                                       
                                       
                                          $sql ="SELECT * FROM akksofttech_tabledinning as td
                                          INNER JOIN akksofttech_tablezone as tz on td.zone_id = tz.zone_id
                                          WHERE td.sto_id = '".$_SESSION['akksofttechsess_stoid']."'" ;
                                          $result = mysqli_query($connect,$sql) or die ("error ".mysqli_error($connect));
                                          while ($row = mysqli_fetch_array($result)) {
                                         
                                          
                                    ?>
                                                <tr>
                                                    <td style="text-align:center;"># <?php echo $row['table_id']; ?></td>

                                                    <td style="text-align:center;"><?php echo $row['table_name']; ?></td>
                                                    <td style="text-align:center;"><?php echo $row['table_person']; ?></td>
                                                    <td style="text-align:center;"><?php echo $row['zone_name']; ?></td>
                                                    <!-- <td>
                                                    
                                                    <div class="form-check form-switch mb-2">
                                                        
                                                        <?php if($row['table_status'] == "YES"){ ?>
                                                    <input class="form-check-input" type="checkbox" value="<?php echo $row['table_status']; ?>"  checked/> ON

                                                        <?php }else{ ?>
                                                             <input class="form-check-input" type="checkbox" value="<?php echo $row['table_status']; ?>"  /> OFF

                                                        <?php }
                                                        ?>
                                                    </div>
                                                    
                                                    </td> -->
                                                    <td style="text-align:center;">
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a href="add_form.php?id=<?php echo $row['table_id']; ?>"
                                                                class="dropdown-item" title="Edit"><i
                                                                class="bx bx-edit-alt me-1"></i> EDIT</a>
                                                                <a class="delete dropdown-item"
                                                                id="<?php echo $row['table_id']; ?>" href="#"><i
                                                                class="bx bx-trash me-1"></i> DELETE</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <!-- END Table -->
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

    <script type="text/javascript" src="crud.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
    $(document).bind("contextmenu", function(event) {
        event.preventDefault(); // ห้ามคลิกขวา
    });
    $(document).bind("selectstart", function(event) {
        event.preventDefault(); // ห้ามลากคลุม
    });
    </script>

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

</body>

</html>