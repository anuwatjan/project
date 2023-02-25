<?php require '../include_backend/head.php' ;

@session_start();
require_once '../include/condb.php';

if( $_GET['id'] != 0){
    
    $sqres ="SELECT * FROM akksofttech_tabledreserve 
    WHERE res_id = '".$_GET['id']."'" ;
    $resures = mysqli_query($connect,$sqres);
    $row = mysqli_fetch_array($resures);


    $newdate = date("Y/m/d", strtotime($row['res_datereserve']));
    $newtime = date("H:i", strtotime($row['res_datereserve']));
    // echo $newdate;
    // echo $newtime;
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

                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">EDIT BOOKING</span></h4>


                    <div class="row">
                        <div class="col-md-12">

                            <!-- Basic Layout -->
                            <div class="row">

                                <div class="col-xl">

                                    <div class="card mb-4">

                                        <div class="card-body">
                                        <div class="mb-3" align="left">  
                                        <a type="button" href="index.php" class="btn btn-danger">BACK</a>
                                        </div>
                                            <div class="alert alert-primary" role="alert">
                                                <center><?php echo $_SESSION['akksofttechsess_stoname']; ?> TABLES
                                                </center>
                                            </div>

                                            
                                            <hr>

                                            <div class="card shadow-none bg-transparent border border-primary mb-3">

                                                <div class="card-body">

                                                    <form method='post' id='emp-SaveForm1'>

                                                    <div class="mb-3" style="display:none;">
                                                            <label class="form-label">ID</label>

                                                            <input type="text" class="form-control" name="res_id"
                                                                id="res_id"
                                                                value='<?php echo $row['res_id']; ?>' />
                                                        </div>

                                                        <div class="mb-3" style="display:none;">
                                                            <label class="form-label">Store Id</label>

                                                            <input type="text" class="form-control" name="sto_id"
                                                                id="sto_id"
                                                                value='<?php echo $_SESSION['akksofttechsess_stoid']; ?>' />
                                                        </div>


                                                        <div class="row mb-3">

                                                            <label class="col-sm-2 col-form-label">Zone</label>
                                                            

                                                            <div class="col-sm-5">

                                                           
                                                                <select name="zone_id" id="zone_id" class='form-select'
                                                                    required>

                                                                    <option value='0'>Choss</option>

                                                                    <?php
                                                                
                                                                 $qzone = "SELECT zone_id, zone_name FROM akksofttech_tablezone  
                                                                WHERE sto_id ='".$_SESSION['akksofttechsess_stoid']."'";
                                                                $reqzone = mysqli_query($connect,$qzone);
                                                                while ($rowzone = mysqli_fetch_array($reqzone)) {

                                                                echo '<option value="'.$rowzone['zone_id'].'">'.$rowzone['zone_name'].'</option>'; 
                                                                }
                                                            
                                                                ?>

                                                                </select>

                                                            </div>
                                                            <div class="col-sm-5">
                                                            
                                                            

                                                                <select name="table_id" id="table_id"
                                                                    class='form-select'  required>

                                                                    <option value='<?php echo $row['table_id']; ?>'>Choss</option>


                                                                </select>

                                                            </div>


                                                        </div>


                                                        

                                                        

                                                        



                                                        
                                                        <div class="mb-3 row">

                                                            

                                                            <label class="col-md-2 col-form-label">DATE</label>
                                                            <div class="col-md-4">

                                                             
                                                                <input type="date" name="date" class="form-control"
                                                                    min="<?php echo date('Y-m-d');?>" value='<?php echo $newdate; ?>' autocomplete="off" required
                                                                    oninvalid="this.setCustomValidity('please fill in')"
                                                                    oninput="this.setCustomValidity('')">
                                                            </div>
                                                            

                                                            <label class="col-md-2 col-form-label">TIME</label>
                                                            <div class="col-md-4">


                                                                <input type="time" name="time" class="form-control" value='<?php echo $newtime; ?>'>

                                                            </div>
                                                        </div>

                                                        

                                                        <div class="row justify-content-end">
                                                            <div class="col-sm-10">
                                                                <button type="submit" class="btn btn-success"
                                                                    name="btn-save" id="btn-save">SAVE</button>
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
                </div>
            </div>
        </div>
    </div>

  





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
<script>
    $(document).ready(function() {

        $("#zone_id").change(function() { //

            $.ajax({
                url: "view_table.php", //ทำงานกับไฟล์นี้
                data: "zone_id=" + $("#zone_id").val(), //ส่งตัวแปร
                type: "POST",
                async: false,
                success: function(data, status) {

                    $("#table_id").html(data);


                },

                error: function(xhr, status, exception) {
                    alert(status);
                }

            });
            //return flag;
        });

        $("#zone_name").keyup(function() {

            var value = $(this).val().toLowerCase();
            $("#zone_id option").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });

        });


    });
    </script>

</body>

</html>