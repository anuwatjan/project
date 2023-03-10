<?php if($_SESSION['employee_role'] == "ผู้ดูแลระบบ" || $_SESSION['employee_role'] == "เจ้าของกิจการ"){ ?>
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="?page=dashboard_index" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Dachai Pharmacy</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <!-- <li class="nav-item">
            <a href="?page=store_index" class="nav-link active" aria-current="page">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#home" />
                </svg>
                ขายสินค้า
            </a>
        </li> -->
        <li>
            <a href="?page=product" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#speedometer2" />
                </svg>
                สินค้า
            </a>
        </li>
      
        <li>
            <a href="?page=customer" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                ลูกค้า
            </a>
        </li>
        <li>
            <a href="?page=suppiles" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                ซัพพลายเซน
            </a>
        </li>
        <li>
            <a href="?page=user" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                ผู้ใช้งานระบบ
            </a>
        </li>


      
        <li>
            <a href="?page=report_phase" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                รายงานการสั่งซื้อ
            </a>
        </li>


        <li>
            <a href="?page=report_sale" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                รายงานยอดขาย
            </a>
        </li>

        <li>
            <a href="?page=report_quantity" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                รายงานการสินค้าคงเหลือ
            </a>
        </li>

        <li>
            <a href="?page=report_date" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                รายงานอายุของสินค้า
            </a>
        </li>

    </ul>
    <hr>
  
</div>
<?php }else{ ?>
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="?page=dashboard_index" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Dachai Pharmacy</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="?page=store_index" class="nav-link active" aria-current="page">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#home" />
                </svg>
                ขายสินค้า
            </a>
        </li>
        <li>
            <a href="?page=product" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#speedometer2" />
                </svg>
                สินค้า
            </a>
        </li>
        <li>
            <a href="?page=cate" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#table" />
                </svg>
                หมวดหมู่สินค้า
            </a>
        </li>
        <li>
            <a href="?page=symp" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#grid" />
                </svg>
                หมวดหมู่สินค้าตามอาการ
            </a>
        </li>
        <li>
            <a href="?page=type" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                ประเภทสินค้า
            </a>
        </li>
        <li>
            <a href="?page=unit" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                หน่วยนับสินค้า
            </a>
        </li>
        <li>
            <a href="?page=customer" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                ลูกค้า
            </a>
        </li>
        <li>
            <a href="?page=suppiles" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                ซัพพลายเซน
            </a>
        </li>
        <li>
            <a href="?page=user" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                ผู้ใช้งานระบบ
            </a>
        </li>
        <li>
            <a href="?page=phase" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="45">
                    <use xlink:href="#people-circle" />
                </svg>
                ใบสั่งซื้อ
            </a>
        </li>
       
        <li>
            <a href="?page=goods_manager" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                จัดการใบรับสินค้า
            </a>
        </li>

        <li>
            <a href="?page=goods" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                จัดการสินค้าเข้าสต็อก
            </a>
        </li>

        <li>
            <a href="?page=report_phase" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                รายงานการสั่งซื้อ
            </a>
        </li>

        <!-- <li>
            <a href="?page=report_good" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                รายงานการรับสินค้า
            </a>
        </li> -->

        <li>
            <a href="?page=report_sale" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                รายงานยอดขาย
            </a>
        </li>

        <li>
            <a href="?page=report_quantity" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                รายงานการสินค้าคงเหลือ
            </a>
        </li>

        <li>
            <a href="?page=report_date" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="#people-circle" />
                </svg>
                รายงานอายุของสินค้า
            </a>
        </li>

    </ul>
    <hr>
  
</div>
<?php } ?>