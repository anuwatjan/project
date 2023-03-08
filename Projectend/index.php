<?php include 'include/head.php' ?>
<?php include 'connect.php' ?>
 <link rel="stylesheet" href="css.css">
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php include 'include/left.php' ?>
            <?php include 'include/top.php' ?>
            <div class="right_col" role="main">
                <div class="row" style="display: inline-block;">

                    <?php
                    if (!isset($_GET['page']) && empty($_GET['page'])) {
                        include('store_index.php');
                    } elseif (isset($_GET['page']) && $_GET['page'] == 'product') {
                        // if (isset($_GET['function']) && $_GET['function'] == 'delete') {
                        // include('product_delete.php');
                        // } elseif (isset($_GET['function']) && $_GET['function'] == 'update') {
                        // include('product_update.php');
                        // } elseif (isset($_GET['function']) && $_GET['function'] == 'detail') {
                        // include('product_detail.php');
                        // } else {
                        // include('product_index.php');
                        // }
                        }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <?php include 'include/script.php' ?>
</body>
</html>