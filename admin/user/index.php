<?php include 'include/head.php' ; ?>

<body class="sb-nav-fixed">

    <?php include 'include/header.php' ; ?>

    <div id="layoutSidenav">

        <?php include 'include/nav.php' ; ?>


        <div id="layoutSidenav_content">

            <main>

                <div class="container-fluid px-4">

                    <?php

                        if (!isset($_GET['page']) && empty($_GET['page'])) {
                            include('dashboard_index.php');

                        } elseif (isset($_GET['page']) && $_GET['page'] == 'dashboard') {
                            include('dashboard_index.php');
                        }
                        
                    ?>

                </div>

            </main>

        </div>


    </div>

    <?php include 'include/script.php' ; ?>

</body>

</html>