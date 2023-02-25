<!DOCTYPE html>
<?php session_start(); ?>
<?php if (isset($_SESSION['employeeusername']) && !empty($_SESSION['employeeusername'])) : ?>
<html lang="en">
<?php require 'head.php' ?>
<?php require 'header.php' ?>

<style>
  .hoveradye {
	border-radius:6px;
	background: #7fad39;
	color: #ffffff;
}
</style>
<body>
    <div class="row">
        <div class="col-md-3">
            <?php require 'sidebar.php' ?>
        </div>
        <div class="col-md-9 mt-3">

            <?php
          if (!isset($_GET['page']) && empty($_GET['page'])) {
            include('store_index.php');

          } elseif (isset($_GET['page']) && $_GET['page'] == 'product') {
            if (isset($_GET['function']) && $_GET['function'] == 'delete') {
              include('product_delete.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
              include('product_update.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'detail') {
              include('product_detail.php');
            } else {
              include('product_index.php');
            }

          } elseif (isset($_GET['page']) && $_GET['page'] == 'unit') {
            if (isset($_GET['function']) && $_GET['function'] == 'delete') {
              include('unit_delete.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
              include('unit_update.php');
            } else {
              include('unit_index.php');
            }
          } elseif (isset($_GET['page']) && $_GET['page'] == 'cate') {
            if (isset($_GET['function']) && $_GET['function'] == 'delete') {
              include('cate_delete.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
              include('cate_update.php');
            } else {
              include('cate_index.php');
            }
          } elseif (isset($_GET['page']) && $_GET['page'] == 'type') {
            if (isset($_GET['function']) && $_GET['function'] == 'delete') {
              include('type_delete.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
              include('type_update.php');
            } else {
              include('type_index.php');
            }
          } elseif (isset($_GET['page']) && $_GET['page'] == 'symp') {
            if (isset($_GET['function']) && $_GET['function'] == 'delete') {
              include('symp_delete.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
              include('symp_update.php');
            } else {
              include('symp_index.php');
            }

          } elseif (isset($_GET['page']) && $_GET['page'] == 'phase') {
            if (isset($_GET['function']) && $_GET['function'] == 'delete') {
              include('phase_delete.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'insert') {
              include('phase_insert.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'insert1') {
              include('phase_insert_show.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'insert2') {
              include('phase_manager_sql.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'detail') {
              include('phase_detail.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
              include('phase_update.php');
            } else {
              include('phase_index.php');
            }

          } elseif (isset($_GET['page']) && $_GET['page'] == 'goods') {
            if (isset($_GET['function']) && $_GET['function'] == 'delete') {
              include('goods_delete.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'detail') {
              include('goods_detail.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'insert1') {
              include('goods_insert_show.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
              include('goods_update.php');
            } else {
              include('goods_index.php');
            }


          } elseif (isset($_GET['page']) && $_GET['page'] == 'product_insert') {
            include('product_insert.php');
            
            
          } elseif (isset($_GET['page']) && $_GET['page'] == 'dashboard_index') {
            include('dashboard_index.php');


          } elseif (isset($_GET['page']) && $_GET['page'] == 'phase_manager') {
            if (isset($_GET['function']) && $_GET['function'] == 'delete') {
              include('phase_delete.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'insert') {
              include('phase_manager_sql.php');
            } else {
              include('phase_manager_index.php');
            }

            
          } elseif (isset($_GET['page']) && $_GET['page'] == 'goods_manager') {
            if (isset($_GET['function']) && $_GET['function'] == 'delete') {
              include('goods_delete.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'insert') {
              include('goods_manager_date_sql.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'date') {
              include('goods_manager_date.php');
            } else {
              include('goods_manager_index.php');
            }

          } elseif (isset($_GET['page']) && $_GET['page'] == 'stock') {
            if (isset($_GET['function']) && $_GET['function'] == 'delete') {
              include('stock_delete.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'insert') {
              include('stock_date_sql.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'date') {
              include('stock_date.php');
            } else {
              include('stock_index_test.php');
            }

          } elseif (isset($_GET['page']) && $_GET['page'] == 'stock_run') {
            if (isset($_GET['function']) && $_GET['function'] == 'delete') {
              include('stock_run_delete.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'insert') {
              include('stock_run_date_sql.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'date') {
              include('stock_run_date.php');
            } else {
              include('stock_run_index.php');
            }

          } elseif (isset($_GET['page']) && $_GET['page'] == 'stock_delete') {
            if (isset($_GET['function']) && $_GET['function'] == 'delete') {
              include('stock_delete_delete.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'insert') {
              include('stock_delete_date_sql.php');
            } elseif (isset($_GET['function']) && $_GET['function'] == 'date') {
              include('stock_delete_date.php');
            } else {
              include('stock_delete_index.php');
            }

        
          } elseif (isset($_GET['page']) && $_GET['page'] == 'goods_insert') {
          include('goods_insert.php');


        } elseif (isset($_GET['page']) && $_GET['page'] == 'report_phase') {
          include('report_phase_index.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'report_goods') {
          include('report_goods_index.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'store_index') {
          if (isset($_GET['function']) && $_GET['function'] == 'insert') {
            include('store_index.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'insert1') {
            include('store_index_show.php');
          } else {
            include('store_index.php');
          }

        } elseif (isset($_GET['page']) && $_GET['page'] == 'report_quantity') {
          include('report_quantity_index.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'customer') {
          include('customer_index.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'user') {
          include('user_index.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'suppiles') {
          include('suppiles_index.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'price') {
          include('price_index.php');
          
        } elseif (isset($_GET['page']) && $_GET['page'] == 'report_date') {
          include('report_date_index_test.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'profile') {
          include('profile.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'password') {
          include('password.php');

        } elseif (isset($_GET['page']) && $_GET['page'] == 'report_sale') {
          if (isset($_GET['function']) && $_GET['function'] == 'day') {
            include('report_sale_day_index.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'month') {
            include('report_sale_month_index.php');
          } elseif (isset($_GET['function']) && $_GET['function'] == 'year') {
            include('report_sale_year_index.php');
          } else {
            include('report_sale_index.php');
          }

          }

          ?>

        </div>
    </div>

    <?php require 'script.php' ?>
    
<Script src="index.js"></Script>

</body>

</html>
<?php else : ?>
<?php include('login.php') ?>
<?php endif; ?>