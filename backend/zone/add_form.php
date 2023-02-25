<?php require '../include_backend/head.php' ;

@session_start();
require_once '../include/condb.php';

 
if( $_GET['id'] != 0){

    $sql2 ="SELECT * FROM akksofttech_tablezone WHERE zone_id = '".$_GET['id']."'" ;
    $result2 = mysqli_query($connect,$sql2) or die ("error ".mysqli_error($connect));
    $row = mysqli_fetch_array($result2);
}

 
 


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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">ZONE</span></h4>

                    <div class="row">
                        <div class="col-md-12">

                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                       
                        <li class="nav-item">
                            <a type=" button" class="btn btn-primary" id="btn-view" href="index.php"><i class="bx bx-show-alt"></i> VIEW ZONE</a>                                                                    
                        </li>
                    </ul>
                            <!-- Basic Layout -->
                            <div class="row">
                            <div class="box-1"> 
                   
                
                                <div class="col-xl">
                                    <div class="card mb-4">

                                        <div class="card-body">
                                       
                                            <form method='post' id='emp-SaveForm1'>

                                            <div class="mb-3" style="display:none;">
                                                    <label class="form-label" for="basic-default-fullname">ID</label>
                                                    <input type="text" readonly="readonly" class="form-control" name="zone_id" id="zone_id"
                                                         value='<?php echo $row['zone_id'];?>'
                                                    />
                                            </div>
                                            
                                                <div class="mb-3" style="display:none;">
                                                    <label class="form-label" for="basic-default-fullname">ID
                                                        Member</label>
                                                    <input type="text" class="form-control" name="mem_id" id="mem_id"
                                                         value='<?php echo $_SESSION['akksofttechsess_memid'];?>'
                                                         />
                                                </div>
                                                <div class="mb-3" style="display:none;">
                                                    <label class="form-label" for="basic-default-fullname">Name Member</label>
                                                    <input type="text" class="form-control" name="mem_name" id="mem_name"
                                                         value='<?php echo $_SESSION['akksofttechsess_name'];?>'
                                                        />
                                                </div>
                                                
                                                <div class="row mb-3" style="display:none;">
          
                                                  
                                                
                                                <label class="col-sm-2 col-form-label" for="basic-default-fullname">Store ID</label>
                                                
                                                <div class="col-sm-10">
                                                <input type="text" readonly="readonly" class="form-control" name="sto_id" id="sto_id"
                                                value='<?php echo $_SESSION['akksofttechsess_stoid']; ?>'/>

                                                </div>
                                                </div>
                                              
                                                <div class="row mb-3" >
                                                  
                                                    <label  class="col-sm-2 col-form-label" for="basic-default-name">Zone Name</label>
                                                    <div class="col-sm-10">        
                                                        <input type="text" class="form-control" name="zone_name" id="zone_name"
                                                          value='<?php echo $row['zone_name'];?>'
                                                        autocomplete="off" required="asdasdas" required
                                                        oninvalid="this.setCustomValidity('please fill in')"
                                                        oninput="this.setCustomValidity('')"       
                                                        />
                                                        
                                                    </div>   
                                                </div>

                                                
                                            
                                                
                                                
                                                <div class="row justify-content-end">
                                                    <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-success" name="btn-save"
                                                    id="btn-save">SAVE</button>
                                                </div>
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


 
    <?php require '../include_backend/script.php' ?>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    
    
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
    <script type="text/javascript" src="crud.js"></script>
    
  
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