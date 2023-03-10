<?php
$connect = mysqli_connect("localhost","root","akom2006","project_new");

$order=20;
$sql="SELECT stock_id, product_quantity from stock 
where product_id='9' and product_quantity > 0 order by stock_id asc ";
$res=mysqli_query($connect , $sql);
$num=mysqli_num_rows($res);
if(!$num){
    exit;
}else{
    $arr = mysqli_fetch_assoc($res);
    while($order > 0 ){
         $sqlcutstock1 = "SELECT stock_id , product_id , product_quantity FROM stock WHERE product_quantity > 0 AND product_id='9' order by stock_import ASC" ;
        $querycutstock1=mysqli_query($connect , $sqlcutstock1);
        $arr1 = mysqli_fetch_assoc($querycutstock1);
         $balance = $arr1['product_quantity'] - $order;

    if($balance<0){
         $strSQL4 = "update stock set product_quantity = 0 WHERE product_id = '9' AND stock_id = '".$arr1['stock_id']."' " ; 
        $qtySQL4=mysqli_query($connect , $strSQL4);
         $order -= $arr1['product_quantity']; 
    }else{
         $strSQL5 = "update stock set product_quantity = product_quantity -  $order WHERE product_id = '9'  AND stock_id = '".$arr1['stock_id']."'   ";
        $qtySQL5 =mysqli_query($connect , $strSQL5);
        $order = 0;
    }

    }

  

}


?>