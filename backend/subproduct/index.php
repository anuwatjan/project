<?php require '../include_backend/head.php' ;


@session_start();
require_once '../include/condb.php';

$sql2 = "SELECT * FROM akksofttech_product WHERE prod_id = '".$_GET['prod_id']."'" ; 
$query2 = mysqli_query($connect , $sql2) ; 
$result2 = mysqli_fetch_array($query2) ;  

$prod_name = $result2['prod_name'];


?>
<style>
::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 0px;
}
</style>

<body>









    <div class="card mb-4">


        <div class="card-body">

            <div class="mb-3" align="right">
                <a type=" button" class="btn btn-success" id="btn-add"
                    href="add_form.php?prod_id=<?php echo $_GET['prod_id'];?>"><i class="bx bx-plus"></i> ADD SUB
                    PRODUCT</a>

            </div>

            <h5 class="card-header"><?php echo $prod_name;?> # <?php echo $_GET['prod_id'];?></h5>
            <hr class="my-0" /><br>
            <!-- Table -->
            <div class="table-responsive text-nowrap">
                <div class="content-loader">

                    <table class="table table-borderless" style="width:100%;">

                        <tbody id="mysfutton">
                            <?php
                                       
                     
                                                  
                                       $sql ="SELECT sp.sprod_id, sp.sprod_name, sp.sprod_sku, 
                                       sp.sprod_image, sp.sprod_price, sp.sprod_detail,
                                       sp.prod_id, p.prod_name, sp.sprod_quantity
                                       FROM  akksofttech_subproduct AS sp
                                       INNER JOIN  akksofttech_product AS p ON sp.prod_id = p.prod_id
                                       WHERE sp.mem_id = '".$_SESSION['akksofttechsess_memid']."' AND  p.prod_id = '".$_GET['prod_id']."'" ;
                                       $result = mysqli_query($connect,$sql) or die ("error ".mysqli_error($connect));
                                       while ($row = mysqli_fetch_array($result)) {
                                                    
                                                   
                      ?>
                            <tr>

                                <td style="text-align:center;"># <?php echo $row['sprod_id']; ?></td>
                                <td style="text-align:center;"><?php echo $row['sprod_name']; ?></td>
                                <td style="text-align:center;"><?php echo $row['sprod_sku']; ?></td>

                                <td style="text-align:center;">
                                    <?php echo  number_format($row['sprod_price'],2,'.',','); ?></td>


                                <td style="text-align:center;"> <button type="button" class="btn btn-success"
                                        id="ok_molo" sprod_id="<?php echo $row['sprod_id']; ?>" data-bs-toggle="modal"
                                        data-bs-target="#backDropModal"> + ADD </button> </td>
                                <td style="text-align:center;">
                                    <a href="add_form.php?id=<?php echo $row['sprod_id']; ?>" type="button"
                                        class="btn btn-outline-warning">
                                        <i class="bx bx-edit-alt me-1"></i>
                                    </a>

                                    <a id="<?php echo $row['sprod_id']; ?>" type="button" href="#"
                                        class="delete btn btn-outline-danger">
                                        <i class="bx bx-trash me-1"></i>
                                    </a>

                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                    <!-- End ตาราง -->

                    </div>
                <div>
            <div>
        <div>




                        <!-- / Content -->


                        <!-- Modal -->
                        <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                            <div class="modal-dialog modal-fullscreen" role="document">
                            <div class="modal-content">
                              
                                <div class="modal-header">

                                

                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                  BACK
                                </button>

                                    </div>
                                    
                                    <div class="modal-body" id="show_subproductone"> </div>



                                    
                                <div class="modal-footer">
                          

                                </div>

                                </div> 
                            </div>
                        </div>

                        <!--END Modal -->


                        <?php require '../include_backend/script.php' ?>
                        <script src="https://code.jquery.com/jquery-3.6.0.js"
                            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
                        </script>



                        <script type="text/javascript" src="crud.js"></script>

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



                            $("#mysfutton").on("click","#ok_molo",function(){

var sprod_id = $(this).attr('sprod_id');

console.log(sprod_id);

$("#show_subproductone").html('<iframe src="../subproductone/index.php?sprod_id='+sprod_id+'"  style="width:100%;height:600px;"  name="myiframe2222" id="framelayout" frameborder="0"  style=""></iframe>');


})



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





                            var table = $('#example').DataTable({
                                select: false,
                                "columnDefs": [{
                                    className: "Name",
                                    "targets": [0],
                                    "visible": false,
                                    "searchable": false
                                }]
                            }); //End of create main table


                            $('#example tbody').on('click', 'tr', function() {

                                alert(table.row(this).data()[0]);

                            });

                        });
                        </script>


</body>

</html>