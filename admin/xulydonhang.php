<?php
 session_start();
 if(!isset($_SESSION['dangnhap'])){
    header('Location: admin.php');
 } 
?>
<?php
    if(isset($_GET['login'])){
        $dangxuat=$_GET['login'];
    }
    else{
        $dangxuat='';
    }
    if($dangxuat=='dangxuat'){
        unset($_SESSION['dangnhap']);
        header('Location: admin.php');
    } 
?>
<?php 
    include_once('../db/connect.php');
?>
<?php
if( isset($_POST['capnhatdonhang'])){
    $xuli=$_POST['xuli']; 
    $mahang_xuli=$_POST['mahang_xuli'];
     $sql_update_donhang=mysqli_query($mysqli,"UPDATE tbl_donhang SET trangthai='$xuli' WHERE mahang='$mahang_xuli'");
}
?>
<?php
if(isset($_GET['xoadonhang'])){
    $mahang=$_GET['xoadonhang'];
    $sql_delete_donhang= mysqli_query($mysqli,"DELETE FROM tbl_donhang WHERE mahang='$mahang' ");
    header('Location: xulydonhang.php');

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn Hàng</title>
    <link rel="stylesheet" href="../scss/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="reset.css">
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
</head>
<body>
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="xulydonhang.php">Đơn Hàng <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="xulydanhmuc.php">Danh Mục</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="xulysanpham.php">Sản Phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="xulykhachhang.php">Khách Hàng</a>
            </li>
            </ul>
        </div>
</nav><br><br> -->

<!-- header -->
<header>
   <div class="header" >
    <div class="logo" >
        <a href="xulydonhang.php">
            <img src="../images/logo-Bulldog.png" alt="logo" style="width: 75px;">
          </a>
    </div>
    <nav class="navbar navbar-expand-lg bg-light " style="background-color: #333 !important;">

    <div class="menu">
      <a class="navbar-brand color_header" style="color: white !important;margin-right: 65px;" href="xulydonhang.php">Đơn Hàng</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand color_header " style="color: white !important;margin-right: 65px;" href="xulydanhmuc.php">Danh Mục</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand color_header" style="color: white !important;margin-right: 65px;" href="xulysanpham.php">Sản Phẩm</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand color_header" style="color: white !important;margin-right: 65px;" href="xulykhachhang.php">Khách Hàng</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      
    </div>

    <div class="others">
        <form class="d-flex" role="search">
          
          <!-- <i class="fa-solid fa-cart-shopping icon_shopping"></i> -->
          <!-- nhúng icon shopping -->
          <!-- <p>Xin Chao: </p> -->
          <a class="navbar-brand color_header" style="color: white !important;margin-left:150px" href=""><?php echo $_SESSION['dangnhap'] ?></a>
          <a href="admin/admin.php">
                 <img src="../images/user.png" alt="icon1" style="width: 35px;">
         </a>
         <a class="navbar-brand color_header" style="color: white !important;margin-left: 10px;font-size: 14px;" href="?login=dangxuat">Đăng Xuất</a>
        </form>
    </div>
        
      </div>
    </div>
  </nav>
  
  </header><br>


    <div class="container">
    <h2 class="heading_title"style="font-size: 40px; text-align: center;
        color: #333333 !important;
        padding: 10px 15px;" >
        Đơn Hàng
      </h2>
        <div class="row">
            <?php
            if(isset($_GET['quanli']) =='xemdonhang'){
                $mahang=$_GET['mahang'];
                $sql_chitiet= mysqli_query($mysqli,"SELECT *FROM tbl_sanpham, tbl_khachhang,tbl_donhang 
                WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id AND tbl_donhang.khachhang_id=tbl_khachhang.khachhang_id AND tbl_donhang.mahang='$mahang' ");

            ?>
           <div class="col-md-12" style="margin-top: 35px;">
                <h4 style="text-align: center;">Chi tiết Đơn Hàng</h4>
                <form action="" method="POST">
                    <table class="table table-bordered ">
                            <tr>
                                <th>Thứ Tự</th>
                                <th>Mã Hàng</th>
                                <th>Tên Khách Hàng</th> 
                                <th>Số điện thoại</th>
                                <th>địa chỉ</th> 
                                <th>Tên Sản Phẩm</th> 
                                <th>Số Lượng</th>
                                <th>Tổng Tiền</th>
                                <th>Ngày Đặt</th>
                                <th>Ghi Chú</th>
                            
                            </tr>
                        
                        <?php
                        $i=0;
                        while($row_donhang= mysqli_fetch_array($sql_chitiet)){
                            $i ++;

                        
                        ?>    
                            <tr>
                                    <td><?php echo $i ?></td>
                                    <td> <?php echo $row_donhang['mahang'] ?> </td>
                                    <td> <?php echo $row_donhang['name_khachhang'] ?> </td>
                                    <td> <?php echo $row_donhang['phone'] ?> </td> 
                                    <td> <?php echo $row_donhang['address_khachhang'] ?></td> 
                                    <td> <?php echo $row_donhang['sanpham_name'] ?> </td>
                                    <td> <?php echo $row_donhang['soluong'] ?> </td>
                                    <td> <?php echo number_format($row_donhang['soluong'] *$row_donhang['sanpham_giakhuyenmai']).'vnđ'; ?> </td>
                                
                                    <td> <?php echo $row_donhang['thoigian'] ?> </td>
                                    <td> <?php echo $row_donhang['note'] ?> </td>
                                    <input type="hidden" name="mahang_xuli" value="<?php echo $row_donhang['mahang'] ?>">
                                    
                            </tr>
                        <?php
                        }   
                        ?>   
                        </table>
                    <div class="trangthai" style="display:flex;">
                        <h6 style="margin-right:40px;">trạng thái</h6>
                        <select class="form-control" name="xuli" style="width: 20%;margin-right: 15px;">
                            <option value="">   </option>
                            <option value="0"> chưa xử lí</option>
                            <option value="1"> đã xử lí</option>
                        </select><br>
                        <input type="submit" value="cập nhật trạng thái" name="capnhatdonhang" class="btn btn-success">
                     </div>
                    </form>
           </div>  
            <?php         
            }else{

            ?>
            <div class="col-md-8" style="margin-left: 190px;margin-top: 35px;">
                <h4 style="text-align:center;">Thống  Kê Đơn Hàng</h4>
                <?php
                $sql_select= mysqli_query($mysqli,"SELECT *FROM tbl_sanpham, tbl_khachhang,tbl_donhang 
                WHERE tbl_donhang.sanpham_id=tbl_sanpham.sanpham_id AND tbl_donhang.khachhang_id=tbl_khachhang.khachhang_id
                GROUP BY tbl_donhang.mahang 
                ORDER BY tbl_donhang.donhang_id ASC") ;
                ?>
                <table class="table table-bordered ">
                    <tr>
                        <th>Thứ Tự</th>
                        <!-- <th>Tên Sản Phẩm</th> -->
                        <!-- <th>Số Lượng</th> -->
                        <th>Mã Hàng</th>
                        <th>Tên Khách Hàng</th>
                        <th>Ngày Đặt</th>
                        <th>Trạng Thái</th>
                        <th>Quản Lí</th>
                    </tr>
                
                <?php
                $i=0;
                while($row_donhang= mysqli_fetch_array($sql_select)){
                    $i ++;

                
                ?>    
                    <tr>
                            <td><?php echo $i ?></td>
                            <!-- <td> <?php //echo $row_donhang['sanpham_name'] ?> </td> -->
                            <!-- <td> <?php //echo $row_donhang['soluong'] ?></td> -->
                            <td> <?php echo $row_donhang['mahang'] ?> </td>
                            <td> <?php echo $row_donhang['name_khachhang'] ?> </td>
                            <td> <?php echo $row_donhang['thoigian'] ?> </td>
                            <td> <?php
                            if($row_donhang['trangthai']==0){
                                echo 'Chưa Xử Lí';
                            } 
                            else{
                                echo'đã xử lí';
                            }
                            ?> </td>
                            <td> <a href="?xoadonhang=<?php echo $row_donhang['mahang'] ?>"> Xóa</a> || <a href="?quanli=xemdonhang&mahang=<?php echo $row_donhang['mahang'] ?>"> xem Đơn Hàng</a></td>
                    </tr>
                 <?php
                 }
                 ?>   
                </table>
            </div>
            <?php
            }
            ?>
            
            
        </div>
    </div>
<!-- footer -->
<!-- <section class="sign_up_email">
        <div class="inside_sign_up">
            <h2 class="title">Đăng Ký Nhận Tin Từ BullDog</h2>
            <p>Thông tin sản phẩm mới nhất và chương trình khuyến mãi</p>
            <div class="input">
                <div class="input-email">
                    <input type="text" class="form-control" placeholder="abc@gmail.com" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
                <div class="btn-sign-up">
                    <button class="btn btn-primary" type="submit">Đăng Ký</button>
                </div>
            </div>

        </div>
    </section> -->
    <footer class="text-center text-lg-start bg-dark text-white ">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Tương tác với chúng tôi qua mạng xã hội:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="footer_body">
            <div class="container text-center text-md-start mt-5">
                <div class="header">

                    <!-- Grid row -->
                    <div class="row mt-3 ">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 footer_body1">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i><img src="../images/logo-Bulldog.png" alt="logo" style="width: 50px;"></i> BULL DOG
                            </h6>
                            <p>
                                Năm 2020, Bulldog trở thành đại lý bán giày chính hãng. Chúng tôi phát triển chuỗi cửa
                                hàng tiêu chuẩn và nhằm mang đến trải nghiệm tốt nhất về sản phẩm cho người dùng Việt
                                Nam.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 footer_body2">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Sản Phẩm
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Adidas</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Nike</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Reebok</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Vans</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Converse</a>
                            <p>
                                <a href="#!" class="text-reset">New balance</a>
                            </p>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 footer_body3">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Chính sách của chúng tôi
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Chính sách thanh toán</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Chính Sách Đổi Trả</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Hướng Dẫn Mua Hàng</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Kích Cỡ Size</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Chính Sách Tuyển Dụng</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 footer_body4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Liên Hệ
                            </h6>
                            <p><i class="fas fa-home me-3"></i> 303 Nguyễn Thiện Thuật, Phường 1, Q3, HCM</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                Cskh@Bulldog.Vn
                            </p>
                            <p><i class="fas fa-phone me-3"></i> 1900.6626</p>
                            <p><i class="fas fa-print me-3"></i> 0866.308.688</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>


        </section>

        <!-- Section: Social media -->

        <!-- Section: Social media -->


        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021
            <a class="text-reset fw-bold" href="https://www.facebook.com/nguyendu2508/">Bản Quyền Thuộc về
                Bulldog.com.Thiết kế website bởi NguyenvanDu</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->


</body>
</html>