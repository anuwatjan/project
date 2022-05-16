<?php session_start(); ?>
<!DOCTYPE html>
<?php include('./connect.php')?>
<?php if(isset($_SESSION['user_login']) && !empty($_SESSION['user_login'])):?>
<html lang="en">
<?php include('./include/head.php');?>
<?php include('./include/stylepreview.php');?>
<body>
<?php include('./include/header.php');?>
<?php include('./include/sildebar.php');?>

  <main id="main" class="main">
        <?php

// echo '<pre>'.print_r($_REQUEST, 1).'</pre>';
// exit;

      if (!isset($_GET['page']) && empty($_GET['page'])) {
        include('./product/index.php');
      } elseif (isset($_GET['page']) && $_GET['page'] == 'store') {
        if (isset($_GET['function']) && $_GET['function'] == 'updateunit') {
          include('store/updateunit.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'deletestore') {
          include('store/crud/delete.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insertstore') {
          include('store/forminsertstore.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'detailstore') {
          include('store/detailstore.php');
        } else {
          include('store/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'product') {
        if (isset($_GET['function']) && $_GET['function'] == 'updateproduct') {
          include('product/updateproduct.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'updateunit') {
          include('product/updateunit.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'deleteproduct') {
          include('product/crud/delete.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insertproduct') {
          include('product/forminsertproduct.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'detailproduct') {
          include('product/detailproduct.php');
        } else {
          include('product/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'category') {
        if (isset($_GET['function']) && $_GET['function'] == 'updatecategory') {
          include('category/updatecategory.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'deletecategory') {
          include('category/formdeletecategory.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insertcategory') {
          include('category/forminsertcategory.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'detailcategory') {
          include('category/detailcategory.php');
        } else {
          include('category/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'customer') {
        if (isset($_GET['function']) && $_GET['function'] == 'updatecustomer') {
          include('customer/updatecustomer.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'deletecustomer') {
          include('customer/crud/delete.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insertcustomer') {
          include('customer/forminsertcustomer.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'detailcustomer') {
          include('customer/detailcustomer.php');
        } else {
          include('customer/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'contact') {
        if (isset($_GET['function']) && $_GET['function'] == 'updatecontact') {
          include('contact/updatecontact.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'deletecontact') {
          include('contact/crud/delete.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insertcontact') {
          include('contact/forminsertcontact.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'detailcontact') {
          include('contact/detailcontact.php');
        } else {
          include('contact/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'typeproduct') {
        if (isset($_GET['function']) && $_GET['function'] == 'updatetypeproduct') {
          include('typeproduct/updatetypeproduct.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'deletetypeproduct') {
          include('typeproduct/crud/delete.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'inserttypeproduct') {
          include('typeproduct/forminserttypeproduct.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'detailtypeproduct') {
          include('typeproduct/detailtypeproduct.php');
        } else {
          include('typeproduct/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'unit') {
        if (isset($_GET['function']) && $_GET['function'] == 'updateunit') {
          include('unit/updateunit.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'deleteunit') {
          include('unit/crud/delete.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insertunit') {
          include('unit/forminsertunit.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'detailunit') {
          include('unit/detailunit.php');
        } else {
          include('unit/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'symp') {
        if (isset($_GET['function']) && $_GET['function'] == 'updatesymp') {
          include('symp/updatesymp.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'deletesymp') {
          include('symp/crud/delete.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insertsymp') {
          include('symp/forminsertsymp.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'detailsymp') {
          include('symp/detailsymp.php');
        } else {
          include('symp/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'PO') {
        if (isset($_GET['function']) && $_GET['function'] == 'updatePO') {
          include('PO/function.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'deletePO') {
          include('PO/formdeletePO.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insertPO') {
          include('PO/forminsertPO.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'insertGOOD') {
          // die('test');
          include('PO/crud/insertgood.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'cartPO') {
          include('PO/cart.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'reportPO') {
          include('PO/report/reportPO.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'modal') {
          include('PO/modal.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'detailPO') {
          include('PO/detailPO.php');
        } else {
          include('PO/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'GOOD') {
        if (isset($_GET['function']) && $_GET['function'] == 'updateGOOD') {
          include('GOOD/updateGOOD.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'deleteGOOD') {
          include('GOOD/formdeleteGOOD.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'cartGOOD') {
          include('GOOD/cart.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'reportGOOD') {
          include('GOOD/report/reportGOOD.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'modal') {
          include('GOOD/modal.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'detailGOOD') {
          include('GOOD/detailGOOD.php');
        } else {
          include('GOOD/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'sale') {
        if (isset($_GET['function']) && $_GET['function'] == 'updatesale') {
          include('sale/updatesale.php');
        } else {
          include('sale/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'receipt') {
        if (isset($_GET['function']) && $_GET['function'] == 'updatereceipt') {
          include('receipt/updatereceipt.php');
        } elseif (isset($_GET['function']) && $_GET['function'] == 'reportreceipt') {
          include('receipt/report/reportreceipt.php');
        } else {
          include('receipt/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'stock') {
        if (isset($_GET['function']) && $_GET['function'] == 'updatestock') {
          include('stock/updatestock.php');
        } else {
          include('stock/index.php');
        }
      } elseif (isset($_GET['page']) && $_GET['page'] == 'show') {
        if (isset($_GET['function']) && $_GET['function'] == 'updateshow') {
          include('show/updateshow.php');
        } else {
          include('show/index.php');
        }
      }elseif (isset($_GET['page']) && $_GET['page'] == 'confirmPO') {
        include('PO/confirmPO.php');
      }elseif (isset($_GET['page']) && $_GET['page'] == 'savestore') {
        include('store/savestore.php');
      }elseif (isset($_GET['page']) && $_GET['page'] == 'confirmstore') {
        include('store/confirmstore.php');
      }elseif (isset($_GET['page']) && $_GET['page'] == 'savePO') {
        include('PO/crud/savePO.php');
      } elseif (isset($_GET['page']) && $_GET['page'] == 'logout') {
        include('logout/index.php');
      }      
        ?>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<?php include('./include/script.php');?>

</body>
<?php else : ?>
<?php include('../login/index.php') ?>
<?php endif; ?>
</html>