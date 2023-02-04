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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <link rel="stylesheet" href="../scss/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="reset.css">
    <link href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
</head>
<body>
    <!-- <h2>Xin Chao: <?php //echo $_SESSION['dangnhap'] ?></h2>
    <a href="?login=dangxuat">Đăng Xuất</a>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
</nav> -->

<header>
   <div class="header" >
    <div class="logo" >
        <a href="demo.php">
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
  
  </header>
   


  <!---------------------Footer-------------------------------------------------- -->
    <!-- section dang ki nhan tin tu email -->
    <section class="sign_up_email">
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
    </section>
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