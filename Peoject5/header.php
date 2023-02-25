<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
               <a class="btn btn-primary">ยินดีต้อนรับ : คุณ <?php echo $_SESSION['employee_name'] ; ?> ตำแหน่ง : <?php echo $_SESSION['employee_role'] ; ?></a>
            </form>

            <div class="text-end">
                <button type="button" class="btn btn-outline-light me-2">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            แจ้งเตือน
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1"
                            style="min-width: 25rem;padding: 2rem;">
                            <li>
                                <a class="dropdown-item">
                                    <?php 

                                    
                                    $con = mysqli_connect("localhost", "root", "akom2006", "project_new");

                                        function balanceDate1($expDate)
                                        {
                                            // set parameter
                                            $totalDay = 0;
                                            $todayDate = strtotime(date("Y-m-d"));
                                            $expDate = strtotime($expDate);
                                            if ($todayDate < $expDate) {
                                            }
                                            return $totalDay;
                                        }
                                    function status_date_notify1($endDate)
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

                                    ?>
                                     <a>รายการเกี่ยวกับการหมดอายุของสินค้า</a>
                                     <br>
                                    <?php
                                    $product_quantity = 0 ;  
                                     $sql1 = "SELECT *   FROM stock ";
                                     $query1 = mysqli_query($con, $sql1);
                                     $my_num = mysqli_num_rows($query1);
                                     while ($row = mysqli_fetch_array($query1)) { 
                                    $case_notify = status_date_notify1(($row['product_end_date']));
                                    switch ($case_notify) {
                                        case 5: { ?>
                                     - <?php echo $row['product_name'] ; ?><?php echo "สินค้าหมดอายุ "; ?>
                                    <?php break;
                                    } ?>
                                    <?php
                                    case 4: { ?>
                                    <?php echo $row['product_name'] ; ?><?php echo "สินค้าจะหมดอายุในอีก 30 วัน "; ?>
                                    <?php break;
                                    } ?>
                                    <?php
                                    case 3: { ?>
                                    <?php echo $row['product_name'] ; ?><?php echo "สินค้าจะหมดอายุในอีก 15 วัน "; ?>
                                    <?php break;
                                    } ?>
                                    <?php
                                    case 2 : { ?>
                                    <?php echo $row['product_name'] ; ?><?php echo "สินค้าจะหมดอายุในอีก 7 วัน "; ?>
                                    <?php break;
                                    } ?>

                               <?php } } ?>

                                </a>
                                <br>


                                <br>
                                <a>รายการจุดสั่งซื้อ</a>
                                    <?php 
                                    $point = "" ;
                                    $sql_point = "SELECT product_id, product_point , product_name , product_quantity  FROM product 
                                    WHERE product_point >= product_quantity" ; 
                                    $query_point = mysqli_query($con, $sql_point);
                                    while ($row_point = mysqli_fetch_array($query_point)) { 
                                        $point = $row_point['product_point'] ; 
                                    ?>
                                    <div class="ms-3">
                                    <a> - <?php echo $row_point['product_name'] ; echo "ถึงจุดสั่งซื้อ" ; echo "<br>" ; ?></a>
                                    </div>
                                    <?php } ?>

                                   
                                
                            </li>
                        </ul>
                    </div>
                </button>

                <button type="button" class="btn btn-outline-light me-2">
                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                                class="rounded-circle me-2">
                                <?php $sql = "select * from employee WHERE employee_id = '".$_SESSION['employee_id']."'" ; 
                                $re = mysqli_query($con , $sql ) ; 
                                $se = mysqli_fetch_array($re) ; 
                                ?>
                            <strong><?php echo $se['employee_name'] ; ?></strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item"
                                    href="?page=profile&employee_id=<?php echo $_SESSION['employee_id'] ; ?>">ข้อมูลโปรไฟล์</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="?page=password&employee_id=<?php echo $_SESSION['employee_id'] ; ?>">แก้ไขรหัสผ่าน</a>
                            </li>
                        </ul>
                    </div>
                </button>

                <button type="button" class="btn btn-warning" id="logout">ออกจากระบบ</button>
            </div>
        </div>
    </div>
</header>


<script src="index.js"></script>