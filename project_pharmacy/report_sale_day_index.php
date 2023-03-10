<a href="?page=report_sale" style="float:right" class="btn btn-danger">ย้อนกลับ</a>
<center>
    <h3>รายงานสรุปยอดขายแบบรายวัน</h3>
</center>
<br>
<br>
<br>


                <div class="col-md-12 col-sm-6 col-xs-6">
    <div class="panel panel-back noti-box">
        <div class="text-box">
            <p class="main-text">ยอดขายสินค้าแต่ละวัน</p>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php
    $connect = mysqli_connect("localhost","root","akom2006","project_new");
    $sql22 = "SELECT * , DAYNAME(a.sales_date) as dayname , SUM(product_total) as amount FROM sales a GROUP BY DAYNAME";
    $query22 = mysqli_query($connect , $sql22);
    while ($data = mysqli_fetch_assoc($query22)) {
        $day[] =  ($data['dayname']);
        $amount[] = $data['amount'];
    }

    ?>


    <div style="width: 100%;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        // === include 'setup' then 'config' above ===
        const labels = <?php echo json_encode($day) ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: "รายได้รวม"  ,
                data: <?php echo json_encode($amount) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
            }]
        };

        

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
        </div>
    </div>
</div>
<?php

$con = mysqli_connect("localhost","root","akom2006","project_new");

  $sql = ("SELECT DATE_FORMAT(sales_date, '%d') AS sales_date, 
													SUM(product_total) as product_total 
													,sales_RefNo , SUM(product_quantity) AS product_quantity
                                                    FROM sales 
													GROUP BY DATE_FORMAT(sales_date, '%d') 
													ORDER BY DATE_FORMAT(sales_date, '%d') DESC
													");
$result = mysqli_query($con, $sql);

//  $result = mysqli_fetch_assoc($query);
?>
    <table class="table table-striped  table-hover table-bordered">
        <thead>
            <tr>
            <th scope="col">ลำดับ</th>
						<th scope="col">วันที่ขาย</th>
						<th scope="col">หมายเลขการขาย</th>
						<th scope="col">จำนวน</th>
						<th scope="col">ยอดขายรวมภาษี</th>
                        <!-- <th scope="col">ภาษี</th>
                        <th scope="col">รวมยอดทั้งหมด</th> -->
            </tr>
        </thead>
        <tbody>

            <?php
        //ประกาศตัวแปรผลรวม
        $total = 0;
        $i=1;
        foreach ($result as $row) {
            //หาผลรวมยอดขายใน loop โดยใข้ +=
            $total = $row['product_total'] ;
            $vat =   (0.07 * $total) ; 
            $totalvat = $total +  $vat ;
            $totalproduct_quantity += $row['product_quantity'];
            $totall += $row['product_total'];
            $vatt +=  $vat ;
            $totovat +=  $totalvat ; 

        ?>
            <tr>
                <td ><?= $i++ ; ?></td>
                <td><?= $row['sales_date']; ?></td>
                <td><?= $row['sales_RefNo'] ; ?></td>
                <td ><?= $row['product_quantity'] ; ?></td>
                <td class="text-end"><?= number_format($row['product_total'], 2); ?></td>
                <!-- <td class="text-end"><?= number_format($vat , 2); ?></td>
                <td class="text-end"><?= number_format($totalvat, 2); ?></td> -->
            </tr>
            <?php } ?>
            <tr class="table-danger">
                <td colspan="3" class="text-center">รวม</td>
                <td><?= number_format($totalproduct_quantity, 2); ?></td>
                <td class="text-end"><?= number_format($totall, 2); ?></td>
                <!-- <td class="text-end"><?= number_format($vatt, 2); ?></td>
                <td class="text-end"><?= number_format($totovat, 2); ?></td> -->
            </tr>
        </tbody>
    </table>
