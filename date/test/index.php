<?php
$conn = mysqli_connect("localhost", "root", "" , "test");
?>

<?php $select = "select * from status";
$ss = mysqli_query($conn , $select);

?>
<form action="" method="post">
    <table>
        <tr>
            <?php while ($row =mysqli_fetch_array($ss)){ ?>
            <td><?php echo $row['id'] ; ?></td>
            <td><?php echo $row['name'] ; ?></td>
            <td><a href="update1.php?id=<?php echo $row['id'] ; ?>">แก้ไข</a></td>
        </tr>
            <?php } ?>
        </tr>
    </table>
</form>