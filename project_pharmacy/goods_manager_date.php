<?php $connect = mysqli_connect("localhost", "root", "akom2006", "project_new"); ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<style>
.dateInput {
    display: inline-block;
}
</style>
<?php

  $goods_id = $_GET['goods_id'];

  $sql = "SELECT *  
  , sum(goods_detail.product_price * goods_detail.product_quantity ) as qty ,
  sum(goods_detail.product_price )  as sum ,
  sum(goods_detail.product_price * goods_detail.product_quantity ) * 0.07 + sum(goods_detail.product_price * goods_detail.product_quantity ) as vat ,
  sum(goods_detail.product_price * goods_detail.product_quantity ) * 0.07 as vatt
  ,(goods_detail.product_price * goods_detail.product_quantity) as plusel 
FROM  goods_detail INNER JOIN goods  ON goods_detail.good_id = goods.goods_id
WHERE goods.goods_id = '$goods_id' ";
$query = mysqli_query($connect, $sql);
$result1 = mysqli_fetch_array($query);
date_default_timezone_set('Asia/Bangkok');

?>

<form class="forms-sample" enctype="multipart/form-data" method="POST" action="?page=goods_manager&function=insert">
  
    <a class="text-danger ">ถ้าไม่ใส่วันเดือนปีที่ผลิต กับ วันที่หมดอายุ ระบบจะทำการกำหนดเอาวันที่ปัจจุันเป็นวันที่ผลิต
        กับ นับอีก 3 ปี จากวันปัจจุบันเป็นวันหมดอายุ</a>
       
    <table class="mt-4 table table-hover text-center table-bordered " id="">
        <tr>
            <td colspan="7">
                <strong>รายการสินค้า</strong>
            </td>
        </tr>
        <tr>
            <td>ลำดับ</td>
            <td>รหัสสินค้า</td>
            <td>ชื่อสินค้า</td>
            <td>วันที่ผลิต</td>
            <td>วันหมดอายุ</td>
            <td>จำนวน</td>
            <td>ราคา</td>
            <td>ราคารวม</td>
        </tr>
        <tbody>

            <?php
                        $i=1;
                        $sql = "SELECT * ,(product_price * product_quantity) as plusel 
                        FROM   goods_detail
                        WHERE good_id = '$goods_id'";
                        $query = mysqli_query($connect, $sql);
                        while ($rowp = mysqli_fetch_assoc($query)) {
                        ?>
            <tr>
                <input type="hidden" name="good_RefNo[]" value="<?= $rowp['good_RefNo']?>">
                <input type="hidden" name="po_RefNo[]" value="<?= $rowp['po_RefNo']?>">
                <input type="hidden" name="goods_id" value="<?= $goods_id ?>">
                <input type="hidden" name="po_id" value="<?= $rowp['po_id'] ?>">
            
                <td><?php echo  $i++ ; ?></td>
                <td> <input type="hidden" name="product_id[]"
                        value="<?= $rowp['product_id'] ?>"><?php echo $rowp['product_id'] ?></td>
                <td class="col-2 text-start"><a name="product_name[$product_id]"><?= $rowp['product_name'] ?></a></td>
                <!-- <td class="col-2 text-end"><input type='date' class="  form-control " name="product_start_date[]" autocomplete="off" /></td>
                <td class="col-2 text-end"><input type='date' class=" form-control" name="product_end_date[]"  autocomplete="off" /></td> -->
                <td><div class="input-group date " data-provide="datepicker">
                    <input type="text" name="product_start_date[]" autocomplete="off" class="form-control datepicker1" placeholder="วันเริ่มต้น">
                    </div>
                </td>
                <td><div class="input-group date " data-provide="datepicker">
                    <input type="text"  name="product_end_date[]" autocomplete="off" class="form-control datepicker2" placeholder="วันหมดอายุ">
                    </div>
                </td>
                <td class="col-1 text-center"><input type="hidden" name="product_quantity[]"
                        value="<?= $rowp['product_quantity'] ?>"><?php echo  $rowp['product_quantity'] ?></td>
                <td class="col-1= text-end"><input type="hidden" name="product_price[]"
                        value="<?= $rowp['product_price'] ?>"><?php echo  number_format($rowp['product_price'],2) ?>
                </td>
                </td>
                <td class="col-2 text-end"><?php echo  number_format($rowp['plusel'],2) ?></td>
            </tr>
            <?php } ?>

        </tbody>
        <tr>
            <td colspan="6"></td>
            <td>ราคารวม</td>
            <td class="text-end"><?php echo number_format($result1['qty'], 2) ?> บาท</td>
        </tr>
        <tr>
            <td colspan="6"></td>
            <td>ภาษี(7%)</td>
            <td class="text-end"><?php echo number_format($result1['vatt'], 2) ?> บาท</td>
        </tr>
        <tr>
            <td colspan="6"></td>
            <td>ราคารวมภาษี</td>
            <td class="text-end"><?php echo number_format($result1['vat'], 2) ?> บาท</td>
        </tr>
    </table>

    <a href=javascript:history.back(1) class="btn-danger btn">ย้อนกลับ</a>
    <button class="mr-2 btn btn-primary">ยืนยันการรับสินค้า</button>
    
</form>



<Script>
    $(document).ready(function() {

        var d = new Date();
        var toDay = d.getMonth() + 1 + '/' +
            (d.getDate()) + '/' +
            (d.getFullYear() + 543);

        $('.datepicker1').datepicker({
            // startDate: '+0d',
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: 'mm/dd/yy',
            isBuddhist: true,
            defaultDate: toDay,
            minDate: toDay,
            dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
            monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม',
                'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
            ],
            monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.',
                'ต.ค.', 'พ.ย.', 'ธ.ค.'
            ],
            onSelect: function(date) {
                var nextDay = new Date(date);
                nextDay.setDate(nextDay.getDate() + 1);
                $(".datepicker2").datepicker("option", "minDate", nextDay);
            }
        });

        $('.datepicker2').datepicker({
             // startDate: '+0d',
             autoclose: true,
            changeMonth: true,
            changeYear: true,
            dateFormat: 'mm/dd/yy',
            isBuddhist: true,
            defaultDate: toDay,
            dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.', 'จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.'],
            monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม',
                'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
            ],
            monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.',
                'ต.ค.', 'พ.ย.', 'ธ.ค.'
            ],
            onSelect: function(date) {}
        });
    });
    </Script>
