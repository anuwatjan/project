<?php session_start(); ?>
<?php
if (isset($_POST) && !empty($_POST)) {
	// echo '<pre>';
	// print_r($_POST);
	// echo '</pre>';
	$username = $_POST['username'];
	//$password = md5($_POST['password']);
    $password = $_POST['password'];
	// $password = sha1(md5($_POST['password']));	
	// exit();
	$sql = "SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."'";
	$query = mysqli_query($connection, $sql);
	$row = mysqli_num_rows($query);
    
    if ($row == 1) {
        $result = mysqli_fetch_assoc($query);
        $_SESSION['user_login'] = $result['username'];
        $_SESSION['posit_login'] = $result['user_status'];
        $_SESSION['image_login'] = $result['user_img'];
        $_SESSION['name_login'] = $result['user_name'];

        
        if ($_SESSION['posit_login']  == 'ผู้ดูแลระบบ') {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("WELCOME ผู้ดูแลระบบ");';
            $alert .= 'window.location.href = "./admin/";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } else if ($_SESSION['posit_login'] == 'เภสัชกร') {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("WELCOME เภสัชกร");';
            $alert .= 'window.location.href = "../user/";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } elseif ($_SESSION['posit_login'] == 'เจ้าของกิจการ') {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("WELCOME เจ้าของกิจการ");';
            $alert .= 'window.location.href = "../owner/index.php";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }
    }   else {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("username and password ไม่ถูกต้อง !!");';
        $alert .= 'window.location.href = "";';
        $alert .= '</script>';
        echo $alert;
        exit();
    }
  }
?>