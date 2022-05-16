<?php
$conn = mysqli_connect("localhost", "root", "" , "test");
?>
<?php
if(isset($_POST)){
    $name = $_POST['name'];
$in = "insert into doc_status( name ) VALUES ( ' $name')" ;
$ok = mysqli_query($conn , $in) ; 
}
 ?>