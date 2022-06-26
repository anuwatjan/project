<?php


function getName($n){
    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"; //ตัวอักษรที่สามารถสุ่มได้
    $randomstring = "";
    for($i = 0; $i < $n; $i++) {
        $index = rand(0 , strlen($characters) - 1);
        $randomstring.= $characters[$index];  
    }
    return $randomstring;

}
echo getName(10);

?>