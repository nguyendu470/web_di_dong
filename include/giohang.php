<?php
if(isset($_POST['themgiohang'])){
    $tensanpham=$_POST['tensanpham'];
    $sanpham_id=$_POST['sanpham_id'];
    $gia=$_POST['giasanpham'];
    $hinhanh=$_POST['hinhanh'];
    $soluong=$_POST['quantity'];
    $size=$_POST['size'];
    
    $sql_select_giohang=mysqli_query($mysqli,"SELECT *FROM tbl_giohang WHERE sanpham_id='$sanpham_id' ");
    $count=mysqli_num_rows($sql_select_giohang);
    if($count > 0){
        $row_sanpham= mysqli_fetch_array($sql_select_giohang);
        $soluong=$soluong + $row_sanpham['soluong'];   
        $sql_giohang="UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'";  
    }
    else{
        $soluong=$soluong; 
        $sql_giohang="INSERT INTO tbl_giohang(tensanpham,sanpham_id,giasanpham,hinhanh,soluong,size)
        VALUES('$tensanpham','$sanpham_id','$gia','$hinhanh','$soluong','$size')";  
        }
    
    $insert_row= mysqli_query($mysqli,$sql_giohang);

    if($insert_row == 0){
        header('Location:demo.php?quanli=chitietsp&id='.$sanpham_id);
    }
   
    
}
elseif(isset($_POST['capnhatgiohang'])){
    for($i=0;$i<count($_POST['product_id']);$i++){
    $sanpham_id=$_POST['product_id'][$i];
    $soluong=$_POST['quantity'][$i];
    $sql_update= mysqli_query($mysqli,"UPDATE tbl_giohang SET soluong='$soluong' WHERE sanpham_id='$sanpham_id'");
    }    
    
}
elseif(isset($_GET['xoa'])){
    $id=$_GET['xoa'];
    $sql_delete=mysqli_query($mysqli,"DELETE FROM tbl_giohang WHERE giohang_id='$id'");

}
?>

<?php 
$sql_lay_giohang=mysqli_query($mysqli,"SELECT *FROM tbl_giohang ORDER BY giohang_id DESC ");
?>

<section>
    <div class="cart-shopping">
        <div class="card">
            <div class="row">
           
                <div class="col-md-8 cart">
                    <div class="title">
                        <div class="row">
                            <div class="col"><h4><b>Giỏ Hàng</b></h4></div>
                            <div class="col align-self-center text-right text-mute " style="text-align:right;">3 sản phẩm</div>
                        </div>
                    </div>    
                    <?php 
                    $tongtien=0;
                    while ($row_fetch_giohang=mysqli_fetch_array($sql_lay_giohang)){
                        $subtotal= $row_fetch_giohang['soluong'] *   $row_fetch_giohang['giasanpham'];
                        $tongtien += $subtotal;
                    ?>
                     <form action="" method="POST">
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="images/<?php echo $row_fetch_giohang['hinhanh'] ?>"></div>
                            <div class="col">
                                <div class="row text-muted"><?php echo $row_fetch_giohang['tensanpham'] ?></div>
                                <div class="row">size: <?php echo $row_fetch_giohang['size'] ?></div>
                                <!-- <div class="row">Size: 7.5</div> -->
                            </div>
                            <div class="col" style="display: flex;" >
                                <!-- <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a> -->
                                <!-- <div class="qtyminus">-</div> -->
                                <input type="number" min="1" name="quantity[]"  value="<?php echo $row_fetch_giohang['soluong'] ?>" class="qty" >
                                <!-- <div class="qtyplus">+</div> -->
                                <input type="hidden" name="product_id[]"  value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
                                        
                                    
                            </div>
                            <div class="col"><?php echo number_format($subtotal).'vnđ'?><a href="?quanli=giohang&xoa=<?php echo $row_fetch_giohang['giohang_id'] ?>"><span class="close" style="margin-left: 40px;">&#10005;</span></a> </div>
                        </div>
                    </div>
                    
                 
                    <?php
                    }
                    ?>
                    <!-- <a href="#">
                      <button class="btn">Cập Nhật Giỏ Hàng</button>
                    </a> -->
                    <input type="submit" name="capnhatgiohang" value="Cập Nhật Giỏ Hàng" class="btn">
                    </form>
                    <!-- <div class="row">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="images/new-balance-550-white-black-bb550-2.jpg"></div>
                            <div class="col">
                                <div class="row text-muted">Shirt</div>
                                <div class="row">Cotton T-shirt</div>
                            </div>
                            <div class="col">
                                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
                            </div>
                            <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
                        </div>
                    </div> -->
                    <!-- <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="images/new-balance-550-white-black-bb550-3.jpg"></div>
                            <div class="col">
                                <div class="row text-muted">Shirt</div>
                                <div class="row">Cotton T-shirt</div>
                            </div>
                            <div class="col">
                                <a href="#">-</a><a href="#" class="border">1</a><a href="#">+</a>
                            </div>
                            <div class="col">&euro; 44.00 <span class="close">&#10005;</span></div>
                        </div>
                    </div> -->
                    
                    <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
                </div>
                <div class="col-md-4 summary">
                    <div><h5><b>Tổng Giỏ Hàng</b></h5></div>
                    <hr>
                    <div class="row">
                        <div class="col" style="padding-left:0;">Tạm Tính</div>
                        <div class="col text-right"><?php echo number_format($tongtien).'vnđ'?></div>
                    </div>
                    <form>
                        <!-- <p>SHIPPING</p>
                        <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select> -->
                        <p>Mã Giảm Giá</p>
                        <input id="code" placeholder="Enter your code">
                    </form>
                    <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                        <div class="col">Tổng tiền</div>
                        <div class="col text-right"><?php echo number_format($tongtien).'vnđ'?></div>
                    </div>
                    <a href="?quanli=thanhtoan">
                      <button class="btn">Tiến Hành Thanh Toán</button>
                    </a>
                    <!-- <input type="submit" name="tienhanh_thanhtoan" value="Tiến Hành Thanh Toán" class="btn"> -->
                </div>
            </div>
                
            
        </div>
    </div>
</section>