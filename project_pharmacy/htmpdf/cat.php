<html>

<head>
    <title>Phures Order</title>
    <style>
    body {
        margin: 0;
        padding: 0;
    }

    .container {
        margin: 0 auto;
        padding: 16px;
        background-color: #f1f1f1;
        margin-top: 36px;
        border: 1px solid #ccc;
        width: 800px;
    }

    h1 {
        font-size: 24px;
        /* color:#0086b3; */
        line-height: 36px;
    }

    p {
        font-family: san-serif;
        font-size: 16px;
        line-height: 18px;
        color: #333;
    }

    img {
        padding: 8px;
        border: 1px solid #ccc;
    }
    </style>
    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    </style>
</head>

<body>
    <?php 
		require '../functionDateThaiOnTime.php'; 
        require '../convert.php'; 
		$connect = mysqli_connect("localhost", "root", "akom2006", "project_new"); 


      $sql = "SELECT * FROM po_detail WHERE po_id =  '".$_GET['po_id']."' ";
      $query = mysqli_query($connect, $sql);
      $resultq = mysqli_num_rows($query);

      $sql1 = "SELECT * , sum(po_detail.product_price * po_detail.product_quantity ) as qty ,
      sum(po_detail.product_price )  as sum ,
      sum(po_detail.product_price * po_detail.product_quantity ) * 0.07 + sum(po_detail.product_price * po_detail.product_quantity ) as vat ,
      sum(po_detail.product_price * po_detail.product_quantity ) * 0.07 as vatt
      FROM po a join po_detail  ON a.po_id = po_detail.po_id  
      WHERE a.po_id = '".$_GET['po_id']."' ";
    $query1 = mysqli_query($connect, $sql1);
    $result1 = mysqli_fetch_assoc($query1);
    $po_create = $result1['po_create'];
    $po_status = $result1['po_status'];
    $po_RefNo = $result1['po_RefNo'];
  
		?>
    <div class="container">
        <center>
            <h1>ร้านขายยาดาชัย์ By เจ๊แนน</h1>
            <p>เลขที่ 286/3 เขต มีนบุรี เเขวง จังหวัด กรุงเทพมหานคร</p>
            <h3>ใบสั่งซื้อ</h3>
        </center>
        <p style="float:left">เลขที่ใบสั่งซื้อ <?php echo $po_RefNo ?></p>
        <p style="float:right">วันที่สั่งซื้อ <?php echo datethai($po_create) ?></p>
        <br>
        <br>
        <br>
        <table>
            <tr>
                <th>ลำดับ</th>
                <th style="text-align: center;">ซัพพลายเซน</th>
                <th>รายการสินค้า</th>
                <th style="text-align: center;">จำนวน</th>
                <th style="text-align: center;">ราคา</th>
                <th style="text-align: center;">ราคาทั้งสิ้น</th>
            </tr>
            <tbody>
                <?php $i = 1;
                    while ($row = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td class="text-center"><?php echo  $i++  ?></td>
                    <td class="col-3 "><?php echo  $row['product_suppiles'] ?></td>
                    <td class="col-3"><?php echo  $row['product_name'] ?></td>
                    <td class="col-2" style="text-align: right;"><?php echo  $row['product_quantity'] ?></td>
                    <td class="col-2" style="text-align: right;">
                        <?php echo  number_format($row['product_price'], 2) ?></td>
                    <td class="col-4" style="text-align: right;">
                        <?php echo  number_format($row['product_price'] * $row['product_quantity'], 2) ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="4"></td>
                    <td style="text-align: right;">ราคารวม</td>
                    <td style="text-align: right;"><?php echo number_format($result1['qty'], 2) ?> บาท</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td style="text-align: right;">ภาษี(7%)</td>
                    <td style="text-align: right;"><?php echo number_format($result1['vatt'], 2) ?> บาท</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td style="text-align: right;">ราคารวมภาษี</td>
                    <td style="text-align: right;"><?php echo number_format($result1['vat'], 2) ?> บาท</td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: right;"><?php echo convert(($result1['vat'])) ?> </td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <br>
          <center>
       <a>ผู้สั่งซื้อ         <u><?php echo $result1['po_buyer'] ; ?></u></a>
       </center>
       
        <div style="clear:both"></div>
    </div>
</body>

</html>