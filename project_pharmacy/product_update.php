<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$con = mysqli_connect("localhost", "root", "akom2006", "project_new");

if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
     $product_id = $_GET['product_id'];
     $sql = "SELECT * FROM product  WHERE product_id = '$product_id'";
     $query = mysqli_query($con, $sql);
     $result = mysqli_fetch_assoc($query);
  
}
if (isset($_POST) && !empty($_POST)) {
     $product_name = $_POST['product_name'];
     $product_type = $_POST['product_type'];
     $product_cate = $_POST['product_cate'];
     $product_symp = $_POST['product_symp'];
     $product_unit = $_POST['product_unit'];
     $product_price = $_POST['product_price'];
     $product_sell = $_POST['product_sell'];
     $product_point = $_POST['product_point'];
     $product_suppiles = $_POST['product_suppiles'];
     $oldimage = $_POST["oldimage"];
     if (isset($_FILES['product_image']['name']) && !empty($_FILES['product_image']['name'])) {
          $extension = array("jpeg", "jpg", "png");
          $target = './image/';
          $filename = $_FILES['product_image']['name'];
          $filetmp = $_FILES['product_image']['tmp_name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          if (in_array($ext, $extension)) {
               if (!file_exists($target . $filename)) {
                    if (move_uploaded_file($filetmp, $target . $filename)) {
                         $filename = $filename;
                    } else {
                         echo 'เพิ่มไม่สำเร็จ';
                    }
               } else {
                    $newfilename = time() . $filename;
                    if (move_uploaded_file($filetmp, $target . $newfilename)) {
                         $filename = $newfilename;
                    } else {
                         echo 'เพิ่มเข้าไม่ได้';
                    }
               }
          } else {
               echo 'ประเภทไม่ถูกต้อง';
          }
     } else {
          $filename = $oldimage;
     }

     if($product_price > $product_sell){
        echo "<script type='text/javascript'>";
        echo "Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'ราคาขายน้อยกว่าราคาทุนไม่ได้',
            showConfirmButton: false,
            timer: 1500
          });";
        echo "</script>";
     }else{
     $sql = "UPDATE product SET product_name='$product_name',product_sell='$product_sell' ,product_price='$product_price', product_image= '$filename' , 
    product_type = '$product_type'  , product_cate = '$product_cate' ,  product_symp = '$product_symp'  , product_unit = '$product_unit' ,
    product_suppiles = '$product_suppiles'  WHERE product_id = '$product_id'";
            
    if(mysqli_query($con,$sql)){
        echo "<script type='text/javascript'>";
        echo "Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'แก้ไขเรียบร้อย',
            showConfirmButton: false,
            timer: 2000
          });";
        echo "window.location.href='?page=product'";
        echo "</script>";
   } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
   }
   mysqli_close($con);
   }
}
?>

<style>
.bgc {
    background-color: purple;
}

.borderstyle {
    border-style: solid;
    border-width: 5px;
    border-color: purple;
}

.borderstyle1 {
    border: 1px solid white;
}
</style>

    <form role="form" class="m-5" method="post" enctype="multipart/form-data">
        <div class="form-group row mb-2">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <img id="preview" width="250" height="250" src="./image/<?php echo $result['product_image'] ?>">
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        เลือกไฟล์
                        <input type="file" class="form-control" name="product_image" id="product_image">
                        <input type="hidden" name="oldimage" value="<?php echo  $result['product_image'] ?>">
                    </div>
                    <div class="col-md-3">
                        SKU
                        <input type="text" class="form-control form-control-user" placeholder="SKU" name="product_name"
                            value="<?php echo $result['product_sku'];?>" required>
                    </div>
                    <div class="col-md-5">
                        ซัพพลายเซน
                        <select type="text" class="form-control" id="exampleInputUsername1" name="product_suppiles">
                            <?php
                                         $sqlsuppiles = "SELECT * FROM suppiles";
                                         $querysuppiles = mysqli_query($con, $sqlsuppiles);
                                        while ($row = mysqli_fetch_assoc($querysuppiles)) { ?>
                            <option value="<?= $row['suppiles_name'] ?>"
                                <?= $result['product_suppiles'] == $row['suppiles_name'] ? 'selected' : '' ?>>
                                <?= $row['suppiles_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row mb-2">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <p>ชื่อสินค้า</p>
                <input type="text" class="form-control form-control-user" placeholder="ชื่อสินค้า" name="product_name"
                    value="<?php echo $result['product_name'];?>" required>
            </div>
            <div class="col-sm-2">
                <p>ราคาต้นทุน</p>
                <input type="text" class="form-control form-control-user" placeholder="ราคาต้นทุน"
                    value="<?php echo $result['product_price'];?>" name="product_price" required>
            </div>
            <div class="col-sm-2">
                <p>ราคาขาย</p>
                <input type="text" class="form-control form-control-user" placeholder="ราคาขาย"
                    value="<?php echo $result['product_sell'];?>" name="product_sell" required>
            </div>
            <div class="col-sm-2">
                <p>จุดสั่งซื้อ</p>
                <input type="text" class="form-control form-control-user" placeholder="จุดสั่งซื้อ" name="product_point"
                    value="<?php echo $result['product_point'];?>" required>
            </div>
        </div>
        <div class="form-group row mb-2">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <p>หน่วยนับ</p>
                <select type="text" class="form-control" id="exampleInputUsername1" name="product_unit">
                    <?php
                                         $sqlunit = "SELECT * FROM unit";
                                         $queryunit = mysqli_query($con, $sqlunit);
                                        while ($row = mysqli_fetch_assoc($queryunit)) { ?>
                    <option value="<?= $row['unit_name'] ?>"
                        <?= $result['product_unit'] == $row['unit_name'] ? 'selected' : '' ?>>
                        <?= $row['unit_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
                <p>หมวดหมู่ของสินค้า</p>
                <select type="text" class="form-control" id="exampleInputUsername1" name="product_cate">
                    <?php
                                         $sqlunit = "SELECT * FROM category";
                                         $queryunit = mysqli_query($con, $sqlunit);
                                        while ($row = mysqli_fetch_assoc($queryunit)) { ?>
                    <option value="<?= $row['cate_name'] ?>"
                        <?= $result['product_cate'] == $row['cate_name'] ? 'selected' : '' ?>>
                        <?= $row['cate_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row mb-2">
            <div class="col-sm-6">
                <p>หมวดหมู่แยกตามอาการ</p>
                <select type="text" class="form-control" id="exampleInputUsername1" name="product_symp">
                    <?php
                                         $sqlunit = "SELECT * FROM symptons";
                                         $queryunit = mysqli_query($con, $sqlunit);
                                        while ($row = mysqli_fetch_assoc($queryunit)) { ?>
                    <option value="<?= $row['symp_name'] ?>"
                        <?= $result['product_symp'] == $row['symp_name'] ? 'selected' : '' ?>>
                        <?= $row['symp_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-6">
                <p>ประเภทสินค้า</p>
                <select type="text" class="form-control" id="exampleInputUsername1" name="product_type">
                    <?php
                                         $sqlunit = "SELECT * FROM type";
                                         $queryunit = mysqli_query($con, $sqlunit);
                                        while ($row = mysqli_fetch_assoc($queryunit)) { ?>
                    <option value="<?= $row['type_name'] ?>"
                        <?= $result['product_type'] == $row['type_name'] ? 'selected' : '' ?>>
                        <?= $row['type_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <center>
            <div class="row">
                <a href="?page=product" class="btn btn-danger btn-user " style="width:50%;">ย้อนกลับ</a>
                <button type="submit" class="btn btn-primary btn-user " style="width:50%;"
                    id="button">แก้ไขข้อมูล</button>
            </div>
        </center>
    </form>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script type="text/javascript">
function ReadURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#product_image").change(function() {
    ReadURL(this);
});
</script>