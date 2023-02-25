<?php

session_start();

$connect = mysqli_connect("localhost", "root", "akom2006", "project_new"); 


$username = $_POST['username'];

$password = $_POST['password'];

$reslutArray = array();

$arrayBill = array();

$sql = "SELECT employee_id ,  employee_name , username ,  password  , employee_phone , employee_role FROM employee WHERE  username = '".$username."' AND password = '".$password."' ";

$query = mysqli_query($connect , $sql);

$num = mysqli_num_rows($query);

$result = mysqli_fetch_array($query);

if($num > 0 ){

        $_SESSION['employeeusername'] =$username;

        $_SESSION['employee_name'] =$result['employee_name'];

        $_SESSION['employee_id'] =$result['employee_id'];

        $_SESSION['employee_role'] =$result['employee_role'];

        $_SESSION['employee_phone'] =$result['employee_phone'];
        

$arrayBill = array("role"  =>  $_SESSION['employee_role'] , "status" => 'YES' ,"employeeusername" => $_SESSION['employeeusername'],"employee_name" => $_SESSION['employee_name']
, "employee_id" => $_SESSION['employee_id'], "employee_phone" => $_SESSION['employee_phone'], "employee_role" => $_SESSION['employee_role']);

array_push($reslutArray , $arrayBill);

echo json_encode($reslutArray);

}else{

    $arrayBill = array("status" => 'NO' ,"employeeusername" => '');

    array_push($reslutArray , $arrayBill);

    echo json_encode($reslutArray);

}

        

?>