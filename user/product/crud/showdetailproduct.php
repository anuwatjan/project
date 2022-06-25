<?php
include 'connect.php'; // MySQL Connection
if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
  $sql = "SELECT * , a.product_type,b.type_id,b.type_name AS name_type , 
a.product_category,c.category_id,c.category_name AS name_category , 
a.product_symptom,d.symptom_id,d.symptom_name AS name_symptom 
  FROM product a 
  INNER join type b ON a.product_type = b.type_id 
  INNER JOIN category c ON a.product_category = c.category_id
  INNER JOIN symptom d ON a.product_symptom = d.symptom_id  
  WHERE a.product_id = '$product_id'";
  $query = mysqli_query($connection, $sql);
  $result = mysqli_fetch_assoc($query);


  $sql1 = "SELECT * FROM doc_unit e 
  JOIN unit ee ON e.unit_id = ee.unit_id 
  WHERE product_id = '$product_id'";
  $query1 = mysqli_query($connection, $sql1);
  $result1 = mysqli_fetch_assoc($query1);

  $sql2 ="select * from po j JOIN product k on j.product_id = k.product_id  WHERE k.product_id = '$product_id'";
  $query2 =mysqli_query($connection,$sql2);
}
?>