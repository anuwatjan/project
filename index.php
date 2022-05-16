<?php session_start(); ?>
<?php 
    $alert = '<script type="text/javascript">';
    $alert .= 'alert("ยินดีต้อนรับ ระบบร้านขายยาดาชัย์");';
    $alert .= 'window.location.href = "./login/";';
    $alert .= '</script>';
    echo $alert;
    exit();
?>