<?php require '../include_backend/head.php' ;


@session_start();
require_once '../include/condb.php';
$sql2 = "SELECT * FROM akksofttech_subproduct WHERE sprod_id = '".$_GET['sprod_id']."'" ; 
$query2 = mysqli_query($connect , $sql2) ; 
$result2 = mysqli_fetch_array($query2) ;  

$sprod_name = $result2['sprod_name'];


?>
<style>
::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 0px;
}
</style>
<body>


    
                  
                <!-- ตาราง -->
                <div class="card mb-4">
                  
                <div class="card-body">

                  <div class="mb-3" align="right">
                    <a type=" button" class="btn btn-success" id="btn-add"
                    href="add_form.php?sprod_id=<?php echo $_GET['sprod_id'];?>"><i class="bx bx-plus"></i> ADD SUB
                    PRODUCT</a>

                  </div>

                        <h5 class="card-header"><?php echo $sprod_name;?> # <?php echo $_GET['sprod_id'];?></h5>
                        <hr class="my-0" /><br>
                        <!-- Table -->
                        <div class="table-responsive text-nowrap">
                        <div class="content-loader">

                  <table class="table table-hover">
                  <!-- <thead>
                      <tr> 
                      
                        <th style="text-align:center;">ID</th>
                        <th style="text-align:center;">Name</th>
                        <th style="text-align:center;">SKU</th>
                        <th style="text-align:center;">PICTURE</th>
                        <th style="text-align:center;">PRODUCT</th>
                        <th style="text-align:center;">SUB PRODUCT</th>
                        <th style="text-align:center;">PRICE</th>
                        <th style="text-align:center;">DETAIL</th>
                        <th style="text-align:center;">QUANTITY</th>
                        <th style="text-align:center;">ACTIONS</th>
                        
                        
                      </tr>
                  </thead> -->
                  <tbody class="table-border-bottom-0" id="mysfutton">
                  <?php
                                       
                     
                        // `sprodone_id``sprodone_name``sprodone_sku``sprodone_image``sprodone_quantity``sprodone_price``sprodone_detail``prod_id``sprod_id`         
                                       $sql ="SELECT 
                                       spo.sprodone_id, spo.sprodone_name, spo.sprodone_sku, 
                                       spo.sprodone_image, spo.sprodone_price, spo.sprodone_detail,
                                       spo.prod_id, p.prod_name, spo.sprodone_quantity, sp.sprod_id, sp.sprod_name
                                       FROM  akksofttech_subproduct_one AS spo 
                                       INNER JOIN  akksofttech_product AS p ON spo.prod_id = p.prod_id
                                       INNER JOIN  akksofttech_subproduct AS sp ON spo.sprod_id = sp.sprod_id
                                       WHERE spo.mem_id = '".$_SESSION['akksofttechsess_memid']."' AND  sp.sprod_id = '".$_GET['sprod_id']."'" ;
                                       $result = mysqli_query($connect,$sql) or die ("error ".mysqli_error($connect));
                                       while ($row = mysqli_fetch_array($result)) {
                                                    
                                                   
                      ?>
                                   <tr>
                                                
                                   <td style="text-align:center;"># <?php echo $row['sprodone_id']; ?></td>
                                   <td style="text-align:center;"><?php echo $row['sprodone_name']; ?></td>
                                   <td style="text-align:center;"><?php echo $row['sprodone_sku']; ?></td>
                                   
                                   <td style="text-align:center;"><?php echo $row['prod_name']; ?></td>
                                   
                                   <td style="text-align:center;"><?php echo number_format($row['sprodone_price'],2,'.',','); ?></td>
                                   
                                  
                                  
                                   <td style="text-align:center;">
                                   <a href="add_form.php?id=<?php echo $row['sprodone_id']; ?>" type="button"
                                        class="btn btn-outline-warning">
                                        <i class="bx bx-edit-alt me-1"></i>
                                    </a>

                                    <a id="<?php echo $row['sprodone_id']; ?>" type="button" href="#"
                                        class="delete btn btn-outline-danger">
                                        <i class="bx bx-trash me-1"></i>
                                    </a>
                                   </td>
                                   </tr>
                                   <?php } ?>
                  </tbody>
                </tabel>
                   <!-- End ตาราง -->
              </div>
            
              <div> 
            <div> 

           </div>
                
            <!-- / Content -->
          

     
    <?php require '../include_backend/script.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script> -->
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="crud.js"></script>

<script type="text/javascript">

$(document).bind("contextmenu", function (event) {
  event.preventDefault(); // ห้ามคลิกขวา
});
$(document).bind("selectstart", function (event) {
  event.preventDefault(); // ห้ามลากคลุม
});

</script>

    <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
   <script type="text/javascript">
      $(document).ready(function(){
      	$("#btn-view").hide();
      	$("#btn-add").click(function(){
      		$(".content-loader").fadeOut('slow', function(){
      			$(".content-loader").fadeIn('slow');
      			$(".content-loader").load('add_form.php');
      			$("#btn-add").hide();
      			$("#btn-view").show();
      		});
      	});
      
      	$("#btn-view").click(function(){
      		$("body").fadeOut('slow', function(){
      			$("body").load('index.php');
      			$("body").fadeIn('slow');
      			window.location.href="index.php";
      		});
      	});
      
      
      
      
      	
      	var table = $('#example').DataTable({ 
        select: false,
        "columnDefs": [{
            className: "Name", 
            "targets":[0],
            "visible": false,
            "searchable":false
        }]
    });//End of create main table

  
  $('#example tbody').on( 'click', 'tr', function () {
   
    alert(table.row( this ).data()[0]);

} );
      
      });
      
   </script>


</body>

</html>