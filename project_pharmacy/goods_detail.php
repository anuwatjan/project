<style type="text/css">
	@media print{
		#hid{
		   display: none; /* ซ่อน  */
		}
	}
</style>
<?php
require 'functionDateThaiOnTime.php'; 
require 'convert.php'; 
$connect = mysqli_connect("localhost", "root", "akom2006", "project_new"); 

     $goods_id = $_GET['goods_id'];

     $sql = "SELECT * ,(goods_detail.product_price * goods_detail.product_quantity) as plusel  ,
     goods_detail.product_quantity AS product_quantity
     FROM goods  join goods_detail  ON goods.goods_id = goods_detail.good_id 
     WHERE goods.goods_id = '$goods_id'";
      $query = mysqli_query($connect, $sql);
      $resultq = mysqli_num_rows($query);

      $sql1 = "SELECT * , sum(goods_detail.product_price * goods_detail.product_quantity ) as qty ,
      sum(goods_detail.product_price )  as sum ,
      sum(goods_detail.product_price * goods_detail.product_quantity ) * 0.07 + sum(goods_detail.product_price * goods_detail.product_quantity ) as vat ,
      sum(goods_detail.product_price * goods_detail.product_quantity ) * 0.07 as vatt
      FROM goods join goods_detail ON goods.goods_id = goods_detail.good_id 
      WHERE goods.goods_id = '$goods_id'";
    $query1 = mysqli_query($connect, $sql1);
    $result1 = mysqli_fetch_assoc($query1);
    $good_create = $result1['good_create'];


?>

<div class="card">
    <div class="card-body">

        <div>ร้านขายยาดาชัย์</div>
        <div>เลขที่  286/3 เขต มีนบุรี เเขวง จังหวัด กรุงเทพมหานคร</div>

        <br>

        <center>
            <h3>รายการใบรับสินค้า หมายเลข : <?php echo $result1['good_RefNo'] ?> </h3>
        </center>
        <p>ผู้สั่งซื้อ : <?php echo $result1['po_buyer'] ?> </p>
        <p>วันที่สั่งซื้อ : <?php echo datethai($good_create) ?></p>




        <table class="table table-bordered " border="3">
            <thead>
                <tr class="text-center bg-secondary table-hover text-white">
                    <th scope="col">ลำดับ</th>
                    <th scope="col">รายการสินค้า</th>
                    <th scope="col">วันที่ผลิต</th>
                    <th scope="col">วันหมดอายุ</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">ราคาทั้งสิ้น</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                    while ($row = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo  $i++  ?></td>
                    <td class="col-3"><?php echo  $row['product_name'] ?></td>
                    <td class="col-2" style="text-align: center;"><?php echo  DateThaiNotTime($row['product_start_date']) ?></td>
                    <td class="col-2" style="text-align: center;"><?php echo  DateThaiNotTime($row['product_end_date']) ?></td>
                    <td class="col-2" style="text-align: center;"><?php echo  $row['product_quantity'] ?></td>
                    <td class="col-1" style="text-align: right;">
                        <?php echo  number_format($row['product_price'], 2) ?></td>
                    <td class="col-3" style="text-align: right;"><?php echo  number_format($row['plusel'], 2) ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="5"></td>
                    <td style="text-align: right;">ราคารวม</td>
                    <td style="text-align: right;"><?php echo number_format($result1['qty'], 2) ?> บาท</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td style="text-align: right;">ภาษี(7%)</td>
                    <td style="text-align: right;"><?php echo number_format($result1['vatt'], 2) ?> บาท</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td style="text-align: right;">ราคารวมภาษี</td>
                    <td style="text-align: right;"><?php echo number_format($result1['vat'], 2) ?> บาท</td>
                </tr>
                <tr>
                    <td colspan="7" style="text-align: right;"><?php echo convert(($result1['vat'])) ?> </td>
                
                 
                </tr>
            </tbody>
     
        </table>
      
       
       
    
    </div>
</div>

<br>
<a  id="hid" class="btn btn-danger" href=javascript:history.back(1)>ย้อนกลับ</a>
<?php if($result1['good_status'] == 1){ ?>
<button  class="btn btn-success" id="insert_to_stock" data-id="<?php echo $goods_id ;?>">นำเข้าสต็อกสินค้า</button>
<?php }else{

}
?>

<script src="goods.js"></script>