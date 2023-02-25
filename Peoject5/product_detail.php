<?php 
include 'functionDateThai.php' ;

$con = mysqli_connect("localhost", "root", "akom2006", "project_new");

function balanceDate($expDate)
{
    // set parameter
    $totalDay = 0;
    $todayDate = strtotime(date("Y-m-d"));
    $expDate = strtotime($expDate);
    if ($todayDate < $expDate) {
    }
    return $totalDay;
}
function status_date_notify($endDate)
{
    $chk_day_now = time();
    $chk_day_expire = strtotime($endDate);
    $chk_day30 = strtotime($endDate . " -30 day");
    $chk_day15 = strtotime($endDate . " -15 day");
    $chk_day7 = strtotime($endDate . " -7 day");
    //  สามารถเพิ่มตัวแปร และเงื่อนไข เพิ่มเติมสำหรับตรวจสอบได้ตามต้องการ
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

if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
     $sql = "SELECT *   FROM product WHERE product_id = '$product_id'";
     $query = mysqli_query($con, $sql);
     $result = mysqli_fetch_assoc($query);

} ?>

<h3 class="text-center"><?php echo $result['product_name'] ; ?></h3>



<br>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="btn btn-danger" href="?page=product">ย้อนกลับ</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link active btn btn-danger" id="home-tab" data-bs-toggle="tab" data-bs-target="#product_detail"
            type="button" role="tab" aria-controls="product_detail" aria-selected="true">ข้อมูลทั่วไป</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link btn btn-primary" id="profile-tab" data-bs-toggle="tab" data-bs-target="#product_stock"
            type="button" role="tab" aria-controls="product_stock" aria-selected="false">สต็อกสินค้า</a>
    </li>
    <!-- <li class="nav-item" role="presentation">
        <a class="nav-link btn btn-info " id="contact-tab" data-bs-toggle="tab" data-bs-target="#backup" type="button"
            role="tab" aria-controls="backup" aria-selected="false">ประวัติ</a>
    </li> -->
</ul>





<div class="tab-content mt-3" id="myTabContent">



    <div class="tab-pane fade show active" id="product_detail" role="tabpanel" aria-labelledby="home-tab">
        <h2>ข้อมูลทั่วไปของสินค้า</h2>
        <hr>
        <form role="form" class="m-5" method="post" enctype="multipart/form-data">
            <div class="form-group row mb-2">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <img id="preview" width="250" height="250" src="./image/<?php echo $result['product_image'] ?>">
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            เลือกไฟล์
                            <input type="file" class="form-control" name="product_image" id="product_image">
                            <input type="hidden" name="oldimage" value="<?php echo  $result['product_image'] ?>"
                                disabled>
                        </div>
                        <div class="col-md-3">
                            SKU
                            <input type="text" class="form-control form-control-user" placeholder="SKU"
                                name="product_name" value="<?php echo $result['product_sku'];?>" required disabled>
                        </div>
                        <div class="col-md-5">
                            ซัพพลายเซน
                            <select type="text" class="form-control" id="exampleInputUsername1" name="product_suppiles"
                                disabled>
                                <?php
                                         $sqlsuppiles = "SELECT * FROM suppiles";
                                         $querysuppiles = mysqli_query($con, $sqlsuppiles);
                                        while ($row = mysqli_fetch_assoc($querysuppiles)) { ?>
                                <option value="<?= $row['suppiles_name'] ?>"
                                    <?= $result['product_suppiles'] == $row['suppiles_name'] ? 'selected' : '' ?>>
                                    <?= $row['suppiles_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-2">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <p>ชื่อสินค้า</p>
                    <input type="text" class="form-control form-control-user" placeholder="ชื่อสินค้า"
                        name="product_name" disabled value="<?php echo $result['product_name'];?>" required>
                </div>
                <div class="col-sm-2">
                    <p>ราคาต้นทุน</p>
                    <input type="text" class="form-control form-control-user" placeholder="ราคาต้นทุน" disabled
                        value="<?php echo $result['product_price'];?>" name="product_price" required>
                </div>
                <div class="col-sm-2">
                    <p>ราคาขาย</p>
                    <input type="text" class="form-control form-control-user" placeholder="ราคาขาย" disabled
                        value="<?php echo $result['product_sell'];?>" name="product_sell" required>
                </div>
                <div class="col-sm-2">
                    <p>จุดสั่งซื้อ</p>
                    <input type="text" class="form-control form-control-user" placeholder="จุดสั่งซื้อ"
                        name="product_point" disabled value="<?php echo $result['product_point'];?>" required>
                </div>
            </div>
            <div class="form-group row mb-2">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <p>หน่วยนับ</p>
                    <select type="text" class="form-control" id="exampleInputUsername1" name="product_unit" disabled>
                        <?php
                                         $sqlunit = "SELECT * FROM unit";
                                         $queryunit = mysqli_query($con, $sqlunit);
                                        while ($row = mysqli_fetch_assoc($queryunit)) { ?>
                        <option value="<?= $row['unit_name'] ?>"
                            <?= $result['product_unit'] == $row['unit_name'] ? 'selected' : '' ?>>
                            <?= $row['unit_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <p>หมวดหมู่ของสินค้า</p>
                    <select type="text" class="form-control" id="exampleInputUsername1" name="product_cate" disabled>
                        <?php
                                         $sqlunit = "SELECT * FROM category";
                                         $queryunit = mysqli_query($con, $sqlunit);
                                        while ($row = mysqli_fetch_assoc($queryunit)) { ?>
                        <option value="<?= $row['cate_name'] ?>"
                            <?= $result['product_cate'] == $row['cate_name'] ? 'selected' : '' ?>>
                            <?= $row['cate_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-2">
                <div class="col-sm-6">
                    <p>หมวดหมู่แยกตามอาการ</p>
                    <select type="text" class="form-control" id="exampleInputUsername1" name="product_symp" disabled>
                        <?php
                                         $sqlunit = "SELECT * FROM symptons";
                                         $queryunit = mysqli_query($con, $sqlunit);
                                        while ($row = mysqli_fetch_assoc($queryunit)) { ?>
                        <option value="<?= $row['symp_name'] ?>"
                            <?= $result['product_symp'] == $row['symp_name'] ? 'selected' : '' ?>>
                            <?= $row['symp_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    <p>ประเภทสินค้า</p>
                    <select type="text" class="form-control" id="exampleInputUsername1" name="product_type" disabled>
                        <?php
                                         $sqlunit = "SELECT * FROM type";
                                         $queryunit = mysqli_query($con, $sqlunit);
                                        while ($row = mysqli_fetch_assoc($queryunit)) { ?>
                        <option value="<?= $row['type_name'] ?>"
                            <?= $result['product_type'] == $row['type_name'] ? 'selected' : '' ?>>
                            <?= $row['type_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </form>


        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script type="text/javascript">
        function ReadURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#product_image").change(function() {
            ReadURL(this);
        });
        </script>
    </div>

 


    <div class="tab-pane fade" id="product_stock"  role="tabpanel" aria-labelledby="profile-tab">
        <h2>สต็อกสินค้า</h2>
        <hr>
        <div class="container">
            <table class="table table-bordered text-center " id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">นำเข้าเมื่อ</th>
                        <th scope="col">ล็อตผลิต</th>
                        <th scope="col">วันที่ผลิต</th>
                        <th scope="col">วันหมดอายุ</th>
                        <th scope="col">จำนวนที่นำเข้า</th>
                        <th scope="col">ต้นทุน</th>
                        <th scope="col">ราคาขาย</th>
                        <th scope="col">กำไร</th>
                        <th scope="col">แจ้งหมดอายุ</th>
                        <th scope="col">จุดสั่งซื้อที่กำหนด</th>
                        <th scope="col">สถานะจุดสั่งซื้อ</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                  
              

                    $product_quantity = 0 ;  
                        $sql2 = "SELECT * , SUM(product_quantity) as sumqty  FROM stock 
                    WHERE  stock_status = 0 AND product_id = '".$result['product_id']."'  ";
                    $query2 = mysqli_query($con, $sql2);
                    $row1 = mysqli_fetch_array($query2);


                    $product_quantity = 0 ;  
                $sql1 = "SELECT *   FROM stock 
                WHERE   stock_status = 0 AND product_id = '".$result['product_id']."' ";
                $query1 = mysqli_query($con, $sql1);
                $my_num = mysqli_num_rows($query1);
                ?>
                    <p>มีจำนวนทั้งหมด : <?php echo $row1['sumqty'] ; ?></p>
                    <?php   while ($row = mysqli_fetch_array($query1)) { 
                        // หากำไร 
                        $profit = $result['product_sell'] - $result['product_price'];

                        

                        if($row['product_lot'] == "" ){
                            echo 'ไม่มีข้อมูล' ;  
                        }else { ?>

                        <tr>
                        <th class="text-start" scope="row">
                            <?php echo Datethai11($row['stock_import']); echo "" ; echo '<br>' ; echo "ใบรับสินค้าเลขที่"; echo '<br>' ; echo "   "  ; echo "'" ; echo  $row['good_RefNo']   ;  echo "'" ; ?>
                        </th>
                        <td><?php echo $row['product_lot'] ; ?></td>
                        <td><?php echo Datethai($row['product_start_date']) ; ?></td>
                        <td><?php echo Datethai($row['product_end_date']) ; ?></td>
                        <td class="text-center"><?php echo $row['product_quantity'] ; ?></td>
                        <td class="text-end"><?php echo number_format($result['product_price'],2) ; ?></td>
                        <td class="text-end"><?php echo number_format($result['product_sell'],2) ; ?></td>
                        <td class="text-end"><?php echo number_format($profit,2) ; ?></td>
                        <?php
                        $case_notify = status_date_notify(($row['product_end_date']));
                        switch ($case_notify) {
                            case 5: { ?>
                        <td colspan=""><a class="text-danger"><?php echo "สินค้าหมดอายุ "; ?></a></td>
                        <?php break;
                        } ?>
                        <?php
                        case 4: { ?>
                        <td colspan=""><?php echo "สินค้าจะหมดอายุในอีก 30 วัน "; ?></td>
                        <?php break;
                        } ?>
                        <?php
                        case 3: { ?>
                        <td colspan=""><a class="text-danger"><?php echo "สินค้าจะหมดอายุในอีก 15 วัน "; ?></a></td>
                        <?php break;
                        } ?>
                        <?php
                        case 2 : { ?>
                        <td colspan=""><?php echo "สินค้าจะหมดอายุในอีก 7 วัน "; ?></td>
                        <?php break;
                        } ?>
                        <?php
                        default: { ?>
                        <td colspan=""><?php echo "ยังไม่หมดอายุ"; ?></td>
                        <?php break;
                        } ?>
                        <?php } ?>
                        <td>
                            <?php 
                        $point = "" ;
                        $sql_point = "SELECT product_id, product_point  FROM product  WHERE   product_id = '".$result['product_id']."'" ; 
                        $query_point = mysqli_query($con, $sql_point);
                        while ($row_point = mysqli_fetch_array($query_point)) { 
                            $point = $row_point['product_point'] ; 
                        ?>
                            <?php echo $row_point['product_point'] ;?>
                            <?php } ?>
                        </td>
                        <?php if ($row['product_quantity'] <= $point) { ?>
                        <td colspan="" class="text-danger"><?php echo "ถึงจุดสั่งซื้อ" ?></td>
                        <?php } else { ?>
                        <td colspan=""><?php echo "ยังไม่ถึงจุดสั่งซื้อ" ?></td>
                        <?php } 
                        ?>
                        <td>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-danger" id="delete_stock"
                                        data-id="<?php echo $row['stock_id'];?>">ลบสต็อก</a>
                                </div>
                                <!-- <div class="col-md-6">
                            <a class="btn btn-danger" id="delete_stock" data-id="<?php echo $row['stock_id'];?>">นำสินค้าลงหน้าร้าน</a>
                                    
                                    </div> -->
                            </div>

                        </td>
                    </tr>
                    <?php }  } ?>
                </tbody>
            </table>
        </div>
    </div>





    <div class="tab-pane fade" id="backup" role="tabpanel" aria-labelledby="contact-tab">
        <h2>ประวัติสินค้า</h2>
        <hr>
        <div class="container">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">วันเวลา</th>
                        <th scope="col">รายละเอียด</th>
                        <th scope="col">พนักงาน</th>
                        <th scope="col">หน่วยนับ</th>
                        <th scope="col">รับเข้า</th>
                        <th scope="col">จ่ายออก</th>
                        <th scope="col">จำนวน</th>
                    </tr>
                </thead>
                <tbody>
                    <?php   
                $sql1 = "SELECT * FROM backup_product WHERE product_id = '".$result['product_id']."'";
                $query1 = mysqli_query($con, $sql1);
                    while ($row = mysqli_fetch_array($query1)) { ?>
                    <tr>
                        <th class="text-start" scope="row">
                            <?php echo $row['backup_product_create']; ?>
                        </th>
                        <td><?php echo $row['backup_note'] ; ?></td>
                        <td><?php echo $row['backup_employee'] ; ?></td>
                        <td><?php echo $row['product_unit'] ; ?></td>
                        <td class="text-center"><?php echo $row['product_admit'] ; ?></td>
                        <td class="text-end"><?php echo $result['product_payoff'] ; ?></td>
                        <td class="text-end"><?php echo $result['product_quantity'] ; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>




</div>

<style>
       th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
 
    div.container {
        width: 200%;
    }
</style>

<script>
$(document).ready(function() {
    var table = $('#dataTable').removeAttr('width').DataTable( {
        // scrollY:        "500px",
        scrollX:        true,
        scrollCollapse: true,
        // paging:         false,
        // columnDefs: [
        //     { width: 1000 ,  targets: 0 }
        // ],
        // fixedColumns: true
    } );
});
</script>
<script src="product.js"></script>