<?php 
if(isset($_POST['tienhanh_giohang'])){
    $tensanpham=$_POST['tensanpham'];
    $sanpham_id=$_POST['sanpham_id'];
    $gia=$_POST['giasanpham'];
    $hinhanh=$_POST['hinhanh'];
    $soluong=$_POST['quantity'];
    $size=$_POST['size'];
    $sql_thanhtoan=mysqli_query($mysqli,"SELECT *FROM tbl_giohang WHERE sanpham_id='$sanpham_id' ");
}
?>
<?php 
if(isset($_POST['tienhanh_dathang'])){
    $name= $_POST['name'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $note= $_POST['note'];
    $address= $_POST['address'];
    $sql_khachhang=mysqli_query($mysqli,"INSERT INTO tbl_khachhang(name_khachhang,phone,address_khachhang,note,email)
        VALUES('$name','$phone','$address','$note','$email')");
        echo '<script>alert("Đặt Hàng Thành Công")</script>';
    if($sql_khachhang){
        $sql_select_khachhang=mysqli_query($mysqli,"SELECT *FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
        $mahang=rand(0,9999);
        $row_khachhang=mysqli_fetch_array($sql_select_khachhang);
        $khachhang_id=$row_khachhang['khachhang_id'];
        for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
            
            $sanpham_id=$_POST['thanhtoan_product_id'][$i];
            $soluong=$_POST['thanhtoan_quantity'][$i];
            $sql_donhang=mysqli_query($mysqli,"INSERT INTO tbl_donhang(sanpham_id,soluong,mahang,khachhang_id)
            VALUES('$sanpham_id','$soluong','$mahang','$khachhang_id')");
            $sql_giaodich=mysqli_query($mysqli,"INSERT INTO tbl_giaodich(sanpham_id,soluong,magiaodich,khachhang_id)
            VALUES('$sanpham_id','$soluong','$mahang','$khachhang_id')");
        $sql_delete_thanhtoan=mysqli_query($mysqli,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
             
    }
        
}
}

?>

<?php 
$sql_lay_thanhtoan=mysqli_query($mysqli,"SELECT *FROM tbl_giohang ORDER BY giohang_id DESC ");
?>
<section>
    <div class="payment">
        <div class="container">
            <div class="row m-0">
                <div class="col-lg-7 pb-5 pe-lg-5">
                    <div class="title-payment">
                            <div class="col"><h4><b>Đơn Hàng Của Bạn</b></h4></div>
                             
                    </div>
                    <form action="" method="POST">
                    <?php
                    $tongtien=0;
                    while ($row_fetch_thanhtoan=mysqli_fetch_array($sql_lay_thanhtoan)){
                        $subtotal= $row_fetch_thanhtoan['soluong'] * $row_fetch_thanhtoan['giasanpham'];
                        $tongtien += $subtotal;
                    ?>
                    <div class="row row-payment">
                        <div class="row border-top border-bottom">
                            <div class="row main align-items-center">
                                <div class="col-2"><img class="img-fluid" src="images/<?php echo $row_fetch_thanhtoan['hinhanh'] ?>"></div>
                                <div class="col">
                                    <div class="row text-muted"><?php echo $row_fetch_thanhtoan['tensanpham'] ?></div>
                                    <div class="row">size:<?php echo $row_fetch_thanhtoan['size'] ?></div>
                                </div>
                                <div class="col">
                                    <p> số Lượng: <?php echo $row_fetch_thanhtoan['soluong'] ?></p>
                                </div>
                                <div class="col"><?php echo number_format($subtotal).' vnđ'?></div>
                            </div>

                        </div>
                        <input type="hidden" name="product_id[]"  value="<?php echo $row_fetch_giohang['sanpham_id'] ?>">
                    </div>
                    <?php
                    }
                    ?>
                    </form>


                    <div class="all-payment">
                        <div class="d-flex justify-content-between mb-3">
                            <p class="fw-bold">Tổng Tiền</p>
                            <div class="d-flex align-text-top ">
                                <span class="fas fa-dollar-sign mt-1 pe-1 fs-14 "></span><span class="h4"><?php echo number_format($tongtien).' vnđ'?></span>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-5 p-0 ps-lg-4 payment-thongtin">
                    <div class="row m-0">
                        <div class="col-12 px-4">
                            <div class="title-payment">
                                <div class="col"><h4><b>Thông Tin Đơn Hàng</b></h4></div>
                                 
                            </div>
                            <!-- <div class="d-flex justify-content-between mb-2">
                                <p class="textmuted">Qty</p>
                                <p class="fs-14 fw-bold">1</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <p class="textmuted">Subtotal</p>
                                <p class="fs-14 fw-bold"><span class="fas fa-dollar-sign pe-1"></span>1,450</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <p class="textmuted">Shipping</p>
                                <p class="fs-14 fw-bold">Free</p>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <p class="textmuted">Promo code</p>
                                <p class="fs-14 fw-bold">-<span class="fas fa-dollar-sign px-1"></span>100</p>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <p class="textmuted fw-bold">Total</p>
                                <div class="d-flex align-text-top ">
                                    <span class="fas fa-dollar-sign mt-1 pe-1 fs-14 "></span><span class="h4">1,350</span>
                                </div>
                            </div> -->
                        </div>
                     <form action="" method="POST">
                        <div class="col-12 px-0">
                            
                            <div class="row bg-light m-0 payment-thong-tin-1">
                                <div class="col-12 px-4 my-4">
                                    <p class="fw-bold">Họ Và Tên</p>
                                    <input class="form-control" type="text" name="name">
                                    
                                </div>
                                <div class="col-12 px-4 my-4">
                                    <p class="fw-bold">Địa Chỉ</p>
                                    <input class="form-control" type="text"placeholder="phường,Quận,Tỉnh,Thành Phố" name="address">
                                    
                                </div>
                                <!-- <div class="col-12 px-4 my-4">
                                    <p class="fw-bold">Tỉnh, Thành Phố</p>
                                    <input class="form-control" type="text" name="address_tinh">
                                    
                                </div> -->
                                <div class="col-12 px-4 my-4">
                                    <p class="fw-bold">Số Điện Thoại</p>
                                    <input class="form-control" type="text"placeholder="+84" name="phone" >
                                    
                                </div>
                                <div class="col-12 px-4 my-4">
                                    <p class="fw-bold">Email</p>
                                    <input class="form-control" type="text"placeholder="abc@gmail.com" name="email" >
                                    
                                </div>
                                <div class="col-12 px-4 my-4">
                                    <p class="fw-bold">Ghi chú</p>
                                    <input class="form-control" type="text"placeholder="ghi chú về đơn hàng chúng tôi cần biết" name="note" >
                                    
                                </div>
                               
                                    
                            </div>
                            <?php
                            $sql_lay_giohang=mysqli_query($mysqli,"SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
                            while($row_thanhtoan=mysqli_fetch_array($sql_lay_giohang)){
                            ?>
                             <input type="hidden" min="1" name="thanhtoan_quantity[]"  value="<?php echo $row_thanhtoan['soluong'] ?>" class="qty" >
                            
                             <input type="hidden" name="thanhtoan_product_id[]"  value="<?php echo $row_thanhtoan['sanpham_id'] ?>">
                             <?php
                             } 
                             ?>

                            <input type="submit" name="tienhanh_dathang" value="Tiền Hành Đặt Hàng" class="btn" style="padding: 7px 90px;">
                        </div>
                        
                    </form>
                            <!-- <button class="btn">Tiến Hành Đặt Hàng</button> -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

