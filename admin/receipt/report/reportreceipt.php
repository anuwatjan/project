<?php include 'barcode/barcode.php' ?>
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
    <center>
    <section class="section">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 align="center"></h2>
                        <a>ใบเสร็จรับเงิน/RECEIPT</a>
                        
                        <p>ชำระเมื่อ : <?php echo datethai($result1['store_date']) ?></p>
                        <p><?= barcode($result1['store_number'])?></p>
                        <p style="font: size 28px; ;"><?= ($result1['store_number'])?></p>
                        <hr>
                        <table class="table table-bordered">
                            <?php
                            $i = 1; ?>
                            <?php while($result = mysqli_fetch_assoc($query)){
                                
                                ?>
                            <tr class="text-center">
                                <td><?= $i++ ?>. </td>
                                <td><?= $result['product_name'] ?>  (<?= $result['store_qty'] ?>  <?= $result['name_unit']?>)</td>
                                <td colspan=""><?= number_format($result['store_product_total'],2)?> บาท</td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td></td>
                                <td  align="center">รับเงินมา</td>
                                <td  align="center"><?= number_format($result1['store_get'],2)?> บาท</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td  align="center">เงินทอน</td>
                                <td  align="center"><?= number_format($result1['store_change'],2)?> บาท</td>
                            </tr>
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