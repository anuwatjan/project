<style>


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
    color: white;

    background-image: linear-gradient(to right, #663399 0%, #663399 51%, #663399 100%);
}
</style>


<div class="modal fade " id="Cart_Detail_Mobile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="ex1 modal-body">

            
              <!-- <div class="text-center">
                    Delivery<label class="mx-2 switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>Tranfer
                </div> -->


                <!-- <div class="show_num_cart"></div> -->

                <P class="mt-5 mb-5 text-center">Your order from <?php echo $res_s['sto_name'] ; ?></P>

                <div class="scollbar">

                 
                    <div id="show_add_product2"></div>


                </div>


                <hr>

                <h3 class="text-center justify-content-center "><strong>Total Price</strong></h3>
                <h1 class="text-center mb-3 toto_add_product double_line">สินค้าบริษัท </h1>


                <div class="container">


                    <div class="d-grid">

                        <button type="button" id="checkout1" class="btn btn-1"> GO TO CHECKOUT </button>

                        <a href="destroyer.php" class="btn btn-danger" type="button">DESTROYER</a>


                    </div>


                </div>

            </div>

        </div>

      
      


    </div>

</div>


