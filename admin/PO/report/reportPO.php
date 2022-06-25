<?php include 'pdf.php'; ?>
<?php include 'show.php'; ?>
<?php
ob_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>

<body>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2 align="center"></h2>
                        <a>เลขที่เอกสาร : <?= $result1['po_reference'] ?></a>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th colspan="4" class="text-white bg-info" style="font-size: 30px;background-color:lightblue;">ใบสั่งซื้อสินค้า</th>
                                <th colspan="2" class="text-white bg-info" style="font-size: 30px;background-color:lightblue;">วันที่ <?= datethai($result1['po_date']) ?> </th>
                            </tr>
                            <tr>
                                <td colspan="6">ลูกค้า : <?= $result_con['contact_name']; ?> </td>
                            </tr>
                            <tr>
                                <td colspan="6">เบอร์โทรศัพท์มือถือ : <?= $result_con['contact_phone']; ?> </td>
                            </tr>
                            <tr>
                                <th style="background-color:lightblue;">NO.</th>
                                <th style="background-color:lightblue;">รายการสินค้า</th>
                                <th style="background-color:lightblue;">จำนวนสินค้า</th>
                                <th style="background-color:lightblue;">หน่วยนับ</th>
                                <th style="background-color:lightblue;">ราคาสินค้า</th>
                                <th style="background-color:lightblue;">ราคาสินค้าทั้งหมด</th>
                            </tr>
                            <?php
                            $i = 1; ?>
                            <?php while($result = mysqli_fetch_assoc($query)){?>
                            <tr class="text-center">
                                <td><?= $i++ ?></td>
                                <td><?= $result['product_name'] ?></td>
                                <td><?= $result['po_qty'] ?></td>
                                <td><?= $result['name_unit'] ?></td>
                                <td><?= number_format($result['dunit_price'], 2) ?></td>
                                <td><?= number_format($result['po_product_total'], 2) ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                        <?php
                        $html = ob_get_contents();
                        $mpdf->WriteHTML($html);
                        $mpdf->Output("MyReport.pdf");
                        ob_end_flush();
                        ?>
                        <a href="MyReport.pdf" class="btn btn-primary">พิมพ์ PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>