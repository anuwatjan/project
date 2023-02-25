                    
                    <!-- <div class="mb-3 row">
                                
                                <label class="col-md-2 col-form-label">Search by date time</label>
              

                                <div class="col-md-1">
                                
                                
                                <a type="button" class="btn">START</a>

                                </div>

                                <div class="col-md-3">
                                    
                                    <input class="form-control" id="stasdate" type="datetime-local"  value="<?php echo $_GET['stasdate'];?>"/> 
                                    
                                </div>
                                <div class="col-md-1">
                                
                                
                                <a type="button" class="btn">TO</a>
                               
                                </div>
                                <div class="col-md-3">
                                    
                                <input class="form-control" id="stopdate" type="datetime-local"  value="<?php echo $_GET['stopdate'];?>"/>
                                    
                                </div>
                                <div class="col-md-2">
                                
                                
                                <a type="button" class="btn btn-primary text-white" id="search">SEARCH</a> <a type="button" class="btn btn-danger" href="index.php">CLEAR</a>

                                </div>

                               
                            
                    </div>  -->
  
  <!-- TABLE -->
                               
  <div class="card">
                
                <div class="table-responsive text-nowrap">

                    <table class="table table-borderless" id="myTable">
                    
                    <thead class="table-primary">
                        <tr>

                            <th style="text-align:center;">ID</th>

                            <th style="text-align:center;">date time</th>
                            <th style="text-align:center;">table</th>
                            <th style="text-align:center;">amount</th>

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
                    AND res_status = 'booked'  ORDER BY res_datereserve DESC  " ; 
                    }else{
                    $sql ="SELECT * FROM akksofttech_tabledreserve 
                    WHERE sto_id = '".$_SESSION['akksofttechsess_stoid']."'  
                    AND res_status = 'booked'  ORDER BY res_datereserve DESC  " ; 
                    }

                    
                    $result = mysqli_query($connect,$sql) or die ("error ".mysqli_error($connect));
                    while ($row = mysqli_fetch_array($result)) {
                    // $sql ="SELECT * FROM akksofttech_tabledreserve 
                    // WHERE sto_id = '".$_SESSION['akksofttechsess_stoid']."' AND res_datereserve = '".$_GET['stasdate']."'  
                    // AND res_status = 'booked'  GROUP BY date(res_datereserve)" ; 
                    
                    // DESC ASC

                    
                    
                    ?>

                        <tr>
                            
                            <td style="text-align:center;" ><?php echo $row['res_id']; ?></td>
                            <td style="text-align:center;"><?php echo $row['res_datereserve'];?></td>
                            <td style="text-align:center;"><?php echo $row['table_name'];?></td>
                            <td style="text-align:center;"><?php echo $row['res_person'];?></td>
                            <td style="text-align:center;"><?php echo $row['cus_name'];?></td>
                            <td style="text-align:center;"><?php echo $row['res_phone'];?></td>
                            <td style="text-align:center;"><?php echo $row['res_note'];?></td>
                            <td style="text-align:center;"><a type="button" id="<?php echo $row['res_id']; ?>" class="checkin btn btn-outline-warning" >CHECK IN</a> 
                            <a type="button" id="<?php echo $row['res_id']; ?>" class="cancel btn btn-outline-danger" >CANCEL</a></td>
                        
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!--/ END TABLE -->

        