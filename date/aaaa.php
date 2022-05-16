<form method="POST">
    กรุณากรอกตัวเลข 10 หลัก<br/>
    <input type="text" name="number">
    <input type="submit" value="ตกลง">
</form>
<?php
    isset( $_POST['number'] ) ? $number = $_POST['number'] : $number = "";
    if( strlen( $number ) != 10 ) {
        echo "<div>กรุณากรอกตัวเลข 10 หลักเท่านั้น</div>";
    } else {
        echo "คุณกรอกตัวเลข 10 หลักครบ";
    }
?>