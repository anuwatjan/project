<?php 

   require '../include_backend/head.php' ;
   @session_start();
   require_once '../include/condb.php';
  
   
    $sql2 = "SELECT * FROM akksofttech_category WHERE cat_id = '". $_GET['cat_id']."'" ; 
    $query2 = mysqli_query($connect , $sql2) ; 
    $result2 = mysqli_fetch_array($query2) ;  

    $cat_name = $result2['cat_name'];
   
   
   
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

                  <a type=" button" class="btn btn-success" id="btn-add" href="add_form.php?cat_id=<?php echo $_GET['cat_id'];?>"><i class="bx bx-plus"></i>ADD SUB CATEGORY</a>
                  
                  </div> 

                  <h5 class="card-header"><?php echo $cat_name;?> # <?php echo $_GET['cat_id'];?></h5>
                        <hr class="my-0" /><br>

                        <!-- Table -->
                        <div class="table-responsive text-nowrap">
                           
                           <div class="content-loader">

                              <table class="table table-borderless" id="myTable"   style="width:100%;">
                 
                                 <tbody id="mysfutton">

                                    <?php
                                       
                                       
                                       
                                          $sql ="SELECT * FROM  akksofttech_subcategory WHERE sto_id = '".$_SESSION['akksofttechsess_stoid']."' AND  cat_id = '".$_GET['cat_id']."' " ;
                                          $result = mysqli_query($connect,$sql) or die ("error ".mysqli_error($connect));
                                          while ($row = mysqli_fetch_array($result)) {
                                         
                                          
                                    ?>

                                    <tr style="text-align:center;">
                                     
                                       <td style="text-align:center;"># <?php echo $row['scate_id']; ?></td>
                                       <td style="text-align:center;"> <?php echo $row['scate_name']; ?>
                                          
                                          
                                       </td>
                                       
                      

                                       <td style="text-align:center;">

                                       
                                          <a href="add_form.php?id=<?php echo $row['scate_id']; ?>" type="button"   class="btn btn-outline-warning">
                                             <i class="bx bx-edit-alt me-1"></i>
                                          </a>

                                          <a id="<?php echo $row['scate_id']; ?>" type="button" href="#"  class="delete btn btn-outline-danger">
                                             <i class="bx bx-trash me-1"></i>
                                          </a>

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
                                 
            
           
          
               
   <!-- / Content -->              
   <?php require '../include_backend/script.php' ?>
   <script src="https://code.jquery.com/jquery-3.6.0.js"
   integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
   
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
   //  $('#myTable').DataTable();
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
      
      
      
      
      	
      	
      
      });
   </script>
  
</body>
</html>