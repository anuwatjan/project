<style>
.btn {
    flex: 1 1 auto;
    /* margin: 10px; */
    /* padding: 30px; */
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;
    box-shadow: 0 0 20px #eee;
    /* border-radius: 10px; */
}
.btn:hover {
    background-position: right center;
}
.btn-2 {
    background-image: linear-gradient(to right, #8A2BE2 0%, #DA70D6 51%, #DDA0DD 100%);
}
</style>

<div class="my-cart " id="my-cart">
    <button type="button" data-toggle="modal" class="btn btn-2" data-target="#Cart_Detail_Mobile"
        style="border:none;width:100%;height:50px;">
        <div style="float:left"> <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            <a id="Cart_Total_Num_Mobile"><?php echo $cart_id ; ?></a>
        </div>
        <a style="float:center"> <i class="fa fa-shopping-cart" aria-hidden="true"></i>CART</a>
        <div style="float:right">
            <i class="fa fa-money" aria-hidden="true"></i>
            <a id="Cart_Total_Price_Mobile"><?php echo number_format($prod_price_simple,2,'.',',') ; ?></a>
        </div>
    </button>
</div>


