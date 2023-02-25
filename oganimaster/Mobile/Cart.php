<style>
.modal-dialog3 {
    position: fixed;
    /* bottom: 0; */
    /* top: 0; */
    /* left: 0; */
    /* right: 0; */
    margin: 0;
    padding: 0;
    /* display: inline-block; */
    max-width: 100%;
    /* height: 100%; */
    width: 100% overflow: scroll;

    position: fixed;
    top: auto;
    right: 0;
    left: 0;
    bottom: 0;

}

.iBannerFix {
    height: 50px;
    position: fixed;
    left: 0px;
    bottom: 0px;
    background-color: #000000;
    width: 100%;
    color: white;
    z-index: 99;
}

.ex1 {
    overflow-y: scroll;
    height: 400px;
    width: 100%;
}

.btn-1 {
    background-image: linear-gradient(to right, #663399 0%, #663399 51%, #ffff 100%);
}
</style>

<div class="modal fade " id="Cart_Detail_Mobile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog3" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="ex1 modal-body">

                <div id="container">

                    <table id="table_show">

                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody id="Product_To_Table_Mobile">

                            <?php
                                $totall = 0 ; 
                                $pricee = 0 ;
                                $sql = "SELECT * FROM akksofttech_cart WHERE cus_id = '".$_SESSION['akksofttechsess_cusid']."'" ;
                                $query = mysqli_query($conn , $sql) ; 
                                $num = mysqli_num_rows($query) ; 
                                while($result = mysqli_fetch_array($query)){
                                    $pricee +=  $result['prod_price_simple'] * $result['quantity']  ;
                                    $totall +=  $result['quantity']  ;
                                ?>

                            <tr valign="middle" align="center"
                                class=" delete_mem_mobile<?php echo $result['cart_id'] ; ?> ">
                                <div class="prod_name text-rebacca">

                                    <td><img class="mx-2" style="border-radius: 50%;"
                                            src="../backend/getimg/prod/<?php echo $result['prod_image'] ; ?>" alt=""
                                            width="50px;"></td>

                                    <td width="42%" style="font-size:16px;">


                                        <strong>
                                            <?php echo $result['prod_name'] ; ?>
                                            <?php if(($result['sprod_name'] != "-") && $result['sprodone_name'] == "-"){ ?>
                                            <?php echo $result['sprod_name'] ; ?>
                                            <?php }else if(($result['sprodone_name'] != "-" && $result['sprod_name'] != "-" )){  ?>
                                            <?php echo $result['sprod_name'] ; ?>
                                            <?php echo $result['sprodone_name'] ; ?>

                                            <?php }else{  echo "" ;  } ?>
                                            <br>
                                            <?php if(($result['message'] != "-")){ ?>
                                            NOTE : <?php echo $result['message'] ; ?>
                                            <?php }else{ echo "" ; } ?>

                                        </strong>


                                        <br>

                                        <strong style="font-size:16px;"> £
                                            <?php echo number_format($result['prod_price_simple'],2,'.',',') ; ?>
                                        </strong>

                                    </td>

                                </div>

                                <td width="8%">

                                    <div class="Box_Cart_Number_Product_Mobile text-center">

                                        <form class="form2">

                                            <div class="value-button2 text-white" id="decreaseValue2"
                                                value="Decrease Value" data-id='<?php echo $result['cart_id'] ; ?>'>
                                                -
                                            </div>

                                            <input readonly type="number2"
                                                id="number2<?php echo $result['cart_id'] ; ?>" min="1" class="number2"
                                                data-id='<?php echo $result['cart_id'] ; ?>'
                                                value="<?php echo $result['quantity'] ; ?>" />

                                            <div class="value-button2 text-white" id="increaseValue2"
                                                value="Increase Value" data-id='<?php echo $result['cart_id'] ; ?>'>
                                                +
                                            </div>

                                        </form>

                                        <div id="show_price_qty_mobile"><a
                                                style="font-size:18px;"><?php echo  number_format($result['prod_price_simple'] * $result['quantity'],2,'.',',') ; ?></a>
                                        </div>

                                    </div>

                                </td>

                                <td width="5%">

                                    <div class="Cart_Delete_Mobile" data-id='<?php echo $result['cart_id'] ; ?>'>
                                        <a><i class="fa fa-trash fa-2x" style='color: red' aria-hidden="true"></i></a>
                                    </div>

                                </td>

                </div>

                </tr>

                <?php } ?>

                </tbody>

                </table>
            </div>

        </div>

        <div class="modal-footer">

            <div class="row pricee mb-5">
                <div class="col" style="vertical-align: middle;font-size:26px;">
                    TOTAL
                </div>
                <div class="col" style="vertical-align: middle;font-size:26px;">
                    <a id="Cart_Total_Mobile">£<?php echo number_format($prod_price_simple,2,'.',',') ; ?></a>
                </div>

            </div>



        </div>
        <button type="button" id="checkout1" class="btn btn-1"> GO TO CHECKOUT </button>


    </div>

</div>


