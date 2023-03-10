<script type="text/javascript">
function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();

    document.body.innerHTML = originalContents;
}
</script>
<?php 
   function status_date_notify($endDate)
   {
   	$chk_day_now = time();
   	$chk_day_expire = strtotime($endDate);
   	$chk_day30 = strtotime($endDate . " -30 day");
   	$chk_day15 = strtotime($endDate . " -15 day");
   	$chk_day7 = strtotime($endDate . " -7 day");
   	if ($chk_day_now >= $chk_day_expire) {
   		return 5; // เงื่อนไขรายการเมื่อหมดอายุ
   	} else {
   		if ($chk_day_now >= $chk_day30 && $chk_day_now < $chk_day15) {
   			return 4; // เงื่อนไขรายการจะหมดอายุในอีก 30 วัน
   		} elseif ($chk_day_now >= $chk_day15 && $chk_day_now < $chk_day7) {
   			return 3; // เงื่อนไขรายการจะหมดอายุในอีก 15 วัน
   		} elseif ($chk_day_now >= $chk_day7 && $chk_day_now < $chk_day_expire) {
   			return 2; // เงื่อนไขรายการจะหมดอายุในอีก 7 วัน
   		} else {
   			return 1; // เงื่อนไขรายการยังไม่หมดอายุ
   		}
   	}
   }
   ?>
<?php
   $connect = mysqli_connect("localhost","root","akom2006","project_new");
   
   include "function_paginate.php";
   require 'functionDateThai.php';
   require 'functionthaitoeng.php';
   
   @$ds = thaistart1($_POST["datest"]);
   @$de = thaistart1($_POST["dateed"]);
   @$report = $_POST["price_op"];
   $sql = "";
   if ($report == "") {
   	if ($ds == "" && $de == "") {
           $sql = "SELECT *   FROM sales group by sales.sales_RefNo order by sales_date DESC";
                    
   	} else if ($ds != "" && $de != "") {
   		$sql = "SELECT *   FROM sales WHERE sales.sales_date BETWEEN '$ds' AND '$de'   group by sales.sales_RefNo order by sales_date DESC ";
   	}
   }else if ($report == 1) {
   	if ($ds == "" && $de == "") {
   		$sql = "SELECT *   FROM sales group by sales.sales_RefNo 
   		 ";
   	} else if ($ds != "" && $de != "") {
   		$sql = "SELECT *   FROM sales WHERE sales.sales_date BETWEEN '$ds' AND '$de'   group by sales.sales_RefNo order by sales_date DESC ";
   	}
   }
   	$re = mysqli_query($connect, $sql);
       @$num = mysqli_num_rows($re);
   
   ?>
   <style>
       ::-webkit-scrollbar {
        -webkit-appearance: none;
        width: 0px;
    }
    </style>
<table width="100%" border="0" align="center">
    <form name="form1" method="post" action="index.php?page=report_sale">
        <tr>
            <td>
                <b>
                    กรุณาเลือกรายงาน
                    <select class="form-control" name="price_op">
                        <option value="1">รายงานยอดขาย</option>
                    </select>
                </b>
            </td>
        </tr>
        <tr>
            <td>
                <hr>
                <div class="row">
                    <div class="col-md-5" id="searchdate">
                        <label>เลือกวัน
                            เริ่มจาก </label>
                        <input id="my_date" name="datest" class="form-control" /></input>
                        <hr>
                    </div>
                    <div class="col-md-5">
                        <label>ถึง</label>
                        <input id="my_date2" name="dateed" class="form-control" /></input>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="form-control btn btn-primary text-white" value="ดูรายงาน">
                    </div>
                    <div class="col-md-4">
                        <input type="button" class="form-control btn btn-success" value="PDF"
                            onClick="printDiv('divprint')">
                    </div>
                </div>
            </td>
        </tr>
    </form>
</table>
<hr>
<div id="divprint">
    <?php
      if ($report == 1 || $report == "") { ?>
    <hr>
    <div class="col-md-12">
        <!-- <a href="?page=<?= $_GET['page'] ?>&function=rptsales_chart" type="button" class="btn btn-success ">รายงานยอดขายแบบแผนภูมิแท่ง</a> -->
        <a href="?page=<?= $_GET['page'] ?>&function=day" type="button"
            class="btn btn-info  text-white">รายงานสรุปยอดขายแบบรายวัน</a>
        <a href="?page=<?= $_GET['page'] ?>&function=month" type="button"
            class="btn btn-primary  text-white">รายงานสรุปยอดขายแบบรายเดือน</a>
        <a href="?page=<?= $_GET['page'] ?>&function=year" type="button"
            class="btn btn-danger  text-white">รายงานสรุปยอดขายแบบรายปี</a>
    </div>
    <hr>
    <hr>
    <center>
        <h3>รายงานการขายทั้งหมด</h3>
        <hr>
    </center>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example" cellspacing="1"
        cellpadding="3" width="100%" bgcolor="#FFFFFF" border="1" align="center" height="10">
        <thead>
            <tr bgcolor="#e5e5e5" align="center">
                <th scope="col">ลำดับ</th>
                <th scope="col">วันที่ขาย</th>
                <th scope="col">หมายเลขการขาย</th>
                <th scope="col">รายการสินค้า</th>
                <th scope="col">ราคาขายสินค้า</th>
                <th scope="col">จำนวนสินค้า</th>
                <th scope="col">ราคาสินค้ารวมต่อหน่วย</th>
                <th scope="col">ภาษี</th>
                <th scope="col">ราคารวมภาษี</th>
                <th scope="col">ผู้ขาย</th>
            </tr>
        </thead>
        <tbody>
            <?php  } ?>
            <?php
   $sumproduct_sell = 0 ;
   $sumproduct_quantity = 0 ;
   $sumvat = 0 ; 
      $i = 1;
      if ($report == 1 || $report == "") { ?>
            <?php if ($ds && $de) { ?>
            <center> เริ่มจากวันที่ <?php echo $ds; ?> ถึงวันที่ <?php echo $de; ?> </center>
            <?php } ?>
            <?php 
      if($num > 0 ){ 
      
          $totalsell = 0 ;
          $totalqty = 0 ;
          $totalsumqty = 0 ;
          $totalallvat = 0 ;
      $sumtotalvat = 0 ;
          
      while ($rep = mysqli_fetch_assoc($re)) { 
      
      
      ?>

            <tr bgcolor=#e5e5e5>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo  datethai($rep['sales_date']) ?></td>
                <td><?php echo  $rep['sales_RefNo'] ?></td>
                <td>
                    <?php $sql = "SELECT * FROM sales
               WHERE sales_RefNo = '".$rep['sales_RefNo']."'    " ;
                 $query = mysqli_query($connect , $sql);
                 while ($result = mysqli_fetch_array($query)){ ?>
                    <?php echo  $result['product_name']; echo "<br>" ; echo "" ?>
                    <?php } ?>
                </td>
                <td class="text-right">
                    <?php $sql = "SELECT product_sell   FROM sales 
               WHERE sales_RefNo = '".$rep['sales_RefNo']."'    " ;
               
                 $query = mysqli_query($connect , $sql);
                 while ($result = mysqli_fetch_array($query)){ 
                  $sumproduct_sell += $result['product_sell'] ; 
                  
                  ?>
                    <?php echo  number_format($result['product_sell'],2) ; echo "<br>" ; echo "" ?>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <?php $sql = "SELECT  product_quantity  FROM sales 
               WHERE sales_RefNo = '".$rep['sales_RefNo']."'    " ;
                   $query = mysqli_query($connect , $sql);
                   while ($result = mysqli_fetch_array($query)){ 
                       $sumproduct_quantity += $result['product_quantity'] ; 

                       
                       ?>
                    <?php echo  $result['product_quantity'] ; echo "<br>" ; echo "" ?>

                    <?php } ?>
                </td>
                <td class="text-right">
                    <?php $sql = "SELECT *  FROM sales WHERE sales_RefNo = '".$rep['sales_RefNo']."'    " ;
                 $query = mysqli_query($connect , $sql);                                     
                 while ($result = mysqli_fetch_array($query)){
                    $totalsumqty += $result['product_sell']  * $result['product_quantity']  ; 
                       echo  number_format($result['product_sell'] * $result['product_quantity'],2) ; echo "<br>" ; echo "" ; ?>
                    <?php } ?>
                </td>
                <td class="text-right">
                    <?php $sql = "SELECT SUM(product_sell * sales.product_quantity) AS sumtotal , SUM(0.07 * product_sell * sales.product_quantity)  as vat 
                FROM sales 
               WHERE sales_RefNo = '".$rep['sales_RefNo']."'    " ;
               $query = mysqli_query($connect , $sql);
                                        
               while ($result = mysqli_fetch_array($query)){
                                                      $sumvat += $result['vat'] ; 
                echo  number_format($result['vat'],2) ?>
                    <?php } ?>
                </td>
                <td class="text-right">
                    <?php $sql = "SELECT  SUM(0.07 * product_sell * sales.product_quantity + product_sell * sales.product_quantity) AS aaaaa  
                FROM sales 
               WHERE sales_RefNo = '".$rep['sales_RefNo']."'    " ;
               $query = mysqli_query($connect , $sql);
                                        
               while ($result = mysqli_fetch_array($query)){
                  $sumtotalvat += $result['aaaaa'] ;                                         
                echo  number_format($result['aaaaa'],2) ?>
                    <?php } ?>
                </td>

                <td><?php echo  $rep['po_buyer'] ?></td>

                <?php } ?>


            <tr>
                <td colspan="4" class="text-center">ยอดรวมทั้งสิ้น</td>
                <td class="text-right"><?php echo number_format($sumproduct_sell,2) ; ?></td>
                <td class="text-center"><?php echo ($sumproduct_quantity) ; ?></td>
                <td class="text-right"><?php echo number_format($totalsumqty,2) ; ?></td>
                <td class="text-right"><?php echo number_format($sumvat,2) ; ?></td>
                <td class="text-right"><?php echo number_format($sumtotalvat,2) ; ?></td>

                <td></td>
            </tr>
            <?php }else{ ?>
            <h3 class="text-danger"> * ไม่มีข้อมูลที่ต้องการแสดง</h3>
            <?php     } ?>
            <?php  } elseif ($report == 2) {   ?>
            <?php if ($ds && $de) { ?>
            <center> เริ่มจากวันที่ <?php echo $ds; ?> ถึงวันที่ <?php echo $de; ?> </center>
            <?php } ?>
            <?php 
         if($num > 0 ) {	
         	while ($rep = mysqli_fetch_array($re)) {
         		  ?>
            <tr bgcolor=#e5e5e5>
                <th scope="row"><?php echo $i++ ?></th>
                <td><?php echo  datethai($rep['sales_date']) ?></td>
                <td><?php echo  $rep['sales_RefNo'] ?></td>
                <td>
                    <?php $sql = "SELECT sales.product_id , product_sell , sales.product_quantity , sales.product_total , product.product_name  FROM sales 
               WHERE sales_RefNo = '".$rep['sales_RefNo']."'    " ;
                 $query = mysqli_query($connect , $sql);
                 while ($result = mysqli_fetch_array($query)){ ?>
                    <?php echo  $result['product_name'] ; echo "<br>" ; echo ""  ?>
                    <?php } ?>
                </td>
                <td>
                    <?php $sql = "SELECT sales.product_id , product_sell , sales.product_quantity , sales.product_total , product.product_name  FROM sales 
               WHERE sales_RefNo = '".$rep['sales_RefNo']."'    " ;
                 $query = mysqli_query($connect , $sql);
                 while ($result = mysqli_fetch_array($query)){ ?>
                    <?php echo  $result['product_sell'] ; echo "<br>" ; echo "" ?>
                    <?php } ?>
                </td>
                <td>
                    <?php $sql = "SELECT sales.product_id , c.product_sell , sales.product_quantity , sales.product_total , product.product_name  FROM sales 
               WHERE sales_RefNo = '".$rep['sales_RefNo']."'    " ;
                   $query = mysqli_query($connect , $sql);
                   while ($result = mysqli_fetch_array($query)){ ?>
                    <?php echo  $result['product_quantity'] ; echo "<br>" ; echo "" ?>
                    <?php } ?>
                </td>
                <td>
                    <?php $sql = "SELECT sales.product_id , c.product_sell , sales.product_quantity , sales.product_total , product.product_name  FROM sales 
               WHERE sales_RefNo = '".$rep['sales_RefNo']."'    " ;
                 $query = mysqli_query($connect , $sql);
                 while ($result = mysqli_fetch_array($query)){ ?>
                    <?php echo  $result['product_sell'] * $result['product_quantity']  ; echo "<br>" ; echo "" ?>
                    <?php   
               } ?>
                </td>
                <td><?php echo  $rep['user_login'] ?></td>
            </tr>
            <?php } ?>
            <?php }else{ ?>
            <h3 class="text-danger"> * ไม่มีข้อมูลที่ต้องการแสดง</h3>
            <?php     } ?>
            <?php if ($ds != '' && $de != '') { ?>
            <?php $sql = "select SUM(product_sell) AS sumproduct_sell , SUM(product_quantity) AS sumproduct_quantity , 
         SUM(product_total) AS sumproduct_total 
         from sales
                                                   WHERE sales_date BETWEEN '$ds' AND '$de' ";
         $query = mysqli_query($connect, $sql);
         $retotal = mysqli_fetch_assoc($query); ?>
            <footer>
                <tr style="background-color:#cccccc">
                    <td colspan="4" class="text-center">รวม</td>
                    <td colspan="1">
                        <?php echo  number_format($retotal['sumproduct_sell'], 2) ?>
                    </td>
                    <td colspan="1"><?php echo  ($retotal['sumproduct_quantity']) ?></td>
                    <td colspan="1"><?php echo  number_format($retotal['sumproduct_total'], 2) ?>
                    </td>
                    <td></td>
                </tr>
            </footer>
            <?php }else{?>
            <?php $sql = "select SUM(product_sell) AS sumproduct_sell , SUM(product_quantity) AS sumproduct_quantity , 
         SUM(product_total) AS sumproduct_total 
         from sales ";
         $query = mysqli_query($connect, $sql);
         $retotal = mysqli_fetch_assoc($query); ?>
            <footer>
                <tr style="background-color:#cccccc">
                    <td colspan="4" class="text-center">รวม</td>
                    <td colspan="1">
                        <?php echo  number_format($retotal['sumproduct_sell'], 2) ?>
                    </td>
                    <td colspan="1"><?php echo  ($retotal['sumproduct_quantity']) ?></td>
                    <td colspan="1"><?php echo  number_format($retotal['sumproduct_total'], 2) ?>
                    </td>
                    <td></td>
                </tr>
            </footer>
            <?php } ?>
            <?php } ?>
        </tbody>
</div>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--  เรียกใช้ Font Awesome-->
<script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
<script src="http://fordev22.com/picker_date_thai.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script>
picker_date(document.getElementById("my_date"), {
    year_range: "-45:+10"
});
picker_date(document.getElementById("my_date2"), {
    year_range: "-45:+10"
});
</script>
<script>
$('#dataTables-example').DataTable({
    scrollY: false,
    scrollX: true,
    scrollCollapse: true,
    paging: false,
    columnDefs: [{
        width: 5000,
        targets: 0
    }],
    fixedColumns: true
});
</script>
</script>