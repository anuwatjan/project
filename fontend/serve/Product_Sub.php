<?php session_start(); ?>
<?php 
require_once '../includedb/condb.php';  
$prod_id = $_POST['product_id'] ; 
$sql = "SELECT * FROM akksofttech_product  where prod_id = '".$prod_id."'  ";
$result = mysqli_query($conn, $sql);
$mainArray = array();
while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC))	{
        array_push($mainArray, $data);
}										
$sql = "SELECT * FROM akksofttech_subproduct WHERE prod_id = {$prod_id} ORDER BY sprod_price ASC ";
$result = mysqli_query($conn, $sql);
$subArray = [];
while ($data2 = mysqli_fetch_array($result, MYSQLI_ASSOC))	{

        // $sql3 = "SELECT * FROM akksofttech_subproductone WHERE prod_id = {$prod_id}  ";
        // $result3 = mysqli_query($conn, $sql3);
        // $suboneArray = [];
        // while ($data3 = mysqli_fetch_array($result3, MYSQLI_ASSOC))	{
        // array_push($suboneArray, $data3);
        // }
        array_push($subArray, $data2);
}												
echo json_encode(['main' => $mainArray, 'sub' => $subArray  ]);

?>