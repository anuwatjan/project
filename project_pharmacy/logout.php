<?php
session_start();
session_destroy();


 unset($_SESSION['user_login']);
 unset($_SESSION['image_login']);
 unset($_SESSION['employeeusername']);
 unset($_SESSION['employee_name']);
 unset($_SESSION['employee_id']);
 unset($_SESSION['employee_role']);
 unset($_SESSION['employee_phone']);
 
$alert = '<script type="text/javascript">';
// $alert .= 'alert(3);';
$alert .= 'window.location.href = "login.php";';
// $alert .= 'alert(4);';
$alert .= '</script>';
echo $alert;
exit;
?>