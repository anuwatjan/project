<?php
session_start(); 
?>



<?php 
require 'phase_order.php' ;
$s = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 12);
 $date = date('Y-m-d H:i:s');
 require 'functionDateThai.php'; 
 ?>




<?php
$connect = mysqli_connect("localhost","root","akom2006","project_new");
?>

<div class="container">

    <form method="POST" action="?page=phase&function=insert&act=update">
        <div class="row">


            <a class="btn btn-primary" id="showmodal"> เลือกสินค้า</a>

            <!-- Modal -->
            <div class="modal fade showmodaldetail" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">รายการสินค้า</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12">

                                <form method="POST" id="sample-form">
                                    <div class="form-inline">
                                        <label>ซัพพลายเซน :</label>
                                        <select class="form-control" name="category">
                                            <option value="">เลือก</option>
                                            <?php
                                                $strSQL = "SELECT * FROM suppiles";
                                                $objQuery = mysqli_query($connect , $strSQL);
                                                while($objResuut = mysqli_fetch_array($objQuery))
                                                {
                                                ?>
                                            <option value="<?php echo $objResuut["suppiles_name"];?>">
                                                <?php echo $objResuut["suppiles_id"]." - ".$objResuut["suppiles_name"];?>
                                            </option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                        <br>
                                        <br>
                                        <button class="btn btn-primary" id="clickfiter" name="filter">เลือก</button>
                                        
                                        <button class="btn btn-success" name="reset">Reset</button>
                                    </div>
                                </form>
                                <br /><br />
                                <table class="table table-bordered">
                                    <thead class="alert-info">
                                        <th>ชื่อสินค้า</th>
                                        <th>ซัพพลายเซน</th>
                                        <th>จำนวนสินค้า</th>
                                        <th>จุดสั่งซื้อ</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                 
                                            <?php
	
                                                if(ISSET($_POST['filter'])){
                                                    $product_suppiles=$_POST['category'];
                                            
                                                    $query=mysqli_query($connect, "SELECT * FROM `product` WHERE `product_suppiles`='".$product_suppiles."'");
                                                    while($fetch=mysqli_fetch_array($query)){ ?>
                                                        <tr><td><?php echo $fetch['product_name'] ?></td><td><?php echo $fetch['product_suppiles']?></td><td><?php echo $fetch['product_quantity'] ;?></td><td<?php echo $fetch['product_point'] ?> </td><td><a class='btn btn-sm btn-primary' href='?page=<?= $_GET['page'] ?>&function=insert&product_id=<?php echo $fetch["product_id"];?>&act=add'>เลือก</a></td></tr>
                                                   <?php  }
                                                }else if(ISSET($_POST['reset'])){
                                                    $query=mysqli_query($connect, "SELECT * FROM `product`");
                                                    while($fetch=mysqli_fetch_array($query)){ ?>
                                                                                                               <tr><td><?php echo $fetch['product_name'] ?></td><td><?php echo $fetch['product_suppiles']?></td><td><?php echo $fetch['product_quantity'] ;?></td><td<?php echo $fetch['product_point'] ?> </td><td><a class='btn btn-sm btn-primary' href='?page=<?= $_GET['page'] ?>&function=insert&product_id=<?php echo $fetch["product_id"];?>&act=add'>เลือก</a></td></tr>

                                                    <?php }
                                                }else{
                                                    $query=mysqli_query($connect, "SELECT * FROM `product`");
                                                    while($fetch=mysqli_fetch_array($query)){
                                                        echo"<tr><td>".$fetch['product_name']."</td><td>".$fetch['category']."</td></tr>";
                                                    }
                                                }
                                            ?>
                                       
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-2">

                <table class="table table-bordered table-hover text-center">
                    <tr>
                        <!-- <td>ลำดับ</td> -->
                        <td>ซัพพลายเซน</td>
                        <td>สินค้า</td>
                        <td>ราคา</td>
                        <td>จำนวน</td>
                        <td>รวม(บาท)</td>
                        <td>ลบ</td>
                    </tr>


                    <?php
                    $total=0;
                    if(!empty($_SESSION['cart']))
                    {
                        $i = 1 ;
                        foreach($_SESSION['cart'] as $product_id=>$product_quantity)
                        {
                            $sql = "select * from product where product_id= '$product_id' ";
                            $query = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_array($query);
                            $sum = $row['product_price'] * $product_quantity;
                            $total += $sum;
                            $vat = 0.07 * $total;
                            echo "<tr>";
                            // echo "<td>" . $i++  . "</td>";
                            echo "<td width='300'>" . $row["product_suppiles"] . "</td>";
                            echo "<td width='300'>" . $row["product_name"] . "</td>";
                            echo "<td width='60' align='right'>" .number_format($row["product_price"],2) . "</td>";
                            echo "<td width='100' align='center'>";  
                            echo "<input type='text' class='form-control' name='amount[$product_id]' value='$product_quantity' size='2' autpcomplete='off'/></td>";
                            echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
                            echo "<td width='120' align='center'><a class='btn btn-danger btn-sm' href='?page=phase&function=insert&product_id=$product_id&act=remove'>ลบรายการ</a></td>";
                            echo "</tr>";
                        }
                        echo "<tr>";
                        echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
                        echo "<td align='left' bgcolor='#CEE7FF'></td>";
                        // echo "<td align='left' bgcolor='#CEE7FF'></td>";
                        // echo "<td align='left' bgcolor='#CEE7FF'></td>";
                        echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
                        // echo "<td align='left' bgcolor='#CEE7FF'></td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ภาษี</b></td>";
                        echo "<td align='center' bgcolor='#CEE7FF'>"."<b>".number_format(7,2)."%</b>"."</td>";
                        // echo "<td align='left' bgcolor='#CEE7FF'></td>";
                        // echo "<td align='left' bgcolor='#CEE7FF'></td>";
                        echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($vat, 2)."</b>"."</td>";
                        // echo "<td align='left' bgcolor='#CEE7FF'></td>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวมภาษี</b></td>";
                        // echo "<td align='left' bgcolor='#CEE7FF'></td>";
                        // echo "<td align='left' bgcolor='#CEE7FF'></td>";
                        echo "<td align='left' bgcolor='#CEE7FF'></td>";
                        echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format((($total * 0.07) + $total),2)."</b>"."</td>";
                        // echo "<td align='left' bgcolor='#CEE7FF'></td>";
                        echo "</tr>";
                    }
                    ?>
                    <tr>
                        <td colspan="7" align="right">
                            <?php if(empty($_SESSION['cart'])){
                        }else{ ?>
                            <input class="btn btn-secondary" type="submit" name="button" id="button" value="ปรับปรุง" />
                            <input class="btn btn-success btn-rounded" value="สรุปใบสั่งซื้อ"
                                onclick="window.location='?page=phase&function=insert1';"></input>
                            <?php } ?>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </form>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="phase.js"></script>