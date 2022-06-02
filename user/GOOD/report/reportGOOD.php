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
                        <a>เลขที่เอกสาร : <?= $result['good_reference'] ?></a>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th colspan="4" class="text-white bg-info" style="font-size: 30px;background-color:lightblue;">ใบรับสินค้า</th>
                                <th colspan="2" class="text-white bg-info" style="font-size: 30px;background-color:lightblue;">วันที่ <?= datethai($result['good_date']) ?> </th>
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
                            <?php $i = 1; ?>
                            <?php
                                if (isset($_GET['good_reference']) && !empty($_GET['good_reference'])) {
                                $good_reference = $_GET['good_reference'];
                                $sql1 = "SELECT * , a.product_id,b.product_id,b.product_name AS name_product , c.unit_id,d.unit_id,d.unit_name AS name_unit
                                FROM good a join product b ON a.product_id = b.product_id JOIN doc_unit c ON b.product_id = c.product_id
                                JOIN unit d ON d.unit_id = c.unit_id  WHERE a.good_reference = '$good_reference'";
                                $query1 = mysqli_query($connection, $sql1);
                                }
                                ?>
                                <?php while($result1 = mysqli_fetch_assoc($query1)) { ?>
                                <tr class="text-center">
                                <td><?= $i++ ?></td>
                                <td><?= $result1['product_name'] ?></td>
                                <td><?= $result1['good_qty'] ?></td>
                                <td><?= $result1['name_unit'] ?></td>
                                <td><?= number_format($result1['dunit_price'], 2) ?></td>
                                <td><?= number_format($result1['good_product_total'], 2) ?></td>
                            </tr>
                            <?php }  ?>
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